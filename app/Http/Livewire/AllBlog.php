<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Blog;

class AllBlog extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $data = Blog::where('status','Approved')->orderByDesc('created_at')->paginate(5);

        return view('livewire.all-blog',compact('data'))->layout('frontend.livewire_base');
    }
}
