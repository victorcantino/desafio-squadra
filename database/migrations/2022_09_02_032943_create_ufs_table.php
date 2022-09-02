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
        Schema::create('tb_uf', function (Blueprint $table) {
            $table->bigIncrements('codigo_uf');
            $table->string('sigla', 3)->unique();
            $table->string('nome', 60)->unique();
            $table->unsignedSmallInteger('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_uf');
    }
};
