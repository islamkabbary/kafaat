<?php

namespace App\Http\Controllers;

use App\OnlineCourses;
use Illuminate\Http\Request;

class OnlineCoursesController extends Controller
{
    public function index(){
        dd('Hello From OnlineCoursesController :)');
        $onlineCourse = OnlineCourses::all();
        // return view ('admin.onlineCourse.index');
    }

    public function create(){
        dd('Hello From OnlineCoursesController :)');
        // return view ('admin.onlineCourse.create');
    }

    public function store(Request $request){
        $onlineCourse = new OnlineCourses();
        $onlineCourse->course_id = $request->input('course_id');
        $onlineCourse->user_id = $request->input('user_id');
        $onlineCourse->course_link = $request->input('course_link');

        $onlineCourse->save();

        return redirect()->route('onlineCourse.index');
    }

    public function edit($id){
        dd('Hello From OnlineCoursesController :)');
        $onlineCourse = OnlineCourses::find($id);
        // return view ('admin.onlineCourse.edit' , ['onlineCourse' => $onlineCourse]);
    }

    public function update(Request $request , $id){
        $onlineCourse = OnlineCourses::find($id);
        $onlineCourse->course_id = $request->input('course_id');
        $onlineCourse->user_id = $request->input('user_id');
        $onlineCourse->course_link = $request->input('course_link');

        $onlineCourse->save();

        return redirect()->route('onlineCourse.index');
    }

    public function destroy($id){
        $onlineCourse = OnlineCourses::find($id)->delete();
        return redirect()->route('onlineCourse.index');
    }
}
