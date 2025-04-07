<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class instituicaoLogada
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

        if (!Auth::guard('instituicao')->check() && !in_array($rotaAtual, $rotasPermitidas)) {
            return redirect()->route('redirecionarLogin')->with('error', 'Acesso restrito. Por favor, faça login como instituição.');
        }

        return $next($request);
    }
}
