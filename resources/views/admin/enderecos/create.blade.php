@extends('layouts.app')

@section('content')

    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark mb-3">
        ← Voltar para o Dashboard
<div class="container">
    <h2>Criar Endereço</h2>

    <form action="{{ route('admin.enderecos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao" id="descricao" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="rua">Rua</label>
            <input type="text" name="rua" id="rua" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="bairro">Bairro</label>
            <input type="text" name="bairro" id="bairro" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="cidade_id">Cidade</label>
            <select name="cidade_id" id="cidade_id" class="form-control" required>
                @foreach ($cidades as $cidade)
                    <option value="{{ $cidade->id }}">{{ $cidade->nome }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Salvar</button>
    </form>
</div>
@endsection