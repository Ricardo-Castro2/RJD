<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .btn-custom {
            background-color: #3490dc;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
            transition: background-color 0.3s;
        }
        .btn-custom:hover {
            background-color: #2779bd;
        }
    </style>
</head>
<body>

    <h1>Menu autores</h1>
    
    <a href="{{ route('author.create') }}" class="btn-custom">criar autor</a>

    <a href="{{ route('author.index') }}">criar autor</a>
    
    <h1>listar autores</h1>

    @if(session('success'))
        <p style="color:#086;">
            {{ session('success') }}
        </p>
    @endif
  
    
    @forelse ($authors as $author)   
        <br>
        ID: {{ $author->id }}<br>
        Nome: {{ $author-> name }}<br>
        <a href="{{ route('author.show',['author' => $author->id]) }}"> visualizar autor</a><br>
        <a href="{{ route('author.edit',['author' => $author->id]) }}"> editar autor </a><br>
        <a href="{{ route('author.destroy',['author' => $author->id]) }}"> apagar autor</a><br>
        <hr>
    @empty
        
    @endforelse
              

</body>
</html>
