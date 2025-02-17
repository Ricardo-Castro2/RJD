<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Menu</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 70px; /* Adjust for fixed navbar */
        }
        .navbar {
            background-color: #343a40;
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .footer {
            position: fixed;
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 15px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
        .container {
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Menu Adm</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('author.index') }}">Autores</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('publisher.index') }}">Editoras</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('book.index') }}">Livros</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('user.index') }}">Clientes</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('adm.index') }}">Admin Usuários</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admsale.create') }}">Criar Venda</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admsale.index') }}">Vendas</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container text-center">
        <h2>Bem-vindo ao painel administrativo</h2>
        <form action="{{ route('logout-adm') }}" method="POST" class="mt-4">
            @csrf
            <button type="submit" class="btn btn-danger">Sair</button>
        </form>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>© 2025 Admin Panel</p>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
