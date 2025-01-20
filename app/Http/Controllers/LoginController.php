<?php

namespace App\Http\Controllers;

use App\Models\Instituicao;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function criarRegistro(Request $request)
    {
        $validated = [];

        if ($request->tipo_usuario == "cpf") {
            $validated = $request->validate([
                'cpf' => 'required|string',
                'nome' => 'required|string|min:1',
                'email' => 'required|string|email',
                'celular' => 'required|string',
                'endereco' => 'required|string',
                'password' => 'required|string'
            ]);

            Usuarios::create([
                'tipo_usuario' => 'cpf',
                'cpf' => $validated['cpf'],
                'nome' => $validated['nome'],
                'email' => $validated['email'],
                'celular' => $validated['celular'],
                'endereco' => $validated['endereco'],
                'password' => bcrypt($validated['password'])
            ]);
        }

        if ($request->tipo_usuario == "cnpj") {
            $validated = $request->validate([
                'cnpj' => 'required|string',
                'nome' => 'required|string|min:1',
                'email' => 'required|string|email',
                'celular' => 'required|string',
                'endereco' => 'required|string',
                'password' => 'required|string'
            ]);

            Instituicao::create([
                'tipo_usuario' => 'cnpj',
                'cnpj' => $validated['cnpj'],
                'nome' => $validated['nome'],
                'email' => $validated['email'],
                'celular' => $validated['celular'],
                'endereco' => $validated['endereco'],
                'password' => bcrypt($validated['password'])
            ]);
        }

        return redirect()->route('redirecionarHome')->with('success', 'Registro realizado com sucesso!');
    }

    public function fazerLogin(Request $request)
    {
        if ($request->tipo_usuario == "cpf") {
            $validated = $request->validate([
                'cpf' => 'required|string',
                'password' => 'required|string'
            ]);

            $credenciais = [
                'cpf' => $validated['cpf'],
                'password' => $validated['password']
            ];

            if (Auth::guard('usuarios')->attempt($credenciais)) {
                return redirect()->route('redirecionarHome')->with('success', 'Login realizado com sucesso!');
            }
        }

        if ($request->tipo_usuario == "cnpj") {
            $validated = $request->validate([
                'cnpj' => 'required|string',
                'password' => 'required|string'
            ]);

            $credenciais = [
                'cnpj' => $validated['cnpj'],
                'password' => $validated['password']
            ];

            if (Auth::guard('usuarios')->attempt($credenciais)) {
                return redirect()->route('redirecionarHome')->with('success', 'Login realizado com sucesso!');
            }
        }

        return back()->withErrors(['login' => 'Credenciais inválidas. Verifique seus dados e tente novamente.']);
    }

    public function FazerLogout() {
        Auth::guard('usuarios')->logout();
        return redirect()->route('redirecionarHome')->with('success', 'Você foi desconectado com sucesso!');
    }
}
