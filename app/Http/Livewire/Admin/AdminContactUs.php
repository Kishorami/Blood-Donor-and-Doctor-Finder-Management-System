<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Message;

class AdminContactUs extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;
    public $search = "";
    public $sortBy = "id";
    public $sortDirection = "desc";

    public $delete_id;


    public function deleteID($id)
    {
        $this->delete_id = $id;
    }
    public function delete()
    {
        Message::find($this->delete_id)->delete();
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
        $allMessages = Message::orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);

        return view('livewire.admin.admin-contact-us',compact('allMessages'))->layout('layouts.admin_base');
    }
}
