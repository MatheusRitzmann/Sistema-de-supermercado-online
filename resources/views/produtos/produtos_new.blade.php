@extends('produtos.template')

@section('conteudo')
    <h1>Cadastro de Produtos</h1>
    <form action="{{ route('produtos.inserir') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Produto</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição">
        </div>
        <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade</label>
            <input type="number" class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade">
        </div>
        <div class="mb-3">
            <label for="preco" class="form-label">Valor do Produto</label>
            <input type="number" step="0.01" class="form-control" id="preco" name="preco" placeholder="R$ 0.00">
        </div>
        <div class="mb-3">
            <label for="categoria" class="form-label">Categoria</label>
            <select class="form-select" aria-label="Default select example" id="categoria" name="categoria_id" required>
                <option selected value="">Selecione uma categoria</option>
                @foreach ($categoriass as $cat)
                <option value="{{ $cat->id }}">{{ $cat->nome }}</option>
                @endforeach
            </select>
        <input type="submit" value="Cadastrar" class="btn btn-success">
    </form>
@endsection
