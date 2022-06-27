<?php

namespace Database\Seeders;

use App\Models\Iva;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IvaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ivas = [
            ['descripcion' => 'Sin definir'],
            ['descripcion' => 'IVA Responsable Inscripto'],
            ['descripcion' => 'IVA Responsable No Inscripto'],
            ['descripcion' => 'IVA no Responsable'],
            ['descripcion' => 'IVA Sujeto Exento'],
            ['descripcion' => 'Consumidor Final'],
            ['descripcion' => 'Responsable Monotributo'],
            ['descripcion' => 'IVA Liberado - Ley Nº 19.640'],
            ['descripcion' => 'IVA Responsable Inscripto – Agente de Percepción'],
            ['descripcion' => 'Pequeño Contribuyente Eventual'],
            ['descripcion' => 'Monotributista Social'],
            ['descripcion' => 'Pequeño Contribuyente Eventual Social'],
        ];

        foreach ($ivas as $iva) {
            Iva::create($iva);
        }
    }
}
