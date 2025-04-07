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
            ->where('ativado', true)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('main', compact('rifas', 'user'));
    }

    public function redirecionarBusca(Request $request)
    {
        $pesquisa = $request->input('search-bar');

        if ($pesquisa) {
            $rifas = Rifa::where('titulo_rifa', 'ilike', '%' . $pesquisa . '%')
            ->where('ativado', true)
            ->get();
        } else {
            $rifas = Rifa::orderBy('created_at', 'desc')
            ->where('ativado', true)
            ->get();
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
        $numerosComprados = Numero::where('id_rifa', $id)->where('comprado', true)->get(['descricao', 'comprador']);
        $numerosCompradosArray = $numerosComprados->toArray();
        $rifasDisponiveis = $qtdNum - $numerosComprados->count();
        if(Auth::guard('usuarios')->check()){
            $userID = Auth::guard('usuarios')->user()->id;
        }
        else if(Auth::guard('instituicao')->check()){
            $userID = Auth::guard('instituicao')->user()->id;
        }
        else{
            $userID = null;
        }

        return view('rifa', compact('rifa', 'numero', 'instituicao', 'qtdNum', 'numerosComprados', 'rifasDisponiveis', 'numerosCompradosArray', 'userID'));
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
        return view('users.boughtRaffleNumbers');
    }

    public function redirecionarCreateRaffle()
    {
        if (Auth::guard('instituicao')->check()) {
            $instituicao_nome = Auth::guard('instituicao')->user()->nome;
            $instituicao_id = Auth::guard('instituicao')->user()->id;

            return view('institutions.createRaffle', [
                'instituicao_nome' => $instituicao_nome,
                'instituicao_id' => $instituicao_id
            ]);
        } else {
            return;
        }
    }
}
