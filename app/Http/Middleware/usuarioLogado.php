<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class usuarioLogado
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $rotaAtual = $request->route()->getName();

        $rotasPermitidas = ['redirecionarLogin', 'redirecionarRegistro', 'fazerLogin', 'criarRegistro'];

        if (!Auth::guard('usuarios')->check() && !Auth::guard('instituicao')->check() && !in_array($rotaAtual, $rotasPermitidas)) {
            return redirect()->to('/login')->with('error', 'Sessão expirada. Por favor, entre novamente.');
        }

        return $next($request);
    }
}
