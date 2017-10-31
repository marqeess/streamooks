@extends('layouts.padrao')

@section('title')
  Livros do/a {{$autor->nome}} 
  @endsection


@section('content')

<div class="container">

<br/><br/>

<div class="row">



<div class="col-md-4">
<img src="{!! asset('autores') !!}/{{$autor->imagem}}" width="350">
</div>

<div class="col-md-8">
<h1>
@if ($sautor == 1)
<form method="post" action="{{ route('deseguirautor')}}">{{$autor->nome}}
{{csrf_field()}}
<input type="hidden" name="user_id" value="{{ Auth::id()}}">
<input type="hidden" name="autor_id" value="{{$autor->id}}">
<button type="submit" class="btn btn-primary" ><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> Seguindo</button>
</form>
@else 
<form method="post" action="{{ route('seguirautor')}}">{{$autor->nome}}
{{csrf_field()}}
<input type="hidden" name="user_id" value="{{ Auth::id()}}">
<input type="hidden" name="autor_id" value="{{$autor->id}}">
<button type="submit" class="btn btn-primary" ><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> Seguir</button>
</form>

@endif
</h1>
<b>Biografia:</b><p>{{$autor->biografia}}</p>
<b>Nacionalidade:</b><p>{{$autor->nacionalidade}}</p>
</div>

</div>


<div class="row">
<br />
<div class="col-md-12">
  <div class="col-md-8">
<h2>Livros  do Autor</h2>

</div>
</div>

<hr>
@foreach($autor->livros as $livro)
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