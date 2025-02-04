<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <a href="{{ route('user.index') }}"> listar </a><br>
    <a href="{{ route('user.show',['user'=>$user->id]) }}">visualizar </a><br>
    <h1>editar usuario </h1>
    @if ($errors->any())
        @foreach($errors->all() as $error)
            <p style="color:#f00;">
                {{ $error }}
            </p>
        @endforeach
    @endif


    <form action="{{ route('user-update',['user'=>$user->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label>nome: </label>
        <input type="text" name="name" placeholder="Nome completo"  value="{{old('name',$user->name)}}"><br>

        <label>E-mail: </label>
        <input type="email" name="email" placeholder="melhor email do usuario" value="{{old('email', $user->email)}}"><br>

        <label>senha: </label>
        <input type="password" name="password" placeholder="senha minimo 6 caracteris" value="{{old('password')}}"><br>

        
        <button type="submit">editar</button>
    </form>

</body>
</html>