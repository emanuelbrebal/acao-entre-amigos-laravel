<?php

namespace App\Http\Controllers;

use App\Models\Numero;
use App\Models\Rifa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstituicaoController extends Controller
{
    public function listMyRaffles(){
        $instituicaoLogada = Auth::guard('instituicao')->user();

        $minhasRifas = Rifa::where('id_instituicao', $instituicaoLogada->id)->get();

        $numerosTotais = Numero::where('comprado', true)
        ->selectRaw('id_rifa, COUNT(*) as total')
        ->groupBy('id_rifa')
        ->get()
        ->keyBy('id_rifa');

        $valorCotas = Rifa::where('id_instituicao', $instituicaoLogada->id)->pluck('preco_numeros', 'id');

        $qtdTotais = Rifa::where('id_instituicao', $instituicaoLogada->id)->pluck('qtd_num', 'id');


        $totalArrecadado = $numerosTotais;

        return view('listMyQuotas', compact('minhasRifas', 'numerosTotais', 'qtdTotais', 'instituicaoLogada', 'valorCotas'));
    }
}
