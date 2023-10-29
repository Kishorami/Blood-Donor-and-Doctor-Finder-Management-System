<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\BloodReceiver;
use App\Models\Donor;

use Carbon\Carbon;

class AddReceiverProfile extends Component
{

    public $receiver_name, $receiver_phone, $receiver_address, $receiver_gender, $receiver_profession, $receiver_hospital, $receiver_donation_date, $receiver_blood_group, $blood_bag, $donor_id, $donor_name, $donor_phone, $donor_email;

    public $temp_name, $temp_phone;

    public function storeReceiver()
    {
        $receiver_info = new BloodReceiver();

        $receiver_info->receiver_name = $this->receiver_name;
        $receiver_info->receiver_phone = $this->receiver_phone;
        $receiver_info->receiver_address = $this->receiver_address;
        $receiver_info->receiver_gender = $this->receiver_gender;
        $receiver_info->receiver_profession = $this->receiver_profession;
        $receiver_info->receiver_hospital = $this->receiver_hospital;
        $receiver_info->receiver_donation_date = $this->receiver_donation_date;
        $receiver_info->receiver_blood_group = $this->receiver_blood_group;
        $receiver_info->blood_bag = $this->blood_bag;

        $donor_info = Donor::find($this->donor_id);

        if($donor_info){
            $receiver_info->donor_id = $this->donor_id;
            $receiver_info->donor_name = $donor_info->fname ." ".$donor_info->lname;
            $receiver_info->donor_phone = $donor_info->phone;
            $receiver_info->donor_email = $donor_info->email;

            $donor_info->donations_number++;
            $donor_info->last_donation = $this->receiver_donation_date;


            $receiver_info->save();
            $donor_info->save();

            $this->receiver_name = null;
            $this->receiver_phone = null;
            $this->receiver_address = null;
            $this->receiver_gender = null;
            $this->receiver_profession = null;
            $this->receiver_hospital = null;
            $this->receiver_donation_date = null;
            $this->receiver_blood_group = null;
            $this->blood_bag = null;
            $this->donor_id = null;
            $this->donor_name = null;
            $this->donor_phone = null;
            $this->donor_email = null;;


            session()->flash('message','Receiver Information Added Successfully.');

        }else{
            session()->flash('error_message','Donor Not Found.');
        }
        // dd($donor_info);
    }

    public function render()
    {

        $donor_info = Donor::find($this->donor_id);
        
        if ($donor_info) {
            $this->temp_name = $donor_info->fname." ".$donor_info->lname;
            $this->temp_phone = $donor_info->phone;
        }
        

        return view('livewire.admin.add-receiver-profile')->layout('layouts.admin_base');
    }
}
