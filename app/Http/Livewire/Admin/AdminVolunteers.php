<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Volunteer;

class AdminVolunteers extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;
    public $search = "";
    public $sortBy = "id";
    public $sortDirection = "asc";

    public $delete_id;


    public function deleteID($id)
    {
        $this->delete_id = $id;
    }
    public function delete()
    {
        Volunteer::find($this->delete_id)->delete();
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

        $allVolunteers = Volunteer::orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);

        return view('livewire.admin.admin-volunteers',compact('allVolunteers'))->layout('layouts.admin_base');
    }
}
