<?php

namespace App\Http\Livewire\Admin\Settings;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use App\Models\Gallery_detail;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SliderComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $image, $delete_id;


    public function updateSlider()
    {
        $info = new Gallery_detail();

        $info->gallery_id = 7;


        if ($this->image) {
            $image_name = Carbon::now()->timestamp.'.'.$this->image->extension();
            $this->image->storeAs('slider',$image_name);
            $info->pic_path = "uploads/slider/".$image_name;
        }

        $info->save();
        $this->image = null;
        session()->flash('message','Slider Added Successfully.');
    }


    public function deleteID($id)
    {
        $this->delete_id = $id;
    }
    public function delete()
    {
        Gallery_detail::find($this->delete_id)->delete();
        $this->emit('storeSomething');
        $this->delete_id = null;
    }

    public function render()
    {
        $sliders = Gallery_detail::where('gallery_id',7)->get();
        // dd($sliders);

        return view('livewire.admin.settings.slider-component',compact('sliders'))->layout('layouts.admin_base');
    }
}
