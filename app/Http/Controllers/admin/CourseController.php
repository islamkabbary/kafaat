<?php

namespace App\Http\Controllers\admin;

use App\BankTransaction;
use App\Cart;
use App\Course;
use App\CourseMedia;
use App\Http\Controllers\Controller;
use App\PaymentTransaction;
use App\RegisteredCourse;
use App\Specialist;
use App\StudentCourse;
use App\Traits\ImageUploaderTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    use ImageUploaderTrait;

    public function index(){
     // RETURN ALL COURSES EXCLUDING EXPIRED ONES
    return view ('admin.courses.index')->with(['courses'=>Course::where('date','>=',date('Y-m-d'))->latest()->paginate(6)]);
    }

    public function purchasedCourses(){
        return view ('admin.courses.purchased')->with(['courses'=>StudentCourse::latest()->distinct()->get()]);
    }

    public function courseStudents($id){
        return view ('admin.courses.purchased_show' , ['studentCourses' => StudentCourse::where('course_id' , $id)->paginate(6),'course'=> Course::find($id) ]);
    }

    public function expiredCourses(){
     // RETURN ALL EXPIRED COURSES
        return view ('admin.courses.expired')->with(['courses'=>Course::where('date','<',date('Y-m-d'))->latest()->paginate(6)]);
    }

    public function create(){
        return view ('admin.courses.create')->with(['specialists' => Specialist::all()]);
    }

    public function store(Request $request){
        $tags = explode(',', $request->tags);
        $course = new Course();
        $course->title = $request->input('title');
        $course->description = $request->input('descriptionCourse');
        $course->instructor = $request->input('instructor');
        $course->instructor_overview = $request->input('instructor_overview');

        $course->overview = $request->input('overview');
        $course->code =  mt_rand(1000,9999);
        $course->type = $request->input('type');
        $course->specialist_id = $request->input('specialist');
        $course->duration = $request->input('duration');
        $course->price = $request->input('price');
        $course->date = $request->input('date');
        $course->days = $request->input('days');
        $course->assurance_number = $request->input('assurance_number');
        $course->attendance_type = $request->input('attendance_type');
        $course->extra_info = $request->extra_info;
        if ($request->tags){

            $course->tags = json_encode($tags);
        }
        if($request->offer){

            $course->offer = $request->offer;
            $course->price_after_discount =  $course->price  -  (( $course->price * $course->offer )/ 100);

        }else{
            $course->price_after_discount =  $course->price;
        }


        if($request['image_cover'] != null){

            $returned_image = $this->ImageUploader($request['image_cover'] , 'uploads/courses/images');
            $course->image_cover = $returned_image;
        }
        if($request->intro && $request['intro'] != null){
//            unlink(public_path('/uploads/courses/images/'. substr($courses->image_cover, strpos($courses->image_cover, "images/") + 7)));

            $returned_file = $this->ImageUploader($request['intro'] , 'uploads/courses/images');
            $course->intro = $returned_file;
        }
        if($request['instructor_img'] != null){

            $returned_image = $this->ImageUploader($request['instructor_img'] , 'uploads/courses/instructors/images');
            $course->instructor_img = $returned_image;
        }


        $course->save();
        if ($course->type == 'مشاهده') {
            #rgc_arr = [];
            if ($request->content_title) {
                for ($looper = 0; $looper < count($request->content_title); $looper++) {
//       return $request->input('media_title_'.$looper)[$looper];

                    $rgc = RegisteredCourse::create([

                        'course_id' => $course->id,
                        'content_title' => $request->content_title[$looper],

                    ]);
                    if ($request->input('media_title_' . $looper)) {
                        for ($i = 0; $i < count($request->input('media_title_' . $looper)); $i++) {
                            CourseMedia::create([

                                'course_id' => $course->id,
                                'registered_course_id' => $rgc->id,
                                'media_title' => $request->input('media_title_' . $looper)[$i],
                                'media_file' => $this->ImageUploader($request->file('media_file_' . $looper)[$i], 'uploads/courses/media/files'),
                                'media_lock' => $request->input('media_lock_' . $looper)[$i],
                                'media_type' => $request->input('media_type_' . $looper)[$i],
                            ]);
                        }
                    }
                }
            }
        }
        return redirect()->route('courses.index');
    }

    public function edit($id){

         return view ('admin.courses.edit' , ['course' => Course::find($id) , 'specialists' => Specialist::all()]);
    }

    public function show($id){

        return view ('admin.courses.show' , ['course' => Course::find($id) , 'specialists' => Specialist::all()]);
    }


    public function update(Request $request , $id){
        $tags = explode(',', $request->tags);
        $course = Course::find($id);
        $course->title = $request->input('title');
        $course->description = $request->input('descriptionCourse');
        $course->instructor = $request->input('instructor');
        $course->instructor_overview = $request->input('instructor_overview');
        $course->overview = $request->input('overview');
        $course->type = $request->input('type');
        $course->specialist_id = $request->input('specialist');
        $course->duration = $request->input('duration');
        $course->price = $request->input('price');
        $course->date = $request->input('date');
        $course->days = $request->input('days');
        $course->assurance_number = $request->input('assurance_number');
        $course->attendance_type = $request->input('attendance_type');
        $course->extra_info = $request->extra_info;
        if ($request->tags){

            $course->tags = json_encode($tags);
        }
        if($request->offer){

            $course->offer = $request->offer;
            $course->price_after_discount =  $course->price  -  (( $course->price * $course->offer )/ 100);

        }else{
           if ($course->offer){
               $course->price_after_discount =  $course->price  -  (( $course->price * $course->offer )/ 100);
           }
        }

        if($request->image_cover && $request['image_cover'] != null){
//            unlink(public_path('/uploads/courses/images/'. substr($courses->image_cover, strpos($courses->image_cover, "images/") + 7)));

            $returned_image = $this->ImageUploader($request['image_cover'] , 'uploads/courses/images');
            $course->image_cover = $returned_image;
        }

        if($request->intro && $request['intro'] != null){
//            unlink(public_path('/uploads/courses/images/'. substr($courses->image_cover, strpos($courses->image_cover, "images/") + 7)));

            $returned_file = $this->ImageUploader($request['intro'] , 'uploads/courses/images');
            $course->intro = $returned_file;
        }

        if($request['instructor_img'] != null){

            $returned_image = $this->ImageUploader($request['instructor_img'] , 'uploads/courses/instructors/images');
            $course->instructor_img = $returned_image;
        }

        $course->save();

        if ($course->type == 'مشاهدة') {
          #rgc_arr = [];
            $rgc_ids = [];
            if ($request->content_title) {
                for ($looper = 0; $looper < count($request->content_title); $looper++) {
                   $rgc =  RegisteredCourse::create([
                        "course_id" => $course->id,
                        "content_title" => $request->content_title[$looper]
                ]);
                    array_push($rgc_ids, $rgc->id);
                    }
                for ($looper = 0; $looper <= count($request->content_title); $looper++) {
//       return $request->input('media_title_'.$looper)[$looper];

                    if ($request->has('media_title_' . $looper)) {

//                    $rgc = new RegisteredCourse();
//                    $rgc->course_id = $course->id;
//                    $rgc->content_title = $request->content_title[$looper];
//                    $rgc->save();




                    for ($i = 0; $i < count($request->input('media_title_' . $looper)); $i++) {

                        CourseMedia::create([

                            'course_id' => $course->id,
                            'registered_course_id' => $rgc->id,
                            'media_title' => $request->input('media_title_' . $looper)[$i],
                            'media_file' => $this->ImageUploader($request->file('media_file_' . $looper)[$i], 'uploads/courses/media/files'),
                            'media_lock' => $request->input('media_lock_' . $looper)[$i],
                            'media_type' => $request->input('media_type_' . $looper)[$i],
                        ]);
                    }
                }
                }
            }
            if ($request->input('content_title')  && $request->input('content_title_2')){
                RegisteredCourse::where('course_id', $course->id)->whereNotIn('id', $rgc_ids)->delete();
            }
            if (!$request->input('content_title')  && $request->input('content_title_2')){
                RegisteredCourse::where('course_id', $course->id)->delete();
            }


            if ($request->content_title_2 ) {

                for ($looper = 0; $looper < count($request->content_title_2); $looper++) {
                    $rgc = RegisteredCourse::create([

                        'course_id' => $course->id,
                        'content_title' => $request->content_title_2[$looper],

                    ]);
                    if ($request->input('media_title_2_' . $looper)) {
                        for ($i = 0; $i < count($request->input('media_title_2_' . $looper)); $i++) {
                          $file = null;
                            if ($request->file('media_file_2_' . $looper) && array_key_exists($i,$request->file('media_file_2_' . $looper))) {

                                $file = $this->ImageUploader($request->file('media_file_2_' . $looper)[$i], 'uploads/courses/media/files');
                            }else{

                                $file =  $request->input('media_file_temp_2_' . $looper)[$i] ;
                            }

//                            return $file;
                            CourseMedia::create([

                                'course_id' => $course->id,
                                'registered_course_id' => $rgc->id,
                                'media_title' => $request->input('media_title_2_' . $looper)[$i],
                                'media_file' => $file,
                                'media_lock' => $request->input('media_lock_2_' . $looper)[$i],
                                'media_type' => $request->input('media_type_2_' . $looper)[$i],
                            ]);
                        }
                    }
//                for ($looper = 0; $looper < count($request->content_title_2); $looper++) {
////       return $request->input('media_title_'.$looper)[$looper];
//
//
//                    foreach ($rgcs as $rgc) {
//                        $rgc->update(['content_title' => $request->content_title_2[$looper]]);
//                        $cms = CourseMedia::where('registered_course_id', $rgc->id)->get();
//                        if ($request->input('media_title_' . $rgc->id)){
//
//                            for ($i = 0; $i < count($request->input('media_title_' . $rgc->id)); $i++) {
//
//                                foreach ($cms as $cm) {
//                                    $cm->update([
//
//                                        'media_title' => $request->input('media_title_' . $rgc->id)[$i],
////                                        'media_file' => $this->ImageUploader($request->file('media_file_' . $rgc->id)[$i], 'uploads/courses/media/images'),
//                                        'media_lock' => $request->input('media_lock_' . $rgc->id)[$i],
//                                        'media_type' => $request->input('media_type_' . $rgc->id)[$i],
//                                    ]);
//
//                                }
//
//                            }
//                    }
//
//                    }
//
//
//                }


                }
            }



//            if (!$request->input('content_title_2') ){
//                RegisteredCourse::where('course_id', $course->id)->whereNotIn('id', $rgc_ids)->delete();
//            }


        }

        return redirect()->route('courses.index');
    }

    public function copyToNewCourse(Request $request , $id=null){
        if ($request->isMethod('POST')){

         $theLastVersion = Course::find($id);
        $tags = explode(',', $request->tags);
        $course = new Course();
        $course->title = $request->input('title');
        $course->description = $request->input('description');
        $course->instructor = $request->input('instructor');
        $course->instructor_overview = $request->input('instructor_overview');
        $course->overview = $request->input('overview');
        $course->type = $request->input('type');
        $course->specialist_id = $request->input('specialist');
        $course->duration = $request->input('duration');
        $course->price = $request->input('price');
        $course->date = $request->input('date');
        $course->code = $request->input('code');
            $course->days = $request->input('days');
            $course->assurance_number = $request->input('assurance_number');
            $course->attendance_type = $request->input('attendance_type');
        $course->extra_info = $request->extra_info;
        if ($request->tags){

            $course->tags = json_encode($tags);
        }
        if($request->offer){

            $course->offer = $request->offer;
            $course->price_after_discount =  $course->price  -  (( $course->price * $course->offer )/ 100);

        }else{
            if ($theLastVersion->offer){
                $course->price_after_discount =  $theLastVersion->price  -  (( $theLastVersion->price * $theLastVersion->offer )/ 100);
            }
        }

        if($request->image_cover && $request['image_cover'] != null){
//            unlink(public_path('/uploads/courses/images/'. substr($courses->image_cover, strpos($courses->image_cover, "images/") + 7)));

            $returned_image = $this->ImageUploader($request['image_cover'] , 'uploads/courses/images');
            $course->image_cover = $returned_image;
        }else{
            $image_cover = explode('images/' ,$theLastVersion->image_cover);
            $course->image_cover = $image_cover[1];
        }

        if($request->intro && $request['intro'] != null){
//            unlink(public_path('/uploads/courses/images/'. substr($courses->image_cover, strpos($courses->image_cover, "images/") + 7)));

            $returned_file = $this->ImageUploader($request['intro'] , 'uploads/courses/images');
            $course->intro = $returned_file;
        }else{
            $intro = explode('images/' ,$theLastVersion->intro);
            $course->intro = $intro[1];
        }

        if($request['instructor_img'] != null){

            $returned_image = $this->ImageUploader($request['instructor_img'] , 'uploads/courses/instructors/images');
            $course->instructor_img = $returned_image;
        }else{
            $instructor_img = explode('images/' ,$theLastVersion->instructor_img);
            $course->instructor_img = $instructor_img[1];
        }

        $course->save();

        if ($course->type == 'مشاهدة') {
            #rgc_arr = [];
            $rgc_ids = [];
            if ($request->content_title) {
                for ($looper = 0; $looper < count($request->content_title); $looper++) {
                    $rgc =  RegisteredCourse::create([
                        "course_id" => $course->id,
                        "content_title" => $request->content_title[$looper]
                    ]);
                    array_push($rgc_ids, $rgc->id);
                }
                for ($looper = 0; $looper <= count($request->content_title); $looper++) {
//       return $request->input('media_title_'.$looper)[$looper];

                    if ($request->has('media_title_' . $looper)) {

//                    $rgc = new RegisteredCourse();
//                    $rgc->course_id = $course->id;
//                    $rgc->content_title = $request->content_title[$looper];
//                    $rgc->save();




                        for ($i = 0; $i < count($request->input('media_title_' . $looper)); $i++) {

                            CourseMedia::create([

                                'course_id' => $course->id,
                                'registered_course_id' => $rgc->id,
                                'media_title' => $request->input('media_title_' . $looper)[$i],
                                'media_file' => $this->ImageUploader($request->file('media_file_' . $looper)[$i], 'uploads/courses/media/files'),
                                'media_lock' => $request->input('media_lock_' . $looper)[$i],
                                'media_type' => $request->input('media_type_' . $looper)[$i],
                            ]);
                        }
                    }
                }
            }
            if ($request->input('content_title')  && $request->input('content_title_2')){
                RegisteredCourse::where('course_id', $course->id)->whereNotIn('id', $rgc_ids)->delete();
            }
            if (!$request->input('content_title')  && $request->input('content_title_2')){
                RegisteredCourse::where('course_id', $course->id)->delete();
            }


            if ($request->content_title_2 ) {

                for ($looper = 0; $looper < count($request->content_title_2); $looper++) {
                    $rgc = RegisteredCourse::create([

                        'course_id' => $course->id,
                        'content_title' => $request->content_title_2[$looper],

                    ]);
                    if ($request->input('media_title_2_' . $looper)) {
                        for ($i = 0; $i < count($request->input('media_title_2_' . $looper)); $i++) {
                            $file = null;
                            if ($request->file('media_file_2_' . $looper) && array_key_exists($i,$request->file('media_file_2_' . $looper))) {

                                $file = $this->ImageUploader($request->file('media_file_2_' . $looper)[$i], 'uploads/courses/media/files');
                            }else{

                                $file =  $request->input('media_file_temp_2_' . $looper)[$i] ;
                            }

//                            return $file;
                            CourseMedia::create([

                                'course_id' => $course->id,
                                'registered_course_id' => $rgc->id,
                                'media_title' => $request->input('media_title_2_' . $looper)[$i],
                                'media_file' => $file,
                                'media_lock' => $request->input('media_lock_2_' . $looper)[$i],
                                'media_type' => $request->input('media_type_2_' . $looper)[$i],
                            ]);
                        }
                    }
//                for ($looper = 0; $looper < count($request->content_title_2); $looper++) {
////       return $request->input('media_title_'.$looper)[$looper];
//
//
//                    foreach ($rgcs as $rgc) {
//                        $rgc->update(['content_title' => $request->content_title_2[$looper]]);
//                        $cms = CourseMedia::where('registered_course_id', $rgc->id)->get();
//                        if ($request->input('media_title_' . $rgc->id)){
//
//                            for ($i = 0; $i < count($request->input('media_title_' . $rgc->id)); $i++) {
//
//                                foreach ($cms as $cm) {
//                                    $cm->update([
//
//                                        'media_title' => $request->input('media_title_' . $rgc->id)[$i],
////                                        'media_file' => $this->ImageUploader($request->file('media_file_' . $rgc->id)[$i], 'uploads/courses/media/images'),
//                                        'media_lock' => $request->input('media_lock_' . $rgc->id)[$i],
//                                        'media_type' => $request->input('media_type_' . $rgc->id)[$i],
//                                    ]);
//
//                                }
//
//                            }
//                    }
//
//                    }
//
//
//                }


                }
            }



//            if (!$request->input('content_title_2') ){
//                RegisteredCourse::where('course_id', $course->id)->whereNotIn('id', $rgc_ids)->delete();
//            }


        }

        return redirect()->route('courses.index')->with('success' , 'تم نسخ الدوره و إنشائها من جديد');
        }else{
            return view ('admin.courses.copy' , ['course' => Course::find($id) , 'specialists' => Specialist::all()]);
        }
    }

    public function destroy($id){

                $course = Course::find($id);
//                 unlink(public_path('uploads/courses/images/'. substr($course->image_cover, strpos($course->image_cover, "images/") + 7)));
                $course->delete();
        return redirect()->route('courses.index');
    }

    public function hide($id)
    {
        $course = Course::find($id);
        if ($course->is_show == 1) {
            $course->is_show = 0;
        } else {
            $course->is_show = 1;
        }
        $course->save();
        return redirect()->route('courses.index');
    }
    
    public function courseContentMediaDelete($record_id){
        if ($rg = RegisteredCourse::find($record_id)){
            $rg->delete();
        }
        return 1;
    }

    public function courseMediaDelete($id){

        if ($course_media = CourseMedia::find($id)){
            $course_media->delete();
        }
        return 1;
    }

    public function bankTransactions(){
        $bank_transactions = BankTransaction::latest()->paginate(6);
//        $titles = [];
//        $codes= [];
//        $bank_transactions->each(function ($bt) use ($titles,$codes){
//            $course_id = json_decode($bt->course_id);
//            $course = Course::find($course_id[0]);
//            array_push($titles , $course->title); array_push($codes , $course->code);
//            $bt->course_title =  $titles;
//            $bt->course_code =  $codes;
//        });

        return view('admin.courses.bank_transactions')->with(['bankTransactions' =>$bank_transactions]);
    }

    public function creditTransactions(){
        $credit_transactions = PaymentTransaction::latest()->paginate(6);
        return view('admin.courses.credit_transactions')->with(['creditTransactions' =>$credit_transactions]);
    }
    public function bankTransactionReceipt($id){
        return view('admin.courses.bank_transactions_receipt')->with(['receipt' =>BankTransaction::find($id)]);
    }

    public function bankTransactionConfirm($id){
         $studentCourses = [];
         $bank_transaction = BankTransaction::find($id);
         $course_ids = json_decode($bank_transaction->course_id);
         foreach ($course_ids as $course_id){
             $obj = [
                 "user_id" => $bank_transaction->user_id,
                 "course_id" => $course_id
             ];
             array_push($studentCourses , $obj);
         }
         if (StudentCourse::insert($studentCourses)){
             $bank_transaction->update(["paid" => 1]);
              PaymentTransaction::where('user_id' , $bank_transaction->user_id)->whereIn('course_id' , $course_ids)->where('paid' , 0)->update(["paid" => 1 , "transaction_id" => $id , "transaction_status" => "bank transaction accepted"]);
             Cart::whereIn('course_id', $course_ids)->where('user_id', $bank_transaction->user_id)->delete();

             return redirect()->back()->with('success' , 'تم إضافه الطالب بنجاح');
         }else{
             return redirect()->back()->with('failed' , 'هناك خطأ حدث يرجى المحاولة مرة أخرى');
         }
    }
}
