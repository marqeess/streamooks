<form method="POST" action="{{ route('generos.store')}}" enctype="multipart/form-data">
{{csrf_field()}}
<input type="text" name="nome">
<input type="text" name="descricao">
<input type="submit" value="Cadastrar">

</form>