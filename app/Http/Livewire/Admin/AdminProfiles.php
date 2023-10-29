<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;



use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminProfiles extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;


    public $name, $email, $password;

    public $e_name, $e_email, $e_password;

    public $user_id;

    public function storeUser()
    {
        $data = new User();

        
        $data->name = $this->name;
        $data->email = $this->email;
        $data->password = Hash::make($this->password);

        $data->save();
        session()->flash('message','Admin Created Successfully.');
        $this->emit('storeSomething');
        // dd($data);

    }

    public function getUser($id)
    {
        $this->user_id = $id;
        $data = User::find($id);

        $this->e_name = $data->name;
        $this->e_email = $data->email;

    }

    public function updateUser()
    {
        $data = User::find($this->user_id);

        $data->name = $this->e_name;
        $data->email = $this->e_email;
        
        if ($this->e_password !=null) {
            $data->password = Hash::make($this->e_password);
            // $data->password = $this->e_password;
        }
        
        $this->e_password = null;

        $data->save();
        session()->flash('message','Admin Info Updated Successfully.');
        $this->emit('storeSomething');

        // dd($data);
    }

    public function deleteID($id)
    {
        $this->user_id = $id;
    }

    public function delete()
    {
        User::find($this->user_id)->delete();

        session()->flash('message','User Deleted Successfully.');
        $this->emit('storeSomething');
    }


    public function render()
    {
        $allUsers= User::paginate($this->paginate);

        return view('livewire.admin.admin-profiles',compact('allUsers'))->layout('layouts.admin_base');
    }
}
