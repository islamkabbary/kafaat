<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','email','password','phone','type','country_code' ,'photo','verified'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getPhotoAttribute($photo){
        if ($photo != null) {

            return asset('uploads/users/images/'.$photo);
        } else {
            return asset('uploads/users/images/default_user_img.svg');
        }

    }


    public function student(){
        return $this->hasOne('App\Student', 'user_id', 'id');
    }

    public function favourites(){
        return $this->hasMany('App\Favourite');
    }

    public function coupons(){
        return $this->hasMany('App\Coupon' , 'user_id' , 'id');
    }
    public function studentCourses(){
        return $this->hasMany('App\StudentCourse' , 'user_id' , 'id');
    }
}
