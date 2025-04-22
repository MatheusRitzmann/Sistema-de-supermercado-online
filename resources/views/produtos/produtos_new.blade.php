@extends('template')

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
            <input type="text" class="form-control" id="descricao" name="descricao" placeholder="descricao">
        </div>
        <div class="mb-3">
            <label for="quantidade" class="form-label">quantidade</label>
            <input type="number"  class="form-control" id="quantidade" name="quantidade" placeholder="quantidade">
        </div>
        <div class="mb-3">
            <label for="preco" class="form-label">Valor do Produto</label>
            <input type="number" step="0.01" class="form-control" id="preco" name="preco" placeholder="R$ 0.00">
        </div>
        <div class="mb-3">
            <label for="categoria" class="form-label">categoria id</label>
            <input type="number" class="form-control" id="categoria" name="categoria" placeholder="categoria id">
        </div>
        <input type="submit" value="Cadastrar" class="btn btn-success">
    </form>
@endsection