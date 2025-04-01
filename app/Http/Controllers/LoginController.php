<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Instituicao;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function criarRegistro(RegisterRequest $request)
    {
        $validated = $request->validated();

        if ($request->tipo_usuario == "cpf") {
            $this->criarUsuario($validated);;
        } elseif ($request->tipo_usuario == "cnpj") {
            $this->criarInstituicao($validated);
        } else {
            return back()->withErrors(['tipo_usuario' => 'Tipo de usuário inválido.']);
        }

        return redirect()->route('redirecionarLogin')->with('success', 'Registro criado com sucesso! Por favor, faça login.');
    }

    private function criarUsuario(array $dados)
    {
        $dados['cpf'] = preg_replace('/\D/', '', $dados['cpf']);
        $dados['celular'] = preg_replace('/\D/', '', $dados['celular']);
        Usuarios::create([
            'tipo_usuario' => 'cpf',
            'cpf' => $dados['cpf'],
            'nome' => $dados['nome'],
            'email' => $dados['email'],
            'celular' => $dados['celular'],
            'endereco' => $dados['endereco'],
            'password' => Hash::make($dados['password']),
        ]);
    }

    private function criarInstituicao(array $dados)
    {
        $dados['cnpj'] = preg_replace('/\D/', '', $dados['cnpj']);
        $dados['celular'] = preg_replace('/\D/', '', $dados['celular']);
        Instituicao::create([
            'tipo_usuario' => 'cnpj',
            'cnpj' => $dados['cnpj'],
            'nome' => $dados['nome'],
            'email' => $dados['email'],
            'celular' => $dados['celular'],
            'endereco' => $dados['endereco'],
            'password' => Hash::make($dados['password']),
        ]);
    }

    public function fazerLogin(LoginRequest $request)
    {
        try {
            if ($request->tipo_usuario == "cpf") {
                $validated = $request->validate([
                    'cpf' => 'required|string',
                    'password' => 'required|string'
                ]);

                if (Auth::guard('usuarios')->attempt($validated)) {
                    return redirect()->route('redirecionarHome')->with('success', 'Login realizado com sucesso!');
                }
            } elseif ($request->tipo_usuario == "cnpj") {
                $validated = $request->validate([
                    'cnpj' => 'required|string',
                    'password' => 'required|string'
                ]);

                if (Auth::guard('instituicao')->attempt($validated)) {
                    return redirect()->route('redirecionarHome')->with('success', 'Login realizado com sucesso!');
                }
            }

            return back()->withErrors(['login' => 'Credenciais inválidas. Verifique seus dados e tente novamente.']);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao atualizar instituição', 'details', $e->getMessage());
        }
    }

    public function FazerLogout()
    {
        if (Auth::guard('usuarios')->check()) {
            Auth::guard('usuarios')->logout();
        } elseif (Auth::guard('instituicao')->check()) {
            Auth::guard('instituicao')->logout();
        }
        return redirect()->route('redirecionarLogin')->with('success', 'Você foi desconectado com sucesso!');
    }
}
