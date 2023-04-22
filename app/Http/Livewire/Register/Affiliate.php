<?php

namespace App\Http\Livewire\Register;

use App\Models\Binary;
use App\Models\Country;
use App\Models\Quantity;
use App\Models\State;
use App\Models\Unilevel;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Affiliate extends Component
{
    protected $listeners = ['captchaResponse' => 'processCaptcha'];


    public $name, $apellido, $cedula, $email, $usuario, $sexo, $f_nacimiento, $countries, $states = [],  $country_id = '', $state_id = '', $city = "", $direccion, $telefono, $password, $password_confirmation,  $sponsor, $side;

    public $modal = false;

    public $captcha = 0;
    
    protected $rules = [
        'name' => 'required|string|min:3|max:100',
        'apellido' => 'max:100',
        'cedula' => 'max:12',
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'usuario' => ['required', 'string', 'min:3', 'max:17', 'unique:users'],
        'city' => ['min:3', 'max:50'],
        'direccion' => 'max:100',
        'telefono' => 'required|min:5|max:100',
        'password' => 'required|string|min:8|',
        "password_confirmation" => 'required|same:password',
    ];

    protected $validationAttributes = [
        'name' => 'Nombre',
        'city' => 'ciudad',
        'direccion' => 'dirección',
        'telefono' => 'teléfono'
    ];

    public function mount()
    {
        $this->countries = Country::all();
    }

    public function updatedCountryId($value)
    {
        $this->states = State::where('country_id', $value)->get();
        $this->reset(['state_id']);
    }

    public function updated($propertyName)
    {
        $this->usuario = str_replace(' ', '', $this->usuario);
        $this->validateOnly($propertyName);
    }


    public function processCaptcha($token)
    {
        $response = Http::post('https://www.google.com/recaptcha/api/siteverify?secret=' . env("RECAPTCHA_CLAVE_SECRETA") . '&response=' . $token);
        $this->captcha = $response->json()['score'];

        if ($this->captcha >= 0.7) {
            $this->store();
        } 
    }

    public function store()
    {
        $this->validate();

        $direct = User::create([
            'name' => $this->name,
            'apellido' => $this->apellido,
            'cedula' => $this->cedula,
            'email' => $this->email,
            'usuario' => $this->usuario,
            'sexo' => $this->sexo,
            'f_nacimiento' => $this->f_nacimiento,
            'country_id' => $this->country_id,
            'state_id' => $this->state_id,
            'city' => $this->city,
            'direccion' => $this->direccion,
            'telefono' => $this->telefono,
            'password' => Hash::make($this->password),
        ]);

        //Cada sponsor se le agrega un usuario directo. Unilevel.
        $sponsor_id = $this->sponsor->id;
        Unilevel::create([
            'user_id' => $sponsor_id,
            'direct_id' => $direct->id,
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

        //Binario .
        $sponsor_id = $this->sponsor->id;
        $side = $this->side;
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
                    'direct_id' => $direct->id,
                    'side' => $side,
                ]);
                $a = 13;
            }
        } while ($a <= 10);

        $sponsor_id = $this->sponsor->id;
        $a = 1;

        //En el siguiente do while sumamos a cada sponsor el nuevo usuario en la tabla quentities de forma ascendente, tener en cuenta que este proceso empieza desde el sponsor hacia arriba, ya que en el anterior do while se sumó del sponsor hacia abajo.
        do {
            $binary = Binary::where('direct_id', $sponsor_id)->first();

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

        $this->reset(['name', 'apellido', 'cedula', 'email', 'usuario', 'sexo', 'f_nacimiento', 'country_id', 'state_id', 'city', 'direccion', 'telefono', 'password', 'password_confirmation']);

        $this->modal = true;
    }

    public function cerrar()
    {
        return redirect()->to('/');
    } 


    public function render()
    {
        return view('livewire.register.affiliate');
    }
}
