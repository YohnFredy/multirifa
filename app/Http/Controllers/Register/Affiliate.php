<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class Affiliate extends Controller
{
    public function create($sponsor_user, $user_side)
    {
        $sponsor = User::where('usuario', $sponsor_user)->first();

        $existe_sponsor = false;
        $existe_side = false;

        if ($sponsor) {
            $existe_sponsor = true;
        }

        if ($user_side == 'l') {
            $side = 'left';
            $existe_side = true;
        } elseif ($user_side == 'r') {
            $side = 'right';
            $existe_side = true;
        } else {
            $side = "";
        }

        if ($existe_sponsor == true && $existe_side == true) {
            $continuar = true;
        } else {
            $continuar = false;
        }
        return view('register.affiliate', compact('sponsor', 'side', 'continuar'));
    }
}
