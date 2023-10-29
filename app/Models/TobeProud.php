<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TobeProud extends Model
{
    use HasFactory;

    protected $table = "tobeprouds";

    public function scopeSearch($query,$term)
    {
        $term = "%$term%";
        $query->where(function($query) use ($term)
        {
            $query->where('sender_email','like',$term)
                    ->orWhere('sender_type','like',$term)
                    ->orWhere('donate_date','like',$term)
                    ->orWhere('donate_place','like',$term)
                    ->orWhere('status','like',$term)
                    ->orWhere('reason_of_proud','like',$term);
        });
    }
}
