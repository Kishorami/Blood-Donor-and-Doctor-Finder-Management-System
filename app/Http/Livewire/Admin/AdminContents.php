<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use App\Models\Content;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminContents extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;
    public $search = "";
    public $sortBy = "id";
    public $sortDirection = "asc";


    public $name, $designation, $institution, $email, $phone, $title, $description, $content_type, $event_start_date, $event_end_date, $fb_url; //variables to add Content

    public $e_content_id, $e_name, $e_designation, $e_institution, $e_email, $e_phone, $e_title, $e_description, $e_content_type, $e_event_start_date, $e_event_end_date, $e_fb_url; //variables to Edit Content
    public $image, $e_image;
    public $old_image;
    public $delete_id;

    public function storeContent()
    {
        $store_content = new Content();

        
        $store_content->name = $this->name;
        $store_content->designation = $this->designation;
        $store_content->institution = $this->institution;
        $store_content->email = $this->email;
        $store_content->phone = $this->phone;
        $store_content->title = $this->title;
        $store_content->description = $this->description;
        $store_content->content_type = $this->content_type;
        $store_content->event_start_date = $this->event_start_date;
        $store_content->event_end_date = $this->event_end_date;
        $store_content->fb_url = $this->fb_url;

        if ($this->image) {
            $image_name = Carbon::now()->timestamp.'.'.$this->image->extension();
            $this->image->storeAs('contents',$image_name);
            $store_content->pic_path = "uploads/contents/".$image_name;
        }
        

        $store_content->save();
        $this->emit('storeSomething');
    }


    public function getDes($id)
    {
        $content_info = Content::find($id);
        $des = $content_info->description;
        // dd($des);
        return json_encode($des) ;
    }

    public function getContent($id)
    {
        $this->e_content_id = $id;
        $content_info = Content::find($id);

        // $this->e_content_id = $content_info->content_id;
        $this->e_name = $content_info->name;
        $this->e_designation = $content_info->designation;
        $this->e_institution = $content_info->institution;
        $this->e_email = $content_info->email;
        $this->e_phone = $content_info->phone;
        $this->e_title = $content_info->title;
        $this->e_description = $content_info->description;
        $this->e_content_type = $content_info->content_type;
        $this->e_event_start_date = $content_info->event_start_date;
        $this->e_event_end_date = $content_info->event_end_date;
        $this->e_fb_url = $content_info->fb_url;
        $this->old_image = $content_info->pic_path;

    }
    public function updateContent()
    {
        $content_info = Content::find($this->e_content_id);

        
        $content_info->name = $this->e_name;
        $content_info->designation = $this->e_designation;
        $content_info->institution = $this->e_institution;
        $content_info->email = $this->e_email;
        $content_info->phone = $this->e_phone;
        $content_info->title = $this->e_title;
        $content_info->description = $this->e_description;
        $content_info->content_type = $this->e_content_type;
        $content_info->event_start_date = $this->e_event_start_date;
        $content_info->event_end_date = $this->e_event_end_date;
        $content_info->fb_url = $this->e_fb_url;

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
        $allContents = Content::orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);

        return view('livewire.admin.admin-contents', compact('allContents'))->layout('layouts.admin_base');
    }
}
