<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('categorias', function (Blueprint $table) {
            $table->string('nome')->after('id');  // Adiciona a coluna "nome"
        });
    }

    public function down()
    {
        Schema::table('categorias', function (Blueprint $table) {
            $table->dropColumn('nome');  // Remove se precisar reverter
        });
    }
};