<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use App\Models\Hospital;
use App\Models\District;
use App\Models\Division;
use App\Models\Location;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminHospitals extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;
    public $search = "";
    public $sortBy = "id";
    public $sortDirection = "asc";

    public $hospital_name, $division, $district, $upazila, $location, $phone, $details; //variables for Add Hospital 
    public $hospital_id, $e_hospital_name, $e_division, $e_district, $e_upazila, $e_location, $e_phone, $e_details; //variables for Edit Hospital 
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
        $hospital_info = new Hospital();
        $division_name = Division::find($this->division);

        $hospital_info->hospital_name = $this->hospital_name;
        $hospital_info->division = $division_name->division_name;
        $hospital_info->district = $this->district;
        $hospital_info->upazila = $this->upazila;
        $hospital_info->location = $this->location;
        $hospital_info->phone = $this->phone;
        $hospital_info->details = $this->details;

        if ($this->image) {
            $image_name = Carbon::now()->timestamp.'.'.$this->image->extension();
            $this->image->storeAs('hospitals',$image_name);
            $hospital_info->photo = "uploads/hospitals/".$image_name;
        }
        

        $hospital_info->save();
        session()->flash('message','Hospital Added Successfully.');
        $this->emit('storeSomething');

        $this->hospital_name = null;
        $this->division = null;
        $this->district = null;
        $this->upazila = null;
        $this->location = null;
        $this->phone = null;
        $this->details = null;
    }

    public function getHospital($id)
    {
        $this->hospital_id = $id;
        $hospital_info = Hospital::find($id);
        $division_id = Division::where('division_name',$hospital_info->division)->first();

        $this->e_hospital_name = $hospital_info->hospital_name;
        $this->e_division = $division_id->id;
        $this->e_district = $hospital_info->district;
        $this->e_upazila = ucwords(strtolower($hospital_info->upazila));
        $this->e_location = $hospital_info->location;
        $this->e_phone = $hospital_info->phone;
        $this->e_details = $hospital_info->details;
        $this->old_image = $hospital_info->photo;
    }

    public function updateHospital()
    {
        $hospital_info = Hospital::find($this->hospital_id);
        $division_info = Division::find($this->e_division);

        $hospital_info->hospital_name = $this->e_hospital_name;
        $hospital_info->division = $division_info->division_name;
        $hospital_info->district = $this->e_district;
        $hospital_info->upazila = $this->e_upazila;
        $hospital_info->location = $this->e_location;
        $hospital_info->phone = $this->e_phone;
        $hospital_info->details = $this->e_details;

        if ($this->e_image) {
            $image_name = Carbon::now()->timestamp.'.'.$this->e_image->extension();
            $this->e_image->storeAs('hospitals',$image_name);
            $content_info->photo = "uploads/hospitals/".$image_name;
        }
        

        $hospital_info->save();
        session()->flash('message','Hospital Updated Successfully.');
        $this->emit('storeSomething');

        $this->hospital_id = null;
        $this->e_hospital_name = null;
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
        Hospital::find($this->delete_id)->delete();
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
        $allHospitals = Hospital::orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);

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

        return view('livewire.admin.admin-hospitals',compact('allHospitals','data'))->layout('layouts.admin_base');
    }
}
