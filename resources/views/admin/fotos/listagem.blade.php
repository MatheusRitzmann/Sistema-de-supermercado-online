@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Selecione um Produto para Gerenciar Fotos</h1>
    
    <div class="row">
        @foreach($produtos as $produto)
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                @if($produto->fotos->first())
                    <img src="{{ Storage::url($produto->fotos->first()->arquivo) }}" 
                         class="card-img-top" 
                         style="height: 150px; object-fit: cover;">
                @else
                    <div class="text-center py-4 bg-light">
                        <i class="bi bi-image fs-1 text-muted"></i>
                    </div>
                @endif
                <div class="card-body">
                    <h5>{{ $produto->nome }}</h5>
                    
                    <!-- Botão para gerenciar fotos -->
                    <a href="{{ route('admin.fotos.index', $produto->id) }}" 
                       class="btn btn-primary btn-sm">
                        Gerenciar Fotos ({{ $produto->fotos->count() }})
                    </a>
                    
                    <!-- Botão para cadastrar foto -->
                    <a href="{{ route('admin.fotos.create', $produto->id) }}" 
                       class="btn btn-success btn-sm mt-2">
                        Cadastrar Foto
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection