<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Livro;
use App\Pagina;
use App\User;

class LeituraController extends Controller
{
    public function leitura($id)
    {
          $livro = Livro::find($id);
          return view('ler', compact('livro')); 
    }

    public function salvar(Request $request){
        $pagina = new Pagina;
        $pagina->livro_id = $request->livro_id;
        $pagina->user_id = $request->user_id;
        $pagina->pagina = $request->pagina;
        $pagina->save();
        
    }
}
