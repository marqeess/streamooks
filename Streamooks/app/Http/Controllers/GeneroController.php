<?php

namespace App\Http\Controllers;

use App\Genero;
use Gate;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    //Exibe a lista com todos os generos
    public function index()
    {
        $generos = Genero::paginate(8);
        return view('admin.generos.index', compact('generos'));
    }
    //Formulario de criação dos generos
    public function create()
    {
        return view('admin.generos.create');
    }
    //Salva os dados do furmulario de criação dos generos
    public function store(Request $request)
    {
        $generos = new Genero;
        $generos->nome = $request->nome;
        $generos->descricao = $request->descricao;
        $generos->save();
        return redirect('admin/generos');
    }
    //Formulario ja preenchido com os dados de determinado genero para editar
    public function edit(Genero $genero)
    {
        $generos = Genero::find($genero);
        return view('admin.generos.edit', compact('generos')); 
    }
    //Salva os dados do formulario de edição
    public function update(Request $request, Genero $genero)
    {
        $generos = Genero::find($genero->id);
        $generos->nome = $request->nome;
        $generos->descricao = $request->descricao;
        $generos->save();
        return redirect('admin/generos');
    }
    //Exclui os arquivos do genero no banco de dados
    public function destroy(Genero $genero)
    {
        $generos = Genero::find($genero->id);
        $generos->delete();
        return redirect('admin/generos');
    }
}
