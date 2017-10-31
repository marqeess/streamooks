@extends('layouts.padrao')

@section('title')
  Livros da {{$editora->nome}} 
  @endsection

@section('content')

<div class="container">

<br/><br/>

<div class="row">



<div class="col-md-4">
<img src="{!! asset('editoras') !!}/{{$editora->imagem}}" width="350">
</div>

<div class="col-md-8">
<h1>@if ($seditora == 1)
<form method="post" action="{{ route('deseguireditora')}}">{{$editora->nome}}
{{csrf_field()}}
<input type="hidden" name="user_id" value="{{ Auth::id()}}">
<input type="hidden" name="editora_id" value="{{$editora->id}}">
<button type="submit" class="btn btn-primary" ><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> Seguindo</button>
</form>
@else 
<form method="post" action="{{ route('seguireditora')}}">{{$editora->nome}}
{{csrf_field()}}
<input type="hidden" name="user_id" value="{{ Auth::id()}}">
<input type="hidden" name="editora_id" value="{{$editora->id}}">
<button type="submit" class="btn btn-primary" ><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> Seguir</button>
</form>

@endif</h1>
<b>Descrição:</b><p>{{$editora->descricao}}</p>
</div>

</div>


<div class="row">
<br />
<div class="col-md-12">
<h2> Livros da Editora</h2>
<hr>
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