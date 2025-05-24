<?php

namespace App\Http\Controllers;
use App\Models\Eixo;
use Illuminate\Http\Request;

class EixoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eixos = Eixo::all();
        return view('eixo.index')->with(['eixos'=>$eixos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('eixo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['nome'=>'required | string | min:3']);
        Eixo::create($request->all());
        return redirect()->route('eixo.index')->with('success', 'Eixo criado com sucesso!');
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
        $eixo = Eixo::findOrFail($id);
        return view('eixo.edit')->with(['eixo'=>$eixo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(['nome'=>'required | string | min:3']);
        Eixo::findOrFail($id)->update($request->all());
        return redirect()->route('eixo.index')->with('success', 'Eixo atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $eixo = Eixo::findOrFail($id);
        $eixo->delete();

        return redirect()->route('eixo.index')->with('success', 'Eixo removido com sucesso!');
    }
}
