<form role="form" method="POST" action="{{ route('autores.update', $autors[0]->id) }}" enctype="multipart/form-data">
<input type="hidden" name="_method" value="put">
{{csrf_field()}}
<input type="text" name="nome" value="{{$autors[0]->nome}}">
<input type="text" name="nascimento" value="{{$autors[0]->nascimento}}">
<input type="text" name="nacionalidade" value="{{$autors[0]->nacionalidade}}">
<input type="text" name="biografia" value="{{$autors[0]->biografia}}">
<input type="text" name="imagem" value="{{$autors[0]->imagem}}">
<input type="submit" value="Editar">

</form>