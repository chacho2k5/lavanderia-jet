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
        Schema::create('estado_ot', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('ot_id');
            $table->unsignedInteger('estado_id');
            $table->unsignedInteger('orden')->nullable()->default(0);
            $table->boolean('lavado')->nullable()->default(false);
            $table->date('fecha');
            $table->time('hora_inicio')->nullable();
            $table->time('hora_final')->nullable();
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
        Schema::dropIfExists('estado_ot');
    }
};
