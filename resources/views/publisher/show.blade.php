<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

  
    


    ID:{{ $publisher->id }}<br>
    Nome: {{ $publisher->name }}<br>
    E-mail: {{ $publisher->email }}<br>
    Cadastrado: {{  \Carbon\Carbon::parse($publisher->created_at)->format('d/m/Y H:i:s') }}<br>
    editado: {{  \Carbon\Carbon::parse($publisher->update_at)->format('d/m/Y H:i:s') }}<br>
    
    <a href="{{ route('publisher.index') }}"> voltar </a><br>
    
</body>
</html>
