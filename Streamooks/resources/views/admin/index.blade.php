@extends('layouts.padrao')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
@section('title','Painel de Adiministração')
 
@section('content')


<br /><br />

<div class="container ">

<div class="row">



<div class="col-md-8">
<h2>Painel de Adiministração</h2>

</div>

</div>
<br/>
    <div class="row">
    <div class="col-md-12">
<div class="w3-card-4 w3-center w3-white col-md-3" style="width:20%">
    <a href="/admin/generos">
    <br />
    <img src="{!! asset('admm/genero.png') !!}" style="width:70%">
    
    <hr>
    <div class="w3-container w3-center ">
      <p>Genêros</p>
      </a>
    </div>
    <hr>
    <div class="w3-container w3-center ">
      <p>Numero de Gêneros: {{$generos}}</p>
    </div>
</div>
<div class="w3-card-4 w3-center w3-white col-md-3" style="width:20%">
<a href="/admin/autores">
<br />
    <img src="{!! asset('admm/autor.png') !!}" style="width:70%">
    <hr>
    <div class="w3-container w3-center">
      <p> Autores</p>
      </a>
    </div>
    <hr>
    <div class="w3-container w3-center ">
      <p>Numero de Autores: {{$autores}}</p>
    </div>
</div>
<div class="w3-card-4 w3-center w3-white col-md-3" style="width:20%">
 <a href="/admin/livros">
 <br />
    <img src="{!! asset('admm/livro.png') !!}" style="width:70%">
    <hr>
    <div class="w3-container w3-center">
      <p> Livros</p>
      </a>
    </div>
    <hr>
    <div class="w3-container w3-center ">
      <p>Numero de Livros: {{$livros}}</p>
    </div>
</div>
<div class="w3-card-4 w3-center w3-white  col-md-3" style="width:20%">
<a href="/admin/editoras">
<br />
    <img src="{!! asset('admm/editora.png') !!}" style="width:70%">
    <hr>
    <div class="w3-container w3-center">
      <p> Editoras</p>
      </a>
    </div>
    <hr>
    <div class="w3-container w3-center ">
      <p>Numero de Editora: {{$editoras}}</p>

    </div>
</div>
<div class="w3-card-4 w3-center w3-white  col-md-3" style="width:20%">
<a href="/admin/usuarios">
<br />
    <img src="{!! asset('admm/usuario.png') !!}" style="width:70%">

    <hr>
    <div class="w3-container w3-center">
      <p> Usuario </p>
      </a>
    </div>
    <hr>
    <div class="w3-container w3-center ">
      <p>Numero de Usuários: {{$usuarios}}</p>
    </div>
</div>
</div>
</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    
    <script>
              
    </script>
</body>    
</html>
@endsection
