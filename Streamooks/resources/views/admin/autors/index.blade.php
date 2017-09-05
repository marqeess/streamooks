@extends('layouts.padrao2')

@section('content')

<br /><br /><br />
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        <a href="http://127.0.0.1:8000/admin/" >Inicio</a> >
        <a href="http://127.0.0.1:8000/admin/autores/create" >Cadastrar novo Autor</a>
            <div class="panel panel-default">
                <table class="table">
  <thead>
    <tr>
      <th>Id</th>
      <th>Nome</th>
      <th>Nascimento</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
   @foreach($autors as $autor)
    <tr>
      <th scope="row">{{$autor->id}}</th>
      <td>{{$autor->nome}}</td>
      <td>{{$autor->nascimento}}</td>
      <td><a href="http://127.0.0.1:8000/admin/autores/{{$autor->id}}/edit" >Editar</a> 

<form style="display: inline;" action="{{route('autores.destroy', $autor->id)}}" method="post">
{{csrf_field()}}
<input type="hidden" name="_method" value="delete">
<button type="submit" >Apagar</button>
</form></td>
    </tr>
    @endforeach
  </tbody>
</table>

                
            </div>
        </div>
    </div>
 <center> {!!  $autors->links() !!} </center>
</div>

@endsection



 

 
 
 
 
 
 
 
 
 
