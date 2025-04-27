@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Foto para: {{ $produto->nome }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.fotos.store', $produto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="foto" class="form-label">Selecionar Foto</label>
            <input class="form-control" type="file" id="foto" name="foto" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Foto</button>
    </form>
</div>
@endsection