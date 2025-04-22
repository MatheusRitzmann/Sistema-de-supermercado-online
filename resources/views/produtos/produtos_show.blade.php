@extends('template')

@section('conteudo')
    <h1>Produtos</h1>
    <table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Operações</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach($produtos as $produto)
            <tr>
                <td>{{ $produto->id }}</td>
                <td>{{ $produto->nome }}</td>
                <td>{{ $produto->preco }}</td>
                <td><a href="{{ route('produtos.alterar', ['id' => $produto->id]) }}" class="btn btn-info">Alterar</a></td>
                <td>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalExcluir">
                        Excluir
                    </button>
                </td>
            </tr>
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
                        <a href="{{ route('produtos.excluir', ['id' => $produto->id]) }}" class="btn btn-outline-danger">
                            Excluir
                        </a>
                        <button type="button" data-bs-dismiss="modal" class="btn btn-secondary">Cancelar</button>
                    </div>
                    </div>
                </div>
            </div>
        @endforeach
    </tbody>
    </table>
    <a href="{{ route('produtos.cadastrar') }}" class="btn btn-primary">Cadastrar Produto</a>
@endsection