<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $table = "doctors";

    public function scopeSearch($query,$term)
    {
        $term = "%$term%";
        $query->where(function($query) use ($term)
        {
            $query->where('name','like',$term)
                    ->orWhere('designation','like',$term)
                    ->orWhere('hospital','like',$term)
                    ->orWhere('specialist','like',$term)
                    ->orWhere('phone','like',$term)
                    ->orWhere('schedule','like',$term)
                    ->orWhere('chamber_address','like',$term);
        });
    }
}
