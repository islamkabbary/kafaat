<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Specialist;
use App\Traits\ImageUploaderTrait;
use Illuminate\Http\Request;

class SpecialistController extends Controller
{
    use ImageUploaderTrait;

    public function create(){
        return view('admin.specialists.create');
    }

    public function edit($specialist_id){
        $specialist = Specialist::find($specialist_id);
        return view('admin.specialists.edit')->with('specialist' , $specialist);
    }
    public function store(Request  $request)
    {

        $request_array = $request->all();
        if($request_array['image'] != null){

            $request_array['image'] = $this->ImageUploader($request_array['image'] , 'uploads/specialists/images');

        }

        Specialist::create($request_array);
        return redirect()->back()->with('success' , 'created successfully');
    }

    public function destroy($specialist_id){
        $specialist = Specialist::find($specialist_id);
//        unlink(public_path('uploads/specialists/images/'. substr($specialist->image, strpos($specialist->image, "images/") + 7)));
        $specialist->delete();
        return redirect()->back()->with('success' , 'success deletion');
    }

    public function update(Request $request , $specialist_id){
        $request_array = $request->all();
        $specialist = Specialist::find($specialist_id);
        if($request_array['image'] != null){
//            unlink(public_path('uploads/specialists/images/'. substr($specialist->image, strpos($specialist->image, "images/") + 7)));
            $returned_image = $this->ImageUploader($request_array['image'] , 'uploads/specialists/images');
            $request_array['image'] = $returned_image;
        }
        $specialist->update($request_array);
        return redirect()->back()->with('success' , 'updated successfully');
    }
}
