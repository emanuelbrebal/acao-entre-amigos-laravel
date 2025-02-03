<?php

namespace App\Http\Controllers;

use App\Models\Numero;
use App\Models\Pedido;
use App\Models\Rifa;

use Illuminate\Container\Attributes\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RifaController extends Controller
{
    public function store(Request $request)
    {
        try {

            $validated = $request->validate([
                'titulo_rifa' => 'required|string',
                'qtd_num' => 'required|numeric|min:1',
                'preco_numeros' => 'required|numeric|min:1',
                'premiacao' => 'required|string',
                'data_sorteio' => 'required|date|after:today',
                'imagem' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'id_instituicao' => 'required|numeric|min:1',
            ]);

            if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {

                $requestImage = $request->file('imagem');

                $extension = $requestImage->extension();

                $imageName = md5($requestImage->getClientOriginalName()) . '-' . strtotime("now") . "." . $extension;

                $requestImage->move(public_path('img/raffles'), $imageName);

                $validated['imagem'] = $imageName;
            }

            $rifa = Rifa::create($validated);

            $idRifa = $rifa->id;
            $cotas = $request->qtd_num;


            for ($i = 1; $i < $cotas + 1; $i++) {
                Numero::create([
                    'descricao' => $i,
                    'comprado' => false,
                    'comprador' => null,
                    'id_rifa' => $idRifa
                ]);
            }
            return redirect()->route('redirecionarHome')->with('success', 'Rifa criada com sucesso!');
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function receberCheckboxes(Request $request)
    {
        $selecionados = json_decode($request->input('selecionados'), true);
        return $selecionados;
    }

    public function buyRaffleNumbers(Request $request)
    {

        $user = Auth::guard('usuarios')->user();
        $idRifa = $request->input('id_rifa');
        $selecionados = explode(', ', $request->input('selecionados'));


        foreach ($selecionados as $numero) {
            $numeroModel = Numero::where('descricao', trim($numero))
                ->where('id_rifa', $idRifa)
                ->first();

            if ($numeroModel && $numeroModel->comprado != true) {
                $numeroModel->update([
                    'comprado' => true,
                    'comprador' => $user->id,
                ]);
            }

            Pedido::create([
                'user_id' => $user->id,
                'numero_id' => $numeroModel->id
            ]);
        }


        return redirect()->back()->with('success', 'Compra realizada com sucesso!');
    }
}
