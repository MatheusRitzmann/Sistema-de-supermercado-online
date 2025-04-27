@extends('layouts.template')

@section('conteudo')
    <h1>Cadastro de Categoria</h1>
    <form action="{{ route('categoria.inserir') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome da categoria</label>
            <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Nome">
        </div>

        <input type="submit" value="Cadastrar" class="btn btn-success">
    </form>
@endsection
