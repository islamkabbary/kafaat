<?php


namespace App\Http\Controllers\admin;
use App\AboutUs;
use App\Http\Controllers\Controller;
use App\Page;
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
                 "description" => $request->description1
                 ]);
             return redirect()->route("about_us.index");
        }else{
            return View("admin.about_us.edit")->with("section" , $section );
        }

    }

    public function pages(){
        return view('admin.pages.index')->with("pages" , Page::all());
    }

    public function page_edit(Request $request , $id){
        $page = Page::find($id);
        if ($request->isMethod("POST")){
            $page->update(["title" => $request->title ,
                "description" => $request->description1
            ]);
            return redirect()->route("pages.index");
        }else{
            return View("admin.pages.edit")->with("page" , $page );
        }

    }

}