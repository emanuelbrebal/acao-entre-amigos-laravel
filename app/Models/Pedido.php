<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedido';
    protected $fillable = [
        'user_id',
        'numero_id',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'user_id');
    }

    public function numero()
    {
        return $this->hasMany(Numero::class, 'numero_id');
    }
}
