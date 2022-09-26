<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseMedia extends Model
{
    protected $table = "course_media";
    protected $fillable = ['course_id' ,'registered_course_id' , 'media_file','media_title' , 'media_type','media_lock'];



    public function course(){
        return $this->belongsTo('App\Course' , 'course_id');
    }

    public function getMediaFileAttribute($course_file){
        return asset('uploads/courses/media/files/'.$course_file);
    }
}
