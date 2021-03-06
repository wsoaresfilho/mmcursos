<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['nome','descricao'];
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $table = 'categorias';
}
