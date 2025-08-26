<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalhesDispositivos extends Model
{
    protected $fillable = [
        'venda_id',
        'tipo_dispositivo',
        'quantidade',
    ];

    public function venda()
    {
        return $this->belongsTo(Venda::class);
    }
}
