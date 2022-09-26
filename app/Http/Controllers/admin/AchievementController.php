<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ImageUploaderTrait;
use App\Achievement;

class AchievementController extends Controller
{
    use ImageUploaderTrait;

    public function index(){

        return view('admin.achievements.index')->with(['achievements' => Achievement::paginate(10)]);
        // return view ('admin.achievements.index');
    }

    public function create(){
        return view('admin.achievements.create');
    }


    public function store(Request $request){
        
        $request_array = $request->all();
         if($request_array['media'] != null){

             $returned_image = $this->ImageUploader($request_array['media'] , 'uploads/achievements/images');
             $request_array['media'] = $returned_image;
         }
         $request_array['description'] = $request->description1;
         Achievement::create($request_array);
         return redirect()->route('achievements.index');
    }

    public function edit($id){


        return view('admin.achievements.edit')->with(['achievement' =>   Achievement::find($id)]);
        // return view ('admin.achievements.edit' , ['achievements' , $achievements]);
    }

    public function update(Request $request , $id){
        $request_array = $request->all();
         $achievements = Achievement::find($id);
         if($request->media && $request_array['media'] != null){
//             unlink(public_path('uploads/achievements/images/'. substr($achievements->media, strpos($achievements->media, "images/") + 7)));
             $returned_image = $this->ImageUploader($request_array['media'] , 'uploads/achievements/images');
             $request_array['media'] = $returned_image;
         }
       $achievements->update([
            "description" => $request->description1
        ]);
         $achievements->update($request_array);
         return redirect()->route('achievements.index');
    }

    public function destroy($id){


        $achievements = Achievement::find($id);
//         unlink(public_path('uploads/achievements/images/'. substr($achievements->media, strpos($achievements->media, "images/") + 7)));
         $achievements->delete();
         return redirect()->back()->with('success' , 'success deletion');
    }
}
