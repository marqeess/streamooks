@extends('layouts.padrao2')

@section('content')

<br /><br /><br />
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Painel de adm</div>

                <div class="panel-body">
                    <a href="/admin/generos"> Generos </a>
                    <br />
                    <a href="/admin/autores"> Autores </a>
                    <br />
                    <a href="/admin/livros"> Livros </a>
                    <br />
                    <a href="/admin/editoras"> Editoras </a>
                    <br />
                    <a href="/admin/usuarios"> Usuarios </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection