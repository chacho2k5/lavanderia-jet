<?php

namespace Database\Seeders;

use App\Models\Articulo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $table->string('nombre',100)->nullable();
        // $table->un'SI'gnedSmallInteger('categoria_id')->nullable(); // SABANAS / FUNDAS
        // $table->boolean('delicado')->nullable()->default('NO');

        $articulos = [
            ['descripcion' => 'SABANAS 1PZ','categoria_id' => '5', 'delicado' => 'SI'],
            ['descripcion' => 'SABANAS 2PZ','categoria_id' => '5', 'delicado' => 'SI'],
            ['descripcion' => 'Fundas','categoria_id' => '3', 'delicado' => 'SI'],
            ['descripcion' => 'Toallas','categoria_id' => '1', 'delicado' => 'NO'],
            ['descripcion' => 'Toallones','categoria_id' => '2', 'delicado' => 'NO'],
            ['descripcion' => 'Alfombras','categoria_id' => '1', 'delicado' => 'SI'],
            ['descripcion' => 'Batas','categoria_id' => '2', 'delicado' => 'SI'],
            ['descripcion' => 'Fundones','categoria_id' => '3', 'delicado' => 'NO'],
            ['descripcion' => 'Cubrecamas','categoria_id' => '2', 'delicado' => 'SI'],
            ['descripcion' => 'Cubre Sommiers','categoria_id' => '1', 'delicado' => 'SI'],
            ['descripcion' => 'Frazadas','categoria_id' => '1', 'delicado' => 'SI'],
            ['descripcion' => 'Acolchados','categoria_id' => '2', 'delicado' => 'NO'],
            ['descripcion' => 'Almohadas','categoria_id' => '1', 'delicado' => 'SI'],
            ['descripcion' => 'Funda Almohadon','categoria_id' => '3', 'delicado' => 'SI'],
            ['descripcion' => 'Cortina','categoria_id' => '2', 'delicado' => 'SI'],
            ['descripcion' => 'Cortina de baño','categoria_id' => '1', 'delicado' => 'NO'],
            ['descripcion' => 'Pie de cama','categoria_id' => '1', 'delicado' => 'NO'],
        ];

        foreach ($articulos as $articulo) {
            Articulo::create($articulo);
        }
    }
}
