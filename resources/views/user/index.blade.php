<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    


    <h1>listar usuarios</h1>

    @if(session('success'))
        <p style="color:#086;">
            {{ session('success') }}
           
        </p>
    @endif

    {{--{{ dd($users)}}--}}

    @forelse ($users as $user)
        ID: {{ $user->id }}<br>
        Nome: {{ $user-> name }}<br>
        E-mail: {{ $user->email }}<br>
        <a href="{{ route('user.show',['user' => $user->id]) }}"> visualizar</a><br>
        <a href="{{ route('user.edit',['user' => $user->id]) }}"> editar</a><br>
        <a href="{{ route('user.destroy',['user' => $user->id]) }}"> apagar</a><br>
        <hr>
    @empty
        
    @endforelse


</body>
</html>
