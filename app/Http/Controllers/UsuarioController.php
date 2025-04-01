<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
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
        return view('users.updateUser', compact('user'));
    }

    public function updateUsuario(UpdateUserRequest $request)
    {
        $usuario = Usuarios::find($request->id);

        if (!$usuario) {
            return redirect()->back()->with('error', 'Usuário não encontrado');
        }

        DB::beginTransaction();

        try {
            $dados = array_filter($request->validated(), function ($value) {
                return $value !== null;
            });

            $usuario->update($dados);
            DB::commit();

            return redirect()->back()->with('success', 'Usuário atualizado com sucesso');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with([
                'error' => 'Erro ao atualizar usuário',
                'details' => $e->getMessage()
            ]);
        }
    }
}
