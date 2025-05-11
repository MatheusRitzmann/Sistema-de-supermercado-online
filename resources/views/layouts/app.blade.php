<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Admin - @yield('title')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        /* Seu CSS personalizado aqui */
        body { background-color: #f8f9fa; }
        .sidebar { 
            width: 250px;
            background-color:rgb(28, 63, 98);
            min-height: 100vh;
            padding: 20px;
        }
        .sidebar {
    width: 250px;
    background-color: #212529;
    color: #fff;
    min-height: 100vh;
    padding: 20px;
}

.sidebar a {
    color: #adb5bd;
    text-decoration: none;
    padding: 10px 15px;
    display: block;
    transition: all 0.3s;
}

.sidebar a:hover {
    color: #fff;
    background-color: #343a40;
}

.sidebar a i {
    margin-right: 10px;
}

.sidebar-header {
    font-size: 1.2rem;
    padding: 10px 15px;
    margin-bottom: 20px;
    border-bottom: 1px solid #495057;
}
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Inclui o sidebar -->
        @include('admin.partials.sidebar')
        
        <!-- Área de conteúdo -->
        <main class="flex-grow-1 p-4">
            @yield('content')
        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>