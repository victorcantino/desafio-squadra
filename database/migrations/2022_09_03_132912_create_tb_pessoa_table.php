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
        Schema::create('tb_pessoa', function (Blueprint $table) {
            $table->bigIncrements('codigoPessoa');
            $table->string('nome', 256)->nullable(false);
            $table->string('sobrenome', 256)->nullable(false);
            $table->unsignedTinyInteger('idade')->nullable(false);
            $table->string('login', 50)->nullable(false);
            $table->string('senha', 50)->nullable(false);
            $table->unsignedTinyInteger('status')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_pessoa');
    }
};
