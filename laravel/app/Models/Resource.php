<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resource extends Model
{
    use HasFactory;
    //use SoftDeletes;
    protected $table = 'resources';

    protected $fillable = ['nome'];

    public function permission(){
        return $this->hasMany(Permission::class);
    }
}
