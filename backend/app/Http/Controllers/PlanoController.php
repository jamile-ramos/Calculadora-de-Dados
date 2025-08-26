<?php

namespace App\Http\Controllers;

use App\Models\Plano;
use Illuminate\Http\Request;

class PlanoController extends Controller
{
    public function index()
    {
        return view('calculadora.index');
    }

    public function calcular(Request $request)
    {
        $request->validate([
            'dispositivos.celular' => 'required|integer|min:0',
            'dispositivos.computador' => 'required|integer|min:0',
            'dispositivos.smart_tv' => 'required|integer|min:0',
            'dispositivos.tv_box' => 'required|integer|min:0',
            'dispositivos.outros' => 'required|integer|min:0',
            'isGamer' => 'nullable|boolean',
        ]);
        
        $dispositivos = $request->input('dispositivos', []);
        $isGamer = $request->input('isGamer', false);

        $pesos = [
            'celular' => 0.8,
            'computador' => 0.5,
            'smart_tv' => 0.4,
            'tv_box' => 0.6,
            'outros' => 0.1,
        ];
        
        $pesoTotal = 0;

        foreach ($dispositivos as $tipo => $quantidade) {
            $pesoTotal += ($quantidade * ($pesos[$tipo] ?? 0));
        }

        if ($isGamer) {
            $pesoTotal *= 2;
        }

        $planoIdeal = Plano::where('peso_minimo', '<=', $pesoTotal)
                            ->orderBy('peso_minimo', 'desc')
                            ->first();

        if (!$planoIdeal) {
            return response()->json(['erro' => 'Nenhum plano encontrado para o peso total calculado.'], 404);
        }

        // 7. Retornar a resposta
        return response()->json([
            'pesoTotal' => $pesoTotal,
            'plano' => $planoIdeal->nome,
            'velocidade' => $planoIdeal->velocidade,
        ]);
    }
}