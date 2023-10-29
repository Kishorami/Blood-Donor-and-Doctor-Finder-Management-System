<?php

namespace App\Http\Livewire;

use Livewire\Component;


use App\Models\Volunteer;

class VolunteerComponent extends Component
{

    public $name, $profession, $p_location, $phone, $email, $gender, $fb_link, $viber_link, $imo_link, $whatsapp_link, $blood_group, $referance;

    public function saveVolunteer()
    {
            $data = new Volunteer;
             
            $data->name = $this->name;
            $data->profession = $this->profession;
            $data->location = $this->p_location;
            $data->mobile = $this->phone;
            $data->email = $this->email;
            $data->gender = $this->gender;
            $data->facebook = $this->fb_link;
            // $data->viber = $this->viber_link;
            // $data->imo = $this->imo_link;
            $data->whatsapp = $this->whatsapp_link;
            $data->blood_group = $this->blood_group;
            $data->referance = $this->referance;
            $data->status = "Volunteer";
            $data->type = "invite";

            $data->save();
            // $this->emit('storeSomething');
            $this->name = null;
            $this->profession = null;
            $this->p_location = null;
            $this->phone = null;
            $this->email = null;
            $this->gender = null;
            $this->fb_link = null;
            $this->viber_link = null;
            $this->imo_link = null;
            $this->whatsapp_link = null;
            $this->blood_group = null;
            $this->referance = null;

            session()->flash('message','Your Information Submited Successfully.');
            // dd($data);
    }

    public function render()
    {
        return view('livewire.volunteer-component')->layout('frontend.livewire_base');
    }
}
