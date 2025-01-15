<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rifa extends Model
{
    protected $table = 'rifa';

    protected $fillable = [
        'titulo_rifa',
        'preco_numeros',
        'premiacao',
        'data_sorteio',
        'id_usuario_vendedor',
        'id_instituicao',
        'imagem'
    ];

    public function numeros()
    {
        return $this->hasMany(Numero::class, 'id_rifa');
    }

    public function user_vencedor()
    {
        return $this->belongsTo(Usuarios::class, 'id_usuario_vencedor');
    }

    public function instituicao()
    {
        return $this->belongsTo(Instituicao::class, 'id_instituicao');
    }
}
