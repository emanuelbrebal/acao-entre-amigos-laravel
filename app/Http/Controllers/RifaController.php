<?php

namespace App\Http\Controllers;

use App\Models\Rifa;
use Illuminate\Http\Request;

class RifaController extends Controller
{
    public function store(Request $request)
    {
        dd($request);
        $validated = $request->validate([
            'titulo_rifa' => 'required|string',
            'qtd_num' => 'required|numeric|min:1',
            'preco_numeros' => 'required|numeric|min:1',
            'premiacao' => 'required|string',
            'data_sorteio' => 'required|date|after:today',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        if ($request->hasFile('imagem')) {
            $imagePath = $request->file('imagem')->store('imagens', 'public');
            $validated['imagem'] = $imagePath;
        }

        Rifa::create($validated);

        return redirect()->route('home')->with('success', 'Rifa criada com sucesso!');
    }
}
