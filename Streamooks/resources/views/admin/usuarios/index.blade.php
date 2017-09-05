  @extends('layouts.padrao2')

@section('content')

<br /><br /><br />
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        <a href="http://127.0.0.1:8000/admin/" >Inicio</a> >
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
 
 @foreach($users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->nome}}</td>
      <td>{{$user->email}}</td>
      <td><a href="" >Editar</a> 

</td>
    </tr>
    @endforeach
  </tbody>
</table>

                
            </div>
        </div>
    </div>
 <center> {!!  $users->links() !!} </center>
</div>





 

 @endsection
 
 

