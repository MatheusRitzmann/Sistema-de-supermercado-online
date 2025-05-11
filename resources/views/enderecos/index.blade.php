@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Endereços Cadastrados</h2>
        <div>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                ← Voltar para o Dashboard
            </a>
            <a href="{{ route('admin.enderecos.create') }}" class="btn btn-primary ms-2">
                Cadastrar Novo Endereço
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Rua</th>
                    <th>Número</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($enderecos as $endereco)
                <tr>
                    <td>{{ $endereco->id }}</td>
                    <td>{{ $endereco->descricao }}</td>
                    <td>{{ $endereco->rua }}</td>
                    <td>{{ $endereco->numero }}</td>
                    <td>{{ $endereco->bairro }}</td>
                    <td>{{ $endereco->cidade->nome ?? '-' }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.enderecos.edit', $endereco->id) }}" 
                               class="btn btn-sm btn-warning">
                                Editar
                            </a>
                            <form action="{{ route('admin.enderecos.destroy', $endereco->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    Excluir
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection