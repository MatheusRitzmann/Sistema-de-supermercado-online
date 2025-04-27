@extends('produtos.template')


@section('conteudo')
    <h1>Fotos do Produto: {{ $produto->nome }}</h1>

    <a href="{{ route('admin.fotos.create', $produto->id) }}" class="btn btn-primary mb-3">Adicionar Nova Foto</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($produto->fotos->count() > 0)
        <div class="row">
            @foreach ($produto->fotos as $foto)
                <div class="col-md-3">
                    <div class="card mb-4">
                        <img src="{{ asset('storage/' . $foto->caminho) }}" class="card-img-top" alt="Foto do produto">
                        <div class="card-body text-center">
                            <form action="{{ route('admin.fotos.destroy', $foto->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir esta foto?')">Excluir</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>Este produto ainda não possui fotos.</p>
    @endif
@endsection