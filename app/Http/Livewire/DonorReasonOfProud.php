<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use App\Models\TobeProud;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DonorReasonOfProud extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $donate_date, $donate_place, $reason_of_proud, $image;

    public function storeProudMessage()
    {
         $this->validate([
            'image' => 'image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);
        
        $user_id = session()->get('did');

        $message_info = new TobeProud();

        // $message_info->userId = $user_id;
        $message_info->donate_date = $this->donate_date;
        $message_info->donate_place = $this->donate_place;
        $message_info->reason_of_proud = $this->reason_of_proud;

        if($this->image){
            $image_name = Carbon::now()->timestamp.'.'.$this->image->extension();
            $this->image->storeAs('proudmessage',$image_name);
            $message_info->pic_path = "uploads/proudmessage/".$image_name;
        }
        $message_info->save();

        $this->donate_date = null;
        $this->donate_place = null;
        $this->reason_of_proud = null;
        $this->image = null;

        session()->flash('message','Your Message is submitted.');
        // dd($message_info);
    }

    public function render()
    {
        return view('livewire.donor-reason-of-proud')->layout('frontend.livewire_base');
    }
}
