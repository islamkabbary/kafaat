<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Partner;
use App\Traits\ImageUploaderTrait;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    use ImageUploaderTrait;
    public function index(){
        return view('admin.partners.index')->with(['partners' => Partner::latest()->paginate(10)]);
    }
    public function create(){
        return view('admin.partners.create');
    }

    public function edit($partner_id){
        $partner = Partner::find($partner_id);
        return view('admin.partners.edit')->with('partner' , $partner);
    }

    public function store(Request $request){
        $request_array = $request->all();
        if ($request['logo'] != null){
            $request_array['logo']  =  $this->ImageUploader($request_array['logo'] , 'uploads/partners/logos');

        }
        Partner::create($request_array);
        return redirect()->route('partners.index');
    }

    public function destroy($partner_id){
        $partner = Partner::find($partner_id);
//        unlink(public_path('uploads/partners/images/'. substr($partner->image, strpos($partner->image, "images/") + 7)));
        $partner->delete();
        return redirect()->route('partners.index');
    }

    public function update(Request $request , $partner_id){
        $request_array = $request->all();
        $partner = Partner::find($partner_id);
        if($request->logo && $request_array['logo'] != null){
//            unlink(public_path('uploads/partners/images/'. substr($partner->logo, strpos($partner->logo, "images/") + 7)));
            $request_array['logo'] = $this->ImageUploader($request_array['logo'] , 'uploads/partners/images');

        }
        $partner->update($request_array);
        return redirect()->route('partners.index');
    }
}
