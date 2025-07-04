<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Categoria;
use App\Models\Comprovante;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComprovanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('hasFullPermission', Comprovante::class);
        $comprovantes = Comprovante::all();
        return view('comprovante.index')->with(['comprovantes'=>$comprovantes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('hasFullPermission', Comprovante::class);
        $categorias = Categoria::all();
        $alunos = Aluno::all();

        return view('comprovante.create')->with(['categorias'=>$categorias, 'alunos'=>$alunos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('hasFullPermission', Comprovante::class);
        $request->validate([
            'atividade'=>'required|string|min:3',
            'horas'=>'required|numeric|min:1',
            'categoria_id'=>'required|exists:categorias,id',
            'aluno_id'=>'required|exists:alunos,id',
        ]);
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        Comprovante::create($data);
        return redirect()->route('comprovante.index')->with('success', 'Comprovante criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->authorize('hasFullPermission', Comprovante::class);
        $comprovante = Comprovante::with(['categoria', 'aluno'])->findOrFail($id);
        return view('comprovante.show')->with(['comprovante'=>$comprovante]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('hasFullPermission', Comprovante::class);
        $comprovante = Comprovante::with(['categoria', 'aluno'])->findOrFail($id);
        $categorias = Categoria::all();
        $alunos = Aluno::all();

        return view('comprovante.edit')->with(['comprovante'=>$comprovante, 'categorias'=>$categorias, 'alunos'=>$alunos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize('hasFullPermission', Comprovante::class);
        $request->validate([
            'atividade'=>'required|string|min:3',
            'horas'=>'required|numeric|min:1',
            'categoria_id'=>'required|exists:categorias,id',
            'aluno_id'=>'required|exists:alunos,id',
        ]);
        
        Comprovante::findOrFail($id)->update($request->all());
        return redirect()->route('comprovante.index')->with('success',  'Comprovante atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('hasFullPermission', Comprovante::class);
        $comprovante = Comprovante::findOrFail($id);
        $comprovante->delete();

        return redirect()->route('comprovante.index')->with('success', 'Comprovante removido  com sucesso!');
    }
}
