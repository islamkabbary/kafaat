<?php

namespace App\Http\Controllers\admin;

use App\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ImageUploaderTrait;
use App\Achievement;

class DashboardController extends Controller
{
   public function dashboard(){
       return view('admin.dashboard')->with(['courses' => Course::all()]);
   }
}
