<?php
use App\Achievement;
use App\Student;
use App\Course;
use App\Cart;
use App\Favourite;
use App\StudentCourse;
use Carbon\Carbon;


function getCountAchievement($type){
    $count = Achievement::where('type' , '=' , $type)->count();
    return $count;
}

function getCountStudents(){
    $count = Student::all()->count();
    return $count;
}

function getCountCourses(){
    $count = Course::all()->count();
    return $count;
}

function getCountNewStudents(){
    $count = Student::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
    return $count;
}

function generate_code($n=4)
{
	$length = [
		'chars' => array(0,1,2,3,4,5,6,7,8,9),
		'total' => $n,
	];

	$max = count($length['chars'])-1;

	$serial = '';
	for($i=0;$i<$length['total'];$i++){
		$serial .= $length['chars'][rand(0, $max)];
	}
	return $serial;

}


function getCountInCart(){
    $count = Cart::where('user_id' , '=' , auth()->user()->id)->count();
    return $count;
}

function getCountCoursesFromFavourites(){
    $count = Favourite::all()->count();
    return $count;
}

function getCountCoursesFromCarts(){
    $count = Cart::all()->count();
    return $count;
}

function getFavouritesForUser(){
    $favourites = Favourite::where('user_id' , '=' , auth()->user()->id)->get('course_id');
      return $favourites;
}

function getCountCoursesFinished(){
    $count = StudentCourse::all()->count();
    return $count;
}

function getPricesOfFinishedCourses(){
    $getCoursesPrices = StudentCourse::with('course')->get();
    $total=0;
    foreach($getCoursesPrices as $price){
        $total = $total + (float)$price->course->price;
    }
    return $total;
}
