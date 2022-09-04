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
        Schema::create('tb_municipio', function (Blueprint $table) {
            $table->bigIncrements('codigoMunicipio');
            $table->foreignId('codigoUf')->constrained('tb_uf', 'codigoUf')->onDelete('cascade');
            $table->string('nome', 256);
            $table->tinyInteger('status', false, true)->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_municipio');
    }
};
