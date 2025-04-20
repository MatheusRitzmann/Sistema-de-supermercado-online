<!-- resources/views/cidades/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Editar Cidade</h1>
    <form action="{{ route('cidades.update', $cidade->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $cidade->nome }}" required>
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <input type="text" class="form-control" id="estado" name="estado" value="{{ $cidade->estado }}" required>
        </div>
        <button type="submit" class="btn btn-success">Atualizar</button>
    </form>
@endsection