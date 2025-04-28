@extends('produtos.template')

@section('conteudo')
    <h1>Produtos</h1>

    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-3">Voltar para o Dashboard</a>

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
                    <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('produtos.show', $produto->id) }}" class="btn btn-success btn-sm">Ver</a>
                        <a href="{{ route('produtos.alterar', $produto->id) }}" class="btn btn-info btn-sm">Alterar</a>
                        
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalExcluir{{ $produto->id }}">
                            Excluir
                        </button>
                    </td>
                </tr>

                <!-- Modal de exclusão -->
                <div class="modal fade" id="modalExcluir{{ $produto->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $produto->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="modalLabel{{ $produto->id }}">Excluir Produto</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                            </div>
                            <div class="modal-body">
                                Deseja realmente excluir o produto <strong>{{ $produto->nome }}</strong>?
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('produtos.excluir', $produto->id) }}" class="btn btn-outline-danger">Excluir</a>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('produtos.cadastrar') }}" class="btn btn-primary">Cadastrar Produto</a>
@endsection