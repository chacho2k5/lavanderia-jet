<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estados = [
            ['descripcion' => 'Ingresado'],
            ['descripcion' => 'Lavado'],
            ['descripcion' => 'Secado'],
            ['descripcion' => 'Planchado'],
            ['descripcion' => 'Terminado'],
            ['descripcion' => 'Entregado'],
       ];

       foreach ($estados as $estado) {
            Estado::create($estado);
        }

    }
}
