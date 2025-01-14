<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Numero extends Model
{
    protected $table = 'numero';
    protected $fillable = [
        'descricao',
        'comprado',
        'comprador',
        'id_rifa',
    ];

    public function rifa()
    {
        return $this->belongsTo(Rifa::class, 'id_rifa');
    }

    public function comprador()
    {
        return $this->belongsTo(Usuarios::class, 'comprador', 'id');
    }
}
