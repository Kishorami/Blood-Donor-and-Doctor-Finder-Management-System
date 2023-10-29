<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Blog;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminUserBlog extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;
    public $search = "";
    public $sortBy = "id";
    public $sortDirection = "desc";

    public $blog_id, $title, $image, $e_description, $approval;

    public $old_image, $e_image;

    public $delete_id;


    public function getBlog($id)
    {
        $this->blog_id = $id;
        $blog_info = Blog::find($id);

        $this->title = $blog_info->title;
        $this->old_image = $blog_info->pic_path;
        $this->e_description = $blog_info->description;
        $this->approval = $blog_info->status;
    }

    public function updateBlog()
    {
        $blog_info = Blog::find($this->blog_id);

        $blog_info->status = $this->approval;
        $blog_info->title = $this->title;
        $blog_info->description = $this->e_description;

        if ($this->e_image) {
            $image_name = Carbon::now()->timestamp.'.'.$this->e_image->extension();
            $this->e_image->storeAs('contents',$image_name);
            $blog_info->pic_path = "uploads/blog/".$image_name;
        }

        $blog_info->save();
        $this->emit('storeSomething');

    }


    public function deleteID($id)
    {
        $this->delete_id = $id;
    }
    public function delete()
    {
        Blog::find($this->delete_id)->delete();
        $this->emit('storeSomething');
    }
    
    public function sortBy($field)
    {
        if ($this->sortDirection == "asc") {
            $this->sortDirection = "desc";
        }
        else
        {
            $this->sortDirection = "asc";
        }

        return $this->sortBy = $field;
    }
    public function render()
    {
        $allBlog = Blog::orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);

        return view('livewire.admin.admin-user-blog', compact('allBlog'))->layout('layouts.admin_base');
    }
}
