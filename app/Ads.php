<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    protected $table = 'ads';
    protected $fillable = [
        'title' ,
        'description',
        'image',
        'ads_link'
    ];

    public function getImageAttribute($image){
        return asset('uploads/ads/images/'.$image);
    }
}
