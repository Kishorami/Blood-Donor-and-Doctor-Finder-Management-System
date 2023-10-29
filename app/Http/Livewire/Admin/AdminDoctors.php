<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use App\Models\Doctor;
use App\Models\District;
use App\Models\Division;
use App\Models\Location;
use App\Models\Doctor_speciality;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminDoctors extends Component
{
    use WithPagination;
    use WithFileUploads;
    
    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;
    public $search = "";
    public $sortBy = "id";
    public $sortDirection = "asc";

    public $name, $designation, $hospital, $specialist, $division, $district, $upazila, $phone, $gender, $preasent_address, $doctor_detail, $schedule, $chamber_address; //variables to add Doctor

    public $doctor_id, $e_name, $e_designation, $e_hospital, $e_specialist, $e_division, $e_district, $e_upazila, $e_phone, $e_gender, $e_preasent_address, $e_doctor_detail, $e_schedule, $e_chamber_address; //variables to Edit Doctor

    public $delete_id;

    public $image, $e_image;
    public $old_image;

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

    public function storeDoctor()
    {
        $doctor_info = new Doctor();
        $division_name = Division::find($this->division);

        $doctor_info->name = $this->name;
        $doctor_info->designation = $this->designation;
        $doctor_info->hospital = $this->hospital;
        $doctor_info->specialist = $this->specialist;
        $doctor_info->division = $division_name->division_name;
        $doctor_info->district = $this->district;
        $doctor_info->upazila = $this->upazila;
        $doctor_info->phone = $this->phone;
        $doctor_info->gender = $this->gender;
        $doctor_info->preasent_address = $this->preasent_address;
        $doctor_info->doctor_detail = $this->doctor_detail;
        $doctor_info->schedule = $this->schedule;
        $doctor_info->chamber_address = $this->chamber_address;

        if ($this->image) {
            $image_name = Carbon::now()->timestamp.'.'.$this->image->extension();
            $this->image->storeAs('doctors',$image_name);
            $doctor_info->pic_path = "uploads/doctors/".$image_name;
        }
        

        $doctor_info->save();
        session()->flash('message','Doctor Added Successfully.');
        $this->emit('storeSomething');

        $this->name = null;
        $this->designation = null;
        $this->hospital = null;
        $this->specialist = null;
        $this->division = null;
        $this->district = null;
        $this->upazila = null;
        $this->phone = null;
        $this->gender = null;
        $this->preasent_address = null;
        $this->doctor_detail = null;
        $this->schedule = null;
        $this->chamber_address = null;

    }

    public function getDoctor($id)
    {
        $this->doctor_id = $id;
        $doctor_info = Doctor::find($id);
        $division_id = Division::where('division_name',$doctor_info->division)->first();
        // dd($doctor_info);

        $this->e_name = $doctor_info->name;
        $this->e_designation = $doctor_info->designation;
        $this->e_hospital = $doctor_info->hospital;
        $this->e_specialist = $doctor_info->specialist;
        $this->e_division = $division_id->id;
        $this->e_district = $doctor_info->district;
        $this->e_upazila = ucwords(strtolower($doctor_info->upazila));
        $this->e_phone = $doctor_info->phone;
        $this->e_gender = $doctor_info->gender;
        $this->e_preasent_address = $doctor_info->preasent_address;
        $this->e_doctor_detail = $doctor_info->doctor_detail;
        $this->e_schedule = $doctor_info->schedule;
        $this->e_chamber_address = $doctor_info->chamber_address;
        $this->old_image = $doctor_info->pic_path;
        // dd($this->e_upazila);

    }

    public function updateDoctor()
    {
        $doctor_info = Doctor::find($this->doctor_id);
        $division_info = Division::find($this->e_division);
        // dd($division_info);

        $doctor_info->name = $this->e_name;
        $doctor_info->designation = $this->e_designation;
        $doctor_info->hospital = $this->e_hospital;
        $doctor_info->specialist = $this->e_specialist;
        $doctor_info->division = $division_info->division_name;
        $doctor_info->district = $this->e_district;
        $doctor_info->upazila = $this->e_upazila;
        $doctor_info->phone = $this->e_phone;
        $doctor_info->gender = $this->e_gender;
        $doctor_info->preasent_address = $this->e_preasent_address;
        $doctor_info->doctor_detail = $this->e_doctor_detail;
        $doctor_info->schedule = $this->e_schedule;
        $doctor_info->chamber_address = $this->e_chamber_address;

        if ($this->e_image) {
            $image_name = Carbon::now()->timestamp.'.'.$this->e_image->extension();
            $this->e_image->storeAs('doctors',$image_name);
            $doctor_info->pic_path = "uploads/doctors/".$image_name;
        }
        

        $doctor_info->save();
        session()->flash('message','Doctor Updated Successfully.');
        $this->emit('storeSomething');

        $this->doctor_id = null;
        $this->e_name = null;
        $this->e_designation = null;
        $this->e_hospital = null;
        $this->e_specialist = null;
        $this->e_division = null;
        $this->e_district = null;
        $this->e_upazila = null;
        $this->e_phone = null;
        $this->e_gender = null;
        $this->e_preasent_address = null;
        $this->e_doctor_detail = null;
        $this->e_schedule = null;
        $this->e_chamber_address = null;
    }


    public function deleteID($id)
    {
        $this->delete_id = $id;
    }
    public function delete()
    {
        Doctor::find($this->delete_id)->delete();
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
        $allDoctors = Doctor::orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);

        $data['divisions'] = Division::all();
        $data['doctor_specialities'] = Doctor_speciality::all();

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

        return view('livewire.admin.admin-doctors',compact('allDoctors','data'))->layout('layouts.admin_base');
    }
}
