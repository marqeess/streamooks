 @foreach($editoras as $editora)
<p>{{$editora->id}} - {{$editora->name}} 

<a href="http://127.0.0.1:8000/admin/editoras/{{$editora->id}}/edit" >Editar</a> 

<form style="display: inline;" action="{{route('editoras.destroy', $editora->id)}}" method="post">
{{csrf_field()}}
<input type="hidden" name="_method" value="delete">
<button type="submit" >Apagar</button>
</form>

</p>

 @endforeach