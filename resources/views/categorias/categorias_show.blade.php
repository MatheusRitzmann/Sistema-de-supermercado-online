@extends('produtos.template')


@section('conteudo')
    <h1>Categorias</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Descrição</th>
                <th>Operações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->descricao }}</td>
                    <td><a href="{{ route('categoria.alterar', ['id' => $categoria->id]) }}" class="btn btn-info">Alterar</a></td>
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
                            Deseja excluir a categoria {{ $categoria->id }} - {{ $categoria->descricao }}?
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('categoria.excluir', ['id' => $categoria->id]) }}" class="btn btn-outline-danger">
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
    <a href="{{ route('categoria.cadastrar') }}" class="btn btn-primary">Cadastrar Categoria</a>
@endsection