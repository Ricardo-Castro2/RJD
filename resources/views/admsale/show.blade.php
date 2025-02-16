<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes da Venda</title>
</head>
<body>

    <a href="{{ route('admsale.index') }}">Listar Vendas</a><br>
    <a href="{{ route('admsale.edit', ['sale' => $sale->id]) }}">Editar Venda</a><br>

    <h1>Visualizar Venda</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <div class="sale-details">
        <p><strong>ID da Venda:</strong> {{ $sale->id }}</p>

        @if($sale->book && $sale->book->image)
            <div class="book-image">
                <img src="{{ asset('storage/' . $sale->book->image) }}" alt="{{ $sale->book->name }}" width="200">
            </div>
        @endif

        <p><strong>Comprador:</strong> {{ $sale->user->name ?? 'Não informado' }}</p>
        <p><strong>Livro:</strong> {{ $sale->book->name }}</p>
        <p><strong>Quantidade:</strong> {{ $sale->quantity }}</p>
        <p><strong>Valor Total:</strong> R$ {{ number_format($sale->total_value, 2, ',', '.') }}</p>
    </div>

</body>
</html>
