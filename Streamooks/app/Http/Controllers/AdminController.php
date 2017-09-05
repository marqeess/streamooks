<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return view('admin.index');
    }
    public function Users()
    {
        $users = User::paginate(8);
        return view('admin.usuarios.index', compact('users'));
    }
}
