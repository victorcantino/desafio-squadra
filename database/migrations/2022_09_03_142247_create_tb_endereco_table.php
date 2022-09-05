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
            $table->bigIncrements('codigoEndereco');
            $table->foreignId('codigoPessoa')->constrained('tb_pessoa', 'codigoPessoa')->onDelete('cascade');
            $table->foreignId('codigoBairro')->constrained('tb_bairro', 'codigoBairro')->onDelete('no action');
            $table->string('nomeRua', 256)->nullable(false);
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
