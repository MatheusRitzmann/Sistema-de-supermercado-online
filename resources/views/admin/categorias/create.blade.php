@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5>{{ isset($categoria) ? 'Editar' : 'Nova' }} Categoria</h5> <!-- Título dinâmico -->
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-3">Voltar para o Dashboard</a>
        </div>
        <div class="card-body">
            <form method="POST" 
                  action="{{ isset($categoria) ? route('admin.categorias.update', $categoria->id) : route('admin.categorias.store') }}">
                @csrf
                @if(isset($categoria)) <!-- Só inclui method PUT se for edição -->
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" 
                           value="{{ old('nome', $categoria->nome ?? '') }}" required>
                </div>

                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao" rows="3">
                        {{ old('descricao', $categoria->descricao ?? '') }}
                    </textarea>
                </div>

                <button type="submit" class="btn btn-primary">
                    {{ isset($categoria) ? 'Atualizar' : 'Salvar' }} <!-- Botão dinâmico -->
                </button>
            </form>
        </div>
    </div>
</div>
@endsection