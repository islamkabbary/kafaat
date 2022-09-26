<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = "services";
    protected $fillable = ['title' , 'description' , 'logo' , 'image'];


    public function getImageAttribute($image){
        return asset('uploads/services/images/'.$image);
    }

    public function orders(){
        return $this->hasMany('App\servicesOrder' , 'service_id' , 'id');
    }
}
