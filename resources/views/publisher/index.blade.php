<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>criar </h1>
    <a href="{{ route('publisher.create') }}"> criar editora </a> 

    


    <h1>listar editoras</h1>
    
    @if(session('success'))
        <p style="color:#086;">
            {{ session('success') }}
           
        </p>
    @endif
    
        @forelse ($publishers as $publisher)
        ID: {{ $publisher->id }}<br>
        Nome: {{ $publisher-> name }}<br>

        <a href="{{ route('publisher.show',['publisher' => $publisher->id]) }}"> visualizar</a><br>
        
        <a href="{{ route('publisher.edit',['publisher' => $publisher->id]) }}"> editar</a><br>

        <a href="{{ route('publisher.destroy',['publisher' => $publisher->id]) }}"> apagar</a><br>
        

        <hr>
        @empty
        
        @endforelse
    

</body>
</html>
