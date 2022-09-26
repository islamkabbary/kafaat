<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessArea extends Model
{
    protected $table = 'business_areas';
    protected $fillable = [
        'title' ,
        'description',
        'image'
    ];

    public function getImageAttribute($image){
        return asset('uploads/business_area/images/'.$image);
    }
}
