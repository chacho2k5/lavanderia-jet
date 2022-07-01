<?php

namespace Database\Seeders;

use App\Models\Articulo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            ClienteSeeder::class,
            IvaSeeder::class,
            BarrioSeeder::class,
            CalleSeeder::class,
            LocalidadSeeder::class,
            ProvinciaSeeder::class,
            ArticuloSeeder::class,
            CategoriaSeeder::class,
            EstadoSeeder::class
        ]);
    }
}
