
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Ler livros online">
  <meta name="author" content="Streamooks">
  <title>Streamooks</title>
  <link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet">
  <link href="{!! asset('css/animate.min.css') !!}" rel="stylesheet"> 
  <link href="{!! asset('css/font-awesome.min.css') !!}" rel="stylesheet">
  <link href="{!! asset('css/lightbox.css') !!}" rel="stylesheet">
  <link href="{!! asset('css/main.css') !!}" rel="stylesheet">
  <link id="css-preset" href="{!! asset('css/presets/preset1.css') !!}" rel="stylesheet">
  <link href="{!! asset('css/responsive.css') !!}" rel="stylesheet">
 
</head>

<body>

  <div class="preloader"> <i class="fa fa-circle-o-notch fa-spin"></i></div>
  <header id="home">
     <div class="main-nav">
     
      <div class="container">
      
        <div class="navbar-header">
          <a class="navbar-brand" href="{!! asset('/') !!}">
            <h1><img class="img-responsive" src="{!! asset('images/logo.png') !!}" width="40"></h1>
          </a>                    
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">                 
            <li class="scroll active"><a href="{!! asset('/') !!}">Inicio</a></li>
            @can('admin')
                                    <li>
                                        <a href="{!! asset('admin') !!}">
                                            Painel de Adm
                                        </a>
                                    </li>
                                    @endcan
             <li class="scroll"><a href="{!! asset('sobre') !!}">Sobre nós</a></li>
            @if (Auth::guest())
            <li class="scroll"><a href="{!! asset('login') !!}">Login</a></li> 
            <li class="scroll"><a href="{!! asset('register') !!}">Cadastro</a></li> 
            @else  
            <li class="scroll"><a href="{!! asset('perfil') !!}">Perfil</a></li> 
            <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
                                           Sair
                                        </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
            </li>
            @endif                       
          </ul>
        </div>
      </div>
    </div>
    

     @yield('content')


  </header>

  <script type="text/javascript" src="{!! asset('js/jquery.js') !!}"></script>
  <script type="text/javascript" src="{!! asset('js/bootstrap.min.js') !!}"></script>
  <script type="text/javascript" src="{!! asset('js/jquery.inview.min.js') !!}"></script>
  <script type="text/javascript" src="{!! asset('js/wow.min.js') !!}"></script>
  <script type="text/javascript" src="{!! asset('js/smoothscroll.js') !!}"></script>
  <script type="text/javascript" src="{!! asset('js/jquery.countTo.js') !!}"></script>
  <script type="text/javascript" src="{!! asset('js/lightbox.min.js') !!}"></script>
  <script type="text/javascript" src="{!! asset('js/main.js') !!}"></script>
<script>
$('#myCollapsible').on('hidden.bs.collapse', function () {
  // do something…
})
</script>
</body>
</html>