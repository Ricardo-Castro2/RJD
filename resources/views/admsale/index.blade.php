<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Vendas</title>
</head>
<body>
    
    <h1>Listar Vendas</h1>

    <a href="{{ route('admsale.create') }}">Criar Venda</a> 
    <br><hr>
    
    @if(session('success'))
        <p style="color:#086;">
            {{ session('success') }}
        </p>
    @endif

    @forelse ($sales as $sale)
        <p><strong>ID:</strong> {{ $sale->id }}</p>
        <p><strong>Livro:</strong> {{ $sale->book->name }}</p>
        <p><strong>Preço de Venda:</strong> R$ {{ number_format($sale->book->sale_price, 2, ',', '.') }}</p>
        <p><strong>Preço de Compra:</strong> R$ {{ number_format($sale->book->purchase_price, 2, ',', '.') }}</p>
        <p><strong>Quantidade Vendida:</strong> {{ $sale->quantity }}</p>
        <p><strong>Editora:</strong> {{ $sale->book->publisher ? $sale->book->publisher->name : 'Não especificado' }}</p>
        <p><strong>Autor:</strong> {{ $sale->book->author ? $sale->book->author->name : 'Não especificado' }}</p>

        @if($sale->book->image)
            <img src="{{ asset('storage/' . $sale->book->image) }}" alt="{{ $sale->book->name }}" width="200">
        @else
            <p>Imagem não disponível.</p>
        @endif

        <a href="{{ route('admsale.show', ['sale' => $sale->id]) }}">Visualizar Venda</a><br>
        <a href="{{ route('admsale.edit', ['sale' => $sale->id]) }}">Editar Venda</a><br>
        <a href="{{ route('admsale.destroy', ['sale' => $sale->id]) }}">Apagar Venda</a><br> 
        
        <hr>
    @empty
        <p>Nenhuma venda registrada.</p>
    @endforelse
</body>
</html>
