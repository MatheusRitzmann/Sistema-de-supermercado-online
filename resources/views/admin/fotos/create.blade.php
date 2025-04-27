@extends('produtos.template')


@section('conteudo')
    <h1>Adicionar Foto para: {{ $produto->nome }}</h1>

    <form action="{{ route('admin.fotos.store', ['produto' => $produto->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="foto" class="form-label">Selecione uma foto</label>
            <input type="file" class="form-control" id="foto" name="foto" required>
        </div>

        <button type="submit" class="btn btn-success">Salvar Foto</button>
        <a href="{{ route('admin.fotos.index', ['produto' => $produto->id]) }}" class="btn btn-secondary">Voltar</a>
    </form>
@endsection