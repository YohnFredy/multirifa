<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Alert extends Component
{
    public $open = true;

    public function cerrar()
    {
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.alert');
    }
}
