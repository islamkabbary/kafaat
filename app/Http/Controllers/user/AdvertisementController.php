<?php

namespace App\Http\Controllers\user;

use App\BusinessArea;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Achievement;
use App\Ads;

class AdvertisementController extends Controller
{
    public function getAdsDetails($id){
        $adsDetails = Ads::find($id);
        return view('user.advertisements.ads-details' , ['adsDetails' => $adsDetails]);
    }
}
