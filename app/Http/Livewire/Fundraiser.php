<?php

namespace App\Http\Livewire;

use Livewire\Component;



use App\Models\Volunteer;

class Fundraiser extends Component
{

    public $d_name, $d_profession, $d_p_location, $d_phone, $d_email, $d_gender, $d_fb_link, $d_viber_link, $d_imo_link, $d_whatsapp_link, $d_blood_group, $d_referance;

    public function saveDonor()
        {
                $data = new Volunteer;
                 
                $data->name = $this->d_name;
                $data->profession = $this->d_profession;
                $data->location = $this->d_p_location;
                $data->mobile = $this->d_phone;
                $data->email = $this->d_email;
                $data->gender = $this->d_gender;
                $data->facebook = $this->d_fb_link;
                // $data->viber = $this->d_viber_link;
                // $data->imo = $this->d_imo_link;
                $data->whatsapp = $this->d_whatsapp_link;
                $data->blood_group = $this->d_blood_group;
                $data->referance = $this->d_referance;
                $data->status = "Donor";
                $data->type = "donation";

                $data->save();
                // $this->emit('storeSomething');
                $this->d_name = null;
                $this->d_profession = null;
                $this->d_p_location = null;
                $this->d_phone = null;
                $this->d_email = null;
                $this->d_gender = null;
                $this->d_fb_link = null;
                $this->d_viber_link = null;
                $this->d_imo_link = null;
                $this->d_whatsapp_link = null;
                $this->d_blood_group = null;
                $this->d_referance = null;

                session()->flash('message','Your Information Submited Successfully.');
                // dd($data);

        }

    public function render()
    {
        return view('livewire.fundraiser')->layout('frontend.livewire_base');
    }
}
