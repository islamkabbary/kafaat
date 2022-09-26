<?php

namespace App\Http\Controllers\user;

use App\BusinessArea;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BusinessAreaController extends Controller
{
    public function index(){
       return view('user.business-areas.index')->with(['business_areas' => BusinessArea::all()]);
    }
    
    public function getBusinessAreaById($id){
        $businessArea = BusinessArea::find($id);
        $allBusinessTog = BusinessArea::all();
        return view('user.business-areas.detailsBusinessArea' , ['businessArea' => $businessArea , 'allBusinessTog' => $allBusinessTog]);
    }


}
