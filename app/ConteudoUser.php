<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConteudoUser extends Model
{
    protected $fillable = [
        'conteudo_id', 'user_id'
    ];
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $primaryKey = 'id';
    protected $table = 'conteudos_users';
}
