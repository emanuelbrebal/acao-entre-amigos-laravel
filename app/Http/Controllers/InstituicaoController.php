<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateInstitutionRequest;
use App\Http\Requests\UpdateRaffleRequest;
use App\Models\Instituicao;
use App\Models\Numero;
use App\Models\Rifa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InstituicaoController extends Controller
{
    public function listMyRaffles()
    {
        $instituicaoLogada = Auth::guard('instituicao')->user();

        $activatedRaffles = Rifa::where('id_instituicao', $instituicaoLogada->id)
            ->where('ativado', true)
            ->get();

        $deactivatedRaffles = Rifa::where('id_instituicao', $instituicaoLogada->id)
            ->where('ativado', false)
            ->orderBy('data_sorteio', 'desc')
            ->get();

        $numerosTotais = Numero::where('comprado', true)
            ->selectRaw('id_rifa, COUNT(*) as total')
            ->groupBy('id_rifa')
            ->get()
            ->keyBy('id_rifa');

        $valorCotas = Rifa::where('id_instituicao', $instituicaoLogada->id)->pluck('preco_numeros', 'id');

        $qtdTotais = Rifa::where('id_instituicao', $instituicaoLogada->id)->pluck('qtd_num', 'id');

        $totalArrecadado = $numerosTotais;

        return view('institutions.listMyQuotas', compact('activatedRaffles', 'deactivatedRaffles', 'numerosTotais', 'qtdTotais', 'instituicaoLogada', 'valorCotas'));
    }

    public function updateMyRaffles($id)
    {
        $rifa = Rifa::where("id", $id)->first();
        return view('institutions.updateRaffle', compact('rifa'));
    }

    public function editarRifa(UpdateRaffleRequest $request, $id)
    {
        $rifa = Rifa::findOrFail($id);
        try{
            $validated = $request->validated();
            if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {

                if ($rifa->imagem && file_exists(public_path('img/raffles/' . $rifa->imagem))) {
                    unlink(public_path('img/raffles/' . $rifa->imagem));
                }
                    
                $requestImage = $request->file('imagem');

                $extension = $requestImage->extension();

                $imageName = md5($requestImage->getClientOriginalName()) . '-' . strtotime("now") . "." . $extension;

                $requestImage->move(public_path('img/raffles'), $imageName);

                $validated['imagem'] = $imageName;
            }
        
            $rifa->update($validated);

            return redirect()->route('listMyRaffles')->with('success', 'Rifa editada com sucesso!');
        } catch(\Exception $e){
            return redirect()->route('listMyRaffles')->with('error', 'Falha ao editar a rifa.');

        }

    }

    public function desativarRifa($id)
    {
        $rifa = Rifa::where('id', $id)->first();

        $rifa->ativado = false;
        $rifa->save();

        return redirect()->route('listMyRaffles')->with('success', 'Rifa desativada com sucesso!');
    }

    public function ativarRifa($id)
    {
        $rifa = Rifa::where('id', $id)->first();

        $rifa->ativado = true;
        $rifa->save();

        return redirect()->route('listMyRaffles')->with('success', 'Rifa desativada com sucesso!');
    }

    public function listarInstituicao()
    {
        $instituicao = Auth::guard('instituicao')->user();
        return view('institutions.updateInstitution', compact('instituicao'));
    }

    public function updateInstituicao(UpdateInstitutionRequest $request){
        $instituicao = Instituicao::findOrFail($request->id);
        $dados = $request->validated();
        
        if (!$instituicao) {
            return redirect()->back()->with('error', 'Usuário não encontrado.');
        }


        DB::beginTransaction();

        try {
            $instituicao->update($dados);
            DB::commit();

            return redirect()->back()->with('success', 'Instituição atualizada com sucesso');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erro ao atualizar instituição', 'details', $e->getMessage());
        }
    }
}
