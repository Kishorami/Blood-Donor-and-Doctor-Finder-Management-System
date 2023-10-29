<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Doctor;
use App\Models\District;
use App\Models\Division;
use App\Models\Location;
use App\Models\Doctor_speciality;
use Illuminate\Support\Collection;
class FindDoctor extends Component
{

    public $district, $division, $location, $doctor_speciality;

    public $districts;
    public $locations;
    public $requested_doctors;
    public $flag=0;

    public function getDistricts($division)
    {
        $districts = District::where('division_row_id', $division)->get();
        return $districts;
    }

    public function getLocations($district)
    {
        $locations = Location::where('district', $district)->get();
        return $locations;
    }


    public function findDoctor()
    {
        $division_name = Division::find($this->division);
        // $this->requested_doctors = Doctor::where([

        //                                     ['specialist', '=', $this->doctor_speciality],
        //                                     ['division', '=', $division_name->division_name],
        //                                     ['district', '=', $this->district],
        //                                     ['upazila', '=', $this->location],

        //                                 ])->get();


        $this->requested_doctors = Doctor::where([

                                            ['specialist', '=', $this->doctor_speciality],

                                        ])->get();

        if ($this->division != null && $this->district !=null && $this->location != null) {

            $this->requested_doctors = $this->requested_doctors
                                        ->where('division',$division_name->division_name)
                                        ->where('district',$this->district)
                                        ->filter(function ($item){
                                            return strtolower($item['upazila']) == strtolower($this->location);
                                        });
        }
        elseif ($this->division != null && $this->district != null) {
            $this->requested_doctors = $this->requested_doctors->where('division',$division_name->division_name)->where('district',$this->district);
        }
        elseif ($this->division != null) {
            $this->requested_doctors = $this->requested_doctors->where('division',$division_name->division_name);
        }

        


        $this->flag=1;
        
        // return view('livewire.view-doctor', compact('requested_doctors'))->layout('frontend.livewire_base');
    }

    public function mount()
    {
        $this->districts = collect();
        $this->locations = collect();
        $this->requested_doctors = collect();
    }

    public function render()
    {

        
        // $data['districts'] = District::all();
        $data['divisions'] = Division::all();
        $data['doctor_specialities'] = Doctor_speciality::all();

        // dd($this->division);
        if ($this->division != null) {
            $this->districts = self::getDistricts($this->division);
            // dd($this->districts); 
        }
        if ($this->district != null) {
            $this->locations = self::getLocations($this->district); 
        }

        return view('livewire.find-doctor', compact('data'))->layout('frontend.livewire_base');
    }
}
