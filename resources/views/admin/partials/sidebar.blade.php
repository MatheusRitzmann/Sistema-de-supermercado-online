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