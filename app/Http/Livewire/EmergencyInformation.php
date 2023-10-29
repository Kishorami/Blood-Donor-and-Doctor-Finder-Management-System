<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\EmergencyInfo;

class EmergencyInformation extends Component
{
    public function render()
    {
        $data = EmergencyInfo::find(1);

        return view('livewire.emergency-information', compact('data'))->layout('frontend.livewire_base');
    }
}
