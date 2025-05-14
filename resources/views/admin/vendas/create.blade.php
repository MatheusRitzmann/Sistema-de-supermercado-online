@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5>Cadastrar Nova Venda</h5>
        </div>
        <div class="card-body">
            <form id="vendaForm" action="{{ route('admin.vendas.store') }}" method="POST">
                @csrf
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="cliente_id" class="form-label">Cliente</label>
                        <select class="form-select" id="cliente_id" name="cliente_id" required>
                            <option value="">Selecione um cliente</option>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="endereco_id" class="form-label">Endereço de Entrega</label>
                        <select class="form-select" id="endereco_id" name="endereco_id" required>
                            <option value="">Selecione um endereço</option>
                            <!-- Carregado via AJAX -->
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Produtos</label>
                    <div id="produtos-container">
                        <div class="row produto-item mb-2">
                            <div class="col-md-5">
                                <select class="form-select produto-select" name="produtos[0][id]" required>
                                    <option value="">Selecione um produto</option>
                                    @foreach($produtos as $produto)
                                        <option value="{{ $produto->id }}" 
                                                data-preco="{{ $produto->preco }}">
                                            {{ $produto->nome }} - R$ {{ number_format($produto->preco, 2, ',', '.') }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input type="number" class="form-control quantidade" 
                                       name="produtos[0][quantidade]" min="1" value="1" required>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control subtotal" readonly 
                                       value="R$ 0,00">
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-danger btn-remover">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="adicionar-produto" class="btn btn-sm btn-secondary mt-2">
                        <i class="bi bi-plus"></i> Adicionar Produto
                    </button>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 offset-md-6">
                        <div class="d-flex justify-content-between">
                            <strong>Total:</strong>
                            <strong id="total-venda">R$ 0,00</strong>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle"></i> Finalizar Venda
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Carrega endereços quando seleciona cliente
    document.getElementById('cliente_id').addEventListener('change', function() {
        const clienteId = this.value;
        const enderecoSelect = document.getElementById('endereco_id');
        
        if (clienteId) {
            fetch(`/api/clientes/${clienteId}/enderecos`)
                .then(response => response.json())
                .then(data => {
                    enderecoSelect.innerHTML = '<option value="">Selecione um endereço</option>';
                    data.forEach(endereco => {
                        const option = document.createElement('option');
                        option.value = endereco.id;
                        option.textContent = `${endereco.logradouro}, ${endereco.numero} - ${endereco.cidade}`;
                        enderecoSelect.appendChild(option);
                    });
                });
        } else {
            enderecoSelect.innerHTML = '<option value="">Selecione um endereço</option>';
        }
    });

    // Adiciona novo produto
    let produtoCount = 1;
    document.getElementById('adicionar-produto').addEventListener('click', function() {
        const container = document.getElementById('produtos-container');
        const newItem = document.querySelector('.produto-item').cloneNode(true);
        
        // Atualiza os names e IDs
        const inputs = newItem.querySelectorAll('select, input');
        inputs.forEach(input => {
            const name = input.getAttribute('name').replace('[0]', `[${produtoCount}]`);
            input.setAttribute('name', name);
            input.value = '';
        });
        
        newItem.querySelector('.subtotal').value = 'R$ 0,00';
        container.appendChild(newItem);
        produtoCount++;
    });

    // Remove produto
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('btn-remover')) {
            if (document.querySelectorAll('.produto-item').length > 1) {
                e.target.closest('.produto-item').remove();
                calcularTotal();
            }
        }
    });

    // Calcula subtotal quando muda produto ou quantidade
    document.addEventListener('change', function(e) {
        if (e.target.classList.contains('produto-select') || 
            e.target.classList.contains('quantidade')) {
            const item = e.target.closest('.produto-item');
            const select = item.querySelector('.produto-select');
            const quantidade = item.querySelector('.quantidade').value;
            const subtotal = item.querySelector('.subtotal');
            
            if (select.value && quantidade) {
                const preco = select.selectedOptions[0].getAttribute('data-preco');
                const total = preco * quantidade;
                subtotal.value = 'R$ ' + total.toFixed(2).replace('.', ',');
                calcularTotal();
            }
        }
    });

    // Calcula o total geral
    function calcularTotal() {
        let total = 0;
        document.querySelectorAll('.produto-item').forEach(item => {
            const subtotal = item.querySelector('.subtotal').value;
            const valor = parseFloat(subtotal.replace('R$ ', '').replace(',', '.'));
            if (!isNaN(valor)) {
                total += valor;
            }
        });
        document.getElementById('total-venda').textContent = 'R$ ' + total.toFixed(2).replace('.', ',');
    }
});
</script>
@endsection