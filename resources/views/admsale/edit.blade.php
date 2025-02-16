<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Venda</title>
    <script>
        function atualizarTotal(input, preco, totalId) {
            let quantidade = input.value;
            let total = preco * quantidade;
            document.getElementById(totalId).textContent = "R$ " + total.toFixed(2).replace(".", ",");
        }
    </script>
</head>
<body>

    <h1>Edição de Venda</h1>

    <form action="{{ route('admsale-update', ['sale' => $sale->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Comprador:</label>
        <select name="user_id" required>
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
                        data-image="{{ asset('storage/' . $book->image) }}"
                        {{ $sale->book_id == $book->id ? 'selected' : '' }}>
                    {{ $book->name }} (R$ {{ number_format($book->sale_price, 2, ',', '.') }} | Estoque: {{ $book->amount + $sale->quantity }})
                </option>
            @endforeach
        </select>
        <br>

        <!-- Exibição da imagem do livro -->
        <div id="book-image" style="margin-top: 10px;">
            <h3>Imagem do Livro:</h3>
            <img id="book-image-preview" src="{{ asset('storage/' . $sale->book->image) }}" alt="Imagem do Livro" style="max-width: 150px; height: auto;">
        </div>

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
            const bookImagePreview = document.getElementById("book-image-preview");

            function updateTotal() {
                const selectedBook = bookSelect.options[bookSelect.selectedIndex];
                const price = parseFloat(selectedBook.getAttribute("data-price")) || 0;
                const stock = parseInt(selectedBook.getAttribute("data-stock")) || 0;
                const quantity = parseInt(quantityInput.value) || 1;

                if (quantity > stock) {
                    alert("Quantidade maior que o estoque disponível!");
                    quantityInput.value = stock; // Ajusta a quantidade para o estoque máximo
                }

                totalValueInput.value = "R$ " + (price * quantity).toFixed(2).replace(".", ",");
            }

            bookSelect.addEventListener("change", function () {
                updateTotal();
                quantityInput.value = 1; // Define um valor padrão

                // Atualiza a imagem do livro selecionado
                const selectedBook = bookSelect.options[bookSelect.selectedIndex];
                const imageUrl = selectedBook.getAttribute("data-image");
                bookImagePreview.src = imageUrl;
            });

            quantityInput.addEventListener("input", updateTotal);

            updateTotal(); // Atualiza ao carregar a página
        });
    </script>

</body>
</html>
