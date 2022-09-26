<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OnlineCourses extends Model
{
    protected $table = 'online_courses';
    protected $fillable = [
        'course_id' ,
        'user_id',
        'course_link',
    ];

    public function coursesOnline(){
        return $this->belongsTo('App\Course' , 'course_id');
    }

    public function usersOnline(){
        return $this->belongsTo('App\User' , 'user_id');
    }
}
