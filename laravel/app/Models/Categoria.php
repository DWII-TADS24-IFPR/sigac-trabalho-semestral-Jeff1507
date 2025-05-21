<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'categorias';

    protected $fillable = [
        'nome',
        'maximo_horas',
        'curso_id',
    ];

    public function curso() {
        return $this->belongsTo(Curso::class);
    }

    public function comprovante(){
        return $this->hasManyTo(Comprovante::class);
    }

    public function documento(){
        return $this->hasMany(Documento::class);
    }
}
