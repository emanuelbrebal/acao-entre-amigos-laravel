<?php

namespace App\Http\Controllers;

use App\Models\Instituicao;
use App\Models\Numero;
use App\Models\Rifa;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function listarUsuario()
    {
        $user = Auth::guard('usuarios')->user();
        return view('listarUsuario', compact('user'));
    }

    public function updateUsuario(Request $request)
    {
        $usuario = Usuarios::find($request->id);
        if (!$usuario) {
            return response()->json(['error' => 'Usuário não encontrado'], 404);
        }

        $validated = $request->validate([
            'nome' => 'nullable|string|max:255',
            'cpf' => 'nullable|digits:11',
            'email' => 'nullable|email|max:255',
            'celular' => 'nullable|string|max:20',
            'endereco' => 'nullable|string|max:255',
        ]);

        DB::beginTransaction();

        try {

            $usuario->update([
                'nome' => $validated['nome'] ?? $usuario->nome,
                'cpf' => $validated['cpf'] ?? $usuario->cpf,
                'email' => $validated['email'] ?? $usuario->email,
                'celular' => $validated['celular'] ?? $usuario->celular,
                'endereco' => $validated['endereco'] ?? $usuario->endereco,
            ]);
            DB::commit();

            return response()->json(['message' => 'Usuário atualizado com sucesso'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Erro ao atualizar usuário', 'details' => $e->getMessage()], 500);
        }
    }
}
