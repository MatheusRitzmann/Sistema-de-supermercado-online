@extends('produtos.template')

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
                    <td>
                        <a href="{{ route('produtos.alterar', ['id' => $produto->id]) }}" class="btn btn-info">Alterar</a>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalExcluir{{ $produto->id }}">
                            Excluir
                        </button>
                    </td>
                </tr>

                <!-- Modal de exclusão para este produto -->
                <div class="modal fade" id="modalExcluir{{ $produto->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $produto->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel{{ $produto->id }}">Excluir Produto</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                            </div>
                            <div class="modal-body">
                                Deseja excluir o produto <strong>{{ $produto->id }} - {{ $produto->nome }}</strong>?
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('produtos.excluir', ['id' => $produto->id]) }}" class="btn btn-outline-danger">Excluir</a>
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