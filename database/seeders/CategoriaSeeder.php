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
            ['descripcion' => 'Alcolchados','factor' => '0'],
            ['descripcion' => 'Alfombras','factor' => '0'],
            ['descripcion' => 'Fundas','factor' => '.25'],
            ['descripcion' => 'Frazadas','factor' => '0'],
            ['descripcion' => 'Sábanas','factor' => '1'],

        ];

        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}
