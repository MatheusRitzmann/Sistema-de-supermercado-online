@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Endereço</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('enderecos.update', $endereco->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <select name="descricao" class="form-control" required>
                    <option value="Residencial" {{ $endereco->descricao == 'Residencial' ? 'selected' : '' }}>Residencial</option>
                    <option value="Comercial" {{ $endereco->descricao == 'Comercial' ? 'selected' : '' }}>Comercial</option>
                </select>
            </div>

            <div class="form-group">
                <label for="rua">Rua</label>
                <input type="text" class="form-control" name="rua" value="{{ $endereco->rua }}" required>
            </div>

            <div class="form-group">
                <label for="numero">Número</label>
                <input type="text" class="form-control" name="numero" value="{{ $endereco->numero }}" required>
            </div>

            <div class="form-group">
                <label for="bairro">Bairro</label>
                <input type="text" class="form-control" name="bairro" value="{{ $endereco->bairro }}" required>
            </div>

            <div class="form-group">
                <label for="cidade_id">Cidade</label>
                <select name="cidade_id" class="form-control" required>
                    @foreach ($cidades as $cidade)
                        <option value="{{ $cidade->id }}" {{ $cidade->id == $endereco->cidade_id ? 'selected' : '' }}>
                            {{ $cidade->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success mt-3">Salvar Alterações</button>
            <a href="{{ route('enderecos.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
        </form>
    </div>
@endsection