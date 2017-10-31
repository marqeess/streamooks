<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class AdminController extends Controller
{
    //Passar pelos midlewares de controle de acesso
    public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('status');
    }
    //Retornar view de administração
    public function index()
    {
        $usuarios = DB::table('users')->count();
        $generos = DB::table('generos')->count();
        $autores = DB::table('autors')->count();
        $livros = DB::table('livros')->count();
        $editoras = DB::table('editoras')->count();
        return view('admin.index', compact('usuarios','generos','autores','livros','editoras'));
    }
    public function Users()
    {
        $users = User::paginate(8);
        return view('admin.usuarios.index', compact('users'));
    }
}
