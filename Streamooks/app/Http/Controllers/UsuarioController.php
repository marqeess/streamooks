<?php

namespace App\Http\Controllers;

use App\User;
use App\Favorito;
use App\Sautor;
use App\Seditora;
use Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
use Hash;
use File;

class UsuarioController extends Controller
{
    public function index(Request $request)
    {
        if($request->pesquisa == null){
            $users = User::paginate(10);
        } else {
            $users = User::where('email', 'like', '%'.$request->pesquisa.'%')->paginate(10);       
        }
        return view('admin.usuarios.index', compact('users'));
    }
    public function update(Request $request, User $usuario)
    {
        $users = User::find($usuario->id);
        $users->nivel = $request->nivel;
        $users->save();
        Session::flash('flash_message', 'Gênero editado com sucesso');
        return redirect('admin/usuarios');
    }   

    public function perfil($id)
    {
        $usuario = User::find($id);
        $favoritos = Favorito::where('user_id', $id)
        ->with(['livro'])
        ->get();

        $sautors = Sautor::where('user_id', $id)
        ->with(['autor'])
        ->get();

        $seditoras = Seditora::where('user_id', $id)
        ->with(['editora'])
        ->get();
      
        return view('unicousuario', compact('usuario','favoritos','sautors','seditoras'));
    }

    public function configurar($id)
    {
        $usuario = User::find($id);
        return view('perfil.configurar', compact('usuario'));
    }

    public function alterarSenha (Request $request){
    
        $request->user()->fill([
            'password' => Hash::make($request->senha)
        ])->save();

        Session::flash('flash_messagee', 'Senha atualizada com sucesso');
        return redirect('usuario/'.$request->usuario_id);
    }

    public function alterarUsuario (Request $request){
    try {

       if($request->imagem == null){
            $usuarios = User::find($request->usuario_id);
            $usuarios->nome = $request->nome;
            $usuarios->sobrenome = $request->sobrenome;
            $usuarios->email = $request->email;
            $usuarios->save();
        } else {
            //Caso houver troca de imagem ele salva a imagem no public
            $imagem = time().'.'.$request->imagem->getClientOriginalExtension();
            $request->imagem->move(public_path('images/usuarios'), $imagem);
            //Salva dados no bando de dados
            $usuarios = User::find($request->usuario_id);
            $usuarios->nome = $request->nome;
            $usuarios->sobrenome = $request->sobrenome;
            $usuarios->email = $request->email;
            $usuarios->imagem = $imagem;
            $usuarios->save();
        }
        Session::flash('usuario_atualizado', 'Perfil Atualizado com sucesso');
        return redirect('usuario/'.$request->usuario_id);

    } catch(\Illuminate\Database\QueryException $e){
        Session::flash('flash_message', 'Esse email ('.$request->email.') ja existe, favor escolher outro.');
        return redirect('usuario/'.$request->usuario_id);
    }


    }



    public function destroy(User $usuario)
    {
        $usuarios = User::find($usuario->id);
        $usuarios->delete();
        return redirect('admin/usuarios');
    }
}
