@extends('layouts.app')

@section('content')

    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark mb-3">
        ← Voltar para o Dashboard
    </a> {{-- <-- Aqui fecha certinho o link --}}

    <div class="container">
        <h2>Gestão de Endereços</h2>

        <!-- Botão para criar um novo endereço -->
        <a href="{{ route('admin.enderecos.create') }}" class="btn btn-primary mb-3">Criar Endereço</a>

        <!-- Tabela de Endereços -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Rua</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($enderecos as $endereco)
                <tr>
                    <td>{{ $endereco->id }}</td>
                    <td>{{ $endereco->descricao }}</td>
                    <td>{{ $endereco->rua }}</td>
                    <td>{{ $endereco->bairro }}</td>
                    <td>{{ $endereco->cidade->nome }}</td>
                    <td>
                        <a href="{{ route('admin.enderecos.edit', $endereco->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('admin.enderecos.destroy', $endereco->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
