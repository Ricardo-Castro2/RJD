<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Livros</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            color: #2c3e50;
        }

        a {
            color: #3498db;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .book-container {
            margin-bottom: 20px;
        }

        .book-details {
            margin-bottom: 10px;
        }

        .book-image {
            margin-top: 10px;
        }

        .book-actions {
            margin-top: 10px;
        }

        .alert-success {
            color: green;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h1>Listar Livros</h1>

    <a href="{{ route('book.create') }}">Criar Novo Livro</a>
    <br><hr>

    @if(session('success'))
        <p class="alert-success">{{ session('success') }}</p>
    @endif

    @forelse ($books as $book)
        <div class="book-container">
            <div class="book-details">
                <strong>ID:</strong> {{ $book->id }}<br>
                <strong>Nome:</strong> {{ $book->name }}<br>
                <strong>Preço de Venda:</strong> R$ {{ number_format($book->sale_price, 2, ',', '.') }}<br>
                <strong>Preço de Compra:</strong> R$ {{ number_format($book->purchase_price, 2, ',', '.') }}<br>
                <strong>Quantidade:</strong> {{ $book->amount }}<br>
                <strong>Editora:</strong> {{ $book->publisher ? $book->publisher->name : 'Não especificado' }}<br>
                <strong>Autor:</strong> {{ $book->author ? $book->author->name : 'Não especificado' }}<br>
            </div>

            @if($book->image)
                <div class="book-image">
                    <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->name }}" width="200">
                </div>
            @endif

            <div class="book-actions">
                <a href="{{ route('book.show', ['book' => $book->id]) }}">Visualizar</a><br>
                <a href="{{ route('book.edit', ['book' => $book->id]) }}">Editar</a><br>
                <form action="{{ route('book.destroy', ['book' => $book->id]) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="color: red; background: none; border: none; cursor: pointer;">Apagar</button>
                </form>
            </div>
        </div>

        <hr>

    @empty
        <p>Nenhum livro encontrado.</p>
    @endforelse
    <a href="{{ route('menu.index') }}">voltar</a>
</body>
</html>
