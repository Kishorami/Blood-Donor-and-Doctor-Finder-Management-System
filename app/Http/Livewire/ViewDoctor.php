<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ViewDoctor extends Component
{
    public function render()
    {
        return view('livewire.view-doctor')->layout('frontend.livewire_base');
    }
}
