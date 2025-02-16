<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Venda</title>
</head>
<body>

    <h1>Editar Venda</h1>

    <form action="{{ route('admsale-update', $sale->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Comprador:</label>
        <select name="user_id">
            <option value="">Selecione um usuário</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $sale->user_id == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
        <br>

        <label>Livro:</label>
        <select name="book_id" id="book_id" required>
            <option value="">Selecione um livro</option>
            @foreach($books as $book)
                <option value="{{ $book->id }}" 
                        data-price="{{ $book->sale_price }}" 
                        data-stock="{{ $book->amount + $sale->quantity }}"
                        {{ $sale->book_id == $book->id ? 'selected' : '' }}>
                    {{ $book->name }} (R$ {{ number_format($book->sale_price, 2, ',', '.') }} | Estoque: {{ $book->amount + $sale->quantity }})
                </option>
            @endforeach
        </select>
        <br>

        <label>Quantidade:</label>
        <input type="number" name="quantity" id="quantity" placeholder="Quantidade" value="{{ $sale->quantity }}" min="1" required>
        <br>

        <label>Valor Total:</label>
        <input type="text" id="total_value" placeholder="Valor total" readonly value="R$ {{ number_format($sale->total_value, 2, ',', '.') }}">
        <br>

        <button type="submit">Atualizar Venda</button>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const bookSelect = document.getElementById("book_id");
            const quantityInput = document.getElementById("quantity");
            const totalValueInput = document.getElementById("total_value");

            function updateTotal() {
                const selectedBook = bookSelect.options[bookSelect.selectedIndex];
                const price = parseFloat(selectedBook.getAttribute("data-price")) || 0;
                const stock = parseInt(selectedBook.getAttribute("data-stock")) || 0;
                const quantity = parseInt(quantityInput.value) || 1;

                if (quantity > stock) {
                    alert("Quantidade maior que o estoque disponível!");
                    quantityInput.value = stock;
                }

                totalValueInput.value = "R$ " + (price * quantity).toFixed(2).replace(".", ",");
            }

            bookSelect.addEventListener("change", function () {
                updateTotal();
                quantityInput.value = 1;
            });

            quantityInput.addEventListener("input", updateTotal);

            updateTotal(); // Atualiza ao carregar a página
        });
    </script>
</body>
</html>
