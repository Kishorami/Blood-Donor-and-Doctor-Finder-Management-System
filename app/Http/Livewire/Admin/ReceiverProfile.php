<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Donor;
use App\Models\BloodReceiver;


class ReceiverProfile extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;
    public $search = "";
    public $sortBy = "id";
    public $sortDirection = "desc";



    // public $receiver_name, $receiver_phone, $receiver_address, $receiver_gender, $receiver_profession, $receiver_hospital, $receiver_donation_date, $receiver_blood_group, $blood_bag, $donor_id, $donor_name, $donor_phone, $donor_email;
    public $delete_id;

    public function deleteID($id)
    {
        $this->delete_id = $id;
    }

    public function delete()
    {
        BloodReceiver::find($this->delete_id)->delete();
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

        $allReceivers = BloodReceiver::orderBy($this->sortBy,$this->sortDirection)->search(trim($this->search))->paginate($this->paginate);
        return view('livewire.admin.receiver-profile',compact('allReceivers'))->layout('layouts.admin_base');
    }
}
