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

            Rifa::create($validated);

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
            $numeroModel = Numero::create([
                'descricao' => trim($numero),
                'id_rifa' => $idRifa,
                'comprado' => true,
                'comprador' => $user->id
            ]);

            Pedido::create([
                'user_id' => $user->id,
                'numero_id' => $numeroModel->id
            ]);
        }

        return redirect()->back()->with('success', 'Compra realizada com sucesso!');
    }

    public function boughtRaffleNumbers()
    {
        $usuarioLogado = Auth::guard('usuarios')->user()->id;
        $numerosComprados = Numero::where('comprador', $usuarioLogado)->with('rifa')->get()->groupBy('id_rifa');
        // dd($numerosComprados);
        return view('boughtRaffleNumbers', compact('numerosComprados'));
    }
}
