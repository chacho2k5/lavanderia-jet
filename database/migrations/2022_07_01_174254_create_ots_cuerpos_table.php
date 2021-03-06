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
        Schema::create('ots_cuerpo', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('ot_id')->nullable();
            $table->unsignedInteger('articulo_id')->nullable();
            $table->unsignedInteger('retira')->nullable()->default(0);
            $table->unsignedInteger('entrega')->nullable()->default(0);
            $table->double('factor')->nullable()->default(0);
            $table->double('lavado_formula')->nullable()->default(0);
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
        Schema::dropIfExists('ots_cuerpo');
    }
};
