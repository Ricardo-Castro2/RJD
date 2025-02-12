<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <form action="{{ route('author-store') }}" method="POST">
        @csrf
        @method('POST')

        <label>nome: </label>
        <input type="text" name="name" placeholder="Nome completo"  value="{{old('name')}}"><br>

        <button type="submit">Cadastrar autor</button>
    </form>

</body>
</html>