<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <p>criação livro</p>


    <form action="{{ route('book-store') }}" method="POST">
        @csrf
        @method('POST')

        <label>nome: </label>
        <input type="text" name="name" placeholder="Nome completo"  value="{{old('name')}}"><br>

        <label>preco de venda: </label>
        <input type="number" name="sale_price" placeholder="preco de venda"  value="{{old('sale_price')}}"><br>

        <label>preço de compra: </label>
        <input type="number" name="purchase_price" placeholder="preço de compra"  value="{{old('purchase_price')}}"><br>

        <label>quantidade: </label>
        <input type="number" name="amount" placeholder="quantidade"  value="{{old('amount')}}"><br>
        

        <label>Editora: </label>
        <select name="publishers_id" required>
            <option value="">Selecione uma editora</option>
            @foreach($publishers as $publisher)
                <option value="{{ $publisher->id }}" {{ old('publisher_id') == $publisher->id ? 'selected' : '' }}>
                    {{ $publisher->name }}
                </option>
            @endforeach
        </select>

        <label>Autores: </label>
        <select name="authors_id" required>
            <option value="">Selecione uma editora</option>
            @foreach($authors as $author)
                <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>
                    {{ $author->name }}
                </option>
            @endforeach
        </select>



        
       
        
        <button type="submit">Cadastrar livro</button>
    </form>





</body>
</html>