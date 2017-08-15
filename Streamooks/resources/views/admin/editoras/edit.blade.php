<form role="form" method="POST" action="{{ route('editoras.update', $editoras[0]->id) }}" enctype="multipart/form-data">
<input type="hidden" name="_method" value="put">
{{csrf_field()}}
<input type="text" name="name" value="{{$editoras[0]->name}}">
<input type="text" name="email" value="{{$editoras[0]->email}}">
<input type="text" name="imagem" value="{{$editoras[0]->imagem}}">
<input type="text" name="password" value="{{$editoras[0]->password}}">
<input type="text" name="status" value="{{$editoras[0]->status}}">
<input type="submit" value="editar">

</form>