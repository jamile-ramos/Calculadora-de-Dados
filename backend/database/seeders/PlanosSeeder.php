<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanosSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('planos')->insert([
            ['nome' => 'Prata', 'velocidade' => 100, 'peso_minimo' => 0.0],
            ['nome' => 'Bronze', 'velocidade' => 300, 'peso_minimo' => 1.0],
            ['nome' => 'Ouro', 'velocidade' => 500, 'peso_minimo' => 2.01],
            ['nome' => 'Diamante', 'velocidade' => 800, 'peso_minimo' => 3.0]
        ]);
    }
}
