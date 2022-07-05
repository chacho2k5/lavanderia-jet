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
        Schema::create('ot_cuerpo_tmp', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('ot_numero');
            $table->unsignedInteger('articulo_id');
            $table->unsignedInteger('retira');
            $table->unsignedInteger('entrega');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ot_cuerpo_tmp');
    }
};