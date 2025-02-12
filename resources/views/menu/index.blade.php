<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Menu</h1>
    <a href="{{ route('author.index') }}"> Autores </a> 
    <br>
    <a href="{{ route('publisher.index') }}"> editoras </a> 
    <br>
    <a href="{{ route('book.index') }}"> livros </a> 
    <br>
    <a href="{{ route('stock_item.index') }}"> estoque </a> 


    
</body>
</html>