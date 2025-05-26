<?php

namespace App\Http\Controllers;

use App\Facades\Permissions;
use App\Models\Categoria;
use App\Models\Curso;
use App\Models\User;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('categoria.index')->with(['categorias'=>$categorias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cursos = Curso::all();
        return view('categoria.create')->with(['cursos'=>$cursos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_role = $request->user()->role_id;
        abort_unless(Permissions::isAuthorized($user_role), 403);
        $request->validate([
            'nome'=>'required|string|min:3',
            'maximo_horas'=>'required|numeric|min:1',
            'curso_id'=>'required|exists:cursos,id',
        ]);
        Categoria::create($request->all());
        return redirect()->route('categoria.index')->with('success', 'Categoria criada com sucesso!');
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
        $categoria = Categoria::with(['curso'])->findOrFail($id);
        $cursos = Curso::all();

        return view('categoria.edit')->with(['categoria'=>$categoria, 'cursos'=>$cursos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome'=>'required|string|min:3',
            'maximo_horas'=>'required|numeric|min:1',
            'curso_id'=>'required|exists:cursos,id',
        ]);
        Categoria::findOrFail($id)->update($request->all());
        return redirect()->route('categoria.index')->with('success', 'Categoria atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return redirect()->route('categoria.index')->with('success', 'Categoria removida com sucesso!');
    }
}
