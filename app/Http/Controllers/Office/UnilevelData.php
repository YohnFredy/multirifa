<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnilevelData extends Controller
{
    public function index(){
        $usuarios = [];
        $user_nivel = [];
        $sponsor = [];

        $nivel = 0;
        $cantidad = 0;
        $contador = 0;

        $user = Auth::user();

        do {
            foreach ($user->unilevels as $unilevel) {
                $user_id[] = $unilevel->direct_id;
                $user_nivel[] = $nivel + 1;
                $sponsor[] = $user->usuario;
                $cantidad++;
            }

            if (isset($user_id[$contador])) {
                $user = User::find($user_id[$contador]);
                $usuarios[] = $user;
                $nivel = $user_nivel[$contador];
            }

            $contador++;

            if ($cantidad >= $contador) {
                $a = 0;
            } else {
                $a = 11;
            }
        } while ($a <= 10);


        return view('office.unilevel-data', compact('usuarios', 'user_nivel','sponsor')); 
    }
}
