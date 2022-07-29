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
            $table->unsignedInteger('orden_planchado')->nullable()->default(0);
            // Si evento=1 significa que esta para planchar, y asi se puede usar para
            // cualquier otra cosa. Capaz deberia estar en Estados
            $table->unsignedTinyInteger('evento')->nullable()->default(0);
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
