<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Turma;
use App\Models\Curso;
use App\Models\Documento;
use App\Models\Comprovante;
use Illuminate\Support\Facades\Auth;

class GraficoController extends Controller
{
    public function graficoPorTurma()
    {
        $this->authorize('hasClassGraphPermission', Turma::class);

        $cursoId = Auth::user()->aluno()->curso_id;
        $turmas = Turma::where('curso_id', $cursoId)->with('curso')->get();

        $data = [];

        foreach ($turmas as $turma) {
            $alunos = Aluno::with('user')
                ->where('turma_id', $turma->id)
                ->whereNotNull('user_id')
                ->get();

            $alunosData = [];

            foreach ($alunos as $aluno) {
                $horasSolicitadas = Documento::where('user_id', $aluno->user_id)->selectRaw('SUM(horas_in) as total_in, SUM(horas_out) as total_out')->first();
                $horasLancadas = Comprovante::where('aluno_id', $aluno->id)->sum('horas');

                $alunosData[] = (object) [
                    'id' => $aluno->id,
                    'user_id' => $aluno->user_id,
                    'nome' => $aluno->user()->name,
                    'solicitado' => $horasSolicitadas->total_in ?? 0,
                    'validado' => $horasSolicitadas->total_out ?? 0,
                    'lancado' => $horasLancadas ?? 0,
                ];
            }

            $data[] = [
                'turma' => $turma->curso->sigla . '-' . $turma->ano,
                'aluno' => $alunosData,
            ];
        }

        return view('grafico.aluno', compact('data'));
    }

    public function graphHour()
    {
        $this->authorize('hasHoursGraphPermission', Turma::class);

        $cursoId = Auth::user()->curso_id;
        $turmas = Turma::where('curso_id', $cursoId)->with('curso')->get();

        $data = [];

        foreach ($turmas as $turma) {
            $alunos = Aluno::with('user')
                ->where('turma_id', $turma->id)
                ->whereNotNull('user_id')
                ->get();

            $totalHorasCurso = $turma->curso->total_horas;
            $totalAlunos = $alunos->count();
            $totalCumpriu = 0;

            foreach ($alunos as $aluno) {
                $horasValidadas = Documento::where('user_id', $aluno->user_id)->sum('horas_out');
                $horasLancadas = Comprovante::where('aluno_id', $aluno->id)->sum('horas');

                if (($horasValidadas + $horasLancadas) >= $totalHorasCurso) {
                    $totalCumpriu++;
                }
            }

            $data[] = [
                'turma' => $turma->curso->sigla . '-' . $turma->ano,
                'grafico' => [
                    'total_sim' => $totalCumpriu,
                    'total_nao' => $totalAlunos - $totalCumpriu,
                ],
            ];
        }

        return view('grafico.hora', compact('data'));
    }
}
