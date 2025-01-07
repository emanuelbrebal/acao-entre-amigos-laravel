<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function redirecionarHome()
    {
        return view('main');
    }

    public function redirecionarRegistro()
    {
        return view('register');
    }

    public function redirecionarLogin()
    {
        return view('login');
    }


}
