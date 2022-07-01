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
        // $table->unsignedSmallInteger('categoria_id')->nullable(); // SABANAS / FUNDAS
        // $table->boolean('delicado')->nullable()->default(false);

        $articulos = [
            ['descripcion' => 'SABANAS 1PZ','categoria_id' => '2', 'delicado' => true],
            ['descripcion' => 'SABANAS 2PZ','categoria_id' => '2', 'delicado' => true],
            ['descripcion' => 'Fundas','categoria_id' => '1', 'delicado' => true],
            ['descripcion' => 'Toallas','categoria_id' => '1', 'delicado' => false],
            ['descripcion' => 'Toallones','categoria_id' => '2', 'delicado' => false],
            ['descripcion' => 'Alfombras','categoria_id' => '1', 'delicado' => true],
            ['descripcion' => 'Batas','categoria_id' => '2', 'delicado' => true],
            ['descripcion' => 'Fundones','categoria_id' => '1', 'delicado' => false],
            ['descripcion' => 'Cubrecamas','categoria_id' => '2', 'delicado' => true],
            ['descripcion' => 'Cubre Sommiers','categoria_id' => '1', 'delicado' => true],
            ['descripcion' => 'Frazadas','categoria_id' => '1', 'delicado' => true],
            ['descripcion' => 'Acolchados','categoria_id' => '2', 'delicado' => false],
            ['descripcion' => 'Almohadas','categoria_id' => '1', 'delicado' => true],
            ['descripcion' => 'Funda Almohadon','categoria_id' => '1', 'delicado' => true],
            ['descripcion' => 'Cortina','categoria_id' => '2', 'delicado' => true],
            ['descripcion' => 'Cortina de baño','categoria_id' => '1', 'delicado' => false],
            ['descripcion' => 'Pie de cama','categoria_id' => '1', 'delicado' => false],
        ];

        foreach ($articulos as $articulo) {
            Articulo::create($articulo);
        }
    }
}
