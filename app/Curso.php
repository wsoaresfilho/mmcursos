<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Curso extends Model
{
    protected $fillable = [
        'nome', 'descricao', 'categoria_id','url'
    ];
    protected $guarded = ['curso_id', 'created_at', 'updated_at'];

    protected $primaryKey = 'curso_id';
    protected $table = 'cursos';
}
