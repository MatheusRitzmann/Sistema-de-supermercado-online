@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-4">
        <h1>Fotos do Produto: {{ $produto->nome }}</h1>
        <a href="{{ route('admin.fotos.create', $produto->id) }}" 
           class="btn btn-success">
            + Adicionar Foto
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @forelse($fotos as $foto)
        <div class="col-md-3 mb-4">
            <div class="card">
                <img src="{{ Storage::url($foto->arquivo) }}" 
                     class="card-img-top" 
                     style="height: 150px; object-fit: cover;">
                <div class="card-body text-center">
                    <form action="{{ route('admin.fotos.destroy', $foto->id) }}" 
                          method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            Excluir
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info">
                Nenhuma foto cadastrada.
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection