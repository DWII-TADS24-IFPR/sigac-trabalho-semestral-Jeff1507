<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ComprovanteController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DeclaracaoController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\EixoController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TurmaController;
use Illuminate\Support\Facades\Route;
use App\Facades\Permissions;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('/nivel', NivelController::class);
    Route::resource('/eixo', EixoController::class);
    Route::resource('/curso', CursoController::class);
    Route::resource('/turma', TurmaController::class);
    Route::resource('/aluno', AlunoController::class);
    Route::resource('/categoria', CategoriaController::class);
    Route::resource('/documento', DocumentoController::class);
    Route::resource('/comprovante', ComprovanteController::class);
    Route::get('/solicitacoes', [DocumentoController::class, 'listarSolicitacoes'])->name('documento.solicitacoes');
    Route::get('/solicitacoes/{id}/validar', [DocumentoController::class, 'validar'])->name('documento.validar');
    Route::put('/solicitacoes/{id}/validar', [DocumentoController::class, 'finish'])->name('documento.finish');
    Route::get('/comprovantes/{id}/declaracao', [DeclaracaoController::class, 'declaracaoComprovante'])->name('comprovantes.declaracao');
    Route::get('/declaracao/aluno/{id}', [DeclaracaoController::class, 'declaracaoAluno'])->name('declaracao.aluno');
    Route::get('/grafico/turma/{id}', [TurmaController::class, 'graficoPorTurma'])->name('grafico.turma');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/facade/test', function () {
    return Permissions::test();
});


require __DIR__.'/auth.php';
