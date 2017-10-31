@extends('layouts.padrao')

 @section('title', 'Streamooks - Leituras inteligentes para você')

@section('content')
<div id="home-slider" class="carousel slide carousel-fade" data-ride="carousel">
      <div class="carousel-inner">
      
        <div class="item active" style="background-image: url(images/slider/1.jpg); height: 500px">
          <div class="caption">
            <h1 class="animated fadeInLeftBig">Bem vindo ao <span>Streamooks</span></h1>
            <p class="animated fadeInRightBig">Leituras inteligentes para você</p>
            <a data-scroll class="btn btn-start animated fadeInUpBig" href="login">Entrar</a>
            <a data-scroll class="btn btn-start animated fadeInUpBig" href="register">Cadastrar-se</a>
          </div>
        </div>
        
        
      </div>
    </div>
    
@endsection