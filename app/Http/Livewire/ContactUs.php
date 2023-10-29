<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Message;

class ContactUs extends Component
{

    public $name, $email, $phone, $message;

    public function sendMessage()
    {
        $full_message = new Message();

        $full_message->sender_email = $this->email;
        $full_message->sender_type = 'user';
        $full_message->receiver_type =  'admin';
        $full_message->receiver_email =  'admin@lifecycle.org'; 

        $full_message->message ='Name: '. $this->name.

        '<br>Email: '. $this->email.

        '<br>Phone: '. $this->phone.

        'Date Time: '.date('d-M-Y H:m').

        '<br>Message:' . $this->message;

        $full_message->save();

        $this->name = null;
        $this->email = null;
        $this->phone = null;
        $this->nessage = null;

        session()->flash('message','Your Message Send Successfuly. We Will Contact you Soon.');
    }

    public function render()
    {
        return view('livewire.contact-us')->layout('frontend.livewire_base');
    }
}
