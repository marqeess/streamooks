<?php

namespace App\Http\Controllers;

use App\Editora;
use Illuminate\Http\Request;
use File;

class EditoraController extends Controller
{
    //Exibe ou pesquisa uma lista com todas as editoras
    public function index(Request $request)
    {
        if($request->pesquisa == null){
            $editoras = Editora::paginate(10);
        } else {
            $editoras = Editora::where('nome', 'like', '%'.$request->pesquisa.'%')->paginate(10);       
        }
        return view('admin.editoras.index', compact('editoras'));
    }
    //Formulario de criação das editoras
    public function create()
    {
        return view('admin.editoras.create');
    }
    //Salva os dados do furmulario de criação das editoras
    public function store(Request $request)
    {   
        //Função para renomear e salvar a imagem no diretorio public
        $imagem = time().'.'.$request->imagem->getClientOriginalExtension();
        $request->imagem->move(public_path('editoras'), $imagem);

        $editoras = new Editora;
        $editoras->nome = $request->nome;
        $editoras->descricao = $request->descricao;
        $editoras->imagem = $imagem;
        $editoras->save();
        return redirect('admin/editoras');
    }
    //Formulario ja preenchido com os dados de determinado editora para editar
    public function edit(Editora $editora)
    {
        $editoras = Editora::find($editora);
        return view('admin.editoras.edit', compact('editoras'));
    }
    //Salva os dados do formulario de edição
    public function update(Request $request, Editora $editora)
    {
        if($request->imagem == null){
            $editoras = Editora::find($editora->id);
            $editoras->nome = $request->nome;
            $editoras->descricao = $request->descricao;
            $editoras->save();
        } else {
            //Caso houver troca de imagem ele salva a imagem no public
            $imagem = time().'.'.$request->imagem->getClientOriginalExtension();
            $request->imagem->move(public_path('editoras'), $imagem);
            //Salva dados no bando de dados
            $editoras = Editora::find($editora->id);
            $editoras->nome = $request->nome;
            $editoras->descricao = $request->descricao;
            $editoras->imagem = $imagem;
            //Deleta a antiga imagem do public
            File::delete('editoras/'.$editora->imagem);
            $editoras->save();
        }
        return redirect('admin/editoras');
    }
    //Exclui os arquivos da editora no banco de dados e nos diretorios
    public function destroy(Editora $editora)
    {
        $editoras = Editora::find($editora->id);
        //Exclui a imagem da editora no diretorio
        File::delete('editoras/'.$editora->imagem);
        $editoras->delete();
        return redirect('admin/editoras');
    }
}
