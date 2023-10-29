<?php

namespace App\Http\Livewire;

use Livewire\Component;


use App\Models\Donor;

class DonorChangePassword extends Component
{

    public $pre_pass, $old_password, $password, $password2;


    public function updatePassword()
    {
        if ($this->pre_pass === $this->old_password) {
            if ($this->password === $this->password2) {
                $donor_info = Donor::find(session()->get('did'));
                $donor_info->password = $this->password;
                $donor_info->save();
                session()->flash('message','Your Password Updated Successfuly.');
                $this->password = null; 
                $this->password2 = null;
                $this->old_password = null; 
            } else {
                session()->flash('e-message','Your Given Passwords are not Same.');
                $this->password = null; 
                $this->password2 = null;
            }
            
        } else {
            session()->flash('e-message','You have Given Present Password Wrong.');
            $this->old_password = null; 
        }
        
    }

    public function mount()
    {
        $donor_info = Donor::find(session()->get('did'));
        $this->pre_pass = $donor_info->password;

    }

    public function render()
    {
        return view('livewire.donor-change-password')->layout('frontend.livewire_base');
    }
}
