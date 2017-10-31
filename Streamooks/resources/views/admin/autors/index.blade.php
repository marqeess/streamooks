@extends('layouts.padrao')

@section('title', 'Lista de Autores')

@section('content')
 
<br /><br />
<div class="container">
@if (Session::has('flash_message'))

<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('flash_message')}}
</div>

@endif

@if (Session::has('error'))

<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('error')}}
</div>

@endif

    <div class="row">
    
      <div class="col-md-9 ">
      <h2>Lista de Autores
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        Cadastrar
    </button>
    <a href="http://127.0.0.1:8000/admin/autores" class="btn btn-info">Exibir Todos</a>
</h2>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="fontModal" id="myModalLabel">Cadastrar novo Autor</h4>
      </div>
      <div class="modal-body">
              <form method="POST" action="{{ route('autores.store')}}" enctype="multipart/form-data">
{{csrf_field()}}
  <div class="form-group">
    <label for="exampleInputEmail1">Nome:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nome" placeholder="Nome">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Nascimento:</label>
    <input type="date" class="form-control" id="exampleInputEmail1" name="nascimento" >
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Nacionalidade:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nacionalidade" placeholder="Nacionalidade">
  </div>
 <div class="form-group">
    <label for="exampleInputEmail1">Biografia:</label>
    <textarea class="form-control" name="biografia" rows="2" placeholder="Digite a biografia" ></textarea>
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Imagem:</label>
    <input type="file" class="form-control" id="exampleInputEmail1" name="imagem">
  </div>



      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
      </div>
    </div>
  </div>
</div>
       
      </div>
<div class="col-md-3  ">

<br />
       <form class="form-inline pull-xs-right" method="GET" action="{{ route('autores.index')}}">
    <input class=" form-control" type="text" placeholder="Pesquisar" name="pesquisa">
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
      <th>Nacionalidade</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
  @foreach($autors as $autor)
    <tr>
      <th scope="row">{{$autor->id}}</th>
      <td>{{$autor->nome}}</td>
      <td>{{$autor->nacionalidade}}</td>
      <td>
      <a href="http://127.0.0.1:8000/autor/{{$autor->id}}" class="btn btn-info">
      <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
      </a>
   
<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#editar{{$autor->id}}">
 <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
</button>

<div class="modal fade" id="editar{{$autor->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="fontModal" id="myModalLabel">Editar Autor</h4>
      </div>
      <div class="modal-body">
        <form role="form" method="POST" action="{{ route('autores.update', $autor->id) }}" enctype="multipart/form-data">
{{csrf_field()}}
<input type="hidden" name="_method" value="put">
 <div class="form-group">
    <label for="exampleInputEmail1">Nome:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nome" placeholder="Nome" value="{{$autor->nome}}">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Nascimento:</label>
    <input type="date" class="form-control" id="exampleInputEmail1" name="nascimento" value="{{$autor->nascimento}}">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Nacionalidade:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nacionalidade" placeholder="Nacionalidade" value="{{$autor->nacionalidade}}">
  </div>
 <div class="form-group">
    <label for="exampleInputEmail1">Biografia:</label>
    <textarea class="form-control" name="biografia" rows="2" placeholder="Digite a biografia" >{{$autor->biografia}}</textarea>
</div>
    <div class="form-group">
  <label for="exampleInputEmail1">Imagem atual:</label><br />
<img src="http://127.0.0.1:8000/autores/{{$autor->imagem}}"  class="img-thumbnail" width="200px">
</div>
  
    <div class="form-group">
    <label for="exampleInputEmail1">Alterar imagem:</label>
    <input type="file" class="form-control" id="exampleInputEmail1" name="imagem">
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



<button type="button" class="btn btn-danger " data-toggle="modal" data-target="#myModal{{$autor->id}}">
 <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
</button>

<div class="modal fade" id="myModal{{$autor->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="fontModal" id="myModalLabel">Cuidado!!</h4>
      </div>
      <div class="modal-body">
        Tem certeza que deseja excluir esse genero ? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <form style="display: inline;" action="{{route('autores.destroy', $autor->id)}}" method="post">
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
 <center> {!!  $autors->links() !!} </center>
</div>















































@endsection



 

 
 
 
 
 
 
 
 
 
