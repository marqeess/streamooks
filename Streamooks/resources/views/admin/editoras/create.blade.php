<form method="POST" action="{{ route('editoras.store')}}" enctype="multipart/form-data">
{{csrf_field()}}
<input type="text" name="name">
<input type="text" name="email">
<input type="text" name="imagem">
<input type="text" name="password">
<input type="text" name="status">
<input type="submit" value="Cadastrar">

</form>