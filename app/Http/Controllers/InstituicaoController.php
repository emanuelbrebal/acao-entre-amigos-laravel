<?php

namespace App\Http\Controllers;

use App\Models\Numero;
use App\Models\Rifa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstituicaoController extends Controller
{
    public function listMyRaffles()
    {
        $instituicaoLogada = Auth::guard('instituicao')->user();

        $minhasRifas = Rifa::where('id_instituicao', $instituicaoLogada->id)
            ->orderBy('ativado', 'desc')
            ->get();


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

    public function updateMyRaffles($id)
    {
        $rifa = Rifa::where("id", $id)->first();
        return view('updateRaffle', compact('rifa'));
    }

    public function editarRifa(Request $request)
    {
        $rifa = Rifa::where('id', $request->id_rifa)->firstOrFail();

        $validated = $request->validate([
            'id_rifa' => 'required|integer',
            'id_instituicao' => 'required|integer',
            'titulo_rifa' => 'nullable|string',
            'preco_numeros' => 'nullable|string',
            'premiacao' => 'nullable|string',
            'data_sorteio' => 'nullable|date',
            'horario_sorteio' => 'nullable|date_format:H:i'
        ]);

        $rifa->update($validated);


        return redirect()->route('listMyRaffles')->with('success', 'Rifa editada com sucesso!');
    }

    public function desativarRifa($id)
    {
        $rifa = Rifa::where('id', $id)->first();

        $rifa->ativado = false;
        $rifa->save();

        return redirect()->route('listMyRaffles')->with('success', 'Rifa desativada com sucesso!');
    }

    public function ativarRifa($id)
    {
        $rifa = Rifa::where('id', $id)->first();

        $rifa->ativado = true;
        $rifa->save();

        return redirect()->route('listMyRaffles')->with('success', 'Rifa desativada com sucesso!');
    }
}
