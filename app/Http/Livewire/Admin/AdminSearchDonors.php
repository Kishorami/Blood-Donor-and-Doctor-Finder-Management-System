<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Donor;
use App\Models\Division;
use App\Models\District;
use App\Models\Location;
use Carbon\Carbon;
use DateTime;

class AdminSearchDonors extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;
    public $search = "";

    public $search_bloodgroup;
    public $search_division;
    public $divisionName;
    public $search_district;
    public $search_thana;

    public $searched_donors = null;

    public $sortBy = "id";
    public $sortDirection = "desc";

    public $delete_id, $comment_id, $call_id, $reference_id;

    public $comment, $called_date, $add_reference;


    public $districts;
    public $locations;


    public function getDistricts($division)
    {
        $districts = District::where('division_row_id', $division)->get();
        return $districts;
    }

    public function getLocations($district)
    {
        $locations = Location::where('district', $district)->get();
        return $locations;
    }

    public function mount()
    {
        $this->districts = collect();
        $this->locations = collect();
    }


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


    public function findDonor()
    {
        if ($this->search_bloodgroup != null && $this->divisionName != null && $this->search_district != null && $this->search_thana != null) {

            $this->searched_donors = Donor::orderBy($this->sortBy,$this->sortDirection)->where('blood_group',$this->search_bloodgroup)->where('division',$this->divisionName)->where('district',$this->search_district)->where('upazila',$this->search_thana)->get();
            // return $allDonors;
            // dd($this->searched_donors);
        }
        elseif ($this->search_bloodgroup != null && $this->divisionName != null && $this->search_district != null) {
            
            $this->searched_donors = Donor::orderBy($this->sortBy,$this->sortDirection)->where('blood_group',$this->search_bloodgroup)->where('division',$this->divisionName)->where('district',$this->search_district)->get();
            // return $allDonors;
            // dd($this->searched_donors);

        }
        elseif ($this->search_bloodgroup != null && $this->divisionName != null) {
            
            $this->searched_donors = Donor::orderBy($this->sortBy,$this->sortDirection)->where('blood_group',$this->search_bloodgroup)->where('division',$this->divisionName)->get();
            // return $allDonors;
            // dd($this->searched_donors);

        }
        elseif ($this->search_bloodgroup != null) {
            
            $this->searched_donors = Donor::orderBy($this->sortBy,$this->sortDirection)->where('blood_group',$this->search_bloodgroup)->get();
            // return $allDonors;
            // dd($this->searched_donors);
        }
        else{
            $this->searched_donors = Donor::orderBy($this->sortBy,$this->sortDirection)->where('blood_group',"")->paginate($this->paginate);
            // return $allDonors;
        }
    }

    public function donorCustomSearch()
    {
        if ($this->search_bloodgroup != null && $this->divisionName != null && $this->search_district != null && $this->search_thana != null) {

            $allDonors = Donor::orderBy($this->sortBy,$this->sortDirection)->where('blood_group',$this->search_bloodgroup)->where('division',$this->divisionName)->where('district',$this->search_district)->where('upazila',$this->search_thana)->paginate($this->paginate);
            return $allDonors;
        }
        elseif ($this->search_bloodgroup != null && $this->divisionName != null && $this->search_district != null) {
            
            $allDonors = Donor::orderBy($this->sortBy,$this->sortDirection)->where('blood_group',$this->search_bloodgroup)->where('division',$this->divisionName)->where('district',$this->search_district)->paginate($this->paginate);
            return $allDonors;

        }
        elseif ($this->search_bloodgroup != null && $this->divisionName != null) {
            
            $allDonors = Donor::orderBy($this->sortBy,$this->sortDirection)->where('blood_group',$this->search_bloodgroup)->where('division',$this->divisionName)->paginate($this->paginate);
            return $allDonors;

        }
        elseif ($this->search_bloodgroup != null) {
            
            $allDonors = Donor::orderBy($this->sortBy,$this->sortDirection)->where('blood_group',$this->search_bloodgroup)->paginate($this->paginate);
            return $allDonors;
        }
        else{
            $allDonors = Donor::orderBy($this->sortBy,$this->sortDirection)->where('blood_group',"")->paginate($this->paginate);;
            return $allDonors;
        }
    }


    public function render()
    {

        $allDonors = self::donorCustomSearch();


        // $allDonors = Donor::orderBy($this->sortBy,$this->sortDirection)->where('blood_group',$this->search_bloodgroup)->where('division',$this->divisionName)->where('district',$this->search_district)->where('upazila',$this->search_thana)->paginate($this->paginate);


        // $allDivision = Division::all();
        // $allDistrict = District::all();
        // $allLocation = Location::all();


        $data['divisions'] = Division::all();
        // $data['doctor_specialities'] = Doctor_speciality::all();

        // dd($this->division);
        if ($this->search_division != null) {
            $this->districts = self::getDistricts($this->search_division);
            
            $temp = Division::find($this->search_division);

            $this->divisionName = $temp->division_name;

        }
        if ($this->search_district != null) {
            $this->locations = self::getLocations($this->search_district); 
        }


        return view('livewire.admin.admin-search-donors',compact('allDonors','data'))->layout('layouts.admin_base');
    }
}
