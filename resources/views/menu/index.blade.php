<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        
        .header {
            display: flex;
            justify-content: space-between;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #333;
            color: white;
            text-align: center;
            padding: 15px 0;
        }

        
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #333;
            color: white;
            text-align: center;
            padding: 15px 0;
        }

        /* Conteúdo principal para não ficar coberto pelo cabeçalho */
        .content {
            margin-top: 100px; /* Espaço para o cabeçalho */
            margin-bottom: 60px; /* Espaço para o rodapé */
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

    <h1>Menu Adm</h1>

    <a href="{{ route('author.index') }}"> Autores </a> 
    <br>
    <a href="{{ route('publisher.index') }}"> editoras </a> 
    <br>
    <a href="{{ route('book.index') }}"> livros </a> 
    <br>
    <a href="{{ route('user.index') }}"> usuario </a> 
    <br>
    <a href="{{ route('adm.index') }}"> adm </a> 


    


    <div class="header">
        <h1>Menu Adm</h1>
        <a href="{{ route('author.index') }}"> Autores </a> 
        <br>
        <a href="{{ route('publisher.index') }}"> editoras </a> 
        <br>
        <a href="{{ route('book.index') }}"> livros </a> 
        <br>
        <a href="{{ route('user.index') }}"> usuario </a> 
        <br>

        <h1>Menu cliente</h1>
        <a href="{{ route('user.login') }}"> shoping </a> 
    </div>

    <form action="{{ route('logout-adm') }}" method="POST">
        @csrf
        <button type="submit">Sair</button>
    </form>

    <br>


    <div class="content">
        
    </div>

    <div class="footer">
        <p></p>
    </div>
</body>
</html>