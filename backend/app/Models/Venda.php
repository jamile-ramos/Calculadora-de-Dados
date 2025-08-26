<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{

    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'is_gamer',
        'plano_id',
        'peso_total',
    ];

    public function plano(){
        return $this->belongsTo(Plano::class, 'plano_id');
    }

    public function detalhesDispositivos()
    {
        return $this->hasMany(DetalhesDispositivos::class);
    }

}
