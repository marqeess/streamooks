<?php

namespace App\Http\Controllers;

use App\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{

    public function index()
    {
        $generos = Genero::all();
        return view('admin.generos.index', compact('generos'));
    }

    public function create()
    {
        return view('admin.generos.create');
    }

    public function store(Request $request)
    {
        $generos = new Genero;
        $generos->nome = $request->nome;
        $generos->descricao = $request->descricao;
        $generos->save();
        return redirect('admin/generos');
    }

    public function edit(Genero $genero)
    {
        $generos = Genero::find($genero);
        return view('admin.generos.edit', compact('generos')); 
    }

    public function update(Request $request, Genero $genero)
    {
        $generos = Genero::find($genero->id);
        $generos->nome = $request->nome;
        $generos->descricao = $request->descricao;
        $generos->save();
        return redirect('admin/generos');
    }

    public function destroy(Genero $genero)
    {
        $generos = Genero::find($genero->id);
        $generos->delete();
        return redirect('admin/generos');
    }
}
