<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    
    

    <h1>listar vendas</h1>

    <a href="{{ route('admsale.create') }}"> criar  </a> 
    <br><hr>
    @if(session('success'))
        <p style="color:#086;">
            {{ session('success') }}
           
        </p>
    @endif

        


    @forelse ($sales as $sale)
        ID: {{ $sale->id }}<br>
        Nome: {{ $sale->book->name }}<br> <!-- Nome do livro -->
        Preço de venda: {{ $sale->book->sale_price }}<br> <!-- Preço de venda do livro -->
        Preço de compra: {{ $sale->book->purchase_price }}<br> <!-- Preço de compra do livro -->
        Quantidade: {{ $sale->quantity }}<br> <!-- Quantidade vendida -->
        Editora: {{ $sale->book->publisher ? $sale->book->publisher->name : 'Não especificado' }}<br>
        Autor: {{ $sale->book->author ? $sale->book->author->name : 'Não especificado' }}<br>

        <a href="{{ route('admsale.show',['sale' => $sale->id]) }}"> visualizar venda</a><br>
        <a href="{{ route('admsale.edit',['sale' => $sale->id]) }}"> editar venda </a><br>
        <a href="{{ route('admsale.destroy',['sale' => $sale->id]) }}"> apagar venda</a><br> 
        
    <hr>
    @empty
        <p>Nenhuma venda registrada.</p>
    @endforelse





</body>
</html>