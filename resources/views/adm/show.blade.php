<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <a href="{{ route('adm.index') }}"> listar </a><br>
    <a href="{{ route('adm.edit',['adm'=>$adm->id]) }}">editar </a><br>

    <h1>visualizar usuario </h1>
    @if(session('success'))
        <p style="color:#086;">
            {{ session('success') }}
           
        </p>
    @endif

    ID:{{ $adm->id }}<br>
    Nome: {{ $adm->name }}<br>
    E-mail: {{ $adm->email }}<br>
    Cadastrado: {{  \Carbon\Carbon::parse($adm->created_at)->format('d/m/Y H:i:s') }}<br>
    editado: {{  \Carbon\Carbon::parse($adm->update_at)->format('d/m/Y H:i:s') }}<br>

    
</body>
</html>
