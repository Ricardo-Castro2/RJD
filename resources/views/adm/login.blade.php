<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <h2>Login</h2>

    <!-- Exibe mensagens de erro -->
    @if(session('error'))
        <div style="color: red;">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <p style="color:#086;">
            {{ session('success') }}
       
        </p>
    @endif

    <form action="{{ route('login-adm-logar') }}" method="POST">
        @csrf
        <label for="email">E-mail:</label>
        <input type="email" name="email" required><br><br>

        <label for="password">Senha:</label>
        <input type="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>

    <p>Não tem uma conta? <a href="{{ route('adm.create') }}">Criar uma conta</a></p>

</body>
</html>
