<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinishedCourse extends Model
{
    protected $table = "finished_courses";
    protected $fillable = ['user_id' , 'course_id'];

    public function user(){
        return $this->hasOne('App\User' , 'user_id');
    }

    public function courses_finished(){
        return $this->belongsTo('App\Course' , 'course_id' , 'id');
    }
}
