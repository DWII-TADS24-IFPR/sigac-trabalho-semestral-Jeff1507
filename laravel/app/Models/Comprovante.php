<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comprovante extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'comprovantes';

    protected $fillable = [
        'horas',
        'atividade',
        'categoria_id',
        'aluno_id',
        'user_id',
    ];

    public function categoria() {
        return $this->belongsTo(Categoria::class);
    }

    public function aluno() {
        return $this->belongsTo(Aluno::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function declaracao(){
        return $this->hasOne(Declaracao::class);
    }
}
