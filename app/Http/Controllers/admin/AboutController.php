<?php


namespace App\Http\Controllers\admin;
use App\AboutUs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class PageController extends Controller
{

    public function aboutSections(){
        return view('admin.about_us.index')->with("sections" , AboutUs::all());
    }

    public function edit(Request $request , $id){
        $section = AboutUs::find($id);
        if ($request->isMethod("POST")){
             $section->update(["title" => $request->title ,
                 "description" => $request->description
                 ]);
             return redirect()->route("about_us.index");
        }else{
            return View("admin.about_us.edit")->with("section" , $section );
        }

    }

}