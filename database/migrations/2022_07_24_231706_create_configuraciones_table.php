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
        Schema::create('configuraciones', function (Blueprint $table) {
            $table->id();
            $table->double('formula_valor_1')->nullable()->default(0);
            $table->double('formula_valor_2')->nullable()->default(0);
            $table->double('estado_inicio')->nullable()->default(0);        // Id u Orden para el 1er estado al generar la OT
            $table->double('estado_para_planchar')->nullable()->default(0); // Id u Orden del estado "Para planchar"
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
        Schema::dropIfExists('configuraciones');
    }
};
