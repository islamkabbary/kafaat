<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $table = 'achievements';
    protected $fillable = [
        'media' ,
        'name' ,
        'address' ,
        'description',
        'type'
    ];
    public function getMediaAttribute($media){
        return asset('uploads/achievements/images/'.$media);
    }

}
