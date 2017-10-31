@extends('layouts.padrao')

@section('title', 'Lista de Editoras')

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
      <h2>Lista de Editoras
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        Cadastrar
    </button>
    <a href="http://127.0.0.1:8000/admin/editoras" class="btn btn-info">Exibir Todos</a>
</h2>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="fontModal" id="myModalLabel">Cadastrar nova Editora</h4>
      </div>
      <div class="modal-body">
              <form method="POST" action="{{ route('editoras.store')}}" enctype="multipart/form-data">
{{csrf_field()}}
  <div class="form-group">
    <label for="exampleInputEmail1">Nome:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nome" placeholder="Nome" required>

  </div>
 <div class="form-group">
    <label for="exampleInputEmail1">Descrição:</label>
    <textarea class="form-control" name="descricao" rows="3" placeholder="Digite a descrição" required ></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Imagem:</label>
    <input type="file" class="form-control" id="exampleInputEmail1" name="imagem" required>

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
       <form class="form-inline pull-xs-right" method="GET" action="{{ route('editoras.index')}}">
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
      <th>Descrição</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
  @foreach($editoras as $editora)
    <tr>
      <th scope="row">{{$editora->id}}</th>
      <td>{{$editora->nome}}</td>
      <td>{{substr($editora->descricao, 0, 30 )}}...</td>
      <td>
      <a href="http://127.0.0.1:8000/editora/{{$editora->id}}" class="btn btn-info">
      <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
      </a>
   
<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#editar{{$editora->id}}">
 <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
</button>

<div class="modal fade" id="editar{{$editora->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="fontModal" id="myModalLabel">Editar Editora</h4>
      </div>
      <div class="modal-body">
        <form role="form" method="POST" action="{{ route('editoras.update', $editora->id) }}" enctype="multipart/form-data">
{{csrf_field()}}
<input type="hidden" name="_method" value="put">
<div class="form-group">
    <label for="exampleInputEmail1">Nome:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nome" value="{{$editora->nome}}" >
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Descrição:</label>
    <textarea class="form-control" name="descricao" rows="3">{{$editora->descricao}}</textarea>
  </div>
   <div class="form-group">
  <label for="exampleInputEmail1">Imagem atual:</label><br />
<img src="http://127.0.0.1:8000/editoras/{{$editora->imagem}}"  class="img-thumbnail" width="200px">
</div>
  <div class="form-group">
    <label for="exampleInputEmail1">Imagem:</label>
    <input type="file" class="form-control" id="exampleInputEmail1" name="imagem" >

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



<button type="button" class="btn btn-danger " data-toggle="modal" data-target="#myModal{{$editora->id}}">
 <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
</button>

<div class="modal fade" id="myModal{{$editora->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="fontModal" id="myModalLabel">Cuidado!!</h4>
      </div>
      <div class="modal-body">
        Tem certeza que deseja excluir esse editora ? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <form style="display: inline;" action="{{route('editoras.destroy', $editora->id)}}" method="post">
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
 <center> {!!  $editoras->links() !!} </center>
</div>

 @endsection

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 