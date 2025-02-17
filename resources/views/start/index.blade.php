<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #6e8efb, #a777e3);
        }
        .container {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 250px;
            background: #343a40;
            color: white;
            padding: 20px;
            min-height: 100vh;
        }
        .sidebar h1 {
            font-size: 20px;
            margin-bottom: 15px;
        }
        .btn-custom {
            width: 100%;
            text-align: left;
            padding: 10px;
            margin: 10px 0;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            transition: 0.3s;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
        .content {
            flex: 1;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="sidebar">
            <h1>Login Admin</h1>
            <ul class="list-unstyled">
                <li>
                    <a href="{{ route('adm.login') }}" class="btn btn-custom">Usuário</a>
                </li>
            </ul>
            <h1>Login Cliente</h1>
            <ul class="list-unstyled">
                <li>
                    <a href="{{ route('user.login') }}" class="btn btn-custom">Shopping</a>
                </li>
            </ul>
        </div>
        <div class="content">
            <h2>Bem-vindo ao Painel</h2>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
