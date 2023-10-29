<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;



use App\Models\EmergencyInfo;

class EmergencyInfoSettings extends Component
{

    public $option, $description, $contact;



    public function updateInfo()
    {
        $data = EmergencyInfo::find(1);

        if ($this->option == 1) {
            $data->ambulance_d = $this->description;
            $data->ambulance_n = $this->contact;
        }else if($this->option == 2){
            $data->blood_bank_d = $this->description;
            $data->blood_bank_n = $this->contact;
        }else if($this->option == 3){
            $data->social_d = $this->description;
            $data->social_n = $this->contact;
        }else if($this->option == 4){
            $data->graveyard_d = $this->description;
            $data->graveyard_n = $this->contact;
        }else if($this->option == 5){
            $data->funeral_d = $this->description;
            $data->funeral_n = $this->contact;
        } else {
            $data->therapy_d = $this->description;
            $data->therapy_n = $this->contact;
        }

        $data->save();


        $option = null;
        $description = null;
        $contact = null;

        session()->flash('message','Information Changed Successfully.');
        $this->emit('storeSomething');
        
    }



    public function setOption($id)
    {
        $this->option = $id;

        $data = EmergencyInfo::find(1);

        if ($id == 1) {
            $this->description = $data->ambulance_d;
            $this->contact = $data->ambulance_n;
        }else if($this->option == 2){
            $this->description = $data->blood_bank_d;
            $this->contact = $data->blood_bank_n;
        }else if($this->option == 3){
            $this->description = $data->social_d;
            $this->contact = $data->social_n;
        }else if($this->option == 4){
            $this->description = $data->graveyard_d;
            $this->contact = $data->graveyard_n;
        }else if($this->option == 5){
            $this->description = $data->funeral_d;
            $this->contact = $data->funeral_n;
        }else {
            $this->description = $data->therapy_d;
            $this->contact = $data->therapy_n;
        }
        
        // $this->description = $data->
        //     $this->contact = $data->
    }


    // public function mount()
    // {
    //     $data = EmergencyInfo::find(1);

    //     $this->description = $data->ambulance_d;
    //     $this->contact = $data->ambulance_n;

        // $this->description = $data->blood_bank_d;
        // $this->contact = $data->blood_bank_n;

        // $this->description = $data->social_d;
        // $this->contact = $data->social_n;

    //     $this->description = $data->graveyard_d;
    //     $this->contact = $data->graveyard_n;

    //     $this->description = $data->funeral_d;
    //     $this->contact = $data->funeral_n;

    //     $this->description = $data->therapy_d;
    //     $this->contact = $data->therapy_n;
    // }

    public function render()
    {

        $data = EmergencyInfo::find(1);
        

        return view('livewire.admin.emergency-info-settings',compact('data'))->layout('layouts.admin_base');
    }
}
