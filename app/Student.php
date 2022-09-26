<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "students";
    protected $fillable = ['user_id','address' , 'city','national_id','nationality','interest'];

    public function user(){
        return $this->belongsTo('App\User' , 'user_id' , 'id');
    }
    
    public function state(){
        return $this->belongsTo('App\State' , 'nationality' , 'id');
    }


}
