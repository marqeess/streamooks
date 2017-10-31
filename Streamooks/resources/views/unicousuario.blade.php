@extends('layouts.padrao')

@section('title')
  {{$usuario->nome}} {{$usuario->sobrenome}}
  @endsection



@section('content')

<div class="container">

<br/><br/>
@if (Session::has('flash_message'))

<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('flash_message')}}
</div>

@endif

@if (Session::has('flash_messagee'))

<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('flash_messagee')}}
</div>

@endif

@if (Session::has('usuario_atualizado'))

<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('usuario_atualizado')}}
</div>

@endif
<div class="row">



<div class="col-md-4">
<img src="{!! asset('images/usuarios') !!}/{{$usuario->imagem}}" width="350">
</div>

<div class="col-md-8">
<h1>{{$usuario->nome}} {{$usuario->sobrenome}} 

@if(Auth::id() == $usuario->id) 


<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        Editar Perfil
    </button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">
        Alterar Senha
    </button>
@endif

    </h1>



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="fontModal" id="myModalLabel">Editar Perfil</h4>
      </div>
      <div class="modal-body">
              <form method="POST" action="{{ route('alterarusuario')}}" enctype="multipart/form-data">
              <input type="hidden" name="usuario_id" value="{{$usuario->id}}">
{{csrf_field()}}
  <div class="form-group">
 
    <label for="exampleInputEmail1">Nome:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nome" value="{{$usuario->nome}}" placeholder="Nome" required>

  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Sobrenome:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="sobrenome" value="{{$usuario->sobrenome}}" placeholder="Some">

  </div>


<div class="form-group">
    <label for="exampleInputEmail1">Email:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email" value="{{$usuario->email}}" required>
  </div>

  
  

  <div class="form-group">
    <label for="exampleInputEmail1">Alterar Imagem:</label>
    <input type="file" class="form-control" id="exampleInputEmail1" name="imagem" placeholder="Nome">

  </div>




      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
      </div>
    </div>
  </div>
</div>
       
      
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="fontModal" id="myModalLabel">Alterar Senha</h4>
      </div>
      <div class="modal-body">
              <form method="POST" action="{{ route('alterarsenha')}}" enctype="multipart/form-data">
{{csrf_field()}}
<input type="hidden" name="usuario_id" value="{{$usuario->id}}">
 
  <div class="form-group">
    <label for="exampleInputEmail1">Nova Senha :</label>
    <input type="password" class="form-control" id="password" name="senha" placeholder="Nova Senha" required>

  </div>
 <div class="form-group">
    <label for="exampleInputEmail1">Confirmar Nova Senha:</label>
    <input type="password" class="form-control" id="confirm_password" name="nome" placeholder="Confirmar Nova Senha" required>

  </div>



      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
      </div>
    </div>
  </div>
</div>
       
      

      
      
  









<b>Email:</b><p>{{$usuario->email}}</p>
<b>Status:</b><p> @if ($usuario->status == 1)
    Confirmado
    @else
    Não Confirmado
    @endif</p>
</div>

</div>


<div class="row">
<br />
<div class="col-md-12">
<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    
    <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><h3>Favoritos</h3></a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><h3>Autores Seguidos</h3></a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab"><h3>Editoras Seguidas</h3></a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    
    <div role="tabpanel" class="tab-pane active" id="profile">
    <hr>
    @foreach ($favoritos as $favorito)
<div class="col-md-2">
<a href="{!! asset('livro') !!}/{{$favorito->livro->id}}">
<img src="{!! asset('imgs/livros') !!}/{{$favorito->livro->imagem}}" width="150">
</a>
</div>
@endforeach
    </div>
    <div role="tabpanel" class="tab-pane" id="messages">
 <hr>
    @foreach ($sautors as $sautor)
<div class="col-md-2">
<a href="{!! asset('autor') !!}/{{$sautor->autor->id}}">
<img src="{!! asset('autores') !!}/{{$sautor->autor->imagem}}" width="150">
<h3>{{substr($sautor->autor->nome, 0, 15 )}}</h3>
</a>
</div>

@endforeach
    </div>
    <div role="tabpanel" class="tab-pane" id="settings">
      <hr>
      @foreach ($seditoras as $seditora)
<div class="col-md-2">
<a href="{!! asset('editora') !!}/{{$seditora->editora->id}}">
<img src="{!! asset('editoras') !!}/{{$seditora->editora->imagem}}" width="150">
<h3>{{substr($seditora->editora->nome, 0, 15 )}}</h3>
</a>
</div>
@endforeach
    
    </div>
  </div>

</div>



</div>
</div>







</div>
<br /><br /><br /><br /><br /><br />
@endsection