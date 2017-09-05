
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Streamooks</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet"> 
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/lightbox.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <link id="css-preset" href="css/presets/preset1.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">
 
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
</head>

<body>

  <div class="preloader"> <i class="fa fa-circle-o-notch fa-spin"></i></div>
  <header id="home">
     <div class="main-nav">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="/">
            <h1><img class="img-responsive" src="images/logo.png" width="40"></h1>
          </a>                    
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">                 
            <li class="scroll active"><a href="/">Inicio</a></li>
            @can('admin')
                                    <li>
                                        <a href="admin">
                                            Painel de Adm
                                        </a>
                                    </li>
                                    @endcan
             <li class="scroll"><a href="sobre">Sobre nós</a></li>
            @if (Auth::guest())
            <li class="scroll"><a href="login">Login</a></li> 
            <li class="scroll"><a href="register">Cadastro</a></li> 
            @else  
            <li class="scroll"><a href="home">Perfil</a></li> 
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

  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.inview.min.js"></script>
  <script type="text/javascript" src="js/wow.min.js"></script>
  <script type="text/javascript" src="js/smoothscroll.js"></script>
  <script type="text/javascript" src="js/jquery.countTo.js"></script>
  <script type="text/javascript" src="js/lightbox.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>

</body>
</html>