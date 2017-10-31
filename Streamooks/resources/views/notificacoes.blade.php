@extends('layouts.padrao')

@section('title' , 'Notificações')
  

@section('content')
<div class="container">

<br/><br/>

<div class="row">



@foreach( $notificars as $notificar)
<img src="{!! asset('imgs/livros') !!}/{{$notificar->livro->imagem}}" width="50">
o livro <a href="{!! asset('livro') !!}/{{$notificar->livro->id}}"> {{$notificar->livro->titulo}} </a> 
foi adiconado
 @if($notificar->autor_id == null) a editora <a href="{!! asset('editora') !!}/{{$notificar->editora->id}}">{{$notificar->editora->nome}}</a>
 @else
 ao autor <a href="{!! asset('autor') !!}/{{$notificar->autor->id}}">{{$notificar->autor->nome}}</a>
 @endif

@endforeach
</div>







</div>

@endsection