<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja Supermercado</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- AOS (Animate on Scroll) -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        body {
            padding-top: 70px;
            background-color: #f8f9fa;
        }
        .banner {
            background: linear-gradient(135deg, #0d6efd, #6610f2);
            color: white;
            height: 50vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .banner h1 {
            font-size: 3rem;
            font-weight: bold;
        }
        .banner p {
            font-size: 1.5rem;
        }
        .card {
            transition: transform 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        @media (max-width: 768px) {
            .banner h1 {
                font-size: 2rem;
            }
            .banner p {
                font-size: 1.1rem;
            }
            .card-img-top {
                height: 200px;
            }
        }
        @media (max-width: 576px) {
            .banner {
                height: 60vh;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top shadow">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Supermercado</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarLoja" aria-controls="navbarLoja" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarLoja">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-cart-fill"></i> Carrinho
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contato</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Banner -->
    <div class="banner">
        <h1>Bem-vindo à Nossa Loja!</h1>
        <p>Os melhores produtos para você e sua família</p>
    </div>

    <!-- Produtos -->
    <div class="container my-5">
        <div class="row">
            @foreach($produtos as $produto)
            <div class="col-md-4 mb-4" data-aos="fade-up">
                <div class="card shadow-lg border-0 h-100">
                    <img src="{{ asset('storage/'.$produto->foto) }}" class="card-img-top" alt="{{ $produto->nome }}" style="height: 250px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $produto->nome }}</h5>
                        <p class="card-text text-muted">{{ $produto->descricao }}</p>
                        <h6 class="mt-auto" style="color: #0d6efd;">R$ {{ number_format($produto->preco, 2, ',', '.') }}</h6>
                        <a href="#" class="btn btn-success mt-3">Comprar</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4 mt-5">
        <div class="container">
            <p class="mb-1">&copy; 2025 Supermercado Online. Todos os direitos reservados.</p>
            <small>Feito com ❤️ para nossos clientes</small>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS Animation JS -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>

</body>
</html>