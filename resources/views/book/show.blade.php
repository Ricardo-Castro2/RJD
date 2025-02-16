<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Livro</title>
</head>
<body>

    <a href="{{ route('book.index') }}">Listar livros</a><br>
    <a href="{{ route('book.edit', ['book' => $book->id]) }}">Editar livro</a><br>

    <h1>Visualizar Livro</h1>

    @if(session('success'))
        <p style="color:#086;">
            {{ session('success') }}
        </p>
    @endif

    ID: {{ $book->id }}<br>
    Nome: {{ $book->name }}<br>
    Preço de Venda: {{ $book->sale_price }}<br>
    Preço de Compra: {{ $book->purchase_price }}<br>
    Quantidade: {{ $book->amount }}<br>
    Editora: {{ $book->publisher->name }}<br>
    Autor: {{ $book->author->name }}<br>
    Cadastrado: {{ \Carbon\Carbon::parse($book->created_at)->format('d/m/Y H:i:s') }}<br>
    Editado: {{ \Carbon\Carbon::parse($book->updated_at)->format('d/m/Y H:i:s') }}<br>

</body>
</html>
