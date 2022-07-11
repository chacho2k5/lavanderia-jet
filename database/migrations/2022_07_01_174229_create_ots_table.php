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
        Schema::create('ots', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('numero');
            $table->date('fecha_alta')->nullable();
            $table->unsignedInteger('cliente_id');
            $table->unsignedInteger('estado_id');
            $table->string('entrega_hotel',80)->nullable();
            $table->string('recibe_hotel',80)->nullable();
            $table->string('entrega_lavanderia',80)->nullable();
            $table->string('recibe_lavanderia',80)->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->text('obseravaciones')->nullable();
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
        Schema::dropIfExists('ots');
    }
};
