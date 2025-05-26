<?php

namespace App\Http\Controllers;
use App\Models\Nivel;
use Illuminate\Http\Request;

class NivelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('hasFullPermission', Nivel::class);
        $niveis = Nivel::all();
        return view('nivel.index')->with(['niveis'=>$niveis]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('hasFullPermission', Nivel::class);
        return view('nivel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('hasFullPermission', Nivel::class);
        $request->validate(['nome'=>'required|string|min:3']);
        Nivel::create($request->all());
        return redirect()->route('nivel.index')->with('success', 'Nível criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->authorize('hasFullPermission', Nivel::class);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('hasFullPermission', Nivel::class);
        $nivel = Nivel::findOrFail($id);
        return view('nivel.edit')->with(['nivel'=>$nivel]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize('hasFullPermission', Nivel::class);
        $request->validate(['nome'=>'required|string|min:3']);
        Nivel::findOrFail($id)->update($request->all());
        return redirect()->route('nivel.index')->with('success', 'Nível atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('hasFullPermission', Nivel::class);
        $nivel = Nivel::findOrFail($id);
        $nivel->delete();

        return redirect()->route('nivel.index')->with('success', 'Nível removido com sucesso!');
    }
}
