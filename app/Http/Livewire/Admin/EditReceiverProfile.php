<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\BloodReceiver;
use App\Models\Donor;

use Carbon\Carbon;

class EditReceiverProfile extends Component
{

    public $receiver_name, $receiver_phone, $receiver_address, $receiver_gender, $receiver_profession, $receiver_hospital, $receiver_donation_date, $receiver_blood_group, $blood_bag, $donor_id, $donor_name, $donor_phone, $donor_email;

    public $blood_receiver_id, $prev_donor_id;

    public $temp_name, $temp_phone;

    public function updateReceiver()
    {
        $receiver_info = BloodReceiver::find($this->blood_receiver_id);

        $receiver_info->receiver_name = $this->receiver_name;
        $receiver_info->receiver_phone = $this->receiver_phone;
        $receiver_info->receiver_address = $this->receiver_address;
        $receiver_info->receiver_gender = $this->receiver_gender;
        $receiver_info->receiver_profession = $this->receiver_profession;
        $receiver_info->receiver_hospital = $this->receiver_hospital;
        $receiver_info->receiver_donation_date = $this->receiver_donation_date;
        $receiver_info->receiver_blood_group = $this->receiver_blood_group;
        $receiver_info->blood_bag = $this->blood_bag;


        $prev_donor_info = Donor::find($this->prev_donor_id);
        $donor_info = Donor::find($this->donor_id);

        if( $prev_donor_info && $donor_info){
            $prev_donor_info->donations_number--;
            $prev_donor_info->last_donation = "na";

            $prev_donor_info->save();

            

            $receiver_info->donor_id = $this->donor_id;
            $receiver_info->donor_name = $donor_info->fname ." ".$donor_info->lname;
            $receiver_info->donor_phone = $donor_info->phone;
            $receiver_info->donor_email = $donor_info->email;

            $donor_info->donations_number++;
            $donor_info->last_donation = $this->receiver_donation_date;

            $receiver_info->save();
            $donor_info->save();

            session()->flash('message','Receiver Information Updated Successfully.');

        } else{
            session()->flash('error_message','Donor Not Found.');
        }

        

    }

    public function mount($id)
    {
        $this->blood_receiver_id = $id;

        $receiver_info = BloodReceiver::find($id);

        $this->receiver_name = $receiver_info->receiver_name;
        $this->receiver_phone = $receiver_info->receiver_phone;
        $this->receiver_address = $receiver_info->receiver_address;
        $this->receiver_gender = $receiver_info->receiver_gender;
        $this->receiver_profession = $receiver_info->receiver_profession;
        $this->receiver_hospital = $receiver_info->receiver_hospital;
        $this->receiver_donation_date = $receiver_info->receiver_donation_date;
        $this->receiver_blood_group = $receiver_info->receiver_blood_group;
        $this->blood_bag = $receiver_info->blood_bag;
        $this->donor_id = $receiver_info->donor_id;
        $this->donor_name = $receiver_info->donor_name;
        $this->donor_phone = $receiver_info->donor_phone;
        $this->donor_email = $receiver_info->donor_email;

        $this->temp_name = $receiver_info->donor_name;
        $this->temp_phone = $receiver_info->donor_phone;

        $this->prev_donor_id = $receiver_info->donor_id;

        // session()->flash('message','Receiver Information Added Successfully.');

    }

    public function render()
    {
        $donor_info = Donor::find($this->donor_id);
        
        if ($donor_info) {
            $this->temp_name = $donor_info->fname." ".$donor_info->lname;
            $this->temp_phone = $donor_info->phone;
        }else{
            $this->temp_name = "Donor not Found. ";
            $this->temp_phone = "Check The Donor ID.";
        }

        return view('livewire.admin.edit-receiver-profile')->layout('layouts.admin_base');
    }
}
