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
			    	<h3 class="panel-title"><center>Registrar-se no site</center></h3>
			 	</div>
			  	<div class="panel-body">
			    <form id="main-contact-form" name="contact-form" method="POST" action="{{ route('register') }}">
            	 {{ csrf_field() }}
                    <fieldset>
                      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  <label for="exampleInputEmail1">Nome:</label>
			    		    <input class="form-control" placeholder="Nome" name="name" type="text" value="{{ old('name') }}"  required autofocus>
                  @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
              </div>
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
                                        <strong>{{ $errors->first('senha') }}</strong>
                                    </span>
                                @endif
			    		</div>

              <div class="form-group">
                <label for="exampleInputEmail1">Confirmar Senha:</label>
			    			<input class="form-control" placeholder="Confirmar Senha" name="password_confirmation" type="password" required>
			    		</div>
             
			    		
			    		<input class="btn btn-lg btn-primary btn-block" type="submit" value="Cadastrar">
			    	</fieldset>
            <br />Caso ja tenha conta entre clicando <a href="login">aqui</a>
            <input type="hidden" name="nivel" value="0"> 
                        <input type="hidden" name="status" value="0">
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>




    

@endsection













