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
			    	<h3 class="panel-title"><center>Entrar no site</center></h3>
			 	</div>
			  	<div class="panel-body">
			    	<form id="main-contact-form" name="contact-form" method="POST" action="{{ route('login') }}">  
            {{csrf_field()}}
                    <fieldset>
			    	  	<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label for="exampleInputEmail1">Email:</label>
			    		    <input class="form-control" placeholder="E-mail" name="email" type="text" value="{{ old('email') }}" required autofocus>
                  @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
              </div>
               
			    		<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="exampleInputEmail1">Senha:</label>
			    			<input class="form-control" placeholder="Senha" name="password" type="password" required>
                 @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
			    		</div>
             
			    		<div class="checkbox">
			    	    	<label>
			    	    		<input name="remember" type="checkbox" value="Remember Me"> Lembrar Senha
			    	    	</label>
			    	    </div>
			    		<input class="btn btn-lg btn-primary btn-block" type="submit" value="Entrar">
			    	</fieldset>
					<br /><a  href="{{ route('password.request') }}">
                                    Esqueceu sua senha?
                                </a>
					<br />Caso não tenha conta registre-se clicando <a href="register">aqui</a>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>




    

@endsection

