@extends('layouts.template')

@section('conteudo')
    <h1>{{ $produto->nome }}</h1>

    <p><strong>Preço:</strong> R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
    <p><strong>Descrição:</strong> {{ $produto->descricao ?? 'Sem descrição.' }}</p>

    <a href="{{ route('loja.index') }}" class="btn btn-secondary">Voltar para a Loja</a>
@endsection