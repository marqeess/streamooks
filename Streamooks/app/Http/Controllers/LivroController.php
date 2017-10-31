<?php

namespace App\Http\Controllers;

use App\Livro;
use App\Genero;
use App\Editora;
use App\Autor;
use App\Notificar;
use App\Seditora;
use App\Sautor;
use Illuminate\Http\Request;
use ZipArchive;
use Illuminate\Support\Facades\DB;

class LivroController extends Controller
{
    public function index(Request $request)
    {
         if($request->pesquisa == null){
            $livros = Livro::paginate(10);
        } else {
            $livros = Livro::where('titulo', 'like', '%'.$request->pesquisa.'%')->paginate(10);       
        }
        $generos = Genero::all();
        $autors = Autor::all();
        $editoras = Editora::all();
        return view('admin.livros.index', compact('livros','generos','autors','editoras'));
    }
    
    public function create()
    {
        $generos = Genero::all();
        $autors = Autor::all();
        $editoras = Editora::all();
        return view('admin.livros.create', compact('generos','autors','editoras'));
    }

    public function store(Request $request)
    {
        //Renomeia e salva o arquivo EPUB no diretorio public
        $arquivo = time().'.'.$request->arquivo->getClientOriginalExtension();
        //Nome do arquivo sem a extenção
        $nomeArquivo =time();
        $request->arquivo->move(public_path('pub'), $arquivo);
        //Renomeia e salva a imagem no diretorio public
        $imagem = time().'.'.$request->imagem->getClientOriginalExtension();
        $request->imagem->move(public_path('imgs/livros'), $imagem);

        $livro = new Livro;
        $livro->titulo = $request->titulo;
        $livro->descricao = $request->descricao;
        $livro->imagem = $imagem;
        $livro->editora_id = $request->editora_id;
        $livro->arquivo = $arquivo;
        $livro->local = $nomeArquivo;
        $livro->save();
        $livro->generos()->attach($request->generos);
        $livro->autors()->attach($request->autors);

        $seditoras = Seditora::where('editora_id', $request->editora_id)->get();
        $seditorasQtd =  DB::table('seditoras')
                ->where('editora_id', '=', $request->editora_id)
                ->count();
        $qtdAutors = count($request->autors);
        //autors
        for($j = 0; $j < $qtdAutors; $j++)
        {
          $sautors = Sautor::where('autor_id', $request->autors[$j])->get();  
          
          $sautorsQtd =  DB::table('sautors')
                ->where('autor_id', '=', $request->autors[$j])
                ->count();
          for($i = 0; $i < $sautorsQtd; $i++)
            {
                $notificar = new Notificar;
                $notificar->autor_id = $request->autors[$j];
                $notificar->livro_id = $livro->id;
                $notificar->user_id = $sautors[$i]->user_id;
                $notificar->status = 0;
                $notificar->save();
            }  
        }
        
        //editoras
        for($i = 0; $i < $seditorasQtd; $i++)
        {
            $notificar = new Notificar;
            $notificar->editora_id = $request->editora_id;
            $notificar->livro_id = $livro->id;
            $notificar->user_id = $seditoras[$i]->user_id;
            $notificar->status = 0;
            $notificar->save();
        }
        


        $localArquivo = ("pub/".$arquivo);
        $zip = new ZipArchive();

            if ($zip->open($localArquivo) === TRUE) {
                $zip->extractTo(("arquivos/".$nomeArquivo));
                 $zip->close();
                return redirect('admin/livros');
            } else {
                return 'Falha ao enviar o Arquivo';
            }
    }

    public function edit(Livro $livro)
    {
        //
    }

    public function update(Request $request, Livro $livro)
    {
        //
    }

    public function destroy(Livro $livro)
    {
        $livros = Livro::find($livro->id);
        $livros->delete();
        return redirect('admin/livros');
    }
}
