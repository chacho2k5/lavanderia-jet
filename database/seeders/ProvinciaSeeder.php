<?php

namespace Database\Seeders;

use App\Models\Provincia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provincias = [
            ['descripcion' => 'Buenos Aires'],
            ['descripcion' => 'Catamarca'],
            ['descripcion' => 'Chaco'],
            ['descripcion' => 'Chubut'],
            ['descripcion' => 'Ciudad Autónoma de Buenos Aires'],
            ['descripcion' => 'Córdoba'],
            ['descripcion' => 'Corrientes'],
            ['descripcion' => 'Entre Ríos'],
            ['descripcion' => 'Formosa'],
            ['descripcion' => 'Jujuy'],
            ['descripcion' => 'La Pampa'],
            ['descripcion' => 'La Rioja'],
            ['descripcion' => 'Mendoza'],
            ['descripcion' => 'Misiones'],
            ['descripcion' => 'Neuquén'],
            ['descripcion' => 'Río Negro'],
            ['descripcion' => 'Salta'],
            ['descripcion' => 'San Juan'],
            ['descripcion' => 'San Luis'],
            ['descripcion' => 'Santa Cruz'],
            ['descripcion' => 'Santa Fe'],
            ['descripcion' => 'Santiago del Estero'],
            ['descripcion' => 'Tierra del Fuego, Antártida e Islas del Atlántico Sur'],
            ['descripcion' => 'Tucumán'],
        ];

        foreach ($provincias as $provincia) {
            Provincia::create($provincia);
        }
    }
}
