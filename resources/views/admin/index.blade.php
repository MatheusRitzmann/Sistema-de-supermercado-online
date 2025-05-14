<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            background-color: #f8f9fa;
        }
        .sidebar {
            width: 250px;
            background-color: #212529;
            color: #fff;
            display: flex;
            flex-direction: column;
        }
        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            transition: background 0.3s, color 0.3s;
        }
        .sidebar a:hover {
            background-color: #343a40;
            color: #fff;
        }
        .sidebar a i {
            margin-right: 10px;
        }
        .content {
            flex: 1;
            padding: 30px;
        }
        .sidebar-header {
            font-size: 1.5rem;
            text-align: center;
            padding: 20px 0;
            border-bottom: 1px solid #495057;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="sidebar-header">
            <i class="bi bi-speedometer2"></i> Admin
        </div>

        <a href="{{ route('loja.index') }}">
            <i class="bi bi-shop"></i> Ir para Loja
        </a>

        <a href="{{ route('admin.dashboard') }}">
            <i class="bi bi-house-door-fill"></i> Dashboard
        </a>

        <a href="{{ route('admin.cidades.index') }}">
            <i class="bi bi-geo-alt-fill"></i> Cidades
        </a>

        <a href="{{ route('admin.enderecos.index') }}">
            <i class="bi bi-geo-fill"></i> Endereços
        </a>

        <a href="{{ route('admin.produtos.index') }}">
            <i class="bi bi-box-seam"></i> Produtos
        </a>

        <a href="{{ route('admin.fotos.listagem') }}">
            <i class="bi bi-image-fill"></i> Fotos de Produtos
        </a>

        <a href="{{ route('admin.vendas.index') }}">
            <i class="bi bi-cart-fill"></i> Vendas
        </a>

        <a href="{{ route('admin.categorias.index') }}">
            <i class="bi bi-tags-fill"></i> Categorias
        </a>
    </div>

    <div class="content">
        <h1 class="mb-4">Bem-vindo ao Painel Administrativo</h1>

        <div class="row">
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-box-seam"></i> Produtos</h5>
                        <p class="card-text">Gerencie os produtos cadastrados.</p>
                        <a href="{{ route('admin.produtos.index') }}" class="btn btn-light">Ver Produtos</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-tags-fill"></i> Categorias</h5>
                        <p class="card-text">Gerencie as categorias disponíveis.</p>
                        <a href="{{ route('admin.categorias.index') }}" class="btn btn-light">Ver Categorias</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card text-white bg-warning">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-geo-alt-fill"></i> Cidades</h5>
                        <p class="card-text">Gerencie as cidades registradas.</p>
                        <a href="{{ route('admin.cidades.index') }}" class="btn btn-light">Ver Cidades</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card text-white bg-info">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-geo-fill"></i> Endereços</h5>
                        <p class="card-text">Visualize e edite endereços.</p>
                        <a href="{{ route('admin.enderecos.index') }}" class="btn btn-light">Ver Endereços</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card text-white bg-dark">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-image-fill"></i> Fotos de Produtos</h5>
                        <p class="card-text">Gerencie imagens de produtos.</p>
                        <a href="{{ route('admin.fotos.listagem') }}" class="btn btn-light">Ver Fotos</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card text-white bg-secondary">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-cart-fill"></i> Vendas</h5>
                        <p class="card-text">Acompanhe as vendas realizadas.</p>
                        <a href="{{ route('admin.vendas.index') }}" class="btn btn-light">Ver Vendas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>