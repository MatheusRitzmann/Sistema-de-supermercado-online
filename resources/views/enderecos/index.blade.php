<!-- resources/views/enderecos/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Endereços Cadastrados</h2>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-3">Voltar para o Dashboard</a>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <a href="{{ route('enderecos.create') }}" class="btn btn-primary">Cadastrar Novo Endereço</a>

    <table class="table mt-3">
        <thead>
            <tr>
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
                <td>{{ $endereco->descricao }}</td>
                <td>{{ $endereco->rua }}</td>
                <td>{{ $endereco->numero }}</td>
                <td>{{ $endereco->bairro }}</td>
                <td>{{ $endereco->cidade->nome }}</td>
                <td>
                    <a href="{{ route('enderecos.edit', $endereco->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('enderecos.destroy', $endereco->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Deletar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection