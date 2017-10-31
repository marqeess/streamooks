 @extends('layouts.padrao')

   @section('title', 'Lista de Livros')


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
      <h2>Lista de Livros
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        Cadastrar
    </button>
    <a href="http://127.0.0.1:8000/admin/livros" class="btn btn-info">Exibir Todos</a>
</h2>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="fontModal" id="myModalLabel">Cadastrar novo Livro</h4>
      </div>
      <div class="modal-body">
              <form method="POST" action="{{ route('livros.store')}}" enctype="multipart/form-data">
{{csrf_field()}}
  <div class="form-group">
    <label for="exampleInputEmail1">Titulo:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="titulo" placeholder="Titulo" required>
  </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1">Editora:</label>
    <select class="form-control" name="editora_id">
  @foreach($editoras as $editora)
						<option value='{{ $editora->id }}'>{{ $editora->nome }}</option>
					@endforeach
</select>
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Generos:</label><br/>
  <select class="form-control select2-multi" name="generos[]" multiple="multiple">
    @foreach($generos as $genero)
						<option value='{{ $genero->id }}'>{{ $genero->nome }}</option>
					@endforeach
</select>

  </div>

   <div class="form-group">
    <label for="exampleInputEmail1">Autores:</label><br/>
  <select class="form-control select2-multi" name="autors[]" multiple="multiple">
    @foreach($autors as $autor)
						<option value='{{ $autor->id }}'>{{ $autor->nome }}</option>
					@endforeach
</select>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Imagem:</label>
    <input type="file" class="form-control" id="exampleInputEmail1" name="imagem" placeholder="Titulo" required>
  </div>
 <div class="form-group">
    <label for="exampleInputEmail1">Descrição:</label>
    <textarea class="form-control" name="descricao" rows="3" placeholder="Digite a descrição" required ></textarea>
  </div>

<div class="form-group">
    <label for="exampleInputEmail1">Arquivo:</label>
    <input type="file" class="form-control" id="exampleInputEmail1" name="arquivo" placeholder="Titulo" required>
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
       <form class="form-inline pull-xs-right" method="GET" action="{{ route('livros.index')}}">
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
  @foreach($livros as $livro)
    <tr>
      <th scope="row">{{$livro->id}}</th>
      <td>{{$livro->titulo}}</td>
      <td>{{substr($livro->descricao, 0, 30 )}}...</td>
      <td>
      <a href="http://127.0.0.1:8000/livro/{{$livro->id}}" class="btn btn-info">
      <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
      </a>
   


<div class="modal fade" id="editar{{$livro->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="fontModal" id="myModalLabel">Editar Gênero</h4>
      </div>
      <div class="modal-body">
        <form role="form" method="POST" action="{{ route('livros.update', $livro->id) }}" enctype="multipart/form-data">
{{csrf_field()}}
<input type="hidden" name="_method" value="put">
<div class="form-group">
    <label for="exampleInputEmail1">Nome:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nome" value="{{$livro->titulo}}" >
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Descrição:</label>
    <textarea class="form-control" name="descricao" rows="3">{{$livro->descricao}}</textarea>
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



<button type="button" class="btn btn-danger " data-toggle="modal" data-target="#myModal{{$livro->id}}">
 <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
</button>

<div class="modal fade" id="myModal{{$livro->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
        <form style="display: inline;" action="{{route('livros.destroy', $livro->id)}}" method="post">
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
 <center> {!!  $livros->links() !!} </center>
</div>

 @endsection
