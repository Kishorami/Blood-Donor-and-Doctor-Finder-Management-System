<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Laravel\Sanctum\HasApiTokens;

class Donor extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = "donors";

    protected $fillable = ['phone', 'password', 'fname', 'lname', 'blood_group', 'birth_date', 'age', 'email', 'division', 'district', 'upazila', 'address', 'gender', 'post_code', 'reference', 'occupation' ];

     

    public function scopeSearch($query,$term)
    {
        $term = "%$term%";
        $query->where(function($query) use ($term)
        {
            $query->where('fname','like',$term)
                    ->orWhere('lname','like',$term)
                    ->orWhere('phone','like',$term)
                    ->orWhere('email','like',$term)
                    ->orWhere('blood_group','like',$term)
                    ->orWhere('gender','like',$term)
                    ->orWhere('address','like',$term);
        });
    }
}
