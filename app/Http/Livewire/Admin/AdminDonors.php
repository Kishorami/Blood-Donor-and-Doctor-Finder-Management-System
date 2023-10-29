<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Donor;
use Carbon\Carbon;
use DateTime;

class AdminDonors extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;
    public $search = "";
    public $sortBy = "id";
    public $sortDirection = "desc";

    public $delete_id, $comment_id, $call_id, $reference_id;

    public $comment, $called_date, $add_reference;




// Add Comment Section---------------------------
    public function getComment($id)
    {
        $this->comment_id = $id;

        $data = Donor::find($id);
        $this->comment = $data->comment;
    }

    public function updateComment()
    {
        $data = Donor::find($this->comment_id);

        $data->comment = $this->comment;

        $data->save();
        session()->flash('message','Comment Updated Successfully.');
        $this->emit('storeSomething');
    }
// Add Comment Section---------------------------


// Add Reference Section---------------------------
    public function getReference($id)
    {
        $this->reference_id = $id;

        $data = Donor::find($id);
        $this->add_reference = $data->reference;
    }

    public function updateReference()
    {
        $data = Donor::find($this->reference_id);

        $data->reference = $this->add_reference;

        $data->save();
        session()->flash('message','Reference Updated Successfully.');
        $this->emit('storeSomething');
    }
// Add Reference Section---------------------------


// Add Call Section---------------------------
    public function getCall($id)
    {
        $this->call_id = $id;

        // $data = Donor::find($id);
        $now = Carbon::now();
        $this->called_date = $now->toDateTimeString();
        // dd($this->called_date);
    }

    public function updateCall()
    {
        $data = Donor::find($this->call_id);

        $data->called_date = $this->called_date;

        $data->save();
        session()->flash('message','Call Information Updated Successfully.');
        $this->emit('storeSomething');
    }
// Add Call Section---------------------------


// delete section-------------------------------
    public function deleteID($id)
    {
        $this->delete_id = $id;
    }
    public function delete()
    {
        Donor::find($this->delete_id)->delete();
        $this->emit('storeSomething');
    }

// delete section-------------------------------
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
        

        $allDonors = Donor::orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);

        return view('livewire.admin.admin-donors',compact('allDonors'))->layout('layouts.admin_base');
    }
}
