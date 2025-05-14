@extends('layouts.app')

@section('content')
<div class="container py-4">
    <!-- Removido o menu lateral duplicado -->
    
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h2 class="mb-0">Criar Endereço</h2>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.enderecos.store') }}" method="POST">
                @csrf
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="descricao" class="form-label">Descrição*</label>
                        <input type="text" name="descricao" id="descricao" 
                               class="form-control" required
                               value="{{ old('descricao') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="rua" class="form-label">Rua*</label>
                        <input type="text" name="rua" id="rua" 
                               class="form-control" required
                               value="{{ old('rua') }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="numero" class="form-label">Número*</label>
                        <input type="text" name="numero" id="numero" 
                               class="form-control" required
                               value="{{ old('numero') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="bairro" class="form-label">Bairro*</label>
                        <input type="text" name="bairro" id="bairro" 
                               class="form-control" required
                               value="{{ old('bairro') }}">
                    </div>
                </div>

                <div class="mb-4">
                    <label for="cidade_id" class="form-label">Cidade*</label>
                    <select name="cidade_id" id="cidade_id" class="form-select" required>
                        <option value="">Selecione uma cidade</option>
                        @foreach ($cidades as $cidade)
                            <option value="{{ $cidade->id }}" {{ old('cidade_id') == $cidade->id ? 'selected' : '' }}>
                                {{ $cidade->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.enderecos.index') }}" class="btn btn-outline-dark">
                        Cancelar
                    </a>
                    <button type="submit" class="btn btn-dark">
                        Salvar Endereço
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection