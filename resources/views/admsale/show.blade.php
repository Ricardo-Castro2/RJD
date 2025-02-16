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
        <p style="color:#086;">
            {{ session('success') }}
        </p>
    @endif

    <p><strong>ID da Venda:</strong> {{ $sale->id }}</p>
    <p><strong>Comprador:</strong> {{ $sale->user->name ?? 'Não informado' }}</p>
    <p><strong>Livro:</strong> {{ $sale->book->name }}</p>
    <p><strong>Quantidade:</strong> {{ $sale->quantity }}</p>
    <p><strong>Valor Total:</strong> R$ {{ number_format($sale->total_value, 2, ',', '.') }}</p>
    <p><strong>Data da Compra:</strong> {{ \Carbon\Carbon::parse($sale->created_at)->format('d/m/Y H:i:s') }}</p>
    <p><strong>Última Atualização:</strong> {{ \Carbon\Carbon::parse($sale->updated_at)->format('d/m/Y H:i:s') }}</p>

</body>
</html>

