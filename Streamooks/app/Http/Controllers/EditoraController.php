<?php

namespace App\Http\Controllers;

use App\Editora;
use Illuminate\Http\Request;

class EditoraController extends Controller
{

    public function index()
    {
        $editoras = Editora::all();
        return view('admin.editoras.index', compact('editoras'));
    }

    public function create()
    {
        return view('admin.editoras.create');
    }

    public function store(Request $request)
    {
        $editoras = new Editora;
        $editoras->name = $request->name;
        $editoras->email = $request->email;
        $editoras->imagem = $request->imagem;
        $editoras->password = $request->password;
        $editoras->status = $request->status;
        $editoras->save();
        return redirect('admin/editoras');
    }

    public function edit(Editora $editora)
    {
        $editoras = Editora::find($editora);
        return view('admin.editoras.edit', compact('editoras'));
    }

    public function update(Request $request, Editora $editora)
    {
        $editoras = Editora::find($editora->id);
        $editoras->name = $request->name;
        $editoras->email = $request->email;
        $editoras->imagem = $request->imagem;
        $editoras->password = $request->password;
        $editoras->status = $request->status;
        $editoras->save();
        return redirect('admin/editoras');
    }

    public function destroy(Editora $editora)
    {
        $editoras = Editora::find($editora->id);
        $editoras->delete();
        return redirect('admin/editoras');
    }
}
