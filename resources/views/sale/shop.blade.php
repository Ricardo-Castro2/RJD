<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Livros</title>
    <script>
        function confirmarCompra(event) {
            event.preventDefault(); // Impede o envio do formulário imediatamente
            const confirma = confirm("Você tem certeza que deseja comprar este livro?");
            
            if (confirma) {
                event.target.submit(); // Se o usuário confirmar, envia o formulário
            }
        }
    
        function atualizarTotal(input, preco, idTotal) {
            const quantidade = input.value;
            const total = preco * quantidade;
            document.getElementById(idTotal).innerText = 'R$ ' + total.toFixed(2).replace('.', ',');
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
                <th>Imagem</th>
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
                    <!-- Exibe a imagem do livro -->
                    <td>
                        @if($book->image)
                            <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->name }}" width="100">
                        @else
                            <p>Sem imagem</p>
                        @endif
                    </td>
                    <td>{{ $book->name }}</td>
                    <td>R$ {{ number_format($book->sale_price, 2, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('sale.confirm') }}" method="GET" onsubmit="confirmarCompra(event)">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                            <input type="hidden" name="book_id" value="{{ $book->id }}">
                            
                            <input type="number" name="quantity" min="1" max="{{ $book->amount }}" 
                                   required oninput="atualizarTotal(this, {{ $book->sale_price }}, 'total-{{ $book->id }}')">
                    </td>
                    <td id="total-{{ $book->id }}">R$ 0,00</td>
                    <td>
                        <button type="submit">Comprar</button>
                    </td>
                </form>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Sair</button>
    </form>

</body>
</html>
