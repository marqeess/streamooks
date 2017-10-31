<?php

namespace App\Http\Controllers;
use App\Livro;
use App\Editora;
use App\Autor;
use App\Genero;
use App\Comentario;
use App\Favorito;
use App\User;
use App\Nota;
use App\Notificar;
use App\Sautor;
use App\Seditora;
use Auth;
use Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NavegaController extends Controller
{
  

    public function index(Request $request)
    {
    if (Auth::check()){ 
         if($request->pesquisa == null){
            $livros = DB::table('livros')
                ->orderBy('id', 'desc')
                ->paginate(18);
        } else {
           $livros = DB::table('livros')
                ->orderBy('id', 'desc')
                ->where('titulo', 'like', '%'.$request->pesquisa.'%')
                ->get();
        }
        return view('inicio', compact('livros'));
    } else {
        return view('welcome');
    }
        
    }

    public function notificacoes()
    {
        $user = Auth::user();
        $notificars = Notificar::with(['editora','livro','autor'])->where('user_id', '=', $user->id)->orderBy('id', 'desc')->get();

                return view('notificacoes', compact('notificars'));
    
    }

    public function livros(Request $request)
    {
    if (Auth::check()){ 
         if($request->pesquisa == null){
            $livros = DB::table('livros')
                ->orderBy('id', 'desc')
                ->get();
        } else {
           $livros = DB::table('livros')
                ->orderBy('id', 'desc')
                ->where('titulo', 'like', '%'.$request->pesquisa.'%')
                ->get();
        }
        return view('livros', compact('livros'));
    } else {
        return view('livros');
    }

    }

    public function generos()
    {
        $generos = DB::table('generos')
                ->orderBy('nome', 'ASC')
                ->get();
        return view('generos', compact('generos'));
    }

    public function editoras(Request $request)
    {
        if($request->pesquisa == null){
            $editoras = Editora::paginate(18);
            $link = 0;
        } else {
           $editoras = DB::table('editoras','link')
                ->where('nome', 'like', '%'.$request->pesquisa.'%')
                ->get();

            $link = 1;
        }
        return view('editoras', compact('editoras','link'));
    }

    public function autores(Request $request)
    {
        if($request->pesquisa == null){
            $autores = Autor::paginate(18);
            $link = 0;
        } else {
           $autores = DB::table('autors','link')
                ->where('nome', 'like', '%'.$request->pesquisa.'%')
                ->get();

            $link = 1;
        }
        return view('autores', compact('autores','link'));
    }

    public function unicoLivro($id)
    {
        $user = Auth::user();
        $recomendacoes = Livro::where('id', '!=', $id)->limit(6)->get();
        $livro = Livro::with(['editora','generos','autors'])->find($id);
        $comentarios = Comentario::with(['user'])->where('livro_id', '=', $id)->get();
        $favorito =  DB::table('favoritos')
                ->where('livro_id', '=', $id , 'AND', 'user_id', '=', $user->id)
                ->count();
        $nota = DB::table('notas')
                ->where('livro_id', '=', $id)
                ->avg('nota');
        $notaArredonda = round($nota);

        $pagina =  DB::table('paginas')
                ->where('livro_id', '=', $id , 'AND', 'user_id', '=', $user->id)
                ->count();
        
       
        return view('unicolivro', compact('livro','recomendacoes','comentarios','favorito','notaArredonda','pagina'));
    }

    public function unicaEditora($id)
    {
        $user = Auth::user();
        $editora = Editora::find($id);
        $livros = Livro::where('editora_id', '=', $id)->get();
        $seditora =  DB::table('seditoras')
                ->where('editora_id', '=', $id)
                ->where('user_id', '=', $user->id)
                ->count();

       
        return view('unicaeditora', compact('livros','editora','seditora'));
    }

    public function unicoAutor($id)
    {
        $user = Auth::user();
        $autor = Autor::with('livros')->find($id);
        $sautor =  DB::table('sautors')
                ->where('autor_id', '=', $id)
                ->where('user_id', '=', $user->id)
                ->count();

        return view('unicoautor', compact('autor','sautor'));
    }

    public function unicoGenero($id)
    {
        $genero = Genero::with('livros')->find($id);
        return view('unicogenero', compact('genero'));
    }

    public function nota(Request $request){

    try {
        $nota = new Nota;
        $nota->livro_id = $request->livro_id;
        $nota->user_id = $request->user_id;
        $nota->nota = $request->nota;
        $nota->save();
        return redirect('livro/'.$request->livro_id);

     } catch(\Illuminate\Database\QueryException $e){

        $nota = Nota::where('livro_id',  $request->livro_id)
            ->where('user_id', $request->user_id);

        $nota->delete();
        $nota = new Nota;
        $nota->livro_id = $request->livro_id;
        $nota->user_id = $request->user_id;
        $nota->nota = $request->nota;
        $nota->save();
        return redirect('livro/'.$request->livro_id);
     }   
    }

    public function seguirautor(Request $request){
        $satuor = new Sautor;
        $satuor->autor_id = $request->autor_id;
        $satuor->user_id = $request->user_id;
        $satuor->save();
        return redirect('autor/'.$request->autor_id);
    }

    public function deseguirautor (Request $request){
        $sautor = Sautor::where('autor_id', $request->autor_id)
            ->where('user_id', $request->user_id);
                
        $sautor->delete();
        return redirect('autor/'.$request->autor_id);
     }

     public function seguireditora(Request $request){
        $seditora = new Seditora;
        $seditora->editora_id = $request->editora_id;
        $seditora->user_id = $request->user_id;
        $seditora->save();
        return redirect('editora/'.$request->editora_id);
    }

    public function deseguireditora(Request $request){
        $seditora = Seditora::where('editora_id', $request->editora_id)
            ->where('user_id', $request->user_id);
                
        $seditora->delete();
        return redirect('editora/'.$request->editora_id);
     }

    public function favoritar(Request $request){
        $favorito = new Favorito;
        $favorito->livro_id = $request->livro_id;
        $favorito->user_id = $request->user_id;
        $favorito->save();
        return redirect('livro/'.$request->livro_id);
    }

    public function desfavoritar (Request $request){
        $favorito = Favorito::where('livro_id', $request->livro_id)
            ->where('user_id', $request->user_id);
                
        $favorito->delete();
        return redirect('livro/'.$request->livro_id);
     }

    public function comentar(Request $request){
        $comentario = new Comentario;
        $comentario->livro_id = $request->livro_id;
        $comentario->user_id = $request->user_id;
        $comentario->comentario = $request->comentario;
        $comentario->save();
        Session::flash('flash_message', 'Cadastro realizado com sucesso');
        return redirect('livro/'.$request->livro_id);
    }
     public function deletarComentario (Request $request){
        $comentario = Comentario::find($request->comentario_id);
        $comentario->delete();
        return redirect('livro/'.$request->livro_id);
     }
}
