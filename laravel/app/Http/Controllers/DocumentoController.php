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
    private $path = "documentos/alunos";
    public function index()
    {
        $this->authorize('hasFullPermission', Documento::class);
        $user = Auth::user();
        //if ($user->role_id == 1) {
        //    return "<h1> SEM PERMISSÃO <h1/>";
        //}
        //dd($user->id);
        $documentos = Documento::where('user_id', $user->id)->get();
        return view('documento.index')->with(['documentos'=>$documentos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //$this->authorize('hasFullPermission', Documento::class);
        $user = Auth::user();
        /*if ($user->role_id == 1) {
            return "<h1> SEM PERMISSÃO <h1/>";
        }*/
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
        //$this->authorize('hasFullPermission', Documento::class);
        //$user = Auth::user();
        /*if ($user->role_id == 1) {
            return "<h1> SEM PERMISSÃO <h1/>";
        }*/
        $request->validate([
            'descricao' => 'required|string|min:3',
            'horas_in' => 'required|numeric|min:1',
            'url' => 'required|file|mimes:pdf|max:2048',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $aluno = Auth::user();
        $categoria = Categoria::findOrFail($request->categoria_id);

        if ($request->hasFile('url') && $request->file('url')->isValid()) {

            $extensao_arq = $request->file('url')->getClientOriginalExtension();
            $nome_arq = $request->file('url')->getClientOriginalName().'_'.time().'.'.$extensao_arq;

            $request->file('url')->storeAs("public/$this->path", $nome_arq);

            $documento = new Documento();
            $documento->descricao = mb_strtoupper($request->descricao, 'UTF-8');
            $documento->horas_in = $request->horas_in;
            //$documento->status = "INDEFINIDO";
            //$documento->horas_out = 0;
            $documento->url = $this->path."/".$nome_arq;            
            $documento->categoria()->associate($categoria);
            $documento->user()->associate($aluno);
            $documento->save();
        }

        return redirect()->route('documento.index')->with('success', 'Solicitação de horas afins enviada!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->authorize('hasAssessPermission', Documento::class);
        $documento = Documento::with(['categoria', 'user'])->findOrFail($id);
        return view('documento.show')->with(['documento'=>$documento]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('hasFullPermission', Documento::class);
        $documento = Documento::with(['categoria'])->findOrFail($id);
        if (Auth::user()->id != $documento->user_id) {
            return "<h1> SEM AUTORIZAÇÃO! <h1/>";
        }
        $aluno_curso_id = 0;
        if (Auth::user()->aluno) {
            $aluno = Auth::user()->aluno;
            $aluno_curso_id = $aluno->curso_id;      
        }
        $categorias = Categoria::where('curso_id', $aluno_curso_id)->get();

        return view('documento.edit')->with(['documento'=>$documento, 'categorias'=>$categorias]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize('hasFullPermission', Documento::class);
        $documento = Documento::with(['categoria'])->findOrFail($id);
        if (Auth::user()->id != $documento->user_id) {
            return "<h1> SEM AUTORIZAÇÃO! <h1/>";
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('hasFullPermission', Documento::class);
    }

    public function listarSolicitacoes() {
        $this->authorize('hasAssessPermission', Documento::class);
        $documentos = Documento::all();
        return view('documento.listarSolicitacoes')->with(['documentos'=>$documentos]);
    }
    public function validar() {
        $this->authorize('hasAssessPermission', Documento::class);
    }
}
