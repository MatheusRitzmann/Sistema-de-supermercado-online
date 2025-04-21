<!-- resources/views/admin/cidades/edit.blade.php -->

@extends('layouts.app')

@section('content')

    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark mb-3">
        ← Voltar para o Dashboard
    </a>

    <h1>Editar Cidade</h1>
    <div class="container">
        <h1>Editar Cidade</h1>

        {{-- Mensagens de erro de validação --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Formulário de edição --}}
        <form action="{{ route('admin.cidades.update', $cidade->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="nome">Nome da Cidade</label>
                <input type="text" name="nome" id="nome" value="{{ old('nome', $cidade->nome) }}" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="estado">Estado</label>
                <select name="estado" id="estado" class="form-control" required>
                    <option value="">-- Selecione um Estado --</option>
                    @php
                        $estados = [
                            "AC","AL","AP","AM","BA","CE","DF","ES","GO","MA","MT","MS","MG",
                            "PA","PB","PR","PE","PI","RJ","RN","RS","RO","RR","SC","SP","SE","TO"
                        ];
                    @endphp
                    @foreach ($estados as $uf)
                        <option value="{{ $uf }}" {{ $cidade->estado === $uf ? 'selected' : '' }}>{{ $uf }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="{{ route('admin.cidades.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
