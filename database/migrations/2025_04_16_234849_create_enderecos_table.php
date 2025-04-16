<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecosTable extends Migration
{
    /**
     * Execute as migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->id(); // Chave primária da tabela
            $table->string('descricao'); // Descrição do endereço (ex: "Residencial", "Comercial")
            $table->string('logradouro'); // Nome da rua, avenida, etc.
            $table->string('numero'); // Número do imóvel
            $table->string('bairro'); // Bairro onde o endereço está localizado
            $table->foreignId('cidade_id')->constrained('cidades')->onDelete('cascade'); // Relacionamento com a tabela 'cidades'
            $table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade'); // Relacionamento com a tabela 'clientes'
            $table->timestamps(); // Colunas created_at e updated_at
        });
    }

    /**
     * Revert the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('enderecos'); // Se necessário, deleta a tabela
    }
}
