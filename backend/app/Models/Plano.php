<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'is_gamer'
    ];

    public function venda(){
        return $this->belongsTo(Venda::class, 'plano_id');
    }

}
