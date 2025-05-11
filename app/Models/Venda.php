<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Venda extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Status disponíveis para vendas
     */
    const STATUS = [
        'pendente' => 'Pendente',
        'pago' => 'Pago',
        'processando' => 'Processando',
        'enviado' => 'Enviado',
        'entregue' => 'Entregue',
        'cancelado' => 'Cancelado'
    ];

    /**
     * Métodos de pagamento disponíveis
     */
    const METODOS_PAGAMENTO = [
        'dinheiro' => 'Dinheiro',
        'cartao_credito' => 'Cartão de Crédito',
        'cartao_debito' => 'Cartão de Débito',
        'pix' => 'PIX',
        'boleto' => 'Boleto',
        'transferencia' => 'Transferência Bancária'
    ];

    /**
     * Atributos que podem ser preenchidos em massa
     */
    protected $fillable = [
        'cliente_id',
        'endereco_id',
        'valor_total',
        'desconto',
        'acrescimo',
        'valor_final',
        'status',
        'metodo_pagamento',
        'data_pagamento',
        'data_entrega',
        'observacoes'
    ];

    /**
     * Atributos que devem ser convertidos
     */
    protected $casts = [
        'valor_total' => 'decimal:2',
        'desconto' => 'decimal:2',
        'acrescimo' => 'decimal:2',
        'valor_final' => 'decimal:2',
        'data_pagamento' => 'datetime',
        'data_entrega' => 'datetime'
    ];

    /**
     * Atributos adicionais (acessores)
     */
    protected $appends = [
        'valor_total_formatado',
        'valor_final_formatado',
        'data_formatada',
        'status_formatado',
        'metodo_pagamento_formatado'
    ];

    /**
     * Relação com o cliente
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class)->withTrashed();
    }

    /**
     * Relação com o endereço de entrega
     */
    public function endereco()
    {
        return $this->belongsTo(Endereco::class)->withTrashed();
    }

    /**
     * Relação muitos-para-muitos com produtos
     */
    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'produto_venda')
                    ->withPivot([
                        'quantidade', 
                        'preco_unitario',
                        'desconto',
                        'acrescimo',
                        'subtotal'
                    ])
                    ->withTimestamps()
                    ->withTrashed();
    }

    /**
     * Acessor para valor total formatado
     */
    protected function valorTotalFormatado(): Attribute
    {
        return Attribute::make(
            get: fn () => 'R$ ' . number_format($this->valor_total, 2, ',', '.')
        );
    }

    /**
     * Acessor para valor final formatado
     */
    protected function valorFinalFormatado(): Attribute
    {
        return Attribute::make(
            get: fn () => 'R$ ' . number_format($this->valor_final, 2, ',', '.')
        );
    }

    /**
     * Acessor para data formatada
     */
    protected function dataFormatada(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->created_at->format('d/m/Y H:i')
        );
    }

    /**
     * Acessor para status formatado
     */
    protected function statusFormatado(): Attribute
    {
        return Attribute::make(
            get: fn () => self::STATUS[$this->status] ?? $this->status
        );
    }

    /**
     * Acessor para método de pagamento formatado
     */
    protected function metodoPagamentoFormatado(): Attribute
    {
        return Attribute::make(
            get: fn () => self::METODOS_PAGAMENTO[$this->metodo_pagamento] ?? $this->metodo_pagamento
        );
    }

    /**
     * Escopo para vendas pendentes
     */
    public function scopePendentes($query)
    {
        return $query->where('status', 'pendente');
    }

    /**
     * Escopo para vendas concluídas
     */
    public function scopeConcluidas($query)
    {
        return $query->where('status', 'entregue');
    }

    /**
     * Escopo para vendas recentes
     */
    public function scopeRecentes($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    /**
     * Calcula o valor final da venda
     */
    public function calcularValorFinal()
    {
        $this->valor_final = $this->valor_total + $this->acrescimo - $this->desconto;
        return $this;
    }

    /**
     * Verifica se a venda pode ser cancelada
     */
    public function podeSerCancelada()
    {
        return in_array($this->status, ['pendente', 'pago', 'processando']);
    }

    /**
     * Atualiza o status da venda
     */
    public function atualizarStatus($novoStatus)
    {
        if (array_key_exists($novoStatus, self::STATUS)) {
            $this->status = $novoStatus;
            $this->save();
            return true;
        }
        return false;
    }
}