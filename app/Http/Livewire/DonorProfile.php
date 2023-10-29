<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\District;
use App\Models\Division;
use App\Models\Location;
use App\Models\Donor;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Carbon\Carbon;


class DonorProfile extends Component
{
    use WithFileUploads;

    public $district, $division, $location, $blood_group, $post_code, $phone, $f_name, $l_name, $email, $gender, $birth_date, $address, $password, $confirm_password, $profession, $reference, $nationality;
    public $image;
    public $old_image;

    public $districts;
    public $locations;

    public function updateProfile()
    {
        if($this->image){
            $this->validate([
                'image' => 'image|mimes:jpg,jpeg,png,svg,gif|max:2048',
            ]);
        }

        $profile_info = Donor::find(session()->get('did'));
        $division_info = Division::where('id',$this->division)->first();


        $profile_info->district = $this->district;
        $profile_info->division = $division_info->division_name;
        $profile_info->upazila = $this->location;
        $profile_info->blood_group = $this->blood_group;
        $profile_info->post_code = $this->post_code;
        $profile_info->phone = $this->phone;
        $profile_info->fname = $this->f_name;
        $profile_info->lname = $this->l_name;
        $profile_info->email = $this->email;
        $profile_info->gender = $this->gender;
        $profile_info->birth_date = $this->birth_date;
        $profile_info->address = $this->address;
        $profile_info->occupation = $this->profession;
        $profile_info->reference = $this->reference;

        if($this->image){
            $image_name = Carbon::now()->timestamp.'_'.session()->get('did').'.'.$this->image->extension();
            $this->image->storeAs('donors',$image_name);
            $profile_info->pic_path = "uploads/donors/".$image_name;
        }
        // dd("uploads/donors/".$image_name);
        $profile_info->save();
        session()->flash('message','Your Profile Has Been Updated.');
        // dd($profile_info);

    }

    public function getDistricts($division)
    {
        $districts = District::where('division_row_id', $division)->get();
        // dd($districts);
        return $districts;
    }

    public function getLocations($district)
    {
        $locations = Location::where('district', $district)->get();
        return $locations;
    }
    public function mount()
    {

        $profile_info = Donor::find(session()->get('did'));
        $division_info = Division::where('division_name',$profile_info->division)->first();

        $this->districts = District::where('division_row_id', $division_info->id)->get();
        $this->locations = Location::where('district', $profile_info->district)->get();



        $this->district = $profile_info->district;
        $this->division = $division_info->id;
        $this->location = ucwords(strtolower($profile_info->upazila));
        $this->blood_group = $profile_info->blood_group;
        $this->post_code = $profile_info->post_code;
        $this->phone = $profile_info->phone;
        $this->f_name = $profile_info->fname;
        $this->l_name = $profile_info->lname;
        $this->email = $profile_info->email;
        $this->gender = $profile_info->gender;
        $this->birth_date = $profile_info->birth_date;
        $this->address = $profile_info->address;
        $this->profession = $profile_info->occupation;
        $this->reference = $profile_info->reference;
        $this->old_image = $profile_info->pic_path;
    }
    public function render()
    {
        $data['divisions'] = Division::all();
        // $data['doctor_specialities'] = Doctor_speciality::all();

        // dd($this->division);
        if ($this->division != null) {
            $this->districts = self::getDistricts($this->division);
            // dd($this->districts); 
        }
        if ($this->district != null) {
            $this->locations = self::getLocations($this->district); 
        }

        // self::getProfile(session()->get('did'));

        return view('livewire.donor-profile',compact('data'))->layout('frontend.livewire_base');
    }
}
