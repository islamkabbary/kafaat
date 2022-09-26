<?php

namespace App\Http\Controllers\admin;

use App\Ads;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ImageUploaderTrait;

class AdsController extends Controller
{
    use ImageUploaderTrait;

    public function index()
    {
        $ads = Ads::paginate(10);
        return view('admin.ads.index', ['ads' => $ads]);
    }

    public function create()
    {
        return view('admin.ads.create');
    }

    public function store(Request $request)
    {
        $request_array = $request->all();
        if ($request_array['image'] != null) {

            $returned_image = $this->ImageUploader($request_array['image'], 'uploads/ads/images');
            $request_array['image'] = $returned_image;
        }

        $request_array['description'] = $request->description1;
        Ads::create($request_array);
        return redirect()->route('ads.index');
    }

    public function edit($id)
    {
        $ads = Ads::find($id);
        return view('admin.ads.edit', ['ads' => $ads]);
    }

    public function update(Request $request, $id)
    {
        $request_array = $request->all();
        $ads = Ads::find($id);
        if ($request->image && $request_array['image'] != null) {
            //  unlink(public_path('uploads/ads/images/'. substr($ads->image, strpos($ads->image, "images/") + 7)));
            $returned_image = $this->ImageUploader($request_array['image'], 'uploads/ads/images');
            $request_array['image'] = $returned_image;
        }
        $request_array['description'] = $request->description1;
        $ads->update($request_array);
        return redirect()->route('ads.index');
    }

    public function destroy($id)
    {
        $ads = Ads::find($id);
        //  unlink(public_path('uploads/ads/images/'. substr($ads->image, strpos($ads->image, "images/") + 7)));
        $ads->delete();
        return redirect()->back()->with('success', 'success deletion');
    }

    public function hide($id)
    {
        $ads = Ads::find($id);
        if ($ads->is_show == 1) {
            $ads->is_show = 0;
        } else {
            $ads->is_show = 1;
        }
        $ads->save();
        return redirect()->back();
    }
}