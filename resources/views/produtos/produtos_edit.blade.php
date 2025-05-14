@extends('produtos.template')

@section('conteudo')
    <h1>Editar Produto</h1>
    <form action="{{ route('admin.produtos.edit', ['id' => $produto->id]) }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Produto</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="{{ $produto->nome }}">
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
            <input type="number" setp="0.01" class="form-control" id="preco" name="preco" placeholder="R$ 0.00" 
            value="{{ $produto->preco }}">
        </div>
        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoria ID</label>
            <input type="number" class="form-control" id="categoria_id" name="categoria_id" placeholder="Categoria ID">
        </div>
        <input type="submit" value="Atualizar" class="btn btn-success">
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalExcluir">
            Excluir
        </button>
    </form>

    <div class="modal fade" id="modalExcluir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Deseja excluir o produto {{ $produto->id }} - {{ $produto->nome }}?
            </div>
            <div class="modal-footer">
                <a href="{{ route('admin.produtos.destroy', ['id' => $produto->id]) }}" class="btn btn-outline-danger">
                    Excluir
                </a>
                <button type="button" data-bs-dismiss="modal" class="btn btn-secondary">Cancelar</button>
            </div>
            </div>
        </div>
    </div>
@endsection