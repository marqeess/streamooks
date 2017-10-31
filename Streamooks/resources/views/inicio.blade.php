@extends('layouts.padrao')

 @section('title', 'Inicio')

@section('content')

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="{!! asset('images/a.jpg') !!}" class="img-responsive" alt="...">
      <div class="carousel-caption">
        <font size="5">Destaque 1 </font>
      </div>
    </div>
   <div class="item">
      <img src="{!! asset('images/aa.jpg') !!}" class="img-responsive" alt="...">
      <div class="carousel-caption">
        <font size="5">Destaque 2 </font>
        <br />
      </div>
    </div>
    <div class="item">
      <img src="{!! asset('images/aaa.jpg') !!}" class="img-responsive" alt="...">
      <div class="carousel-caption">
        <font size="5">Destaque 3 </font>
      </div>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<br/><br/>
<div class="container">
@can('status')

@else
<div class="row">
<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  Atanção!! Favor verificar o endereço de email para ter acesso total as ações do site.
</div>
</div>
@endcan
<div class="row">
<div class="col-md-8">
<h2>Recentes 

</h2>
</div>
<div class="col-md-4">
<br />
 <form class="form-inline pull-xs-right" method="GET" action="{{ route('inicio')}}">
    <input class=" form-control" type="text" placeholder="Pesquisar" name="pesquisa">
    
    <button class="btn btn-outline-success btn btn-primary " type="submit">
      <span class="glyphicon glyphicon-search" aria-hidden="true"></span>

    </button>
    <a href="http://127.0.0.1:8000/" class="btn btn-danger btn-sm">Exibir Todos</a> 
  </form>
</div>
</div>
<div class="row">
@foreach($livros as $livro)
<div class="col-md-2">
<br/>
<a href="{!! asset('livro') !!}/{{$livro->id}}">
<img src="{!! asset('imgs/livros') !!}/{{$livro->imagem}}" title="{{$livro->titulo}}" width="150">
</a>
</div>
@endforeach
</div>
<div class="row">
<div class="col-md-12">
<form method="get" action="livros">
<button type="submit" class="btn-submit">Mais Livros</button>
</form>
</div>
</div>
</div>
<br/><br/><br/><br/>
@endsection