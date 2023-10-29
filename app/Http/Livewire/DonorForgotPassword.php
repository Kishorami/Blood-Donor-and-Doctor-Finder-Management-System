<?php

namespace App\Http\Livewire;

use Livewire\Component;


use App\Models\Donor;
use Illuminate\Support\Str;
use Mail;

class DonorForgotPassword extends Component
{

    public $email, $code_to_verify, $password, $password2, $given_code;


    public function requestCode()
    {
        $donor_info = Donor::where('email',$this->email)->first();

        if ($donor_info) {
            $varification_code = Str::random(6);   


            $v_message = [
              'subject' => 'Password Reset Code for LifecycleBD',
              'email' => $this->email,
              'content' => $varification_code
            ];

            // Mail::send('email-template-password-reset', $v_message, function($message) use ($v_message) {
            //   $message->to($v_message['email'])
            //   ->subject($v_message['subject']);
            //   $message->from('kisgorami0@gmail.com','Verification Code');
            // });

            

            // Mobile otp-------------------------------------

            // Nexmo::message()->send([

            //     'to' => '88'.$this->phone,
            //     'from' => 'LifecycleBD',
            //     'text' => $varification_code,

            // ]);
            

            $sender_id='831';
            $apiKey='TElGRUNZQ0xFQkQ6TGlmZTQ4'; 
            $mobileNo=$donor_info->phone;
            $message='This Varification code is from LifecycleBD to change donor password. Varification Code: '.$varification_code;
            $send_sms=self::techno_bulk_sms($sender_id,$apiKey,$mobileNo,$message);



            // Mobile otp-------------------------------------

            $this->code_to_verify = $varification_code;
            
            // dd($newDonor);
            session()->flash('message','Your Varification Code has been send to your Phone.'); 
        } else {
            session()->flash('e-message','Your Given Phone is Not Found In Our Database.');
        }
    }


    function techno_bulk_sms($sender_id,$apiKey,$mobileNo,$message){
        $url = 'https://otpsmsbd.com/api/bulkSmsApi';
        $data = array('sender_id' => $sender_id,
         'apiKey' => $apiKey,
         'mobileNo' => $mobileNo,
         'message' =>$message   
         );

         $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);     
            $output = curl_exec($curl);
            curl_close($curl);

            // echo $output;
            return $output;
    }



    public function updatePassword()
    {
        if ($this->password === $this->password2) {
            
            $donor_info = Donor::where('email',$this->email)->first();

            $donor_info->password = $this->password;

            $donor_info->save();

            session()->flash('message','Your Password Reset is Successful.');

            $this->email = null;
            $this->code_to_verify = null;
            $this->password = null;
            $this->password2 = null;
            $this->given_code = null;

        } else {
            session()->flash('e-message','Your Given Passwords are Different. Insert Same Password');
        }
        
    }


    public function render()
    {
        return view('livewire.donor-forgot-password')->layout('frontend.livewire_base');
    }
}
