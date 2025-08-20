<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{

    protected $fillable = [
        'cliente_id',
        'peso_total',
        'plano_id'
    ];

    public function cliente(){
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function plano(){
        return $this->belongsTo(Plano::class, 'plano_id');
    }

}
