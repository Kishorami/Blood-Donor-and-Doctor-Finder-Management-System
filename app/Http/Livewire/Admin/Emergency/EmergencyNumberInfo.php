<?php

namespace App\Http\Livewire\Admin\Emergency;

use Livewire\Component;

use App\Models\emergencyinfo\emergencynumberinfo_table;

class EmergencyNumberInfo extends Component
{

    public $body, $e_description;


    public function updateVideo()
    {
        $info = emergencynumberinfo_table::find(1);
        $info->description = $this->body;

        $info->save();
        session()->flash('message','Emergency Number Information Changed.');
        // dd("updateVideo()");
    }

    public function mount()
    {
        $info = emergencynumberinfo_table::find(1);
        $this->body = $info->description;
    }

    public function render()
    {
        return view('livewire.admin.emergency.emergency-number-info')->layout('layouts.admin_base');
    }
}
