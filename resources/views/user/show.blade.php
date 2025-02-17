<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <a href="{{ route('user.index') }}"> listar </a><br>
    <a href="{{ route('user.edit',['user'=>$user->id]) }}">editar </a><br>

    <h1>visualizar usuario </h1>
    @if(session('success'))
        <p style="color:#086;">
            {{ session('success') }}
           
        </p>
    @endif

    ID:{{ $user->id }}<br>
    Nome: {{ $user->name }}<br>
    E-mail: {{ $user->email }}<br>
    Cadastrado: {{  \Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i:s') }}<br>
    editado: {{  \Carbon\Carbon::parse($user->update_at)->format('d/m/Y H:i:s') }}<br>

    
</body>
</html>