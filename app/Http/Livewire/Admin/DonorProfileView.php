<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\Donor;

class DonorProfileView extends Component
{

    public $donor;

    public function mount($id)
    {
        $this->donor = Donor::find($id);
    }

    public function render()
    {
        $donorInfo = $this->donor;

        return view('livewire.admin.donor-profile-view', compact('donorInfo'))->layout('layouts.admin_base');
    }
}
