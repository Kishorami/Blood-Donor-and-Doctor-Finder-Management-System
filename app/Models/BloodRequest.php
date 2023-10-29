<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodRequest extends Model
{
    use HasFactory;

    protected $table = "blood_requests";

    public function scopeSearch($query,$term)
    {
        $term = "%$term%";
        $query->where(function($query) use ($term)
        {
            $query->where('sender_email','like',$term)
                    ->orWhere('sender_type','like',$term)
                    ->orWhere('patient_name','like',$term)
                    ->orWhere('request_blood_group','like',$term)
                    ->orWhere('number_blood_bag','like',$term)
                    ->orWhere('patient_hospital','like',$term)
                    ->orWhere('patient_phone','like',$term)
                    ->orWhere('disease','like',$term)
                    ->orWhere('opration_time','like',$term)
                    ->orWhere('status','like',$term)
                    ->orWhere('message','like',$term);
        });
    }
}
