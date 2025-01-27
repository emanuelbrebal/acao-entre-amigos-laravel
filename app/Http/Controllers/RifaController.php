<?php

namespace App\Http\Controllers;

use App\Models\Numero;
use App\Models\Rifa;
use Illuminate\Http\Request;

class RifaController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo_rifa' => 'required|string',
            'qtd_num' => 'required|numeric|min:1',
            'preco_numeros' => 'required|numeric|min:1',
            'premiacao' => 'required|string',
            'data_sorteio' => 'required|date|after:today',
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {

            $requestImage = $request->file('imagem');

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName()) . '-' . strtotime("now") . "." . $extension;

            $requestImage->move(public_path('img/raffles'), $imageName);

            $validated['imagem'] = $imageName;
        }


        // // $rifaID = $validated['id'];
        // $qtdNum = $validated['qtd_num'];
        // $numeros = [];
        // for ($i = 1; $i <= $qtdNum; $i++) {
        //     $numeros = [
        //         'descricao' => "Cota de número:" . $i,
        //         'comprado' => false,
        //         'comprador' => null,
        //         // 'id_rifa' => $,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ];
        // }


        // Numero::create();

        Rifa::create($validated);


        return redirect()->route('redirecionarHome')->with('success', 'Rifa criada com sucesso!');
    }

    public function receberCheckboxes(Request $request)
    {
        $selecionados = json_decode($request->input('selecionados'), true);
        return $selecionados;
    }

    public function buyRaffleNumbers(Request $request)
    {
        $pedido = $request;
        $carrinhoCotas = $this->receberCheckboxes($pedido);
        dd($pedido);
        if (empty($carrinhoCotas)) {
            return response()->json(['erro' => 'Nenhuma cota selecionada.'], 400);
        }

        if (is_array($carrinhoCotas)) {
            sort($carrinhoCotas);
        }

        return response()->json(['cotas_selecionadas' => $carrinhoCotas]);


    }
}
