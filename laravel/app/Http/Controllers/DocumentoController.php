<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Documento;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documentos = Documento::all();
        return view('documento.index')->with(['documento'=>$documentos]);
    }

    public function listarPorAluno () {
        $aluno = Auth::user();
        $documentos = $aluno->documento;
        return view('documento.listarPorAluno')->with(['documentos'=>$documentos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $aluno_curso_id = 0;
        if (Auth::user()->aluno) {
            $aluno = Auth::user()->aluno;
            $aluno_curso_id = $aluno->curso_id;      
        }
        $categorias = Categoria::where('curso_id', $aluno_curso_id)->get();
        return view('documento.create')->with(['categorias'=>$categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
