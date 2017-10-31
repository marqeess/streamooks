@extends('layouts.padrao')

  @section('title')
  {{$livro->titulo}}
  @endsection


@section('content')

<div class="container">

<br/><br/>
@if (Session::has('flash_message'))

<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('flash_message')}}
</div>

@endif
<div class="row">

<div class="col-md-4">
<img src="{!! asset('imgs/livros') !!}/{{$livro->imagem}}" width="350">
</div>

<div class="col-md-8">
@if ($favorito == 1)
<h1><form method="post" action="{{ route('desfavoritar')}}">{{$livro->titulo}} 
{{csrf_field()}}
<input type="hidden" name="user_id" value="{{ Auth::id()}}">
<input type="hidden" name="livro_id" value="{{$livro->id}}">
<button type="submit" class="btn btn-primary" ><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Favorito</button>
</form>
</h1>
@else 
<h1><form method="post" action="{{ route('favoritar')}}">{{$livro->titulo}} 
{{csrf_field()}}
<input type="hidden" name="user_id" value="{{ Auth::id()}}">
<input type="hidden" name="livro_id" value="{{$livro->id}}">
<button type="submit" class="btn btn-primary" ><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> Favoritar</button>
</form>
</h1>
@endif
<div class="row">
<div class="col-md-3">
<p><b>Media:</b> 
<form method="post" action="{{ route('nota')}}">
{{csrf_field()}}
<input type="hidden" name="livro_id" value="{{$livro->id}}">
<input type="hidden" name="user_id" value="{{auth::user()->id}}">
@if ($notaArredonda == 5)
<input type="image" name="nota" value="1" src="{!! asset('images/e2.png') !!}" width="25">
<input type="image" name="nota" value="2" src="{!! asset('images/e2.png') !!}" width="25">
<input type="image" name="nota" value="3" src="{!! asset('images/e2.png') !!}" width="25">
<input type="image" name="nota" value="4" src="{!! asset('images/e2.png') !!}" width="25">
<input type="image" name="nota" value="5" src="{!! asset('images/e2.png') !!}" width="25">
@endif
@if ($notaArredonda == 4)
<input type="image" name="nota" value="1" src="{!! asset('images/e2.png') !!}" width="25">
<input type="image" name="nota" value="2" src="{!! asset('images/e2.png') !!}" width="25">
<input type="image" name="nota" value="3" src="{!! asset('images/e2.png') !!}" width="25">
<input type="image" name="nota" value="4" src="{!! asset('images/e2.png') !!}" width="25">
<input type="image" name="nota" value="5" src="{!! asset('images/e1.png') !!}" width="25">
@endif
@if ($notaArredonda == 3)
<input type="image" name="nota" value="1" src="{!! asset('images/e2.png') !!}" width="25">
<input type="image" name="nota" value="2" src="{!! asset('images/e2.png') !!}" width="25">
<input type="image" name="nota" value="3" src="{!! asset('images/e2.png') !!}" width="25">
<input type="image" name="nota" value="4" src="{!! asset('images/e1.png') !!}" width="25">
<input type="image" name="nota" value="5" src="{!! asset('images/e1.png') !!}" width="25">
@endif
@if ($notaArredonda == 2)
<input type="image" name="nota" value="1" src="{!! asset('images/e2.png') !!}" width="25">
<input type="image" name="nota" value="2" src="{!! asset('images/e2.png') !!}" width="25">
<input type="image" name="nota" value="3" src="{!! asset('images/e1.png') !!}" width="25">
<input type="image" name="nota" value="4" src="{!! asset('images/e1.png') !!}" width="25">
<input type="image" name="nota" value="5" src="{!! asset('images/e1.png') !!}" width="25">
@endif
@if ($notaArredonda == 1)
<input type="image" name="nota" value="1" src="{!! asset('images/e2.png') !!}" width="25">
<input type="image" name="nota" value="2" src="{!! asset('images/e1.png') !!}" width="25">
<input type="image" name="nota" value="3" src="{!! asset('images/e1.png') !!}" width="25">
<input type="image" name="nota" value="4" src="{!! asset('images/e1.png') !!}" width="25">
<input type="image" name="nota" value="5" src="{!! asset('images/e1.png') !!}" width="25">
@endif
@if ($notaArredonda == 0)
<input type="image" name="nota" value="1" src="{!! asset('images/e1.png') !!}" width="25">
<input type="image" name="nota" value="2" src="{!! asset('images/e1.png') !!}" width="25">
<input type="image" name="nota" value="3" src="{!! asset('images/e1.png') !!}" width="25">
<input type="image" name="nota" value="4" src="{!! asset('images/e1.png') !!}" width="25">
<input type="image" name="nota" value="5" src="{!! asset('images/e1.png') !!}" width="25">
@endif
</form>

</p>
</div>

<div class="col-md-8">

</div>
</div>

<b>Descrição:</b><p>{{$livro->descricao}}</p>
<b>Editora:</b><p><a href="{!! asset('editora') !!}/{{$livro->editora_id}}">{{$livro->editora->nome}}</a></p>

<b>Autores:</b>
<p>
@foreach ($livro->autors as $autor)
<a href="{!! asset('autor') !!}/{{$autor->id}}">{{$autor->nome}}</a> |

@endforeach
</p>

<b>Generos:</b>
<p>
@foreach ($livro->generos as $genero)
<a href="{!! asset('genero') !!}/{{$genero->id}}">{{$genero->nome}}</a> |

@endforeach
</p>

@can('status')
@if ($pagina == 1)
 <a href="{!! asset('ler') !!}/{{$livro->id}}" target="_blank" class="btn btn-primary">
     <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
     Continuar Lendo
</a>
@else 
<a href="{!! asset('ler') !!}/{{$livro->id}}" target="_blank" class="btn btn-primary">
     <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
     Ler Online
</a>
@endif
<a href="{!! asset('pub') !!}/{{$livro->arquivo}}" class="btn btn-primary">
     <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>
Baixar
</a>
 @else
 Favor verificar o email para realizar as ações.
 </br>
  <a href="{!! asset('ler') !!}/{{$livro->id}}" target="_blank" class="btn btn-primary" disabled="disabled">
     <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
     Ler Online
</a>
<a href="{!! asset('pub') !!}/{{$livro->arquivo}}" class="btn btn-primary" disabled="disabled">
     <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>
Baixar
</a>

 @endcan


</div>

</div>
<div class="row">
<br />
<div class="col-md-12">
<h2> Leia Tambem:</h2>
</div>
</div>

@foreach ($recomendacoes as $recomendacao)
<div class="col-md-2">
<a href="{!! asset('livro') !!}/{{$recomendacao->id}}">
<img src="{!! asset('imgs/livros') !!}/{{$recomendacao->imagem}}" width="150">
</a>
</div>
@endforeach
<br />
<div class="row">
<br />
<div class="col-md-12">
<br />

<h2> Comentários</h2>
<hr>
<div class="row">
<div class="col-md-8">
<div class="panel panel-default">
                <div class="panel-body">                
                    <form method="POST" action="{{ route('comentar')}}">
{{csrf_field()}}
<input type="hidden" name="user_id" value="{{ Auth::id()}}">
<input type="hidden" name="livro_id" value="{{$livro->id}}">
                        <textarea class="form-control counted" name="comentario" placeholder="Digite seu comentario" rows="3" style="margin-bottom:10px;"></textarea>
                        <div class="text-right">
                        @can('status')
 <button type="submit" class="btn btn-primary" >Comentar</button>
 @else
 Favor verificar o email para comentar.
 <button type="submit" class="btn btn-primary" disabled="disabled">Comentar</button>
 @endcan
                        </div>  
                    </form>
                </div>
            </div>

 
</form>
</div>

</div>
</div>



@foreach ($comentarios as $comentario)
<div class="row">
<div class="col-md-1">
<br />
<a href="{!! asset('usuario') !!}/{{$comentario->user->id}}">
<img class="d-flex mr-3 rounded-circle" src="{!! asset('images/usuarios') !!}/{{$comentario->user->imagem}}" width="70" height="70" alt="">
</a>
</div>

<div class="col-md-7">
<div class="panel panel-default">
                <div class="panel-body">
  <form method="POST" action="{{ route('deletarComentario')}}">
{{csrf_field()}}
<input type="hidden" name="livro_id" value="{{$livro->id}}">
<input type="hidden" name="comentario_id" value="{{$comentario->id}}">
<h4><a href="{!! asset('usuario') !!}/{{$comentario->user->id}}">{{$comentario->user->nome}} {{$comentario->user->sobrenome}}</a>

 @can('admin')

<button type="submit" class="btn btn-danger btn-sm" style="float:right">
  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
</button>

@else
@if ( Auth::id() == $comentario->user_id)

<button type="submit" class="btn btn-danger btn-sm" style="float:right" >
  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
</button>

@endif
@endcan
</h4>
</form>



<p>{{$comentario->comentario}} </p>

</div>
</div></div></div>

</br >
@endforeach


</div>
<br /><br /><br /><br /><br /><br />
@endsection