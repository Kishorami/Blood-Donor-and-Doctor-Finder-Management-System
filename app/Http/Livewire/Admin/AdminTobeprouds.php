<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\TobeProud;

class AdminTobeprouds extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;
    public $search = "";
    public $sortBy = "id";
    public $sortDirection = "desc";

    public $delete_id, $approval_id; 

    


    public $status, $donate_place, $reason_of_proud, $e_image,$old_image;

    public function getProud($id)
    {
        $this->approval_id = $id;
        $data = TobeProud::find($id);

        $this->donate_place = $data->donate_place;
        $this->reason_of_proud = $data->reason_of_proud;
        $this->old_image = $data->pic_path;
        $this->status = $data->status;
    }

    public function updateProud()
    {
        $data = TobeProud::find($this->approval_id);

        $data->donate_place = $this->donate_place;
        $data->reason_of_proud = $this->reason_of_proud;
        $data->status = $this->status;

        if($this->e_image){
            $image_name = Carbon::now()->timestamp.'.'.$this->e_image->extension();
            $this->e_image->storeAs('proudmessage',$image_name);
            $data->pic_path = "uploads/proudmessage/".$image_name;
        } 

        $data->save();
        session()->flash('message','Data Update Successfull.');
        $this->emit('storeSomething');
        // dd($data);
    }



    public function deleteID($id)
    {
        $this->delete_id = $id;
    }
    public function delete()
    {
        TobeProud::find($this->delete_id)->delete();
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

        $allProuds = TobeProud::orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);

        return view('livewire.admin.admin-tobeprouds',compact('allProuds'))->layout('layouts.admin_base');
    }
}
