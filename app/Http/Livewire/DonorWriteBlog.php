<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use App\Models\Blog;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DonorWriteBlog extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $blog_title, $description, $image;



    public function storeBlog()
    {

        $this->validate([
            'image' => 'image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);
        
        $user_id = session()->get('did');

        $blog_info = new Blog();

        $blog_info->userId = $user_id;
        $blog_info->title = $this->blog_title;
        $blog_info->description = $this->description;
        $blog_info->status = "Not Approved";

        $image_name = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('blog',$image_name);
        $blog_info->pic_path = "uploads/blog/".$image_name;

        $blog_info->save();


        $this->blog_title = null;
        $this->description = null;
        $this->image = null;

        session()->flash('message','Your Blog is submitted. Wait for Approval.');

        // dd($blog_info);

    }



    public function render()
    {
        return view('livewire.donor-write-blog')->layout('frontend.livewire_base');
    }
}
