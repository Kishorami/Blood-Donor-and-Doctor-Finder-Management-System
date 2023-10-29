<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;


use App\Models\District;
use App\Models\Division;
use App\Models\Location;
use App\Models\Hospital;

class FindHospital extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $division, $district,$location;

    public $districts;
    public $locations;
    public $requested_hospital;
    public $flag = 0;

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

    public function findHospital()
    {
        $division_name = Division::find($this->division);
        $this->requested_hospital = Hospital::where([

                                            ['division', '=', $division_name->division_name],
                                            // ['district', '=', $this->district],
                                            // ['upazila', '=', $this->location],

                                        ])->get();


        if ($this->division != null && $this->district !=null && $this->location != null) {

            $this->requested_hospital = $this->requested_hospital
                                        ->where('division',$division_name->division_name)
                                        ->where('district',$this->district)
                                        ->filter(function ($item){
                                            return strtolower($item['upazila']) == strtolower($this->location);
                                        });
        }
        elseif ($this->division != null && $this->district != null) {
            $this->requested_hospital = $this->requested_hospital->where('division',$division_name->division_name)->where('district',$this->district);
        }
        elseif ($this->division != null) {
            $this->requested_hospital = $this->requested_hospital->where('division',$division_name->division_name);
        }


        
        $this->flag=1;
        // dd($requested_hospital);
    }

    public function mount()
    {
        $this->districts = collect();
        $this->locations = collect();
        $this->requested_hospital = collect();
    }

    public function render()
    {
        $data['divisions'] = Division::all();

        if ($this->division != null) {
            $this->districts = self::getDistricts($this->division);
        }
        if ($this->district != null) {
            $this->locations = self::getLocations($this->district); 
        }

        return view('livewire.find-hospital',compact('data'))->layout('frontend.livewire_base');
    }
}
