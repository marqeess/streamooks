<form method="POST" action="{{ route('editoras.store')}}" enctype="multipart/form-data">
{{csrf_field()}}
<input type="text" name="nome">
<input type="text" name="descricao">
<input type="file" name="imagem">
<input type="submit" value="Cadastrar">

</form>