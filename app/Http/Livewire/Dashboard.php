<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\WithShift;

class Dashboard extends Component
{
    use WithShift;

    protected $listeners = [
        Shifts::SHIFT_CHANGED // calls shiftChanged()
    ];

    public function render()
    {
        return view('livewire.dashboard');
    }
}
