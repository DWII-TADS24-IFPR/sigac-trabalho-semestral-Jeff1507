<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CursoController;
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
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/facade/test', function () {
    return Permissions::test();
});


require __DIR__.'/auth.php';
