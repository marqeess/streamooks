  @extends('layouts.padrao')

  @section('title', 'Lista de Usuarios')

@section('content')
 
<br /><br />
<div class="container">
@if (Session::has('flash_message'))

<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('flash_message')}}
</div>

@endif

    <div class="row">
    
      <div class="col-md-9 ">
      <h2>Lista de Usuarios
      
    <a href="http://127.0.0.1:8000/admin/usuarios" class="btn btn-info">Exibir Todos</a>
</h2>

       
      </div>
<div class="col-md-3  ">

<br />
       <form class="form-inline pull-xs-right" method="GET" action="{{ route('usuarios.index')}}">
    <input class=" form-control" type="text" placeholder="Pesquisar por Email" name="pesquisa">
    <button class="btn btn-outline-success btn btn-primary " type="submit">
      <span class="glyphicon glyphicon-search" aria-hidden="true"></span>

    </button>
  </form>
  
</div>

    </div>
  
    <br />
    <div class="row">
        <div class="col-md-12 ">
       
            <div class="panel panel-default">
            
                <table class="table ">
  <thead>
    <tr>
      <th>Id</th>
      <th>Nome</th>
      <th>Email</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
  @foreach($users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->nome}}</td>
      <td>{{$user->email}}</td>
      <td>
      <a href="http://127.0.0.1:8000/usuario/{{$user->id}}" class="btn btn-info">
      <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
      </a>
   
<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#editar{{$user->id}}">
 <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
</button>

<div class="modal fade" id="editar{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="fontModal" id="myModalLabel">Editar Gênero</h4>
      </div>
      <div class="modal-body">
        <form role="form" method="POST" action="{{ route('usuarios.update', $user->id) }}" enctype="multipart/form-data">
{{csrf_field()}}
<input type="hidden" name="_method" value="put">
<div class="form-group">
 <center> <img src="{!! asset('images/usuarios') !!}/{{$user->imagem}}" width="150"> </center>
  </br></br>
    <label for="exampleInputEmail1">Nome:</label>
    {{$user->nome}}
</div>
<div class="form-group">
    <label for="exampleInputEmail1">Email:</label>
    {{$user->email}}
</div>

<div class="form-group">
    <label for="exampleInputEmail1">Status:</label>
    @if ($user->status == 1)
    Confirmado
    @else
    Não Confirmado
    @endif
</div>

<div class="form-group">
    <label for="exampleInputEmail1">Função Atual:</label>
    @if ($user->nivel == 1)
        Usuario Administrador
        @else
        Usuario Comum
    @endif
    
</div>
<div class="form-group">
    <label for="exampleInputEmail1">Alterar Função:</label>
    <select class="form-control" name="nivel">
      <option value="0" @if ($user->nivel == 0) selected="selected" @endif > Usuario Comum</option>
      <option value="1" @if ($user->nivel == 1) selected="selected" @endif >Usuario Administrador</option>
    </select>
</div>
  


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Editar</button>
        </form>
      </div>
    </div>
  </div>
</div>



<button type="button" class="btn btn-danger " data-toggle="modal" data-target="#myModal{{$user->id}}">
 <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
</button>

<div class="modal fade" id="myModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="fontModal" id="myModalLabel">Cuidado!!</h4>
      </div>
      <div class="modal-body">
        Tem certeza que deseja excluir esse usuario ? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <form style="display: inline;" action="{{route('usuarios.destroy', $user->id)}}" method="post">
          {{csrf_field()}}
          <input type="hidden" name="_method" value="delete">
          <button type="submit" class="btn btn-danger">Excluir</button>
        </form>
        
      </div>
    </div>
  </div>
</div>
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

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 