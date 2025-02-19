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
            width: 100%;
            bottom: 0;
        }
        .container {
            margin-top: 20px;
        }
        .carousel-item img {
            max-height: 400px;
            object-fit: cover;
            width: 100%;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Menu Cliente</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('sale.shop') }}">🛒 Shopping</a></li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link text-white" style="border: none; cursor: pointer;">Sair</button>
                    </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container text-center">
        <h2>Bem-vindo ao menu Cliente</h2>
        
<!-- Carousel -->
<div id="carouselBanners" class="carousel slide mt-4" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://m.media-amazon.com/images/I/81YOuOGFCJL._AC_SL1500_.jpg" class="d-block w-100" alt="Harry Potter">
            <div class="carousel-caption d-none d-md-block">
                <h5>Harry Potter</h5>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://m.media-amazon.com/images/I/91b0C2YNSrL._AC_SL1500_.jpg" class="d-block w-100" alt="Game of Thrones">
            <div class="carousel-caption d-none d-md-block">
                <h5>Game of Thrones</h5>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://m.media-amazon.com/images/I/91VokXkn8hL._AC_SL1500_.jpg" class="d-block w-100" alt="Percy Jackson">
            <div class="carousel-caption d-none d-md-block">
                <h5>Percy Jackson</h5>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://m.media-amazon.com/images/I/81aA7hEEykL._AC_SL1500_.jpg" class="d-block w-100" alt="As Crônicas de Nárnia">
            <div class="carousel-caption d-none d-md-block">
                <h5>As Crônicas de Nárnia</h5>
            </div>
        </div>
    </div>
</div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselBanners" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselBanners" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>

    <!-- Footer -->
    <div class="footer">
        <p>© 2025 </p>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

