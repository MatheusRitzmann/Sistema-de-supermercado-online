<!-- resources/views/cidades/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Adicionar Cidade</h1>
    <form action="{{ route('cidades.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <input type="text" class="form-control" id="estado" name="estado" required>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
@endsection