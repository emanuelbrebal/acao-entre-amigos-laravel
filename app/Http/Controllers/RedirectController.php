<?php

namespace App\Http\Controllers;

use App\Models\Instituicao;
use App\Models\Numero;
use App\Models\Rifa;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function redirecionarHome(Request $request)
    {
        $rifas = Rifa::all();
        return view('main', compact('rifas'));
    }

    public function redirecionarBusca(Request $request)
    {
        $pesquisa = $request->input('search-bar');

        if($pesquisa){
            $rifas = Rifa::where('titulo_rifa', 'ilike', '%'. $pesquisa .'%')->get();
        } else{
            $rifas = Rifa::all();
        }
        return view('main', compact('rifas'));
    }

    public function redirecionarRegistro()
    {
        return view('register');
    }

    public function redirecionarLogin()
    {
        return view('login');
    }

    public function redirecionarRifa($id)
    {
        $rifa  = Rifa::with('instituicao')->where('id', $id)->first();
        $numero = Numero::where('id_rifa', $id)->get();
        $instituicao = Instituicao::where('id', $rifa->id_instituicao)->first();
        $qtdNum = $rifa->qtd_num;

        return view('rifa', compact('rifa', 'numero', 'instituicao', 'qtdNum'));
    }

    public function redirecionarSobre()
    {
        return view('about');
    }

    public function buyNumbers($id)
    {
        $rifa = Rifa::where('id', $id)->first();
        $numeros = Numero::where('id_rifa', $id);
        return view('buyRaffleNumbers');
    }

    public function redirecionarCreateRaffle()
    {
        return view('createRaffle');
    }
}
