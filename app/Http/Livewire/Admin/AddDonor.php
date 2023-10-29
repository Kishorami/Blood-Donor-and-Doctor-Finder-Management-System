<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\District;
use App\Models\Division;
use App\Models\Location;
use App\Models\Donor;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Mail;

class AddDonor extends Component
{

    public $district, $division, $location, $blood_group, $post_code, $phone, $f_name, $l_name, $email, $gender, $birth_date, $address, $password, $confirm_password, $profession, $reference, $nationality;

    public $districts;
    public $locations;

    public $code_to_verify, $given_code;


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

    public function storeDonor()
    {
        $this->validate([
            'phone' =>'required|unique:donors',
            'email' =>'required|unique:donors',
            'blood_group' =>'required'
        ]);


        $varification_code = Str::random(6); 
        $this->code_to_verify = $varification_code;
        $this->given_code = $varification_code;



        $division_object = Division::find($this->division);
        $division_name = $division_object->division_name;
        

        $dateOfBirth = $this->birth_date;
        $today = date("Y-m-d");
        $diff = date_diff(date_create($dateOfBirth), date_create($today));
        $age = $diff->format('%y');
        // dd($age);

        $newDonor = new Donor();


        $newDonor->phone = $this->phone;   
        $newDonor->password = $this->password;    
        // $newDonor->pic_path = ;    
        $newDonor->fname = $this->f_name;   
        $newDonor->lname = $this->l_name;   
        $newDonor->blood_group = $this->blood_group; 
        $newDonor->birth_date = $this->birth_date;  
        // $newDonor->date_of_birth = $this->;   
        $newDonor->age = $age; 
        // $newDonor->last_donation = $this->;   
        // $newDonor->new_donor = $this->;   
        $newDonor->email = $this->email;   
        $newDonor->division = $division_name;    
        $newDonor->district = $this->district;    
        $newDonor->upazila = $this->location; 
        $newDonor->address = $this->address; 
        // $newDonor->latitude = $this->;    
        // $newDonor->longitude = $this->;   
        $newDonor->code = 12345;    
        $newDonor->verification = 0;    
        // $newDonor->lastLat = $this->; 
        // $newDonor->lastLng = $this->; 
        // $newDonor->fcm_email = $this->;   
        // $newDonor->fcm_uid = $this->; 
        // $newDonor->fcm_token = $this->;   
        $newDonor->pro_visible = 0; 
        $newDonor->not_available_id = 0;    
        $newDonor->called_date = "na"; 
        $newDonor->called_today = 0;    
        // $newDonor->donations_number = $this->;    
        $newDonor->user_type = "donor";   
        $newDonor->gender = $this->gender;  
        $newDonor->already_donated = 0; 
        $newDonor->autopro_visible = "na"; 
        $newDonor->singup_steps = 1;    
        $newDonor->post_code = $this->post_code;   
        $newDonor->rank = 1;    
        $newDonor->web_url = "na"; 
        $newDonor->fb_url = "na";  
        $newDonor->religion = "na";    
        $newDonor->is_physically_disble = "na";    
        $newDonor->nationality = "Bangladeshi"; 
        $newDonor->nid = "na"; 
        $newDonor->reference = $this->reference;   
        $newDonor->occupation = $this->profession;  
        $newDonor->status = 1;  
        $newDonor->active_donor = 1;    
        $newDonor->comment = "na"; 
        $newDonor->thana = $this->location;   
        // $newDonor->updated_at = $this->;  
        // $newDonor->created_at = $this->;  
        $newDonor->updated_by = 0;  
        $newDonor->created_by = 0;  
        $newDonor->sign_up_code = $this->code_to_verify;   

        if ($this->code_to_verify === $this->given_code) {
            $newDonor->save();
            session()->flash('message','Donor Registration is Successful.');
        }
        $this->given_code=null;

        $this->district = null;
        $this->division = null;
        $this->location = null;
        $this->blood_group = null;
        $this->post_code = null;
        $this->phone = null;
        $this->f_name = null;
        $this->l_name = null;
        $this->email = null;
        $this->gender = null;
        $this->birth_date = null;
        $this->address = null;
        $this->password = null;
        $this->confirm_password = null;
        $this->profession = null;
        $this->reference = null;
        $this->nationality = null;
        $this->districts = collect();
        $this->locations = collect();

        
    }

    public function mount()
    {
        $this->districts = collect();
        $this->locations = collect();
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
        return view('livewire.admin.add-donor',compact('data'))->layout('layouts.admin_base');
    }
}
