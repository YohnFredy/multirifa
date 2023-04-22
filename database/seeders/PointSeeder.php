<?php

namespace Database\Seeders;

use App\Models\Point;
use App\Models\Sale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Unimos la tabla sales con la tabla Add_points con el fin de obtener distintos user_id que no se repintan. Crear la tabla points con la suma de todos los puntos obtenidos del user_id seleccionado de la tabla add_points.
        $add_points_user_id =  DB::table('sales')
            ->join('add_points', 'sales.id', '=', 'add_points.sale_id')
            ->where('sales.asc_points', 2)
            ->select('add_points.user_id as point_user_id')->distinct()
            ->orderBy('point_user_id', 'asc')
            ->get();

        foreach ($add_points_user_id as $user) {

            $total_pts = DB::table('sales')
                ->join('add_points', 'sales.id', '=', 'add_points.sale_id')
                ->where('sales.asc_points', 2)->where('add_points.user_id', $user->point_user_id)
                ->select('sales.id', 'sales.pts', 'add_points.side')
                ->get();

            $cant_l = 0;
            $cant_r = 0;
            foreach ($total_pts as $item) {

                if ($item->side == 'left') {
                    $cant_l = $item->pts + $cant_l;
                } else {
                    $cant_r = $item->pts + $cant_r;
                }
            }

            Point::create([
                'user_id' => $user->point_user_id,
                'pts_left' => $cant_l,
                'pts_right' => $cant_r,
            ]);
        }

        //Actualizar la tabla sales el campo asc_points = 3.
        $sales = Sale::where('asc_points', 2)->get();

        foreach ($sales as $sale) {
            $sale->update([
                'asc_points' => 3,
            ]);
        }
    }
}
