<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = [
            ['descripcion' => 'Fundas','factor' => '.25'],
            ['descripcion' => 'Sábanas','factor' => '1'],
            ['descripcion' => 'Alcolchados','factor' => '1'],
            ['descripcion' => 'Alfombras','factor' => '2.8'],
            ['descripcion' => 'Frazadas','factor' => '1.5'],
        ];

        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}
