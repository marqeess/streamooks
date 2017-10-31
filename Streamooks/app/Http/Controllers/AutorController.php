<?php

namespace App\Http\Controllers;

use App\Autor;
use Illuminate\Http\Request;
use File;
use Session;

class AutorController extends Controller
{

    public function index(Request $request)
    {

        if($request->pesquisa == null){
            $autors = Autor::paginate(10);
        } else {
            $autors = Autor::where('nome', 'like', '%'.$request->pesquisa.'%')->paginate(10);       
        }
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
        Session::flash('flash_message', 'Autor cadastrado com sucesso.');
        return redirect('admin/autores');
    }

    public function edit(Autor $autore)
    {
        $autors = Autor::find($autore);
        return view('admin.autors.edit', compact('autors')); 
    }

    public function update(Request $request, Autor $autore)
    {
        if($request->imagem == null){
            $autors = Autor::find($autore->id);
            $autors->nome = $request->nome;
            $autors->nascimento = $request->nascimento;
            $autors->nacionalidade = $request->nacionalidade;
            $autors->biografia = $request->biografia;
            $autors->save();
        } else {
            //Caso houver troca de imagem ele salva a imagem no public
            $imagem = time().'.'.$request->imagem->getClientOriginalExtension();
            $request->imagem->move(public_path('autores'), $imagem);
            //Salva dados no bando de dados
            $autors = Autor::find($autore->id);
            $autors->nome = $request->nome;
            $autors->nascimento = $request->nascimento;
            $autors->nacionalidade = $request->nacionalidade;
            $autors->biografia = $request->biografia;
            $autors->imagem = $imagem;
            //Deleta a antiga imagem do public
            File::delete('autores/'.$autore->imagem);
            $autors->save();
        }  
        Session::flash('flash_message', 'Autor editado com sucesso.');
        return redirect('admin/autores');  
    }

    public function destroy(Autor $autore)
    {
        try {
        $autors = Autor::find($autore->id);
        //Exclui a imagem da editora no diretorio
        File::delete('autores/'.$autore->imagem);
        $autors->delete();
        return redirect('admin/autores');
        } catch(\Illuminate\Database\QueryException $e){
            Session::flash('error', 'Para excluir esse autor deve desvincular todos os livros a ele.');
            return redirect('admin/autores');
        }
    }
    
}
