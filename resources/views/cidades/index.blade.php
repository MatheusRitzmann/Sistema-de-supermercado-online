<!-- resources/views/cidades/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Cidades</h1>
    <a href="{{ route('cidades.create') }}" class="btn btn-primary">Adicionar Cidade</a>
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
                        <a href="{{ route('cidades.edit', $cidade->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('cidades.destroy', $cidade->id) }}" method="POST" style="display:inline;">
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