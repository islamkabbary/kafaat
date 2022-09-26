<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = "cart";
    protected $fillable = ['user_id' , 'course_id'];

    public function user(){
        return $this->hasOne('App\User' , 'user_id');
    }

    public function cart_courses(){
        return $this->belongsTo('App\Course' , 'course_id' , 'id');
    }
}
