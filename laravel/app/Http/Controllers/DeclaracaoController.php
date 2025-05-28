<?php
namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Comprovante;
use App\Models\Documento;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class DeclaracaoController extends Controller
{
    public function declaracaoComprovante(string $id)
    {
        $comprovante = Comprovante::with(['categoria', 'aluno.user'])->findOrFail($id);

        $html = View::make('declaracao.comprovante', compact('comprovante'))->render();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf->stream('declaracao-comprovante.pdf', ['Attachment'=>false]);
    }

    public function declaracaoAluno(string $alunoId)
    {
        $aluno = Aluno::with('user', 'turma.curso')->findOrFail($alunoId);

        $totalHoras = $this->getTotalHorasAluno($alunoId, $aluno->user_id);

        $html = View::make('declaracao.aluno', [
            'aluno' => $aluno,
            'totalHoras' => $totalHoras,
        ])->render();

        $dompdf = new Dompdf(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf->stream('declaracao-horas-afins.pdf', ['Attachment' => false]);
    }

    private function getTotalHorasAluno($alunoId, $userId): float
    {
        $horasComprovantes = Comprovante::where('aluno_id', $alunoId)->sum('horas');

        $horasDocumentos = Documento::where('user_id', $userId)
            ->where('status', 'aprovado')
            ->sum('horas_out');

        return $horasComprovantes + $horasDocumentos;
    }
}
