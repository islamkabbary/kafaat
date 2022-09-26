<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdsMessage extends Model
{
    protected $table = "ads_messages";
    protected $fillable = ['message' , 'user_id' , 'allUsers'];

    public function user(){
        return $this->belongsTo('App\User' , 'user_id');
    }
}
