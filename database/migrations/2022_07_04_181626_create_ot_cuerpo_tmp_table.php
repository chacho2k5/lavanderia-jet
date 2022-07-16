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
        Schema::create('ots_cuerpo_tmp', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('ot_id')->nullable();
            $table->unsignedInteger('numero')->nullable();
            $table->unsignedInteger('articulo_id')->nullable();
            $table->string('prenda',100)->nullable();
            $table->unsignedInteger('retira')->nullable()->default(0);
            $table->unsignedInteger('entrega')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ots_cuerpo_tmp');
    }
};
