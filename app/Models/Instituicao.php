<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model
{
    protected $table = 'instituicao';
    protected $fillable = [
        'nome',
        'cnpj',
        'email',
        'num_celular',
        'rifa'
    ];

    public function rifa()
    {
        return $this->hasMany(Rifa::class, 'id_instituicao', 'id');
    }
}
