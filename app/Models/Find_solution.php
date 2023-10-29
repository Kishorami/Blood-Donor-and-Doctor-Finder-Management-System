<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Find_solution extends Model
{
    use HasFactory;

    protected $table = "find_solutions";

    public function scopeSearch($query,$term)
    {
        $term = "%$term%";
        $query->where(function($query) use ($term)
        {
            $query->where('name','like',$term)
                    ->orWhere('age','like',$term)
                    ->orWhere('phone','like',$term)
                    ->orWhere('email','like',$term)
                    ->orWhere('problems','like',$term)
                    ->orWhere('is_solved','like',$term);
        });
    }
}
