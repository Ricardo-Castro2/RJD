<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Livro</title>
</head>
<body>
    <h1>Cadastro de Livro</h1>
    
    @if ($errors->any())
        <div>
            <strong>Erro!</strong> Verifique os campos abaixo:<br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('book-store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" placeholder="Nome do livro" value="{{ old('name') }}" required><br>

        <label for="sale_price">Preço de Venda:</label>
        <input type="number" step="0.01" id="sale_price" name="sale_price" placeholder="Preço de venda" value="{{ old('sale_price') }}" required><br>

        <label for="purchase_price">Preço de Compra:</label>
        <input type="number" step="0.01" id="purchase_price" name="purchase_price" placeholder="Preço de compra" value="{{ old('purchase_price') }}" required><br>

        <label for="amount">Quantidade:</label>
        <input type="number" id="amount" name="amount" placeholder="Quantidade" value="{{ old('amount') }}" required><br>
        
        <label for="publishers_id">Editora:</label>
        <select name="publishers_id" id="publishers_id" required>
            <option value="">Selecione uma editora</option>
            @foreach($publishers as $publisher)
                <option value="{{ $publisher->id }}" {{ old('publishers_id') == $publisher->id ? 'selected' : '' }}>
                    {{ $publisher->name }}
                </option>
            @endforeach
        </select><br>

        <label for="authors_id">Autor:</label>
        <select name="authors_id" id="authors_id" required>
            <option value="">Selecione um autor</option>
            @foreach($authors as $author)
                <option value="{{ $author->id }}" {{ old('authors_id') == $author->id ? 'selected' : '' }}>
                    {{ $author->name }}
                </option>
            @endforeach
        </select><br>

        <label for="image">Imagem do Livro:</label>
        <input type="file" name="image" id="image" accept="image/*"><br>

        <button type="submit">Cadastrar Livro</button>
    </form>
</body>
</html>
