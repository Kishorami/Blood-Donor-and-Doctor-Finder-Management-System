<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use App\Models\Content;
use Illuminate\Support\Str;
use Carbon\Carbon;


class AdminWhatPeopleSay extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;
    public $search = "";
    public $sortBy = "id";
    public $sortDirection = "asc";

    public $content_type = "What People Say";

    public $name, $institution, $designation, $title, $description, $image;

    public $e_name, $e_institution, $e_designation, $e_title, $e_description, $e_image, $old_image;

    public $delete_id, $e_content_id;

    public function storeContent()
    {
        $store_content = new Content();

        
        $store_content->name = $this->name;
        $store_content->designation = $this->designation;
        $store_content->institution = $this->institution;
        $store_content->title = $this->title;
        $store_content->description = $this->description;
        $store_content->content_type = $this->content_type;

        if ($this->image) {
            $image_name = Carbon::now()->timestamp.'.'.$this->image->extension();
            $this->image->storeAs('contents',$image_name);
            $store_content->pic_path = "uploads/contents/".$image_name;
        }
        

        $store_content->save();
        $this->emit('storeSomething');
    }

    public function getContent($id)
    {
        $this->e_content_id = $id;
        $content_info = Content::find($id);

        // $this->e_content_id = $content_info->content_id;
        $this->e_name = $content_info->name;
        $this->e_institution = $content_info->institution;
        $this->e_designation = $content_info->designation;
        $this->e_title = $content_info->title;
        $this->e_description = $content_info->description;
        $this->old_image = $content_info->pic_path;

    }

    public function updateContent()
    {
        $content_info = Content::find($this->e_content_id);

        
        $content_info->name = $this->e_name;
        $content_info->institution = $this->e_institution;
        $content_info->designation = $this->e_designation;
        $content_info->title = $this->e_title;
        $content_info->description = $this->e_description;
        $content_info->content_type = $this->content_type;

        if ($this->e_image) {
            $image_name = Carbon::now()->timestamp.'.'.$this->e_image->extension();
            $this->e_image->storeAs('contents',$image_name);
            $content_info->pic_path = "uploads/contents/".$image_name;
        }

        $content_info->save();
        $this->emit('storeSomething');
    }

     public function deleteID($id)
    {
        $this->delete_id = $id;
    }
    public function delete()
    {
        Content::find($this->delete_id)->delete();
        $this->emit('storeSomething');
        // dd($this->delete_id);
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
        $allContents = Content::where('content_type','What People Say')->orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);

        return view('livewire.admin.admin-what-people-say',compact('allContents'))->layout('layouts.admin_base');
    }
}
