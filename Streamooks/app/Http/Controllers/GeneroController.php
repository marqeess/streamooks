<?php

namespace App\Http\Controllers;

use App\Genero;
use Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    //Exibe ou pesquisa uma lista com todos os generos
    public function index(Request $request)
    {
        if($request->pesquisa == null){
            $generos = Genero::paginate(10);
        } else {
            $generos = Genero::where('nome', 'like', '%'.$request->pesquisa.'%')->paginate(10);       
        }
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
