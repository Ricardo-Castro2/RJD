<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Compra</title>
</head>
<body>

    <h2>Confirmar Compra</h2>
    <p>Você está prestes a comprar o livro: <strong>{{ $book->name }}</strong></p>
    <p>Quantidade: <strong>{{ $quantity }}</strong></p>
    <p>Total: <strong>R$ {{ number_format($total, 2, ',', '.') }}</strong></p>
    
    <form action="{{ route('sale-store') }}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
        <input type="hidden" name="book_id" value="{{ $book->id }}">
        <input type="hidden" name="quantity" value="{{ $quantity }}">
        <input type="hidden" name="total_value" value="{{ $total }}">
        <button type="submit">Confirmar Compra</button>
    </form>
    
    <a href="{{ route('sale.shop') }}">Cancelar</a>
    

</body>
</html>
