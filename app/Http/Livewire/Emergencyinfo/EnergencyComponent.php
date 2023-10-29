<?php

namespace App\Http\Livewire\Emergencyinfo;

use Livewire\Component;
use Livewire\WithPagination;


use App\Models\District;
use App\Models\Division;
use App\Models\Location;
// use App\Models\emergencyinfo\ambulance_table;
// use App\Models\emergencyinfo\bloodbank_table;
// use App\Models\emergencyinfo\funeralinfo_table;
// use App\Models\emergencyinfo\graveyardinfo_table;
// use App\Models\emergencyinfo\socialinfo_table;
// use App\Models\emergencyinfo\theraphycenterinfo_table;

class EnergencyComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $division, $district,$location;

    public $districts;
    public $locations;
    public $requested_info;
    public $flag = 0;


    public $page_id;

    public $info_name, $class_name, $info_message;

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

    public function findInformation()
    {
        $division_name = Division::find($this->division);
        $this->requested_info = $this->class_name::where([

                                            ['division', '=', $division_name->division_name],
                                            // ['district', '=', $this->district],
                                            // ['upazila', '=', $this->location],

                                        ])->get();


        if ($this->division != null && $this->district !=null && $this->location != null) {

            $this->requested_info = $this->requested_info
                                        ->where('division',$division_name->division_name)
                                        ->where('district',$this->district)
                                        ->filter(function ($item){
                                            return strtolower($item['upazila']) == strtolower($this->location);
                                        });
        }
        elseif ($this->division != null && $this->district != null) {
            $this->requested_info = $this->requested_info->where('division',$division_name->division_name)->where('district',$this->district);
        }
        elseif ($this->division != null) {
            $this->requested_info = $this->requested_info->where('division',$division_name->division_name);
        }


        $this->flag=1;
        // dd("findInformation()");
    }


    public function mount($id)
    {
        $this->page_id = $id;

        $this->districts = collect();
        $this->locations = collect();
        $this->requested_info = collect();

        if ($id == 1) {
            $this->info_name = "এম্বুলেন্সের তথ্য";
            $this->class_name = 'App\Models\emergencyinfo\ambulance_table';

            $this->info_message = "<div>যখন, যেখানে লাগবে, ২৪ঘন্টা জরুরী সেবায় নিয়োজিত আমাদের এম্বুলেন্স সার্ভিস। ঢাকা মহানগরী উত্তর এর মধ্য রোগীকে সেবা কেন্দ্রে নিয়ে যাওয়া বা নিয়ে আসা দূরত্বভেদে ৪০০-৬০০ টাকা।&nbsp;</div><br><div>মুমূর্ষু রোগীকে হাসপাতাল পৌছে চিকিৎসাসেবা নিশ্চিত করার জন্য স্বল্পমূল্য এম্বুলেন্স সার্ভিস। এছাড়াও ১টা লাশবাহী ফ্রিজিং এম্বুলেন্স সার্ভিস চালু রয়েছে। অসহায় ও গরীবদের জন্য ফ্রী লাশ পরিবহন করা হয়।&nbsp;</div><br><div>এম্বুলেন্স হটলাইন-&nbsp;01308 656289,&nbsp;01323 899001-3.&nbsp;</div><br><div>অন্যান্য এম্বুলেন্স নাম্বার পেতে তথ্য খুঁজুন।&nbsp;</div>";

        } elseif ($id == 2){
            $this->info_name = "ব্লাড ব্যাংকের তথ্য ";
            $this->class_name = 'App\Models\emergencyinfo\bloodbank_table';

            $this->info_message = "<div>জরুরী প্রয়োজনে কল সেন্টার ও লোকেশন এপস এর মাধ্যমে যেখানে প্রয়োজন ঠিক সেখানেই রক্তদান করতে পৌছে যায় আমাদের রক্তদাতা।&nbsp;</div><br><div>আমাদের ব্লাড হটলাইন:&nbsp;01709 848480-1,&nbsp;01709 848482-3,&nbsp;01709 848486-7.&nbsp;</div><br><div>অন্যান্য ব্লাড ব্যাংকের তথ্য পেতে সার্চ করুন।&nbsp;</div>";

        } elseif ($id == 3){
            $this->info_name = "সামাজিক সংগঠন  সম্পর্কিত তথ্য";
            $this->class_name = 'App\Models\emergencyinfo\socialinfo_table';

            $this->info_message = "বিভিন্ন সামাজিক ও স্বেচ্ছাসেবী সংগঠন বিনামূল্য সারাদেশে রোগীর প্রয়োজনে রক্তদান করছে। <br><br> রক্তের প্রয়োজনে স্বেচ্ছাসেবী সংগঠনসমূহের সহযোগিতা নিতে সার্চ করুন।";

        } elseif ($id == 4){
            $this->info_name = "কবরস্থান সম্পর্কিত তথ্য";
            $this->class_name = 'App\Models\emergencyinfo\graveyardinfo_table';

            $this->info_message = "মৃত ব্যাক্তির গোসল, জানাযা, কবরস্থত করা পর্যন্ত সৎকার্য এর যাবতীয় সহযোগিতা ও তথ্য জেনে নিন। <br><br> কাফনের কাপড়, কবরস্থানের তথ্যসহ, যাবতীয় তথ্য সহযোগিতা পেতে সার্চ করুন।";

        } elseif ($id == 5){
            $this->info_name = "জানাজা সম্পর্কিত তথ্য";
            $this->class_name = 'App\Models\emergencyinfo\funeralinfo_table';

            $this->info_message = "মৃত ব্যাক্তিকে কবরস্থ করার জন্য কবরস্থানের ঠিকানা, নাম্বার, প্রয়োজনীয় তথ্য এবং মরহুম/মরহুমার গোসলের সহযোগিতা ও তথ্য পেতে সার্চ করুন।";

        } elseif ($id == 6){
            $this->info_name = "থেরাপি সেন্টের সম্পর্কিত তথ্য";
            $this->class_name = 'App\Models\emergencyinfo\theraphycenterinfo_table';

            $this->info_message = "<div>করোনা, প্যারালাইজড, অপারেশন রোগীর ফিজিওথেরাপি প্রদান করা। বাত, ব্যাথা, আর্থ্রাইটিস জয়েন্ট পেইন থেরাপী প্রদান করা হয়। অটিস্টিক শিশু ও দেরীতে কথা বলা বাচ্চাদের স্পিচ থেরাপী প্রদান করা। সাশ্রয়ী মূল্য সকল সেবা প্রদান করা হয়।&nbsp;</div><br><div>ফিজিওথেরাপি হটলাইন:&nbsp;01722 748335,&nbsp;01855 870411.</div><br><div>অন্যান্য থেরাপি সেন্টের সম্পর্কিত তথ্য পেতে সার্চ করুন।&nbsp;</div>";

        }
        


    }

    public function render()
    {
        $data['divisions'] = Division::all();

        if ($this->division != null) {
            $this->districts = self::getDistricts($this->division);
        }
        if ($this->district != null) {
            $this->locations = self::getLocations($this->district); 
        }

        return view('livewire.emergencyinfo.energency-component',compact('data'))->layout('frontend.livewire_base');
    }
}
