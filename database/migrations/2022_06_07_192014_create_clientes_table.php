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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('razonsocial',100)->nullable();
            $table->string('contacto',100)->nullable();
            $table->string('cuit',11)->nullable();
            $table->unsignedSmallInteger('iva_id')->nullable()->default(1);
            $table->string('telefono1',20)->nullable();
            $table->string('telefono2',20)->nullable();
            $table->string('correo',80)->nullable();
            $table->string('calle_nombre',80)->nullable();
            $table->string('calle_numero',5)->nullable();
            $table->string('codigo_postal',20)->nullable();
            $table->unsignedSmallInteger('barrio_id')->nullable();
            $table->unsignedSmallInteger('localidad_id')->nullable();
            $table->unsignedSmallInteger('provincia_id')->nullable();
            $table->date('fecha_alta')->nullable();
            $table->string('observaciones',1000)->nullable();
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
        Schema::dropIfExists('clientes');
    }
};
