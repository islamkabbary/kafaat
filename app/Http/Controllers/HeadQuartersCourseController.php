<?php

namespace App\Http\Controllers;

use App\HeadQuartersCourse;
use Illuminate\Http\Request;

class HeadQuartersCourseController extends Controller
{
    public function index(){
        dd('Hello From HeadQuartersCourseController :)');
        $headquarterCourse = HeadQuartersCourse::all();
        // return view ('admin.headquarterCourse.index');
    }

    public function create(){
        dd('Hello From HeadQuartersCourseController :)');
        // return view ('admin.headquarterCourse.create');
    }

    public function store(Request $request){
        $headquarterCourse = new HeadQuartersCourse();
        $headquarterCourse->course_id = $request->input('course_id');
        $headquarterCourse->user_id = $request->input('user_id');
        $headquarterCourse->register_date = $request->input('register_date');

        $headquarterCourse->save();

        return redirect()->route('headquarterCourse.index');
    }

    public function edit($id){
        dd('Hello From HeadQuartersCourseController :)');
        $headquarterCourse = HeadQuartersCourse::find($id);
        // return view ('admin.headquarterCourse.edit' , ['headquarterCourse' => $headquarterCourse]);
    }

    public function update(Request $request , $id){
        $headquarterCourse = HeadQuartersCourse::find($id);
        $headquarterCourse->course_id = $request->input('course_id');
        $headquarterCourse->user_id = $request->input('user_id');
        $headquarterCourse->register_date = $request->input('register_date');

        $headquarterCourse->save();

        return redirect()->route('headquarterCourse.index');
    }

    public function destroy($id){
        $headquarterCourse = HeadQuartersCourse::find($id)->delete();
        return redirect()->route('headquarterCourse.index');
    }
}
