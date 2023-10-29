<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $table = "contents";

    public function scopeSearch($query,$term)
    {
        $term = "%$term%";
        $query->where(function($query) use ($term)
        {
            $query->where('name','like',$term)
                    ->orWhere('designation','like',$term)
                    ->orWhere('institution','like',$term)
                    ->orWhere('email','like',$term)
                    ->orWhere('phone','like',$term)
                    ->orWhere('title','like',$term)
                    ->orWhere('description','like',$term)
                    ->orWhere('content_type','like',$term);
        });
    }
}
