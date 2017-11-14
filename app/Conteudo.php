<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conteudo extends Model
{
    protected $fillable = [
        'nome', 'descricao', 'arquivo', 'curso_id'
    ];
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $primaryKey = 'id';
    protected $table = 'conteudos';
}
