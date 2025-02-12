<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <a href="{{ route('user.index') }}"> listar </a> 
    <p>criação livro</p>

    @if ($errors->any())
        
        @foreach($errors->all() as $error)
            <p style="color:#f00;">
                {{ $error }}
            </p>
        @endforeach
        
    @endif


    <form action="{{ route('user-store') }}" method="POST">
        @csrf
        @method('POST')

        <label>nome: </label>
        <input type="text" name="name" placeholder="Nome completo"  value="{{old('name')}}"><br>

        <label>E-mail: </label>
        <input type="email" name="email" placeholder="melhor email do usuario" value="{{old('email')}}"><br>

        <label>senha: </label>
        <input type="password" name="password" placeholder="senha minimo 6 caracteris" value="{{old('password')}}"><br>

        
        <button type="submit">Cadastrar livro</button>
    </form>





</body>
</html>