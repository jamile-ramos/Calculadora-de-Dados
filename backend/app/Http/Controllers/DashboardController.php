<?php

namespace App\Http\Controllers;

use App\Models\DetalhesDispositivos;
use App\Models\Venda;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        $query = $request->input('q');

        if ($query) {
            $vendas = Venda::where(function ($q) use ($query) {
                $q->where('nome', 'like', "%{$query}%")
                    ->orWhere('email', 'like', "%{$query}%")
                    ->orWhere('telefone', 'like', "%{$query}%");
            })->get();
        } else {
            $vendas = Venda::all();
        }

        $vendasCount = Venda::all()->count();

        $vendasHoje = Venda::whereDate('created_at', Carbon::today())->count();

        $totalDispositivos = DetalhesDispositivos::all()->sum('quantidade');

        return view('dashboard', compact('vendas', 'totalDispositivos', 'vendasHoje', 'vendasCount'));
    }
}
