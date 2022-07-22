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
        Schema::create('orden_planchados', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('ot_id')->nullable();
            $table->unsignedInteger('orden_planchado')->nullable()->default(0);
            $table->double('lavado_formula')->nullable()->default(0);
            $table->date('fecha')->nullable();
            $table->time('tiempo_inicio')->nullable();
            $table->time('tiempo_final')->nullable();
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
        Schema::dropIfExists('orden_planchados');
    }
};
