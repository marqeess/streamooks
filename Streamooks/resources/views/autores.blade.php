@extends('layouts.padrao')

@section('title')
 Autores
  @endsection

@section('content')

<div class="container">

<br/><br/>

<div class="row">



<div class="col-md-8">
<h1>Autores</h1>

</div>
<div class="col-md-4">
<br />
 <form class="form-inline pull-xs-right" method="GET" action="{{ route('autorees')}}">
    <input class=" form-control" type="text" placeholder="Pesquisar" name="pesquisa">
    
    <button class="btn btn-outline-success btn btn-primary " type="submit">
      <span class="glyphicon glyphicon-search" aria-hidden="true"></span>

    </button>
    <a href="http://127.0.0.1:8000/autorees" class="btn btn-danger btn-sm">Exibir Todos</a> 
  </form>
</div>
</div>


<div class="row">
<br />
<div class="col-md-12">

@foreach($autores as $autor)
<div class="col-md-2">
<br/>
<a href="{!! asset('autor') !!}/{{$autor->id}}">
<img src="{!! asset('autores') !!}/{{$autor->imagem}}" width="150">
<h3>{{substr($autor->nome, 0, 15 )}}</h3>
</a>
</div>
@endforeach

</div>
</div>

@if ($link != 1) 
<center> {!!  $autores->links() !!} </center>
@endif



</div>
<br /><br /><br /><br /><br /><br />
@endsection