<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Numero extends Model
{
    protected $fillable = [
        'descricao',
        'comprado',
        'id_rifa',
    ];

    public function rifa()
    {
        return $this->belongsTo(Rifa::class, 'id_rifa');
    }
}
