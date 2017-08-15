 <form method="POST" action="{{ route('livros.store')}}" enctype="multipart/form-data">
{{csrf_field()}}
 <input type="text" name="titulo">
 <input type="text" name="imagem">
 <input type="text" name="ano">
 <select class="form-control" name="genero">
            
            @foreach($generos as $genero)
                <option value="{{$genero->id}}">{{$genero->nome}}</option>
            @endforeach

</select>

 <select class="form-control" name="autor">
            
            @foreach($autors as $autor)
                <option value="{{$autor->id}}">{{$autor->nome}}</option>
            @endforeach

</select>

 <select class="form-control" name="editora">
            
            @foreach($editoras as $editora)
                <option value="{{$editora->id}}">{{$editora->name}}</option>
            @endforeach

</select>

<input type="text" name="arquivo">

<input type="submit" value="Cadastrar">

</form>