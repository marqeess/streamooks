<form role="form" method="POST" action="{{ route('editoras.update', $editoras[0]->id) }}" enctype="multipart/form-data">
<input type="hidden" name="_method" value="put">
{{csrf_field()}}
<input type="text" name="nome" value="{{$editoras[0]->nome}}">
<input type="text" name="descricao" value="{{$editoras[0]->descricao}}">
<input type="text" name="imagem" value="{{$editoras[0]->imagem}}">
<input type="submit" value="editar">

</form>