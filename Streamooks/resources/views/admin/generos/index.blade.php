 @foreach($generos as $genero)
<p>{{$genero->id}} - {{$genero->nome}} 

<a href="http://127.0.0.1:8000/admin/generos/{{$genero->id}}/edit" >Editar</a> 

<form style="display: inline;" action="{{route('generos.destroy', $genero->id)}}" method="post">
{{csrf_field()}}
<input type="hidden" name="_method" value="delete">
<button type="submit" >Apagar</button>
</form>

</p>

 @endforeach