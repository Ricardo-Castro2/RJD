<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Livros</title>
    <script>
        function atualizarTotal(input, preco, totalId) {
            let quantidade = input.value;
            let total = preco * quantidade;
            document.getElementById(totalId).textContent = "R$ " + total.toFixed(2).replace(".", ",");
        }
    </script>
</head>
<body>

    <h2>Loja de Livros</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Total</th>
                <th>Comprar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->name }}</td>
                    <td>R$ {{ number_format($book->sale_price, 2, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('sale.confirm') }}" method="GET">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                            <input type="hidden" name="book_id" value="{{ $book->id }}">
                            
                            <input type="number" name="quantity" min="1" max="{{ $book->amount }}" 
                                   required oninput="atualizarTotal(this, {{ $book->sale_price }}, 'total-{{ $book->id }}')">
                    </td>
                    <td id="total-{{ $book->id }}">R$ 0,00</td>
                    <td>
                            <button type="submit">Comprar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
