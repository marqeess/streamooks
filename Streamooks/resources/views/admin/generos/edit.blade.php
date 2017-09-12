@extends('layouts.padrao')

@section('content')

<form role="form" method="POST" action="{{ route('generos.update', $generos[0]->id) }}" enctype="multipart/form-data">
{{csrf_field()}}
<input type="hidden" name="_method" value="put">
<input type="text" name="nome" value="{{$generos[0]->nome}}">
<input type="text" name="descricao" value="{{$generos[0]->descricao}}">
<input type="submit" value="Editar">

</form>

 @endsection