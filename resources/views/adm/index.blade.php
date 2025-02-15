<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    
    <a href="{{ route('adm.create') }}"> criar  </a> 

    <h1>listar usuarios</h1>

    @if(session('success'))
        <p style="color:#086;">
            {{ session('success') }}
           
        </p>
    @endif

    {{--{{ dd($users)}}--}}

    @forelse ($adms as $adm)
        ID: {{ $adm->id }}<br>
        Nome: {{ $adm-> name }}<br>
        E-mail: {{ $adm->email }}<br>
        <a href="{{ route('adm.show',['adm' => $adm->id]) }}"> visualizar</a><br>
        <a href="{{ route('adm.edit',['adm' => $adm->id]) }}"> editar</a><br>
        <a href="{{ route('adm.destroy',['adm' => $adm->id]) }}"> apagar</a><br>
        <hr>
    @empty
        
    @endforelse


</body>
</html>
