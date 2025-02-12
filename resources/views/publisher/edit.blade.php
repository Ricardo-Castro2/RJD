<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    

    <form action="{{ route('publisher-update',['publisher'=>$publisher->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label>nome: </label>
        <input type="text" name="name" placeholder="Nome completo"  value="{{old('name',$publisher->name)}}"><br>


        
        <button type="submit">editar</button>
    </form>

</body>
</html>