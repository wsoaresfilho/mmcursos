<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CursoUser extends Model
{
    protected $fillable = [
        'curso_id', 'user_id'
    ];
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $primaryKey = 'id';
    protected $table = 'cursos_users';
}
