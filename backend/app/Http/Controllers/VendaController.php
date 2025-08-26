<?php

namespace App\Http\Controllers;

use App\Mail\ContratacaoClienteMailable;
use App\Mail\ContratacaoVendedorMailable;
use App\Models\Plano;
use App\Models\Venda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Necessário para transações
use Illuminate\Support\Facades\Mail; // Necessário para enviar e-mails
use App\Mail\VendaConfirmacao; // Crie esta classe Mailable
use Illuminate\Support\Facades\Log;

class VendaController extends Controller
{
    public function contratar(Request $request)
    {
        // 1. Validar os dados da requisição
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email',
            'telefone' => 'required|string|max:20',
            'is_gamer' => 'nullable|boolean',
            'plano' => 'required|string|max:255',
            'pesoTotal' => 'required|numeric',
            'dispositivos.celular' => 'required|integer|min:0',
            'dispositivos.computador' => 'required|integer|min:0',
            'dispositivos.smart_tv' => 'required|integer|min:0',
            'dispositivos.tv_box' => 'required|integer|min:0',
            'dispositivos.outros' => 'required|integer|min:0',
        ]);

        DB::beginTransaction();

        try {
            $plano = Plano::where('nome', $request->plano)->first();

            if (!$plano) {
                return response()->json(['erro' => 'Plano não encontrado.'], 404);
            }

            $venda = Venda::create([
                'nome' => $dados['nome'],
                'email' => $dados['email'],
                'telefone' => $dados['telefone'],
                'is_gamer' => $dados['is_gamer'],
                'plano_id' => $plano->id,
                'peso_total' => $dados['pesoTotal']
            ]);

            foreach ($dados['dispositivos'] as $tipo => $quantidade) {
                if ($quantidade > 0) {
                    $venda->detalhesDispositivos()->create([
                        'tipo_dispositivo' => $tipo,
                        'quantidade' => $quantidade
                    ]);
                }

            }
            DB::commit(); //confirmar as alterações feitas dentro de uma transação em um banco de dados

            $detalhesDispositivos = $venda->detalhesDispositivos;

            $pesos = [
                'celular' => 0.8,
                'computador' => 0.5,
                'smart_tv' => 0.4,
                'tv_box' => 0.6,
                'outros' => 0.1,
            ];

            // 5. Enviar e-mails de confirmação
            Mail::to($venda->email)->send(new ContratacaoClienteMailable($venda, $detalhesDispositivos, $pesos));

            Mail::to('operacoes@micks.com.br')->send(new ContratacaoVendedorMailable($venda, $detalhesDispositivos, $pesos));

            // 6. Retornar uma resposta de sucesso
            return response()->json([
                'mensagem' => 'Contratação realizada com sucesso! Você receberá um e-mail com o resumo da contratação!',
                'venda' => $venda
            ], 201);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'erro' => 'Ocorreu um erro ao processar a contratação. Tente novamente.',
                'detalhe' => $e->getMessage()
            ], 500);
        }
    }

    public function contratarForm(Request $request)
    {
        return view('calculadora.form');
    }
}
