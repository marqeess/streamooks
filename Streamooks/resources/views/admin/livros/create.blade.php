<form method="POST" action="{{ route('generos.store')}}" enctype="multipart/form-data">
{{csrf_field()}}
Titulo:<input type="text" name="nome">
Descrição:<input type="text" name="descricao">
<input type="submit" value="Cadastrar">

</form>