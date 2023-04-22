<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AddPoint;
use App\Models\Point;
use App\Models\Sale;
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
        \App\Models\User::factory()->create([
            'name' => 'fredy',
            'apellido' => 'guapacha',
            'cedula' => 94154629,
            'email' => 'fredy.guapacha@gmail.com',
            'usuario' => 'master',
            'country_id' => 1,
            'state_id' => 1,
            'city' => 'Tuluá',
            'direccion' => 'calle busquela',
            'telefono' => 3145207814
        ]);
        \App\Models\User::factory(99)->create();

        $this->call(UnilevelSeeder::class);
        $this->call(SaleSeeder::class);
        $this->call(AddPointSeeder::class);
        $this->call(PointSeeder::class);
    }
}
