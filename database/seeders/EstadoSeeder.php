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
            ['orden' => 1, 'descripcion' => 'Ingresado'],
            ['orden' => 2, 'descripcion' => 'Lavado'],
            ['orden' => 3, 'descripcion' => 'Secado'],
            ['orden' => 4, 'descripcion' => 'Para Planchar'],
            ['orden' => 5, 'descripcion' => 'Planchado'],
            ['orden' => 6, 'descripcion' => 'Terminado'],
            ['orden' => 7, 'descripcion' => 'Entregado con Pendientes'],
            ['orden' => 8, 'descripcion' => 'Entregado'],
       ];

       foreach ($estados as $estado) {
            Estado::create($estado);
        }

    }
}
