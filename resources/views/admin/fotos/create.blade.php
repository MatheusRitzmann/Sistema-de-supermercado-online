@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5>Adicionar Foto ao Produto: {{ $produto->nome }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.fotos.store', $produto->id) }}" 
                  method="POST" 
                  enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Selecione a foto</label>
                    <input type="file" name="foto" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">
                    Enviar
                </button>
            </form>
        </div>
    </div>
</div>
@endsection