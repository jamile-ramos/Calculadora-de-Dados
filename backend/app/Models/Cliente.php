<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public function venda(){
        return $this->hasMany(Venda::class, 'usuario_id');
    }
}
