<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\Volunteer;

class AddVolunteer extends Component
{

    public $name, $profession, $p_location, $phone, $email, $gender, $fb_link, $viber_link, $imo_link, $whatsapp_link, $blood_group, $referance, $status;

    public function storeVolunteer()
    {

        $data = new Volunteer;
             
        $data->name = $this->name;
        $data->profession = $this->profession;
        $data->location = $this->p_location;
        $data->mobile = $this->phone;
        $data->email = $this->email;
        $data->gender = $this->gender;
        $data->facebook = $this->fb_link;
        $data->viber = $this->viber_link;
        $data->imo = $this->imo_link;
        $data->whatsapp = $this->whatsapp_link;
        $data->blood_group = $this->blood_group;
        $data->referance = $this->referance;
        $data->status = $this->status;

        if ($this->status == "Volunteer") {
            $data->type = "invite";
        } else {
            $data->type = "donation";
        }
        

        $data->save();
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
        $this->status = null;

        session()->flash('message','Volunteer Added Successfully.');
        // dd($data);
    }

    public function render()
    {
        return view('livewire.admin.add-volunteer')->layout('layouts.admin_base');
    }
}
