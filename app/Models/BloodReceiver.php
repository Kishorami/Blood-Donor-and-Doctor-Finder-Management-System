<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodReceiver extends Model
{
    use HasFactory;

    protected $table = "blood_receivers";

    public function scopeSearch($query,$term)
    {
        $term = "%$term%";
        $query->where(function($query) use ($term)
        {
            $query->where('receiver_name','like',$term)
                    ->orWhere('receiver_phone','like',$term)
                    ->orWhere('receiver_hospital','like',$term)
                    ->orWhere('receiver_donation_date','like',$term)
                    ->orWhere('receiver_blood_group','like',$term)
                    ->orWhere('donor_id','like',$term)
                    ->orWhere('donor_name','like',$term)
                    ->orWhere('donor_email','like',$term)
                    ->orWhere('blood_bag','like',$term)
                    ->orWhere('donor_phone','like',$term);
        });
    }
}
