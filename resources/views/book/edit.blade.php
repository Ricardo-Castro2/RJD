<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Livro</title>
</head>
<body>
    
    <a href="{{ route('book.index') }}">Listar livros</a><br>
    <a href="{{ route('book.show', ['book' => $book->id]) }}">Visualizar livro</a><br>
    <h1>Editar Livro</h1>
    
    @if ($errors->any())
        @foreach($errors->all() as $error)
            <p style="color:#f00;">
                {{ $error }}
            </p>
        @endforeach
    @endif

    <form action="{{ route('book-update', ['book' => $book->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Nome: </label>
        <input type="text" name="name" placeholder="Nome do livro" value="{{ old('name', $book->name) }}"><br>

        <label>Preço de Venda: </label>
        <input type="number" name="sale_price" placeholder="Preço de venda" value="{{ old('sale_price', $book->sale_price) }}"><br>

        <label>Preço de Compra: </label>
        <input type="number" name="purchase_price" placeholder="Preço de compra" value="{{ old('purchase_price', $book->purchase_price) }}"><br>

        <label>Quantidade: </label>
        <input type="number" name="amount" placeholder="Quantidade" value="{{ old('amount', $book->amount) }}"><br>

        <label>Editora: </label>
        <select name="publishers_id" required>
            <option value="">Selecione uma editora</option>
            @foreach($publishers as $publisher)
                <option value="{{ $publisher->id }}" {{ old('publishers_id', $book->publishers_id) == $publisher->id ? 'selected' : '' }}>
                    {{ $publisher->name }}
                </option>
            @endforeach
        </select><br>

        <label>Autor: </label>
        <select name="authors_id" required>
            <option value="">Selecione um autor</option>
            @foreach($authors as $author)
                <option value="{{ $author->id }}" {{ old('authors_id', $book->authors_id) == $author->id ? 'selected' : '' }}>
                    {{ $author->name }}
                </option>
            @endforeach
        </select><br>

        <!-- Campo para upload da imagem -->
        <label>Imagem: </label>
        <input type="file" name="image"><br>

        <!-- Exibe a imagem atual, se existir -->
        @if($book->image)
            <p><strong>Imagem Atual:</strong></p>
            <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->name }}" style="width:100px; height:auto;">
        @else
            <p>Sem imagem atual.</p>
        @endif
        
        <button type="submit">Atualizar livro</button>
    </form>

</body>
</html>
