<?php

namespace App\Http\Livewire\Admin\Emergency;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use App\Models\emergencyinfo\ambulance_table;
use App\Models\District;
use App\Models\Division;
use App\Models\Location;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AmbulanceInfo extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;
    public $search = "";
    public $sortBy = "id";
    public $sortDirection = "asc";

    public $name, $division, $district, $upazila, $location, $phone, $details; //variables for Add Ambulance Info 
    public $ambulance_id, $e_name, $e_division, $e_district, $e_upazila, $e_location, $e_phone, $e_details; //variables for Edit Ambulance Info 
    public $image, $e_image;
    public $old_image;
    public $delete_id;


    public $districts;
    public $locations;

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



    public function storeHospital()
    {
        $info = new ambulance_table();
        $division_name = Division::find($this->division);

        $info->name = $this->name;
        $info->division = $division_name->division_name;
        $info->district = $this->district;
        $info->upazila = $this->upazila;
        $info->location = $this->location;
        $info->phone = $this->phone;
        $info->details = $this->details;

        if ($this->image) {
            $image_name = Carbon::now()->timestamp.'.'.$this->image->extension();
            $this->image->storeAs('emergency/ambulance',$image_name);
            $info->photo = "uploads/emergency/ambulance/".$image_name;
        }
        

        $info->save();
        session()->flash('message','Information Added Successfully.');
        $this->emit('storeSomething');

        $this->name = null;
        $this->division = null;
        $this->district = null;
        $this->upazila = null;
        $this->location = null;
        $this->phone = null;
        $this->details = null;
    }

    public function getHospital($id)
    {
        $this->ambulance_id = $id;
        $info = ambulance_table::find($id);
        $division_id = Division::where('division_name',$info->division)->first();

        $this->e_name = $info->name;
        $this->e_division = $division_id->id;
        $this->e_district = $info->district;
        $this->e_upazila = ucwords(strtolower($info->upazila));
        $this->e_location = $info->location;
        $this->e_phone = $info->phone;
        $this->e_details = $info->details;
        $this->old_image = $info->photo;
    }


    public function updateHospital()
    {
        $info = ambulance_table::find($this->ambulance_id);
        $division_info = Division::find($this->e_division);

        $info->name = $this->e_name;
        $info->division = $division_info->division_name;
        $info->district = $this->e_district;
        $info->upazila = $this->e_upazila;
        $info->location = $this->e_location;
        $info->phone = $this->e_phone;
        $info->details = $this->e_details;

        if ($this->e_image) {
            $image_name = Carbon::now()->timestamp.'.'.$this->e_image->extension();
            $this->e_image->storeAs('emergency/ambulance',$image_name);
            $content_info->photo = "uploads/emergency/ambulance/".$image_name;
        }
        

        $info->save();
        session()->flash('message','Information Updated Successfully.');
        $this->emit('storeSomething');

        $this->ambulance_id = null;
        $this->e_name = null;
        $this->e_division = null;
        $this->e_district = null;
        $this->e_upazila = null;
        $this->e_location = null;
        $this->e_phone = null;
        $this->e_details = null;

    }


    public function deleteID($id)
    {
        $this->delete_id = $id;
    }
    public function delete()
    {
        ambulance_table::find($this->delete_id)->delete();
        $this->emit('storeSomething');
    }

    public function sortBy($field)
    {
        if ($this->sortDirection == "asc") {
            $this->sortDirection = "desc";
        }
        else
        {
            $this->sortDirection = "asc";
        }

        return $this->sortBy = $field;
    }

    public function mount()
    {
        $this->districts = collect();
        $this->locations = collect();
    }

    public function render()
    {

        $allAmbulance = ambulance_table::orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);

         $data['divisions'] = Division::all();

        // dd($this->division);
        if ($this->division != null || $this->e_division != null) {
            $this->districts = self::getDistricts($this->division);
            // dd($this->districts); 
        }
        if ($this->district != null || $this->e_district != null) {
            $this->locations = self::getLocations($this->district); 
        }

        if ($this->e_division != null) {
            $this->districts = self::getDistricts($this->e_division);
            // dd($this->districts); 
        }
        if ($this->e_district != null) {
            $this->locations = self::getLocations($this->e_district); 
        }


        return view('livewire.admin.emergency.ambulance-info',compact('allAmbulance','data'))->layout('layouts.admin_base');
    }
}
