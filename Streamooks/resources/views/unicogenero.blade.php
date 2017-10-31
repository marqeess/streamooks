@extends('layouts.padrao')

@section('title')
 Livros de {{$genero->nome}} 
  @endsection

@section('content')

<div class="container">

<br/><br/>

<div class="row">



<div class="col-md-8">
<h1>Livros de {{$genero->nome}}</h1>

</div>

</div>


<div class="row">
<br />
<div class="col-md-12">

@foreach($genero->livros as $livro)
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