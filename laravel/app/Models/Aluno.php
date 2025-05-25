<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aluno extends Model
{
    use HasFactory;
    //use SoftDeletes;
    protected $table = 'alunos';

    protected $fillable = [
        //'nome',
        'cpf',
        //'email',
        //'senha',
        'user_id',
        'curso_id',
        'turma_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function curso() {
        return $this->belongsTo(Curso::class);
    }

    public function turma() {
        return $this->belongsTo(Turma::class);
    }

    public function comprovante() {
        return $this->hasMany(Comprovante::class);
    }

    public function declaracao() {
        return $this->hasMany(Declaracao::class);
    }
}
