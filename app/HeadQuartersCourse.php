<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeadQuartersCourse extends Model
{
    protected $table = 'headquarters_courses';
    protected $fillable = [
        'course_id' ,
        'user_id',
        'register_date',
    ];

    public function coursesHeadQuarters(){
        return $this->belongsTo('App\Course' , 'course_id');
    }

    public function usersHeadQuarters(){
        return $this->belongsTo('App\User' , 'user_id');
    }
}
