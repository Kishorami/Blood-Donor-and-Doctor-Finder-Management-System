<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\Volunteer;

class EditVolunteer extends Component
{

    public $name, $profession, $p_location, $phone, $email, $gender, $fb_link, $viber_link, $imo_link, $whatsapp_link, $blood_group, $referance, $status;

    public $edit_id;

    public function updateVolunteer()
    {
        $data =Volunteer::find($this->edit_id);
             
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
        
        session()->flash('message','Volunteer Updated Successfully.');
        // dd($data);
    }

    public function mount($id)
    {
        $this->edit_id = $id;
        $data =Volunteer::find($id);
             
        $this->name = $data->name;
        $this->profession = $data->profession;
        $this->p_location = $data->location;
        $this->phone = $data->mobile;
        $this->email = $data->email;
        $this->gender = $data->gender;
        $this->fb_link = $data->facebook;
        $this->viber_link = $data->viber;
        $this->imo_link = $data->imo;
        $this->whatsapp_link = $data->whatsapp;
        $this->blood_group = $data->blood_group;
        $this->referance = $data->referance;
        $this->status = $data->status;

        if ($this->status == "Volunteer") {
            $data->type = "invite";
        } else {
            $data->type = "donation";
        }

        // dd($data);
    }

    public function render()
    {
        return view('livewire.admin.edit-volunteer')->layout('layouts.admin_base');
    }
}
