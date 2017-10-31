@extends('layouts.padrao')

@section('title')
 Livros de Generos
  @endsection

@section('content')

<div class="container">

<br/><br/>

<div class="row">



<div class="col-md-8">
<h1>Lista de Generos</h1>

</div>

</div>


<div class="row">
<br />
<div class="col-md-12">

@foreach($generos as $genero)

<div class="col-md-3">
<a href="{!! asset('genero') !!}/{{$genero->id}}" class="btn btn-primary btn-lg btn-block">
  
     {{$genero->nome}}
</a>



</div>
@endforeach

</div>
</div>







</div>
<br /><br /><br /><br /><br /><br />
@endsection