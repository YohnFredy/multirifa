<?php

namespace Database\Seeders;

use App\Models\Binary;
use App\Models\Quantity;
use App\Models\Unilevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnilevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // En el siguiente for llenamos de datos la tabla unilevels, la tabla binaries y la tabla quentities.
        $count = 1;
        for ($i = 0; $i < $count; $i++) {

            //Cada sponsor que escogemos de forma aleatoria se le agrega un usuario directo. Unilevel.
            $user = rand(1, $count);
            $sponsor_id = $user;
            Unilevel::create([
                'user_id' => $sponsor_id,
                'direct_id' => $count + 1,
            ]);

            //En el siguiente do while cada usuario que ingresa le suma a todos los sponsors de forma ascendente en la tabla quantities.
            $a = 1;
            $count_direct = 1;
            do {
                $quantity = Quantity::where('user_id', $sponsor_id)->first();

                if ($quantity) {
                    $cant = $quantity->unilevel;

                    if ($count_direct > 1) {
                        $quantity->update([
                            'unilevel' => $cant + 1,
                        ]);
                    } else {

                        $cant_direct = $quantity->direct;
                        $quantity->update([
                            'direct' => $cant_direct + 1,
                            'unilevel' => $cant + 1,
                        ]);

                        $count_direct = 2;
                    }
                } else {

                    Quantity::create([
                        'direct' => 1,
                        'user_id' => $sponsor_id,
                        'unilevel' => 1,
                    ]);

                    $count_direct = 2;
                }

                $unilevel = Unilevel::where('direct_id', $sponsor_id)->first();

                if ($unilevel) {
                    $sponsor_id = $unilevel->user_id;
                } else {
                    $a = 12;
                }
            } while ($a <= 10);

            //Binario escogemos el side = left o right de forma aleatoria o por la pierna débil.

            $quantity = Quantity::where('user_id', $user)->first();
            if ($quantity) {
                $right = $quantity->right;
                $left =  $quantity->left;

                if ($left < $right) {
                    $side = 'left';
                } else {
                    $side = 'right';
                }
            } else {
                $collection = collect(['right', 'left']);
                $side = $collection->random();
            }

            $sponsor_id = $user;

            $a = 1;

            //En el siguiente do while,  a medida que buscamos de forma descendente su posición en el árbol binario dependiendo del side que le toco, vamos sumando en la tabla quantities de cada sponsor el nuevo usuario, hasta llegar a la posición asignada.
            do {
                $quantity = Quantity::where('user_id', $sponsor_id)->first();
                if ($quantity) {
                    $cant = $quantity->$side;

                    $quantity->update([
                        $side => $cant + 1,
                    ]);
                } else {
                    Quantity::create([
                        'user_id' => $sponsor_id,
                        $side => 1,
                    ]);
                }

                $binary = Binary::where('user_id', $sponsor_id)->where('side', $side)->first();

                if ($binary) {
                    $sponsor_id = $binary->direct_id;
                } else {
                    Binary::create([
                        'user_id' => $sponsor_id,
                        'direct_id' => $count + 1,
                        'side' => $side,
                    ]);
                    $a = 13;
                }
            } while ($a <= 10);

            $sponsor_id = $user;
            $a = 1;

            //En el siguiente do while sumamos a cada sponsor el nuevo usuario en la tabla quentities de forma ascendente, tener en cuenta que este proceso empieza desde el sponsor hacia arriba, ya que en el anterior do while se sumó del sponsor hacia abajo.
            do {
                $binary = binary::where('direct_id', $sponsor_id)->first();

                if ($binary) {

                    $sponsor_id = $binary->user_id;

                    $quantity = Quantity::where('user_id', $sponsor_id)->first();

                    $side = $binary->side;
                    $cant = $quantity->$side;

                    $quantity->update([
                        $side => $cant + 1,
                    ]);
                } else {
                    $a = 14;
                }
            } while ($a <= 10);

            $count++;
            if ($count == 100) {
                break;
            }
        }
    }
}
