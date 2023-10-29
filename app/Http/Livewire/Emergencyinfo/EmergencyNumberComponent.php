<?php

namespace App\Http\Livewire\Emergencyinfo;

use Livewire\Component;

use App\Models\emergencyinfo\emergencynumberinfo_table;

class EmergencyNumberComponent extends Component
{
    public function render()
    {
        $description_info = emergencynumberinfo_table::find(1);

        return view('livewire.emergencyinfo.emergency-number-component',compact('description_info'))->layout('frontend.livewire_base');
    }
}
