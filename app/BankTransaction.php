<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankTransaction extends Model
{
    protected $table = "bank_transactions";
    protected $fillable = ['user_id' , 'course_id' , 'receipt' , 'paid'];

    public function user(){
        return $this->belongsTo('App\User' , 'user_id');
    }

    public function course(){
        return $this->belongsTo('App\Course' , 'course_id');
    }

    public function getReceiptAttribute($receipt){
        return asset('uploads/payments/receipts/'.$receipt);
    }
}
