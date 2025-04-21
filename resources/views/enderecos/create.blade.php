<!-- resources/views/enderecos/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Cadastrar Endereço</h2>
    <form action="{{ route('enderecos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <select class="form-control" name="descricao" id="descricao" required>
                <option value="Residencial">Residencial</option>
                <option value="Comercial">Comercial</option>
            </select>
        </div>

        <div class="form-group">
            <label for="rua">Rua</label>
            <input type="text" class="form-control" name="rua" id="rua" required>
        </div>

        <div class="form-group">
            <label for="numero">Número</label>
            <input type="text" class="form-control" name="numero" id="numero" required>
        </div>

        <div class="form-group">
            <label for="bairro">Bairro</label>
            <input type="text" class="form-control" name="bairro" id="bairro" required>
        </div>

        <div class="form-group">
            <label for="cidade_id">Cidade</label>
            <select class="form-control" name="cidade_id" id="cidade_id" required>
                @foreach($cidades as $cidade)
                    <option value="{{ $cidade->id }}">{{ $cidade->nome }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
@endsection