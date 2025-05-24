<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nivel extends Model
{
    use HasFactory;
    //use SoftDeletes;
    protected $table = 'niveis';
    protected $fillable = ['nome'];

    public function curso() {
        return $this->hasMany(Curso::class);
    }
}
