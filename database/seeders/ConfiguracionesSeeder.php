<?php

namespace Database\Seeders;

use App\Models\Configuraciones;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfiguracionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $configuraciones = [
            ['formula_valor_1' => '60'],
            ['formula_valor_2' => '180'],
            ['estado_inicio' => '1'],
            ['estado_para_planchar' => '4'],
        ];

        foreach ($configuraciones as $config) {
            Configuraciones::create($config);
        }
    }
}
