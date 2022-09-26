<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    protected $table = "favourites";
    protected $fillable = ['user_id' , 'course_id'];

    public function user(){
        return $this->hasOne('App\User' , 'user_id');
    }

    public function favourites_courses(){
        return $this->belongsTo('App\Course' , 'course_id' , 'id');
    }
}
