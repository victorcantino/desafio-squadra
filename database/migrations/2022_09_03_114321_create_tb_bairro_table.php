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
        Schema::create('tb_bairro', function (Blueprint $table) {
            $table->bigIncrements('codigoBairro');
            $table->foreignId('codigoMunicipio')->constrained('tb_municipio', 'codigoMunicipio')->onDelete('cascade');
            $table->string('nome', 256);
            $table->tinyInteger('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_bairro');
    }
};
