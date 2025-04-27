@extends('produtos.template')

@section('conteudo')
    <h1>Escolher Produto para Gerenciar Fotos</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produtos as $produto)
                <tr>
                    <td>{{ $produto->nome }}</td>
                    <td>
                        <a href="{{ route('admin.fotos.index', ['produto' => $produto->id]) }}" class="btn btn-primary btn-sm">
                            Gerenciar Fotos
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
