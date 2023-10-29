<?php

namespace App\Http\Livewire\Admin\Settings;

use Livewire\Component;

use App\Models\AboutUS;


class SetAboutUs extends Component
{
    public $head, $body;

    public function updateVideo()
    {
        $about_info = AboutUS::find(1);
        $about_info->head = $this->head;
        $about_info->body = $this->body;

        $about_info->save();
        session()->flash('message','About Us Information Changed.');
    }


    public function mount()
    {
        $about_info = AboutUS::find(1);
        $this->head = $about_info->head;
        $this->body = $about_info->body;
    }
    public function render()
    {
        return view('livewire.admin.settings.set-about-us');
    }
}
