<?php

namespace Database\Seeders;

use App\Models\Sale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //Creamos los registros en la tabla sales, algunos registros serán guardados y otros no por medio del rand. 
        for ($i = 1; $i < 101; $i++) {

            $sale = rand(2, 4);

                /*  $sale = 6 */;

            if ($sale > 2) {
                Sale::create([
                    'user_id' => $i,
                    'app' => 'membresia',
                    'status' => 2,
                    'shipping_cost' => 84,
                    'iva' => 16,
                    'total' => 100,
                    'pts' => 20,
                ]);
            }
        }
    }
}
