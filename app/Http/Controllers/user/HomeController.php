<?php

namespace App\Http\Controllers\user;

use App\AboutUs;
use App\Achievement;
use App\Course;
use App\Http\Controllers\Controller;
use App\Page;
use App\Partner;
use App\Service;
use App\Setting;
use App\Specialist;
use App\BusinessArea;
use App\Subscription;
use App\Ads;
use Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $settings = Setting::first();
        $pages = Page::select(["id", "title"])->get();
        $services = Service::all();
        $business_areas = BusinessArea::all();
        $ads = Ads::where('is_show',1)->orderBy('id', 'DESC')->get();
        Session::put('sitePhone', $settings->phone);
        Session::put('siteAddress', $settings->address);
        Session::put('siteEmail', $settings->contact_email);
        Session::put('site_nameHeader', $settings->site_name);
        Session::put('site_descriptionHeader', $settings->site_description);
        Session::put('facebook_linkHeader', $settings->facebook_link);
        Session::put('twitter_linkHeader', $settings->twitter_link);
        Session::put('instagram_linkHeader', $settings->instagram_link);
        Session::put('snapchat_linkHeader', $settings->snap_link);
        Session::put('whatsapp_linkHeader', $settings->whatsapp_link);
        Session::put('linkedin_linkHeader', $settings->linkedin_link);
        Session::put('telegram_linkHeader', $settings->telegram_link);
        Session::put('youtube_linkHeader', $settings->youtube_link);
        Session::put('payment_1', $settings->payment_1);
        Session::put('payment_2', $settings->payment_2);
        Session::put('payment_3', $settings->payment_3);
        Session::put('logo', $settings->logo);
        Session::put('site_icon', $settings->site_icon);
        Session::put('location', $settings->location);
        Session::put('services', $services);
        Session::put('ads', $ads);
        Session::put('business_areas', $business_areas);
        Session::put('pages', $pages);
        return view('welcome')->with([
            'settings' => $settings,
            'services' => Service::latest()->get(),
            'partners' => Partner::latest()->get(),
            'courses' => Course::where([['date', '>=', date('Y-m-d')], ['type', 1]])->latest()->get(),
            'achievements' => Achievement::take(3)->get(),
            'business_areas' => $business_areas
        ]);
    }
    public function aboutUs()
    {
        $setting = Setting::first();
        return view('user.aboutUs', ['setting' => $setting, "sections" => AboutUs::all()]);
    }

    public function subscribeForWebsite(Request $request)
    {
        if (Subscription::where('phone', '=', $request->phone)->first()) {
            return 0;
        } else {
            $storeSubscription = new Subscription();
            $storeSubscription->phone = $request->input('phone');
            $storeSubscription->save();
            return 1;
        }
    }

    public function getAchievementsWihtHisType($type)
    {
        return Achievement::where('type', $type)->get();
    }

    public function policy1()
    {
        return view('user.policy1_page');
    }

    public function conditions()
    {
        return view('user.conditions');
    }

    public function policy2()
    {
        return view('user.policy2_page');
    }

    public function pages($page_id)
    {
        return view('user.pages.page_details')->with("page", Page::find($page_id));
    }
}
