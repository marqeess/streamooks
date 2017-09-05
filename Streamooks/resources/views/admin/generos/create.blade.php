@extends('layouts.padrao2')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

<form method="POST" action="{{ route('generos.store')}}" enctype="multipart/form-data">
{{csrf_field()}}
Titulo:<input type="text" name="nome">
Descrição:<input type="text" name="descricao">
<input type="submit" value="Cadastrar">

</form>

   </div>
            </div>
        </div>
    </div>
</div>

@endsection