<?php

namespace App\Http\Livewire\Admin\Settings;

use Livewire\Component;

use App\Models\Video;

class HomeVideo extends Component
{

    public $link;

    public function updateVideo()
    {
        $video_info = Video::find(1);
        $video_info->link = $this->link;

        $video_info->save();
        session()->flash('message','Video Link Changed.');
    }


    public function mount()
    {
        $video_info = Video::find(1);
        $this->link = $video_info->link;
    }
    public function render()
    {
        
        return view('livewire.admin.settings.home-video');
    }
}
