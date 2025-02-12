<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    
    

    <h1>listar livros</h1>
{{--
    <a href="{{ route('stock_items.create') }}"> criar  </a> 
    <br><hr>

    @if(session('success'))
        <p style="color:#086;">
            {{ session('success') }}
           
        </p>
    @endif

    
    


    @forelse ($books as $book)
    
        ID: {{ $book->id }}<br>
        Nome: {{ $book->name }}<br>
        preco venda: {{ $book->sale_price }}<br>
        preco compra: {{ $book->purchase_price }}<br>
        quantidade: {{ $book->amount }}<br>
        Editora: {{ $book->publisher ? $book->publisher->name : 'Não especificado' }}<br> <!-- Nome da editora -->
        Autor: {{ $book->author ? $book->author->name : 'Não especificado' }}<br> <!-- Nome do autor -->
        <hr>

        
        <a href="{{ route('book.show',['book' => $book->id]) }}"> visualizar</a><br>
        <a href="{{ route('book.edit',['book' => $book->id]) }}"> editar</a><br>
        <a href="{{ route('book.destroy',['book' => $book->id]) }}"> apagar</a><br>
        
        
    @empty
        
    @endforelse
--}}


</body>
</html>
