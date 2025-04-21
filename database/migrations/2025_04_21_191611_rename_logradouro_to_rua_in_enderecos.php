<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameLogradouroToRuaInEnderecos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('enderecos', function (Blueprint $table) {
            $table->renameColumn('logradouro', 'rua');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('enderecos', function (Blueprint $table) {
            $table->renameColumn('rua', 'logradouro');
        });
    }
}