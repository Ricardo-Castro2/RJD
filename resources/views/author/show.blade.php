<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    ID:{{ $author->id }}<br>
    Nome: {{ $author->name }}<br>
   
    Cadastrado: {{  \Carbon\Carbon::parse($author->created_at)->format('d/m/Y H:i:s') }}<br>
    editado: {{  \Carbon\Carbon::parse($author->update_at)->format('d/m/Y H:i:s') }}<br>

    <a href="{{ route('author.index') }}"> Voltar </a>

    
</body>
</html>
