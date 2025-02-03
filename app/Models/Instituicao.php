<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Instituicao extends Authenticatable
{
    protected $table = 'instituicao';
    protected $fillable = [
        'nome',
        'cnpj',
        'email',
        'celular',
        'endereco',
        'id_rifa'
    ];

    public function rifa()
    {
        return $this->hasMany(Rifa::class, 'id_instituicao', 'id');
    }
}
