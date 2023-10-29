<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Find_solution;

class AdminFindSolution extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;
    public $search = "";
    public $sortBy = "id";
    public $sortDirection = "desc";

    public $is_solved, $request_id;
    public $delete_id;

    public function changeStatus($id)
    {
        $request_info = Find_solution::find($id);
        $this->request_id = $id;
        $this->is_solved = $request_info->is_solved;
    }

    public function storeChangeStatus()
    {
        $request_info = Find_solution::find($this->request_id);
        $request_info->is_solved = $this->is_solved;
        $this->is_solved = "";
        $request_info->save();
        // dd($request_info);
        $this->emit('storeSomething');
    }



    public function deleteID($id)
    {
        $this->delete_id = $id;
    }
    public function delete()
    {
        Find_solution::find($this->delete_id)->delete();
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
        $data = Find_solution::orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);

        return view('livewire.admin.admin-find-solution',compact('data'))->layout('layouts.admin_base');
    }
}
