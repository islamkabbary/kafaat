<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentTransaction extends Model
{
    protected $table = "payment_transactions";
    protected $fillable = ['user_id' , 'course_id' , 'payment' , 'paid' ,'transaction_id' , 'transaction_status'];

    public function user(){
        return $this->belongsTo('App\User' , 'user_id');
    }

    public function course(){
        return $this->belongsTo('App\Course' , 'course_id');
    }
}
