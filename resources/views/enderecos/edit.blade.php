@extends('layouts.app')

@section('content')

    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark mb-3">
        ← Voltar para o Dashboard
    <h2>Editar Endereço</h2>

    <form action="{{ route('enderecos.update', $endereco->id) }}" method="POST">
    @method('PUT')
    
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao" id="descricao" class="form-control" value="{{ $endereco->descricao }}" required>
        </div>

        <div class="form-group">
            <label for="rua">Rua</label>
            <input type="text" name="rua" id="rua" class="form-control" value="{{ $endereco->rua }}" required>
        </div>

        <div class="form-group">
            <label for="bairro">Bairro</label>
            <input type="text" name="bairro" id="bairro" class="form-control" value="{{ $endereco->bairro }}" required>
        </div>

        <div class="form-group">
            <label for="cidade_id">Cidade</label>
            <select name="cidade_id" id="cidade_id" class="form-control" required>
                @foreach ($cidades as $cidade)
                    <option value="{{ $cidade->id }}" {{ $endereco->cidade_id == $cidade->id ? 'selected' : '' }}>{{ $cidade->nome }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Atualizar</button>
    </form>
</div>
@endsection