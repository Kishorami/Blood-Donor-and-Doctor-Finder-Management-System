<?php

namespace App\Models\emergencyinfo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class socialinfo_table extends Model
{
    use HasFactory;
    
    protected $table = "socialinfo_tables";

    public function scopeSearch($query,$term)
    {
        $term = "%$term%";
        $query->where(function($query) use ($term)
        {
            $query->where('name','like',$term)
                    ->orWhere('location','like',$term)
                    ->orWhere('phone','like',$term)
                    ->orWhere('details','like',$term);
        });
    }
}
