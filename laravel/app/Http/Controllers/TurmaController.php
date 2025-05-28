<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Turma;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('hasFullPermission', Turma::class);
        $turmas = Turma::all();
        return view('turma.index')->with(['turmas'=>$turmas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('hasFullPermission', Turma::class);
        $cursos = Curso::all();
        return view('turma.create')->with(['cursos'=>$cursos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('hasFullPermission', Turma::class);
        $request->validate([
            'ano'=>'required|integer|min:4',
            'curso_id'=>'required|exists:cursos,id',
        ]);
        Turma::create($request->all());
        return redirect()->route('turma.index')->with('success', 'Turma criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->authorize('hasFullPermission', Turma::class);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('hasFullPermission', Turma::class);
        $turma = Turma::with(['curso'])->findOrFail($id);
        $cursos = Curso::all();

        return view('turma.edit')->with(['turma'=>$turma, 'cursos'=>$cursos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize('hasFullPermission', Turma::class);
        $request->validate([
            'ano'=>'required|integer|min:4',
            'curso_id'=>'required|exists:cursos,id',
        ]);
        Turma::findOrFail($id)->update($request->all());
        return redirect()->route('turma.index')->with('success', 'Turma atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('hasFullPermission', Turma::class);
        $turma = Turma::findOrFail($id);
        $turma->delete();

        return redirect()->route('turma.index')->with('success', 'Turma removida com sucesso!');
    }

    public function graficoPorTurma(String $id)
    {
        $turma = Turma::with(['aluno.user'])->findOrFail($id);

        $dados = [];

        foreach ($turma->aluno as $aluno) {
            $nome = $aluno->user->name;

            $horas_comprovantes = $aluno->comprovante()->sum('horas');

            $horas_documentos = $aluno->user->documento()
                ->where('status', 'ACEITO')
                ->sum('horas_out');

            $total_horas = $horas_comprovantes + $horas_documentos;

            $dados[] = [$nome, $total_horas];
        }

        return view('grafico.turma', compact('turma', 'dados'));
    }
}
