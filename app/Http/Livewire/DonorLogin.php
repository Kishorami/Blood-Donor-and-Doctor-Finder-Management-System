<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Donor;

class DonorLogin extends Component
{

    public $email, $password;

    public $reg_message;


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
                    return redirect('/');
                } else {
                    return redirect($path);
                } 
            }else{
                // return redirect('/');
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
                return redirect('');
            } else {
                return redirect($path);
            } 
        } 
    }

    public function render()
    {
        return view('livewire.donor-login')->layout('frontend.livewire_base');
    }
}
