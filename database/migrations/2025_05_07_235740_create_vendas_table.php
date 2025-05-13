<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained()->onDelete('cascade');
            $table->foreignId('endereco_id')->constrained('enderecos')->onDelete('cascade');
            $table->decimal('valor_total', 10, 2)->default(0);
            $table->string('status')->default('pendente'); // pendente, processando, enviado, entregue, cancelado
            $table->timestamps();
            $table->softDeletes(); // Para deletar sem perder histórico
        });

        // Tabela pivô para produtos_venda
        Schema::create('produto_venda', function (Blueprint $table) {
            $table->id();
            $table->foreignId('venda_id')->constrained()->onDelete('cascade');
            $table->foreignId('produto_id')->constrained()->onDelete('cascade');
            $table->integer('quantidade');
            $table->decimal('preco_unitario', 10, 2); // Preço no momento da venda
            $table->decimal('subtotal', 10, 2); // preco_unitario * quantidade
            $table->timestamps();
            
            // Índices para melhor performance
            $table->index('venda_id');
            $table->index('produto_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produto_venda');
        Schema::dropIfExists('vendas');
    }
};