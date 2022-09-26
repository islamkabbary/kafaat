<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Setting;
use App\Traits\ImageUploaderTrait;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use ImageUploaderTrait;

    public function index(){
       return view('admin.settings.index')->with(['settings' => Setting::first() ]);
    }

    public function updateSettings(Request  $request)
    {
        $settings = Setting::first();
        $request_array = $request->all();
        if ($request->has('logo')) {
            $request_array['logo'] = $this->ImageUploader($request->logo, 'uploads/settings/images');

        }


        if ($request->has('site_icon')) {
            $request_array['site_icon'] = $this->ImageUploader($request->site_icon, 'uploads/settings/images');

        }

        if ($request->has('payment_1')) {
            $request_array['payment_1'] = $this->ImageUploader($request->payment_1, 'uploads/settings/images');

        }

        if ($request->has('payment_2')) {
            $request_array['payment_2'] = $this->ImageUploader($request->payment_2, 'uploads/settings/images');

        }

        if ($request->has('payment_3')) {
            $request_array['payment_3'] = $this->ImageUploader($request->payment_3, 'uploads/settings/images');

        }


        $settings->update($request_array);

   return redirect()->back();

    }

}
