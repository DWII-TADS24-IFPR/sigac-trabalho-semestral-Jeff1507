<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Eixo;
use App\Models\Nivel;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cursos = Curso::all();
        return view('curso.index')->with(['cursos'=>$cursos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $niveis = Nivel::all();
        $eixos = Eixo::all();
        return view('curso.create')->with(['niveis' => $niveis, 'eixos' => $eixos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|min:3',
            'sigla' => 'required|string|min:2',
            'total_horas' => 'required|numeric|min:3',
            'nivel_id' => 'required|exists:niveis,id',
            'eixo_id' => 'required|exists:eixos,id',
        ]);
        Curso::create($request->all());
        return redirect()->route('curso.index')->with('success', 'Curso criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $curso = Curso::with(['nivel', 'eixo'])->findOrFail($id);
        return view('curso.show')->with(['curso' => $curso]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $curso = Curso::with(['nivel', 'eixo'])->findOrFail($id);
        $niveis = Nivel::all();
        $eixos = Eixo::all();

        return view('curso.edit')->with(['curso'=>$curso, 'niveis'=>$niveis, 'eixos'=>$eixos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => 'required|string|min:3',
            'sigla' => 'required|string|min:2',
            'total_horas' => 'required|numeric|min:3',
            'nivel_id' => 'required|exists:niveis,id',
            'eixo_id' => 'required|exists:eixos,id',
        ]);

        Curso::findOrFail($id)->update($request->all());
        return redirect()->route('curso.index')->with('success', 'Curso atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $curso = Curso::findOrFail($id);
        $curso->delete();

        return redirect()->route('curso.index')->with('success', 'Curso removido com sucesso!');
    }
}
