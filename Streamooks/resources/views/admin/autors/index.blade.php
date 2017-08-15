 @foreach($autors as $autor)
<p>{{$autor->id}} - {{$autor->nome}} 

<a href="http://127.0.0.1:8000/admin/autores/{{$autor->id}}/edit" >Editar</a> 

<form style="display: inline;" action="{{route('autores.destroy', $autor->id)}}" method="post">
{{csrf_field()}}
<input type="hidden" name="_method" value="delete">
<button type="submit" >Apagar</button>
</form>

</p>

 @endforeach