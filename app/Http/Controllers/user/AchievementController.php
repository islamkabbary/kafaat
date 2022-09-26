<?php

namespace App\Http\Controllers\user;

use App\BusinessArea;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Achievement;

class AchievementController extends Controller
{
    public function index(){
        return view('user.achievements.index')->with(['achievements' => Achievement::paginate(6)]);
    }
    
    public function achievementDetails($id){
        $achievement = Achievement::find($id);
        $achievementAll = Achievement::all();
        return view('user.achievements.achievements-details' , ['achievement' => $achievement , 'achievementAll' => $achievementAll]);
    }
    
    public function getAchievementWithType($type){
        $backType1 = Achievement::where('type' , '=' , $type)->get();
        return response()->json($backType1);
    }
    
    public function getAllAchievementAjax(){
        $getAll = Achievement::all();
        return response()->json($getAll);
    }

}
