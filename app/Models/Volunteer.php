<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    use HasFactory;

    protected $table = "volunteers";

    public function scopeSearch($query,$term)
    {
        $term = "%$term%";
        $query->where(function($query) use ($term)
        {
            $query->where('name','like',$term)
                    ->orWhere('gender','like',$term)
                    ->orWhere('blood_group','like',$term)
                    ->orWhere('profession','like',$term)
                    ->orWhere('location','like',$term)
                    ->orWhere('mobile','like',$term)
                    ->orWhere('email','like',$term)
                    ->orWhere('status','like',$term)
                    ->orWhere('referance','like',$term)
                    ->orWhere('type','like',$term);
        });
    }
}
