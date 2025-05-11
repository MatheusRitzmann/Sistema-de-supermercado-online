@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-4">
        <h1>Lista de Categorias</h1>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-3">Voltar para o Dashboard</a>
        <a href="{{ route('admin.categorias.create') }}" class="btn btn-primary">
            Nova Categoria
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
            <tr>
                <td>{{ $categoria->id }}</td>
                <td>{{ $categoria->nome }}</td>
                <td>{{ $categoria->descricao ?? '-' }}</td>
                <td>
                    <a href="{{ route('admin.categorias.edit', $categoria->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('admin.categorias.destroy', $categoria->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection