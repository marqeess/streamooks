
<form method="POST" action="{{ route('autores.store')}}" enctype="multipart/form-data">
{{csrf_field()}}
<input type="text" name="nome">
<input type="text" name="nascimento">
<input type="text" name="nacionalidade">
<input type="text" name="biografia">
<input type="file" name="imagem">
<input type="submit" value="Cadastrar">

</form>