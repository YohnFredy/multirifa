<?php

namespace App\Http\Livewire\Office;

use App\Models\Unilevel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UnilevelTree extends Component
{
    public $user, $usuario;


    public function mount()
    {
        $this->user = Auth::user();
    }

    public function bajar(User $user)
    {

        $this->user = $user;
    }

    public function subir(User $user)
    {
        $usuario = Auth::user();

        if ($usuario->id == $user->id) {
            $this->user = $usuario;
        } else {
            $user = Unilevel::where('direct_id', $user->id)->first();
            $this->user = $user->user;
        }
       
    }

    public function render()
    {
        return view('livewire.office.unilevel-tree')->layout(\App\View\Components\OfficeLayout::class);
    }
}
