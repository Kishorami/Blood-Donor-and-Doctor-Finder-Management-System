<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Imports\DonorImport;
use Maatwebsite\Excel\Facades\Excel;

class DonorImportExcel extends Component
{

    use WithFileUploads;

    public $file;

    public function import()
    {
        $import = Excel::import(new DonorImport, $this->file);

        if ($import) {
            session()->flash('message','Donor Iport Successful.');
        } else {
            session()->flash('error_message','Donor Iport Successful.');
        }
        
        
    }

    public function render()
    {
        return view('livewire.admin.donor-import-excel')->layout('layouts.admin_base');
    }
}
