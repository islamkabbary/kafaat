<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $table = "certificates";
    protected $fillable = ['user_id' , 'course_id' , 'pdf' , 'type' , 'link' , 'isLink'];

    public function user(){
        return $this->belongsTo('App\User' , 'user_id');
    }

    public function course(){
        return $this->belongsTo('App\Course' , 'course_id' , 'id');
    }
}
