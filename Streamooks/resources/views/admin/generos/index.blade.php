 @extends('layouts.padrao')

@section('content')
 
<br /><br /><br />
<div class="container">
    <div class="row">
      <div class="col-md-8 ">
      
      <h2>Lista de Generos</h2>
      
      </div>
<div class="col-md-4  ">
<br />
       <form class="form-inline pull-xs-right" method="GET" action="{{ route('generos.index')}}">
    <input class=" form-control" type="text" placeholder="Pesquisar" name="pesquisa">
    <button class="btn btn-outline-success btn btn-primary " type="submit">Pesquisar</button>
  </form>
</div>

    </div>
    <br />
    <div class="row">
        <div class="col-md-12 ">
       
        <a href="http://127.0.0.1:8000/admin/" >Inicio</a> >
        <a href="http://127.0.0.1:8000/admin/generos" >Exibir Todos</a> >
        <a href="http://127.0.0.1:8000/admin/generos/create" >Cadastrar novo genero</a>
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
  @foreach($generos as $genero)
    <tr>
      <th scope="row">{{$genero->id}}</th>
      <td>{{$genero->nome}}</td>
      <td>{{$genero->descricao}}</td>
      <td><a href="http://127.0.0.1:8000/admin/generos/{{$genero->id}}/edit" class="btn btn-primary">Editar</a>
<button type="button" class="btn btn-danger " data-toggle="modal" data-target="#myModal{{$genero->id}}">
  Excluir
</button>

<div class="modal fade" id="myModal{{$genero->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cuidado!!</h4>
      </div>
      <div class="modal-body">
        Tem certeza que deseja excluir esse genero ? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <form style="display: inline;" action="{{route('generos.destroy', $genero->id)}}" method="post">
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
 <center> {!!  $generos->links() !!} </center>
</div>





 

 @endsection
