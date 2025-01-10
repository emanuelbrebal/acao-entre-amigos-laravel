<?php

namespace App\Http\Controllers;

use App\Models\Instituicao;
use App\Models\Numero;
use App\Models\Rifa;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function redirecionarHome()
    {
        $rifas = Rifa::all();
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
        $rifa  = Rifa::where('id', $id)->first();
        $numero = Numero::where('id_rifa', $id)->get();
        $instituicao = Instituicao::where('id_rifa', $id)->get();
        // dd($numero);
        return view('rifa', compact('rifa', 'numero'));
    }

    public function redirecionarSobre()
    {
        return view('sobre');
    }

}
