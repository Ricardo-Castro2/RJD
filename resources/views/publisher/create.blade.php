<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <p>criação editora</p>


    <form action="{{ route('publisher-store') }}" method="POST">
        @csrf
        @method('POST')

        <label>nome: </label>
        <input type="text" name="name" placeholder="Nome completo"  value="{{old('name')}}"><br>

        <button type="submit">Cadastrar livro</button>

    </form>





</body>
</html>