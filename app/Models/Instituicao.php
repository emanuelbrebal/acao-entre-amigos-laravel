<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model
{
    protected $fillable = [
        'nome',
        'cnpj',
        'email',
        'num_celular'
    ];

}
