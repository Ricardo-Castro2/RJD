<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Livro</title>
</head>
<body>

    <a href="{{ route('book.index') }}">Voltar para Listar Livros</a><br>
    <a href="{{ route('book.edit', ['book' => $book->id]) }}">Editar Livro</a><br>

    <h1>Detalhes do Livro</h1>

    @if(session('success'))
        <p style="color:#086;">
            {{ session('success') }}
        </p>
    @endif

    <div>
        <p><strong>ID:</strong> {{ $book->id }}</p>
        <p><strong>Nome:</strong> {{ $book->name }}</p>
        <p><strong>Preço de Venda:</strong> R$ {{ number_format($book->sale_price, 2, ',', '.') }}</p>
        <p><strong>Preço de Compra:</strong> R$ {{ number_format($book->purchase_price, 2, ',', '.') }}</p>
        <p><strong>Quantidade:</strong> {{ $book->amount }}</p>
        <p><strong>Editora:</strong> {{ $book->publisher->name }}</p>
        <p><strong>Autor:</strong> {{ $book->author->name }}</p>
        <p><strong>Cadastrado em:</strong> {{ \Carbon\Carbon::parse($book->created_at)->format('d/m/Y H:i:s') }}</p>
        <p><strong>Editado em:</strong> {{ \Carbon\Carbon::parse($book->updated_at)->format('d/m/Y H:i:s') }}</p>
    </div>

    @if($book->image)
        <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->name }}">
    @else
        <p><strong>Imagem:</strong> Não disponível</p>
    @endif

</body>
</html>
