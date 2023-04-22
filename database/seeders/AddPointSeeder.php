<?php

namespace Database\Seeders;

use App\Models\AddPoint;
use App\Models\Binary;
use App\Models\Sale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddPointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Paso 1 Buscar los registros de la tabla sales donde el campo asc_points = 1.  
        //Paso 2. Obtener los puntos y el usuario que los genera. 
        //Paso 3. Buscar su patrocinador en la tabla de binaries y a ese patrocinador agregarle los puntos en la tabla add_points, de forma ascendente repetirse el ultimo paso con cada sponsor de cada sponsor. 
        //Paso 4. Actualizar la tabla sales el campo asc_points = 2.

        $sales = Sale::where('asc_points', 1)->get();

        foreach ($sales as $sale) {

            $sponsor_id = $sale->user_id;
            $a = 1;
            do {
                $binary = Binary::where('direct_id', $sponsor_id)->first();

                if ($binary) {
                    AddPoint::create([
                        'user_id' => $binary->user_id,
                        'sale_id' => $sale->id,
                        'side' => $binary->side,
                    ]);

                    $sponsor_id = $binary->user_id;
                } else {
                    $a = 12;
                }
            } while ($a <= 10);

            $sale->update([
                'asc_points' => 2,
            ]);
        }
    }
}
