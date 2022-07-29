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
            ['orden' => 1, 'descripcion' => 'Ingresado', 'evento' => '0'],
            ['orden' => 2, 'descripcion' => 'Lavado', 'evento' => '0'],
            ['orden' => 3, 'descripcion' => 'Secado', 'evento' => '0'],
            ['orden' => 4, 'descripcion' => 'Para Planchar', 'evento' => '1'],
            ['orden' => 5, 'descripcion' => 'Planchado', 'evento' => '0'],
            ['orden' => 6, 'descripcion' => 'Terminado', 'evento' => '0'],
            ['orden' => 7, 'descripcion' => 'Entregado con Pendientes', 'evento' => '2'],
            ['orden' => 8, 'descripcion' => 'Entregado', 'evento' => '3'],
       ];

       // Esto como que seria de manejo interno o bien no dejar que los usuarios
        // modifiquen los estado
        // 1 -> para planchar
        // 2 -> finalizado con pendientes
        // 3 -> finalizado finalizado

        foreach ($estados as $estado) {
            Estado::create($estado);
        }

    }
}
