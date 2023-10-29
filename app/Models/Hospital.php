<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    protected $table = "hospitals";

    public function scopeSearch($query,$term)
    {
        $term = "%$term%";
        $query->where(function($query) use ($term)
        {
            $query->where('hospital_name','like',$term)
                    ->orWhere('location','like',$term)
                    ->orWhere('phone','like',$term)
                    ->orWhere('details','like',$term);
        });
    }
}
