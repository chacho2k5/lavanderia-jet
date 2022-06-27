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
        Schema::create('articulos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100)->nullable();
            $table->unsignedSmallInteger('categoria_id')->nullable(); // SABANAS / FUNDAS
            // $table->double('pesoespecifico')->nullable();
            $table->boolean('delicado')->nullable()->default(false);
            // $table->enum('categoria',['FUNDAS', 'SABANAS']);
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
        Schema::dropIfExists('articulos');
    }
};
