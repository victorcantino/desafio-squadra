<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_endereco', function (Blueprint $table) {
            $table->bigIncrements('codigo_endereco');
            $table->foreignId('codigo_pessoa')->constrained('tb_pessoa', 'codigo_pessoa');
            $table->foreignId('codigo_bairro')->constrained('tb_bairro', 'codigo_bairro');
            $table->string('nome_rua', 256)->nullable(false);
            $table->string('numero', 10)->nullable(false);
            $table->string('complemento', 20);
            $table->string('cep', 10)->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_endereco');
    }
};
