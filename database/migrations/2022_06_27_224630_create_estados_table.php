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
        Schema::create('estados', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('orden')->unique();
            $table->string('descripcion',100)->unique();
            $table->string('detalle',100)->nullable();
            // Si accion=1 significa que esta para planchar, y asi se puede usar para
            // cualquier otra cosa. Capaz deberia estar en Estados
            $table->unsignedTinyInteger('evento')->nullable()->default(0);
        });
        // Esto como que seria de manejo interno o bien no dejar que los usuarios
        // modifiquen los estado
        // 1 -> para planchar
        // 2 -> finalizado con pendientes
        // 3 -> finalizado finalizado

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estados');
    }
};
