<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    protected $fillable = [
        'title',
        'overview',
        'description',
        'instructor',
        'instructor_overview',
        'instructor_img',
        'code',
        'type',
        'specialist_id',
        'duration',
        'price',
        'price_after_discount',
        'date',
        'extra_info',
        'image_cover',
        'intro',
        'cat_img',
        'offer',
        'tags',
        'days',
        'assurance_number',
        'attendance_type'
    ];

    public function headquartersCourses(){
        return $this->hasOne('App\HeadQuartersCourse' , 'course_id' , 'id');
    }

    public function onlineCourse(){
        return $this->hasOne('App\OnlineCourses' , 'course_id' , 'id');
    }

    public function registeredCourses(){
        return $this->hasMany('App\RegisteredCourse' , 'course_id' , 'id');
    }

    public function specialist(){
        return $this->belongsTo('App\Specialist' , 'specialist_id' , 'id');
    }

    public function studentCourses(){
        return $this->hasMany('App\StudentCourse');
    }

    public function finished_courses(){
        return $this->hasMany('App\FinishedCourse');
    }

    public function favourites(){
        return $this->hasMany('App\Favourite' , 'course_id' , 'id');
    }

    public function carts(){
        return $this->hasMany('App\Cart');
    }

    public function getTypeAttribute($type){
        $course_type = null;
        if($type == 1){
            $course_type = "حضورى";
        }elseif($type == 2){
            $course_type = "عن بعد";
        }else{
            $course_type = "مشاهدة";
        }

        return $course_type;
    }

    public function getImageCoverAttribute($image_cover){
        return asset('uploads/courses/images/'.$image_cover);
    }

    public function getIntroAttribute($intro){
        return asset('uploads/courses/images/'.$intro);
    }

    public function getCatImgAttribute($cat_img){
        if ($cat_img != null){

            return asset('uploads/courses/images/'.$cat_img);
        }else{
            return asset('uploads/courses/images/category.png');
        }


    }

    public function getInstructorImgAttribute($instructor_img)
    {
        if ($instructor_img != null) {

            return asset('uploads/courses/instructors/images/' . $instructor_img);
        } else {
            return asset('uploads/courses/instructors/images/ins_img.svg');
        }
    }



}
