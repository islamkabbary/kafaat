<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentCourse extends Model
{
    protected $table = "student_courses";
    protected $fillable = ['user_id' , 'course_id'];

    public function user(){
        return $this->belongsTo('App\User' , 'user_id' ,'id');
    }

    public function course(){
        return $this->belongsTo('App\Course' , 'course_id' , 'id');
    }
}
