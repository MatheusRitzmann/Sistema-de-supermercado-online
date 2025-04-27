@extends('layouts.template')

@section('conteudo')

    <h1>Fotos do Produto: {{ $produto->nome }}</h1>

    <a href="{{ route('admin.fotos.create', $produto->id) }}" class="btn btn-primary">Adicionar Nova Foto</a>

    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>Imagem</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fotos as $foto)
                <tr>
                    <td>
                        <img src="{{ asset('storage/foto_produto/' . $foto->arquivo) }}" alt="Foto do produto" width="120">
                    </td>
                    <td>
                        <form action="{{ route('admin.fotos.destroy', $foto->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta foto?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection