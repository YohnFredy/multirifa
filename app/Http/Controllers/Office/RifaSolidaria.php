<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RifaSolidaria extends Controller
{
    public function index()
    {

        $user = Auth::user();

        $merchantId = env('PAYU_MERCHANTID');
        $ApiKey = env('PAYU_APIKEY');
        $referenceCode = "pago00" . 3;
        $amount = 15;
        $currency = "USD";
       

        $firma= $ApiKey."~".$merchantId."~".$referenceCode."~".$amount."~".$currency;
        $signature= md5($firma);




        return view('office.rifa-solidaria', compact('user','signature', 'referenceCode','merchantId' ));
    }
}
