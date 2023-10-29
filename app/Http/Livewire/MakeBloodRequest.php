<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\BloodRequest;
use App\Models\Donor;
use App\Models\Activity;

class MakeBloodRequest extends Component
{

    public $email, $password;

    public $blood_group, $no_of_blood_bag, $patient_name, $patient_phone, $disease, $relation, $patient_hospital, $patient_place, $time_of_need, $message;

    public function loginDonor($value='')
    {
        $donor_username = $this->email;
        $donor_password = $this->password;

        // dd($donor_username ." ".$donor_password);
        $count = Donor:: where([['email', $donor_username], ['password', $donor_password]])->count();

        $data['donor'] = Donor:: where([['email', $donor_username], ['password', $donor_password]])->first();


        if($count==0){
            $count1 = Donor:: where([['phone', $donor_username], ['password', $donor_password]])->count();

            $data['donor'] = Donor:: where([['phone', $donor_username], ['password', $donor_password]])->first();

            if($count1==1){
                session()->put('email', $data['donor']->email);
                session()->put('phone', $data['donor']->phone);
                session()->put('name', $data['donor']->fname . ' ' . $data['donor']->lname);
                session()->put('did', $data['donor']->id);
                $path = session()->get('path');
                if (empty($path)) {
                    return redirect('/request_blood');
                } else {
                    return redirect($path);
                } 
            }else{
                // return redirect('/request_blood');
                session()->flash('message','Email/Phone Or Password is Incorrect.'); 
                $this->password = null;
            }

        }else{
            session()->put('email', $data['donor']->email);
            session()->put('phone', $data['donor']->phone);
            session()->put('name', $data['donor']->fname . ' ' . $data['donor']->lname);
            session()->put('did', $data['donor']->id);
            $path = session()->get('path');
            if (empty($path)) {
                return redirect('/request_blood');
            } else {
                return redirect($path);
            } 
        } 
    }


    public function storeBloodRequest()
    {

        $user = Donor::find(session()->get('did'));

        $data = new BloodRequest;
        $actv = new Activity;

        //-------------------For BloodRequest Table--------------------------

        $data->request_blood_group = $this->blood_group;

        $data->patient_name = $this->patient_name;

        $data->patient_hospital = $this->patient_place;

        $data->patient_phone = $this->patient_phone;

        $data->patient_place = $this->patient_place;

        $data->blood_send = 'no';
        $data->pending_blood = 'yes';

        $data->number_blood_bag = $this->no_of_blood_bag;

        $data->disease = $this->disease;

        // $data->relation = $this->relation;
        $data->relation = "not taken";

        $data->message = $this->message;

        $data->opration_time = $this->time_of_need;

        // $data->sender_email =  $user->email;

        $data->sender_type =  'donor';

        $data->receiver_type =  'admin';

        $data->receiver_email =  'admin@lifecycle.org';

        // $data->created_by = $user->id;
        $data->new_request = 1;

        

        //------------------------For Message---------------------------//

        //---------------------------For Activity Table---------------------------//

        // $actv->created_id = $user->id;

        // $actv->created_email = $user->email;

        // $actv->created_type = 'donor';

        // $actv->receiver_email = 'admin@lifecycle.org';

        // $actv->receiver_type = 'admin';

        // $actv->purpose = 'umknown';

        // $actv->short_message = 'Need ' . $this->blood_group . 'Blood ' . $this->no_of_blood_bag . ' in ' . $this->patient_hospital . 'at' . $this->time_of_need;

        // $actv->is_read = 0;

        // $actv->is_reply = 0;

        // $actv->parent_id = 0;

        // $actv->created_by = $user->email;

        $data->save();
        // $actv->save();
        // dd($actv);
        session()->flash('message','We Got Your Blood Request. We Will Contact you Soon.');

        $this->blood_group = null;
        $this->no_of_blood_bag = null;
        $this->patient_name = null;
        $this->patient_phone = null;
        $this->disease = null;
        $this->relation = null;
        $this->patient_hospital = null;
        $this->patient_place = null;
        $this->time_of_need = null;
        $this->message = null;        
    }



    public function render()
    {
        // $user;
        // if (!session()->has('did')) {
        //     $reg_message = "Please Register before send a Blood Request.";
        //     return view('livewire.donor-login',compact('reg_message'))->layout('frontend.livewire_base');
        // }
        // else{
        //     $user = Donor::find(session()->get('did'));
        // }


        

        // return view('livewire.make-blood-request',compact("user"))->layout('frontend.livewire_base');
        return view('livewire.make-blood-request')->layout('frontend.livewire_base');
    }
}
