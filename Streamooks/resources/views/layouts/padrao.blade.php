
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Ler livros online">
  <meta name="author" content="Streamooks">
  <link rel="shortcut icon" type="image/png" href="{!! asset('images/logo.png') !!}"/>
  <title> @yield('title')</title>
  <link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet">
  <link href="{!! asset('css/animate.min.css') !!}" rel="stylesheet"> 
  <link href="{!! asset('css/font-awesome.min.css') !!}" rel="stylesheet">
  <link href="{!! asset('css/lightbox.css') !!}" rel="stylesheet">
  <link href="{!! asset('css/main.css') !!}" rel="stylesheet">
  <link id="css-preset" href="{!! asset('css/presets/preset1.css') !!}" rel="stylesheet">
  <link href="{!! asset('css/responsive.css') !!}" rel="stylesheet">
  <link href="{!! asset('select2.min.css') !!}" rel="stylesheet">

</head>

<body>

  <div class="preloader"> <i class="fa fa-circle-o-notch fa-spin"></i></div>
  <header id="home">
     <div class="navbar-fixed-top">
     
      <div class="container">
      
        <div class="navbar-header">
          <a class="navbar-brand" href="{!! asset('/') !!}">
            <h1><img class="img-responsive" src="{!! asset('images/sm3.png') !!}" width="80"></h1>
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
             
            @if (Auth::guest())
            <li class="scroll"><a href="{!! asset('sobre') !!}">Sobre nós</a> </li>
            <li class="scroll"><a href="{!! asset('login') !!}">Entrar</a>
        
            </li> 
           
            <li class="scroll"><a href="{!! asset('register') !!}">Cadastrar-se</a>
            </li> 
            @else  
            <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle">Navegar<b class="caret"></b></a>
            <ul class="dropdown-menu">
            <li class="scroll"><a href="{!! asset('generos') !!}">Genêros</a> </li>
            <li class="scroll"><a href="{!! asset('editoraas') !!}">Editoras</a> </li>
            <li class="scroll"><a href="{!! asset('autorees') !!}">Autores</a> </li>
            </ul>
            </li>
            <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle"><img src="{!! asset('images/usuarios') !!}/{{Auth::user()->imagem }}" width="25" style="border-radius:50px"> <b class="caret"></b></a>
            <ul class="dropdown-menu">
            <li class="scroll"><a href="{!! asset('usuario') !!}/{{ Auth::id()}}">Perfil</a></li> 
            <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
                                           Sair
                                        </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
            </li>
            </ul>
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
   <script type="text/javascript" src="{!! asset('select2.min.js') !!}"></script>

<script>
$('#myCollapsible').on('hidden.bs.collapse', function () {

})

var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Senhas diferentes!");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

@yield('script')

</script>

</body>
</html>