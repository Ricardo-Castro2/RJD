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
        .btn {
            display: flex;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            margin: 5px;
            border-radius: 5px;
            transition: 0.3s;
            border: none;
            cursor: pointer;
            font-size: 16px;
            height: 10%;
        }

        .btn:hover {
            background-color: #0056b3;
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
    <a href="{{ route('user.index') }}"> clientes usuarios </a> 
    <br>
    <a href="{{ route('adm.index') }}"> adm usuarios</a> 
    <br>
    <a href="{{ route('admsale.create') }}"> criar venda como adm </a> 
    <br>
    <a href="{{ route('admsale.index') }}"> ver vendas </a> 
    <br>

    <a href="{{ route('adm.index') }}"> adm </a> 

    <form action="{{ route('logout-adm') }}" method="POST">
        @csrf
        <button type="submit">Sair</button>
    </form>


</body>
</html>