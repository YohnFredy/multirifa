<?php

namespace App\Http\Livewire\Office;

use App\Models\Binary;
use App\Models\Point;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


function point($user_id)
{
    $point = Point::where('user_id', $user_id)->where('state', 1)->first();
    return $point;
}

class BinaryTree extends Component
{
    public $user, $usuario, $point;

    public function mount()
    {
        $this->user = Auth::user();

        $this->point = point($this->user->id);
    }

    public function bajar(User $user)
    {
        $this->user = $user;
        $this->point = point($this->user->id);
    }

    public function subir(User $user)
    {
        $usuario = Auth::user();

        if ($usuario->id == $user->id) {
            $this->user = $usuario;
        } else {
            $user = Binary::where('direct_id', $user->id)->first();
            $this->user = $user->user;
        }

        $this->point = point($this->user->id);
    }

    public function render()
    {
        return view('livewire.office.binary-tree')->layout(\App\View\Components\OfficeLayout::class);
    }
}
