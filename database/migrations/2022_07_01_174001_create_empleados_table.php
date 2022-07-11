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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('apellido',100)->nullable();
            $table->string('nombres',100)->nullable();
            $table->string('numero_documento',11)->nullable();  //poner CUIL ???
            $table->string('telefono',20)->nullable();
            $table->string('correo',80)->nullable();
            $table->string('calle_nombre',80)->nullable();
            $table->string('calle_numero',5)->nullable();
            $table->string('codigo_postal',20)->nullable();
            $table->string('barrio')->nullable();
            $table->date('fecha_alta')->nullable();
            $table->date('fecha_baja')->nullable();     //se puede tomar como activo FECHA_BAJA = NULL
            $table->enum('activo',['SI', 'NO'])->default('SI');
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
        Schema::dropIfExists('empleados');
    }
};
