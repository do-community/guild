<?php

namespace App\Http\Livewire;
use App\Models\Notification;
use App\Models\User;
use App\Models\Shift;
use Livewire\Component;

class Shifts extends Component
{
    public $timer;
    public $action;
    public $status;
    public $totalHours;

    public function render()
    {
        $this->totalHours();

        if (auth()->user()->isOnShift()) {
            $this->action = 'Stop';
            $this->status = 'On Shift';
        } else {
            $this->action = 'Start';
            $this->status = 'Not On Shift';
        }
        return view('livewire.shifts');
    }

    public function startShift()
    {
        auth()->user()->startShift();
        $this->status = 'On Shift';
        $this->dispatchBrowserEvent('notification', ['type' => 'success', 'message' => 'You are now on shift!']);
        $notification = new Notification;
        $notification->notify('Shift Started', 'The user started thier shift!');
    }

    public function endShift()
    {
        auth()->user()->endShift();
        $this->status = 'Not On Shift';
        $this->dispatchBrowserEvent('notification', ['type' => 'success', 'message' => 'You have ended your shift!']);
        $notification = new Notification;
        $notification->notify('Shift Ended', 'The user thier shift!');
    }

    public function changeShiftStatus()
    {
        if (auth()->user()->isOnShift()) {
            $this->endShift();
        } else {
            $this->startShift();
        }
    }

    public function totalHours()
    {
        $this->totalHours = auth()->user()->totalHoursWorked();
    }
}
