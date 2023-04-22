<?php

namespace App\Http\Controllers;

use App\Mail\ContactanosMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class ContactanosController extends Controller
{
    public function index()
    {
        return view('contactanos.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'correo' => 'required|email',
            'mensaje' => 'required',
        ]);

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env("RECAPTCHA_CLAVE_SECRETA"),
            'response' => $request['g-recaptcha-response'],
        ])->object();

        if ($response == true && $response->score >= 0.7) {

            $correo = new ContactanosMailable($request);
            Mail::to('fredy.guapacha@gmail.com')->send($correo);

            return redirect()->route('contactanos.index')->with('info', 'Mensaje enviado');
        } else {
            return redirect()->route('contactanos.index')->with('info', 'La verificación de reCAPTCHA ha fallado');
        }
    }
}
