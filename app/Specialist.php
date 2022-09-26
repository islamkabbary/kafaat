<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;

class Specialist extends Model
{

    protected $table = "specialists";
    protected $fillable = ['title' , 'description' , 'image'];

    public function getImageAttribute($image){
        return asset('uploads/specialists/images/'.$image);
    }

    public function scopeTitlesOnLY($query){
        return $query->select(['specialists.id','specialists.title'])->get();
    }

    public function courses(){
        return $this->hasMany('App\Course' , 'specialist_id' , 'id');
    }

    public function courses2($id){
        return Course::where("specialist_id" , $id)->where("date" , ">=" , date("Y-m-d"))->count();
    }
}
