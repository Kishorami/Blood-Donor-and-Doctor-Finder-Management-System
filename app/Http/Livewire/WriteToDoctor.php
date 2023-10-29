<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Find_solution;

class WriteToDoctor extends Component
{

    public $name, $age, $blood_pressure, $any_disease, $email, $phone, $problems;


    public function storeFindSolution()
    {
        $data =new Find_solution();

        $data->name=$this->name;

        $data->age=$this->age;

        $data->last_blood_pressure=$this->blood_pressure;

        $data->any_disease=$this->any_disease;

        $data->email=$this->email;

        $data->phone=$this->phone;

        $data->problems=$this->problems;
        
        $data->save();
        session()->flash('message','We Got Your Problem. We Will Contact you Soon.');

        $this->name = null;
        $this->age = null;
        $this->blood_pressure = null;
        $this->any_disease = null;
        $this->email = null;
        $this->phone = null;
        $this->problems = null;
            
    }

    public function render()
    {
        return view('livewire.write-to-doctor')->layout('frontend.livewire_base');
    }
}
