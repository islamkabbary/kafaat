<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupons';
    protected $fillable = [
        'code' ,
        'discount',
        'type',
        'users',
        'fromDate',
        'toDate'
    ];
    protected $dates = ['fromDate', 'toDate'];
}
