<?php

namespace App\Http\Controllers;

use App\Models\Instituicao;
use App\Models\Numero;
use App\Models\Rifa;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class RedirectController extends Controller
{
    public function redirecionarHome(Request $request)
    {
        $user = Auth::guard('usuarios')->user();
        $rifas = Rifa::with('user_vencedor')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('main', compact('rifas', 'user'));
    }

    public function redirecionarBusca(Request $request)
    {
        $pesquisa = $request->input('search-bar');

        if ($pesquisa) {
            $rifas = Rifa::where('titulo_rifa', 'ilike', '%' . $pesquisa . '%')->get();
        } else {
            $rifas = Rifa::all();
        }
        return view('main', compact('rifas'));
    }

    public function redirecionarRegistro()
    {
        if (Auth::check()) {
            return redirect()->route('redirecionarHome');
        }
        return view('register');
    }

    public function redirecionarLogin()
    {
        if (Auth::check()) {
            return redirect()->route('redirecionarHome');
        }
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
        $user = Auth::guard('usuarios')->user();
        return view('about', compact('user'));
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
