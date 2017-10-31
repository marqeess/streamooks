@extends('layouts.padrao')

@section('title')
 Livros 
  @endsection

@section('content')

<div class="container">

<br/><br/>

<div class="row">



<div class="col-md-8">
<h1>Livros </h1>

</div>
<div class="col-md-4">
<br />
 <form class="form-inline pull-xs-right" method="GET" action="{{ route('livros')}}">
    <input class=" form-control" type="text" placeholder="Pesquisar" name="pesquisa">
    
    <button class="btn btn-outline-success btn btn-primary " type="submit">
      <span class="glyphicon glyphicon-search" aria-hidden="true"></span>

    </button>
    <a href="http://127.0.0.1:8000/livros" class="btn btn-danger btn-sm">Exibir Todos</a> 
  </form>
</div>

</div>


<div class="row">
<br />
<div class="col-md-12">

@foreach($livros as $livro)
<div class="col-md-2">
<br/>
<a href="{!! asset('livro') !!}/{{$livro->id}}">
<img src="{!! asset('imgs/livros') !!}/{{$livro->imagem}}" width="150">
</a>
</div>
@endforeach

</div>
</div>







</div>
<br /><br /><br /><br /><br /><br />
@endsection