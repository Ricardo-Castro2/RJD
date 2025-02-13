<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>criação venda</h1>
    


    <form action="{{ route('sale-store') }}" method="POST">
        @csrf
        @method('POST')
    
        <label>Comprador:</label>
        <select name="user_id" required>
            <option value="">Selecione um usuário</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
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
                        data-stock="{{ $book->amount }}">
                    {{ $book->name }} (R$ {{ number_format($book->sale_price, 2, ',', '.') }} | Estoque: {{ $book->amount }})
                </option>
            @endforeach
        </select>
        
        <br>
    
        <label>Quantidade:</label>
        <input type="number" name="quantity" id="quantity" placeholder="Quantidade" value="{{ old('quantity') }}" min="1" required>
        <br>
    
        <label>Valor Total:</label>
        <input type="text" id="total_value" placeholder="Valor total" readonly>
        <br>
    
        <button type="submit">Finalizar Venda</button>
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
                    quantityInput.value = stock; // Ajusta a quantidade para o estoque máximo
                }
    
                totalValueInput.value = "R$ " + (price * quantity).toFixed(2).replace(".", ",");
            }
    
            bookSelect.addEventListener("change", function () {
                updateTotal();
                quantityInput.value = 1; // Define um valor padrão
            });
    
            quantityInput.addEventListener("input", updateTotal);
        });
    </script>
</body>
</html>