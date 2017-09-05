<?php

namespace App\Http\Controllers;

use App\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{

    public function index()
    {
        $autors = Autor::paginate(8);
        return view('admin.autors.index', compact('autors'));
    }

    public function create()
    {
        return view('admin.autors.create');
    }

    public function store(Request $request)
    {

        $imagem = time().'.'.$request->imagem->getClientOriginalExtension();
        $request->imagem->move(public_path('autores'), $imagem); 

        $autors = new Autor;
        $autors->nome = $request->nome;
        $autors->nascimento = $request->nascimento;
        $autors->nacionalidade = $request->nacionalidade;
        $autors->biografia = $request->biografia;
        $autors->imagem = $imagem;
        $autors->save();
        return redirect('admin/autores');
    }

    public function edit(Autor $autore)
    {
        $autors = Autor::find($autore);
        return view('admin.autors.edit', compact('autors')); 
    }

    public function update(Request $request, Autor $autore)
    {
        $autors = Autor::find($autore->id);
        $autors->nome = $request->nome;
        $autors->nascimento = $request->nascimento;
        $autors->nacionalidade = $request->nacionalidade;
        $autors->biografia = $request->biografia;
        $autors->imagem = $request->imagem;
        $autors->save();
        return redirect('admin/autores');
    }

    public function destroy(Autor $autore)
    {
        $autors = Autor::find($autore->id);
        $autors->delete();
        return redirect('admin/autores');
    }
    
}
