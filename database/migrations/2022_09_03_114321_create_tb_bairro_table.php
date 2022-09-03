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
            $table->bigIncrements('codigo_bairro');
            $table->foreignId('codigo_municipio')->constrained('tb_municipio', 'codigo_municipio');
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
