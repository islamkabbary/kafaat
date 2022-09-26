<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = "settings";

    protected $fillable = ['logo','site_name','phone','address','facebook_link','twitter_link','instagram_link','snap_link','telegram_link','linkedin_link','youtube_link','contact_email'
        ,'site_description','location','site_icon','payment_1', 'payment_2','payment_3'];


    public function getLogoAttribute($logo){
        return asset('uploads/settings/images/'.$logo);
    }

    public function getSiteIconAttribute($site_icon){
        return asset('uploads/settings/images/'.$site_icon);
    }



    public function getPayment1Attribute($payment_1){
        return asset('uploads/settings/images/'.$payment_1);
    }

    public function getPayment2Attribute($payment_2){
        return asset('uploads/settings/images/'.$payment_2);
    }

    public function getPayment3Attribute($payment_3){
        return asset('uploads/settings/images/'.$payment_3);
    }
}
