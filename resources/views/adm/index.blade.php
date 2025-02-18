<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 70px;
            background: linear-gradient(135deg, #6e8efb, #a777e3);
        }
        .container {
            max-width: 100%;
        }
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 15px;
        }
    </style>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Menu Adm</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto text-center">
                    <li class="nav-item"><a class="nav-link" href="{{ route('author.index') }}">Autores</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('publisher.index') }}">Editoras</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('book.index') }}">Livros</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('user.index') }}">Clientes Usuários</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('adm.index') }}">ADM Usuários</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admsale.create') }}">Criar Venda</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admsale.index') }}">Vendas</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container text-center">
        <form action="{{ route('logout-adm') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger mt-3">Sair</button>
        </form>
    </div>
    
    <footer class="footer bg-dark text-white text-center py-3 mt-5">
        <p>© 2025 Admin Panel</p>
    </footer>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
