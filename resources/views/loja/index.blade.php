<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
      background-color: #ffffff;
    }

    .banner {
      position: relative;
      height: 60vh;
      background: linear-gradient(135deg, #0d6efd, #6610f2);
      overflow: hidden;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
    }

    .banner-icons {
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      pointer-events: none;
    }

    .banner-icons i {
      position: absolute;
      color: white;
      opacity: 0.15;
      font-size: 1.3rem;
    }

    .card {
      transition: transform 0.3s, box-shadow 0.3s;
      border-radius: 1rem;
      background-color: #f8f9fa;
    }

    .card:hover {
      transform: scale(1.05);
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    }

    footer {
      background: linear-gradient(90deg, #0d6efd 0%, #6610f2 100%);
    }

    @media (max-width: 768px) {
      .banner {
        height: 50vh;
      }
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow" style="background: linear-gradient(90deg, #0d6efd 0%, #6610f2 100%);">
  <div class="container">
    <a class="navbar-brand fw-bold" href="/">Supermercado</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarLoja" aria-controls="navbarLoja" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarLoja">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" href="#">Produtos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="bi bi-cart-fill"></i> Carrinho</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contato</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/admin"><i class="bi bi-shield-lock-fill"></i> Administração</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Banner -->
<div class="banner">
  <div class="banner-icons">
    <!-- Ícones espalhados -->
    <i class="bi bi-bag" style="top: 10%; left: 20%; transform: rotate(15deg);"></i>
    <i class="bi bi-box-seam" style="top: 30%; left: 50%; transform: rotate(-25deg);"></i>
    <i class="bi bi-cash-stack" style="top: 60%; left: 15%; transform: rotate(45deg);"></i>
    <i class="bi bi-basket" style="top: 70%; left: 70%; transform: rotate(-10deg);"></i>
    <i class="bi bi-credit-card" style="top: 20%; left: 75%; transform: rotate(30deg);"></i>
    <i class="bi bi-truck" style="top: 50%; left: 85%; transform: rotate(-45deg);"></i>
    <i class="bi bi-shop" style="top: 80%; left: 40%; transform: rotate(60deg);"></i>
    <i class="bi bi-bag-check" style="top: 35%; left: 25%; transform: rotate(-30deg);"></i>
    <i class="bi bi-cart3" style="top: 5%; left: 60%; transform: rotate(20deg);"></i>
    <i class="bi bi-tags" style="top: 75%; left: 10%; transform: rotate(-20deg);"></i>
    <i class="bi bi-bag-heart" style="top: 15%; left: 10%; transform: rotate(5deg);"></i>
    <i class="bi bi-cart-check" style="top: 25%; left: 30%; transform: rotate(-35deg);"></i>
    <i class="bi bi-currency-dollar" style="top: 45%; left: 60%; transform: rotate(40deg);"></i>
    <i class="bi bi-shop-window" style="top: 65%; left: 80%; transform: rotate(-50deg);"></i>
    <i class="bi bi-cup-straw" style="top: 55%; left: 20%; transform: rotate(15deg);"></i>
    <i class="bi bi-box" style="top: 5%; left: 40%; transform: rotate(-15deg);"></i>
    <i class="bi bi-shop" style="top: 85%; left: 90%; transform: rotate(60deg);"></i>
    <i class="bi bi-truck-front" style="top: 10%; left: 80%; transform: rotate(10deg);"></i>
    <i class="bi bi-wallet2" style="top: 40%; left: 90%; transform: rotate(-20deg);"></i>
    <i class="bi bi-gift" style="top: 85%; left: 5%; transform: rotate(45deg);"></i>
    <!-- Pode adicionar mais se quiser -->
  </div>

  <!-- Texto Principal -->
  <div class="p-4 bg-white bg-opacity-25 rounded-4 shadow-lg" data-aos="zoom-in">
    <h1 class="text-white fw-bold mb-3">Bem-vindo à Nossa Loja!</h1>
    <p class="text-white-50 fs-4">Os melhores produtos para você e sua família</p>
  </div>
</div>

<!-- Produtos -->
<div class="container my-5">
  <div class="row">
    @foreach($produtos as $produto)
    <div class="col-md-4 mb-4" data-aos="fade-up">
      <div class="card shadow-lg border-0 h-100">
        <img src="{{ asset('storage/' . ($produto->fotos->first()->arquivo ?? 'sem-imagem.png')) }}" class="card-img-top" alt="{{ $produto->nome }}" style="height: 250px; object-fit: cover;">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">{{ $produto->nome }}</h5>
          <p class="card-text text-muted">{{ Str::limit($produto->descricao, 100) }}</p> <!-- Limita o tamanho da descrição -->
          <h6 class="mt-auto fw-bold" style="color: #0d6efd;">R$ {{ number_format($produto->preco, 2, ',', '.') }}</h6>
          <div class="d-grid gap-2 mt-3">
            <a href="#" class="btn btn-success rounded-pill">Comprar</a>
            <a href="{{ route('loja.show', $produto->id) }}" class="btn btn-outline-primary rounded-pill">Ver Detalhes</a>

          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

<!-- Footer -->
<footer class="text-white text-center py-4 mt-5">
  <div class="container">
    <p class="mb-1">&copy; 2025 Supermercado Online. Todos os direitos reservados.</p>
    <small>Feito de fã para fã!</small>
  </div>
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 1000,
    once: true
  });
</script>

</body>
</html>