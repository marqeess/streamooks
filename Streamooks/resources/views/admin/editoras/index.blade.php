  @extends('layouts.padrao2')

@section('content')

<br /><br /><br />
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        <a href="http://127.0.0.1:8000/admin/" >Inicio</a> >
        <a href="http://127.0.0.1:8000/admin/editoras/create" >Cadastrar nova Editora</a>
            <div class="panel panel-default">
                <table class="table">
  <thead>
    <tr>
      <th>Id</th>
      <th>Nome</th>
      <th>Descrição</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
 
 @foreach($editoras as $editora)
    <tr>
      <th scope="row">{{$editora->id}}</th>
      <td>{{$editora->nome}}</td>
      <td>{{$editora->descricao}}</td>
      <td><a href="http://127.0.0.1:8000/admin/editoras/{{$editora->id}}/edit" >Editar</a> 

<form style="display: inline;" action="{{route('editoras.destroy', $editora->id)}}" method="post">
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
 <center> {!!  $editoras->links() !!} </center>
</div>





 

 @endsection
 
 

