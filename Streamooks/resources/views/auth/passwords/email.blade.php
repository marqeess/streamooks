@extends('layouts.padrao')

@section('title','Entrar')

@section('content')

<body style="background-image: url(images/slider/aa.jpg); height:500px">
<br /><br /><br /><br />
<div class="container">
    <div class="row vertical-offset-100">
    	<div class="col-md-7 col-md-offset-2">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title"><center>Trocar Senha</center></h3>
			 	</div>
			  	<div class="panel-body">
			    	<form id="main-contact-form" name="contact-form" method="POST" action="{{ route('password.email') }}">  
            {{csrf_field()}}
                    <fieldset>
			    	  	<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label for="exampleInputEmail1">Endereço de email atual:</label>
			    		    <input class="form-control" placeholder="E-mail" name="email" type="text" value="{{ old('email') }}" required autofocus>
                  @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
              </div>
               
			    		
			    		
			    		<input class="btn btn-lg btn-primary btn-block" type="submit" value="Enviar Confirmação">
			    	</fieldset>
					<br /><a  href="{{ route('login') }}">
                                   <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
 Voltar
                                </a>
					<br />Caso não tenha conta registre-se clicando <a href="{{ route('register') }}">aqui</a>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>




    

@endsection











