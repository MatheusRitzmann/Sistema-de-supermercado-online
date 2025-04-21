<!-- resources/views/admin/cidades/index.blade.php -->

@extends('layouts.app')

@section('content')

    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark mb-3">
        ← Voltar para o Dashboard
    </a>

    <h1>Cidades</h1>

    <a href="{{ route('admin.cidades.create') }}" class="btn btn-primary mb-3">Adicionar Cidade</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Estado</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cidades as $cidade)
                <tr>
                    <td>{{ $cidade->nome }}</td>
                    <td>{{ $cidade->estado }}</td>
                    <td>
                        <a href="{{ route('admin.cidades.edit', $cidade->id) }}" class="btn btn-warning">Editar</a>

                        <form action="{{ route('admin.cidades.destroy', $cidade->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
