<!DOCTYPE html>
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
  <link href="css/style.css" rel="stylesheet">
 
 
</head>

<body style="background-image: url(images/slider/4.jpg); height:500px">

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

    <div id="login" class="parallax">
      <div class="container">
        <div class="row">
          <div class="heading text-center col-sm-8 col-sm-offset-2">
            <br><br><br>
            <h2>Streamoooks</h2>
            <p>Entre seus dados:</p>
          </div>
        </div>
        <div class="contact-form">
          <div class="row">
            <div class="col-sm-12">
              <form id="main-contact-form" name="contact-form" method="POST" action="{{ route('login') }}">  
            {{csrf_field()}}
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" name="email" class="form-control" placeholder="E-mail" required="required">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="password" name="password" class="form-control" placeholder="Senha" required="required">
                    </div>
                  </div>                       
                <div class="form-group">
                  <button type="submit" class="btn-submit">Entrar</button>
                </div>
              </form>   
            </div>         
            </div>
          </div>
        </div>
      </div>
    </div>        

        <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <p>2017 - Streamooks</p>
          </div>
        </div>
      </div>
    </div>
  </footer>

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


