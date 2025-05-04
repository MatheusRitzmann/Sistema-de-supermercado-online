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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id(); // Bigint PK
            $table->string('nome', 255); // varchar
            $table->text('descricao');
            $table->integer('quantidade')->unsigned()->default(0); // Adicionando unsigned e default
            $table->double('preco')->unsigned(); // Adicionando unsigned
            $table->unsignedBigInteger('categoria_id'); // Chave estrangeira

            // Definindo a chave estrangeira
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');

            $table->timestamps(); // Data de criação e Data de última alteração.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
