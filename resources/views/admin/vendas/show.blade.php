@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Detalhes da Venda #{{ $venda->id }}</h5>
                <a href="{{ route('admin.vendas.index') }}" class="btn btn-sm btn-secondary">
                    <i class="bi bi-arrow-left"></i> Voltar
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h6>Informações do Cliente</h6>
                    <p><strong>Nome:</strong> {{ $venda->cliente->nome }}</p>
                    <p><strong>CPF:</strong> {{ $venda->cliente->cpf }}</p>
                    <p><strong>Email:</strong> {{ $venda->cliente->email }}</p>
                </div>
                <div class="col-md-6">
                    <h6>Informações da Venda</h6>
                    <p><strong>Data:</strong> {{ $venda->created_at->format('d/m/Y H:i') }}</p>
                    <p><strong>Endereço de Entrega:</strong> 
                        {{ $venda->endereco->logradouro }}, {{ $venda->endereco->numero }} - 
                        {{ $venda->endereco->cidade }}/{{ $venda->endereco->estado }}
                    </p>
                    <p><strong>Status:</strong> <span class="badge bg-success">Concluída</span></p>
                </div>
            </div>

            <h6 class="mb-3">Produtos</h6>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Preço Unitário</th>
                            <th>Quantidade</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($venda->produtos as $produto)
                        <tr>
                            <td>{{ $produto->nome }}</td>
                            <td>R$ {{ number_format($produto->pivot->subtotal / $produto->pivot->quantidade, 2, ',', '.') }}</td>
                            <td>{{ $produto->pivot->quantidade }}</td>
                            <td>R$ {{ number_format($produto->pivot->subtotal, 2, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3" class="text-end">Total:</th>
                            <th>R$ {{ number_format($venda->valor_total, 2, ',', '.') }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection