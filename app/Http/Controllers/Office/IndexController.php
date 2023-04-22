<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $quantity = $user->quantity;
        $points = $user->points->where('state', 1)->first();

        return view('office.index', compact('user', 'quantity', 'points'));
    }
}
