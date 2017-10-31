@extends('layouts.padrao')

@section('title')
 Editoras
  @endsection

@section('content')

<div class="container">

<br/><br/>

<div class="row">



<div class="col-md-8">
<h1>Editoras</h1>

</div>
<div class="col-md-4">
<br />
 <form class="form-inline pull-xs-right" method="GET" action="{{ route('editoraas')}}">
    <input class=" form-control" type="text" placeholder="Pesquisar" name="pesquisa">
    
    <button class="btn btn-outline-success btn btn-primary " type="submit">
      <span class="glyphicon glyphicon-search" aria-hidden="true"></span>

    </button>
    <a href="http://127.0.0.1:8000/editoraas" class="btn btn-danger btn-sm">Exibir Todos</a> 
  </form>
</div>
</div>


<div class="row">
<br />
<div class="col-md-12">

@foreach($editoras as $editora)
<div class="col-md-2">
<br/>
<a href="{!! asset('editora') !!}/{{$editora->id}}">
<img src="{!! asset('editoras') !!}/{{$editora->imagem}}" width="150">
<h3>{{substr($editora->nome, 0, 15 )}}</h3>
</a>
</div>
@endforeach

</div>
</div>

@if ($link != 1) 
<center> {!!  $editoras->links() !!} </center>
@endif



</div>
<br /><br /><br /><br /><br /><br />
@endsection