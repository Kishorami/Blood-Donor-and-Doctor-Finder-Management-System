<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Content;
use App\Models\Blog;

class BlogDetails extends Component
{
    public $blog_id;

    public function mount($id)
    {
        $this->blog_id = $id;
    }

    public function render()
    {
        $data['blood_news'] = Content::where('content_type', 'Blog')->orderByDesc('created_at')->get();

        $data['read_more_detail'] = Blog::find($this->blog_id);

        $image = $data['read_more_detail']->pic_path;

        return view('livewire.blog-details', compact('data', 'image'))->layout('frontend.livewire_base');
    }
}
