<?php

namespace App\Http\Controllers\user;

use App\BankTransaction;
use App\Course;
use App\Traits\ImageUploaderTrait;
use App\User;
use App\StudentCourse;
use App\Student;
use App\Http\Controllers\Controller;
use App\Specialist;
use App\PaymentTransaction;
use App\Favourite;
use App\FinishedCourse;
use App\Cart;
use App\Certificate;
use App\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use DB;

class CourseController extends Controller
{
    use ImageUploaderTrait;

    public function courses()
    {
        Session::forget('name');
        Session::forget('type');
        Session::forget('date');
        $data = [];
        if (Auth::guard('web')->check()) {
            $user_id =  Auth::guard('web')->user()->id;
            $student_courses = StudentCourse::where('user_id', $user_id)->get();
            foreach ($student_courses as $student_course) {
                if ($course_id = Course::where([['id', $student_course->course_id], ['date', '<', date('Y-m-d')]])->value('id')) {
                    $obj = [
                        "user_id" => $user_id,
                        "course_id" => $course_id
                    ];
                    array_push($data, $obj);
                }
            }
            FinishedCourse::insert($data);
        }
        return view('user.courses.index')->with([
            'courses' => Course::where('is_show', 1)->latest()->paginate(9),
            'specialists' => Specialist::join('courses', 'specialists.id', 'courses.specialist_id')->distinct()->titlesOnLY()
        ]);
    }

    public function courseDetails($course_id)
    {
        $course = Course::findOrFail($course_id);
        $course->favourits_count = Favourite::where('course_id', $course_id)->count();
        $course->paid = 0;
        if (Auth::guard('web')->check()) {

            if ($courseHasTransaction = PaymentTransaction::where(['user_id' => Auth::guard('web')->user()->id, 'course_id' => $course_id])->first()) {
                $course->paid = $courseHasTransaction->paid;
            }
        } else {
            if ($courseHasTransaction = PaymentTransaction::where(['user_id' => Session::get('user_id'), 'course_id' => $course_id])->first()) {
                $course->paid = $courseHasTransaction->paid;
            }
        }
        return view('user.courses.course-details')->with(['course' => $course, 'courses' => Course::take(3)->get()]);
    }

    public function courseDetails2($course_id)
    {
        $course = Course::findOrFail($course_id);
        $course->favourits_count = Favourite::where('course_id', $course_id)->count();
        $course->paid = 1;

        return view('user.courses.course-details-custom')->with(['course' => $course]);
    }

    public function getDataOfCourse(Request $request)
    {
        $name = $request->input('search');
        $type = $request->input('type');
        if ($name != '') {
            $query = Course::where('title', 'like', '%' . $name . '%')
                ->orWhere('type', '=', $type)
                ->simplePaginate(15);
            return response()->json($query);
        } else {
            return response()->json(['message' => 'failed']);
        }
    }

    public function specialistCourses($specialist_id)
    {
        $courses = Course::where('specialist_id', $specialist_id)->where("date", ">=", date("Y-m-d"))->get();
        if ($courses->count() > 0) {
            if ($auth_user = Auth::user()) {
                $courses = $this->CheckAuthFavourite($courses, $auth_user);
            }
            return $courses;
        } else
            return 0;
    }

    public function typeCourses($type)
    {
        $courses = Course::where('type', $type)->where("date", ">=", date("Y-m-d"))->get();
        if ($courses->count() > 0) {
            if ($auth_user = Auth::user()) {
                $courses = $this->CheckAuthFavourite($courses, $auth_user);
            }
            return $courses;
        } else
            return 0;
    }

    public function filterCoursesByType($by)
    {
        $courses = Course::where([['type', $by], ['date', '>=', date('Y-m-d')]])->get();
        if ($courses->count() > 0) {
            if ($auth_user = Auth::user()) {
                $courses = $this->CheckAuthFavourite($courses, $auth_user);
            }
            return $courses;
        } else
            return 0;
    }

    public function filterCoursesByDate(Request  $request)
    {
        $date_from =  date("m", strtotime($request->date_from));
        $date_to =  date("m", strtotime($request->date_to));
        $courses = Course::whereMonth('date', '>=', $date_from)->whereMonth('date', '<=', $date_to)->get();
        if ($courses->count() > 0) {
            if ($auth_user = Auth::user()) {
                $courses = $this->CheckAuthFavourite($courses, $auth_user);
            }
            return $courses;
        } else
            return 0;
    }

    function getAllCoursesAjax()
    {
        $courses = Course::all();
        if ($courses->count() > 0) {
            if ($auth_user = Auth::user()) {
                $courses = $this->CheckAuthFavourite($courses, $auth_user);
            }
            return $courses;
        } else
            return 0;
    }


    function checkOut($id)
    {

        $course = Course::find($id);
        if ($course->offer) {
            $course->price = $course->price_after_discount;
        }
        $course->paid = 0;
        if (Auth::guard('web')->check()) {
            $course->customer_email = Auth::guard('web')->user()->email;
            $course->customer_name = Auth::guard('web')->user()->username;
            $course->customer_address = "SAUDI ARABIA";
            if ($student = Student::where('user_id', Auth::guard('web')->user()->id)->first()) {
                $course->customer_address = $student->address;
            }
            if (Auth::guard('web')->check() && $pt = PaymentTransaction::where(['user_id' => Auth::guard('web')->user()->id, 'course_id' => $course->id])->where('paid', "=", 1)->first()) {
                $course->paid = 1;
                return view('user.courses.enroll', ['course' => $course]);
            } elseif (Auth::guard('web')->check() && PaymentTransaction::where(['user_id' => Auth::guard('web')->user()->id, 'course_id' => $course->id])->where('paid', "=", 0)->count() == 0) {

                $pt = PaymentTransaction::create([
                    "user_id" => Auth::user()->id,
                    "course_id" => $course->id
                ]);
            } elseif (Auth::guard('web')->check() && $pt = PaymentTransaction::where(['user_id' => Auth::guard('web')->user()->id, 'course_id' => $course->id])->where('paid', "=", 2)->first()) {
                $course->paid = 2;
            } elseif (Auth::guard('web')->check() && $pt = PaymentTransaction::where(['user_id' => Auth::guard('web')->user()->id, 'course_id' => $course->id])->where('paid', "=", 3)->first()) {
                $course->paid = 3;
            }
            if ($pt) {

                $course->transaction_id = $pt->id;
            }
            $checkOutResponse = $this->processCheckOutApi($course->price, $course->transaction_id,  $course->customer_email,  $course->customer_address, $course->customer_name);
            $checkOutResponse2 = $this->processCheckOutApi2($course->price, $course->transaction_id,  $course->customer_email,  $course->customer_address, $course->customer_name);
            //            return $checkOutResponse;
            return view('user.courses.enroll', ['course' => $course, 'checkOutResponse' => $checkOutResponse, 'checkOutResponse2' => $checkOutResponse2]);
        }
        //        else{
        //
        ////            $course->customer_email = Session::get('user_email');
        ////            $course->customer_name = Session::get('user_name');
        ////            $course->customer_phone = Session::get('user_phone');
        ////            $course->transaction_id = Session::get('transaction_id');
        ////            $course->user_address = Session::get('user_address');
        //        }


        //return $checkOutResponse['id'];
        return view('user.courses.enroll', ['course' => $course]);
    }

    function fastRegister(Request $request)
    {

        $request_array = $request->all();
        $request_array['country_code'] = 966;
        if (User::where('email', 'like', $request_array['email'])->first()) {
            return 2;
        } elseif (User::where('phone', 'like', $request_array['phone'])->first()) {
            return 3;
        } else {
            $request_array['password'] = Hash::make($request_array['password']);
            if ($user = User::create($request_array)) {
                Student::create(['user_id' => $user->id]);
                Session::put('user_id', $user->id);
                Session::put('user_name', $user->username);
                Session::put('user_email', $user->email);
                Session::put('user_phone', $user->phone);
                Session::put('user_address', "SAUDI ARABIA");
                $pt = PaymentTransaction::create([
                    "user_id" => $user->id,
                    "course_id" => $request_array['course_id']
                ]);
                Session::put('transaction_id', $pt->id);
                $price = $request_array['course_price'];
                $transaction_id  = $pt->id;
                $customer_email = $user->email;
                $customer_address = "SAUDI ARABIA";
                $customer_name = $user->username;

                $user->checkout_id = $this->processCheckOutApi($price, $transaction_id, $customer_email, $customer_address, $customer_name);
                $user->checkout_id2 = $this->processCheckOutApi2($price, $transaction_id, $customer_email, $customer_address, $customer_name);
                return $user;
            } else {
                return 0;
            }
        }
    }

    public function processCheckOutApi($price, $transaction_id, $customer_email, $customer_address, $customer_name)
    {
        $url = "https://oppwa.com/v1/checkouts";
        $data = "entityId=8ac9a4c9778b32ce0177a0b0a12861a4" .
            "&amount=$price" .
            "&currency=SAR" .
            "&merchantTransactionId=$transaction_id" .
            "&customer.email=$customer_email" .
            "&billing.street1= $customer_address " .
            "&billing.city=noCity" .
            "&billing.state=noState" .
            "&billing.country=SA" .
            "&billing.postcode=noPostalCode" .
            "&customer.givenName=MR/MRS" .
            "&customer.surname=$customer_name" .
            "&paymentType=DB";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGFjOWE0Yzk3NzhiMzJjZTAxNzdhMGE5YTA5MzYxOGZ8YTVZZnNKc1FTSw=='
        ));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $response = json_decode($responseData, true);
        return  $response["id"];
    }

    public function processCheckOutApi2($price, $transaction_id, $customer_email, $customer_address, $customer_name)
    {
        $url = "https://oppwa.com/v1/checkouts";
        $data = "entityId=8ac9a4c9778b32ce0177a0b1d8d161ab" .
            "&amount=$price" .
            "&currency=SAR" .
            "&merchantTransactionId=$transaction_id" .
            "&customer.email=$customer_email" .
            "&billing.street1= $customer_address " .
            "&billing.city=noCity" .
            "&billing.state=noState" .
            "&billing.country=SA" .
            "&billing.postcode=noPostalCode" .
            "&customer.givenName=MR/MRS" .
            "&customer.surname=$customer_name" .
            "&paymentType=DB";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGFjOWE0Yzk3NzhiMzJjZTAxNzdhMGE5YTA5MzYxOGZ8YTVZZnNKc1FTSw=='
        ));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $response = json_decode($responseData, true);
        return  $response["id"];
    }

    public function coursePaymentConfirm($checkoutWizard, $ids = array())
    {



        $url = "https://oppwa.com/v1/checkouts/{$checkoutWizard}/payment";
        $url .= "?entityId=8ac9a4c9778b32ce0177a0b0a12861a4";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGFjOWE0Yzk3NzhiMzJjZTAxNzdhMGE5YTA5MzYxOGZ8YTVZZnNKc1FTSw=='
        ));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $paymentResponseStatus =  json_decode($responseData, true);
        //return $paymentResponseStatus;


        if (isset($paymentResponseStatus['id'])) {
            $ids_formatted = json_decode($ids);
            if (!is_array($ids_formatted)) {

                $ids_array[] = $ids_formatted;
            } else {
                $ids_array = $ids_formatted;
            }

            if (Auth::guard('web')->check()) {
                $paymentTransactions = PaymentTransaction::where('user_id', Auth::guard('web')->user()->id)->whereIn('course_id', $ids_array)->get();
            } else {
                $paymentTransactions = PaymentTransaction::where('user_id', Session::get('user_id'))->whereIn('course_id', $ids_array)->get();
            }
            foreach ($paymentTransactions as $paymentTransaction) {
                if (Auth::guard('web')->check()) {
                    Cart::where('course_id', $paymentTransaction->course_id)->where('user_id', Auth::guard('web')->user()->id)->delete();
                }
                if ($paymentResponseStatus['result']['code'] == '000.100.112' || $paymentResponseStatus['result']['code'] == '000.100.110') {

                    $paymentTransaction->update(['paid' => 1, 'transaction_id' => $paymentResponseStatus['id'], 'transaction_status' => $paymentResponseStatus['result']['description']]);
                    if (StudentCourse::where(["user_id" => $paymentTransaction->user_id, "course_id" => $paymentTransaction->course_id])->count() == 0) {
                        StudentCourse::create([
                            "user_id" => $paymentTransaction->user_id,
                            "course_id" => $paymentTransaction->course_id
                        ]);
                    }
                } elseif ($paymentResponseStatus['result']['code'] == '000.200.000') {

                    $paymentTransaction->update(['paid' => 2, 'transaction_id' => $paymentResponseStatus['id'], 'transaction_status' => $paymentResponseStatus['result']['description']]);
                } elseif ($paymentResponseStatus['result']['code'] == '100.396.101') {

                    $paymentTransaction->update(['paid' => 3, 'transaction_id' => $paymentResponseStatus['id'], 'transaction_status' => $paymentResponseStatus['result']['description']]);
                } elseif ($paymentResponseStatus['result']['code'] == '800.400.200') {

                    $paymentTransaction->update(['paid' => 4, 'transaction_id' => $paymentResponseStatus['id'], 'transaction_status' => $paymentResponseStatus['result']['description']]);
                } else {
                    $paymentTransaction->update(['paid' => 5, 'transaction_id' => $paymentResponseStatus['id'], 'transaction_status' => $paymentResponseStatus['result']['description']]);
                }
            }


            return redirect()->back()->with(["response" => $paymentResponseStatus]);
        } else {
            return redirect()->back()->with(['failed' => $paymentResponseStatus['result']['description']]);
        }
    }
    public function coursePaymentConfirm2($checkoutWizard, $ids = array())
    {




        $url = "https://oppwa.com/v1/checkouts/{$checkoutWizard}/payment";
        $url .= "?entityId=8ac9a4c9778b32ce0177a0b1d8d161ab";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGFjOWE0Yzk3NzhiMzJjZTAxNzdhMGE5YTA5MzYxOGZ8YTVZZnNKc1FTSw=='
        ));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $paymentResponseStatus =  json_decode($responseData, true);
        //return $paymentResponseStatus;


        if (isset($paymentResponseStatus['id'])) {
            $ids_formatted = json_decode($ids);
            if (!is_array($ids_formatted)) {

                $ids_array[] = $ids_formatted;
            } else {
                $ids_array = $ids_formatted;
            }

            if (Auth::guard('web')->check()) {
                $paymentTransactions = PaymentTransaction::where('user_id', Auth::guard('web')->user()->id)->whereIn('course_id', $ids_array)->get();
            } else {
                $paymentTransactions = PaymentTransaction::where('user_id', Session::get('user_id'))->whereIn('course_id', $ids_array)->get();
            }
            foreach ($paymentTransactions as $paymentTransaction) {
                if (Auth::guard('web')->check()) {
                    Cart::where('course_id', $paymentTransaction->course_id)->where('user_id', Auth::guard('web')->user()->id)->delete();
                }
                if ($paymentResponseStatus['result']['code'] == '000.100.112' || $paymentResponseStatus['result']['code'] == '000.100.110') {

                    $paymentTransaction->update(['paid' => 1, 'transaction_id' => $paymentResponseStatus['id'], 'transaction_status' => $paymentResponseStatus['result']['description']]);
                    if (StudentCourse::where(["user_id" => $paymentTransaction->user_id, "course_id" => $paymentTransaction->course_id])->count() == 0) {
                        StudentCourse::create([
                            "user_id" => $paymentTransaction->user_id,
                            "course_id" => $paymentTransaction->course_id
                        ]);
                    }
                } elseif ($paymentResponseStatus['result']['code'] == '000.200.000') {

                    $paymentTransaction->update(['paid' => 2, 'transaction_id' => $paymentResponseStatus['id'], 'transaction_status' => $paymentResponseStatus['result']['description']]);
                } elseif ($paymentResponseStatus['result']['code'] == '100.396.101') {

                    $paymentTransaction->update(['paid' => 3, 'transaction_id' => $paymentResponseStatus['id'], 'transaction_status' => $paymentResponseStatus['result']['description']]);
                } elseif ($paymentResponseStatus['result']['code'] == '800.400.200') {

                    $paymentTransaction->update(['paid' => 4, 'transaction_id' => $paymentResponseStatus['id'], 'transaction_status' => $paymentResponseStatus['result']['description']]);
                } else {
                    $paymentTransaction->update(['paid' => 5, 'transaction_id' => $paymentResponseStatus['id'], 'transaction_status' => $paymentResponseStatus['result']['description']]);
                }
            }


            return redirect()->back()->with(["response" => $paymentResponseStatus]);
        } else {
            return redirect()->back()->with(['failed' => $paymentResponseStatus['result']['description']]);
        }
    }

    public function getPaymentListCourses()
    {
        $payments = PaymentTransaction::with('course')->where('user_id', Auth::user()->id)->where('paid', '=', 0)->get();
        $total_price = 0;
        $transaction_id = null;
        if ($payments->count() > 0) {
            foreach ($payments as $payment) {
                if ($payment->course->offer) {

                    $total_price += $payment->course->price_after_discount;
                } else {
                    $total_price += $payment->course->price;
                }
                $transaction_id = $payment->id;
            }
            $auth_user = Auth::guard('web')->user();
            if (!$auth_user->address) {
                $auth_user->address = "SAUDI ARABIA";
            }
            $checkOutResponse = $this->processCheckOutApi($total_price, $transaction_id, $auth_user->email, $auth_user->address, $auth_user->username);
            $checkOutResponse2 = $this->processCheckOutApi2($total_price, $transaction_id, $auth_user->email, $auth_user->address, $auth_user->username);
            //return  $checkOutResponse;
            return view('user.profile.payment', ['payments' => $payments, "checkOutResponse" => $checkOutResponse, "checkOutResponse2" => $checkOutResponse2]);
        } else {
            return view('user.profile.payment')->with(["error" => "سيتم تحويلك تلقائيا بعد ثلاث ثوان", "payments" => $payments]);
        }
    }
    public function courseBankTransctionConfirm(Request $request, $ids)
    {

        $receipt = $this->ImageUploader($request->receipt, 'uploads/payments/receipts');
        $user_id = null;
        if (Auth::guard('web')->check()) {
            $user_id = Auth::guard('web')->user()->id;
        } else {
            $user_id = Session::get('user_id');
        }

        if (
            BankTransaction::create([
                "user_id" => $user_id,
                "course_id" => $ids,
                "receipt"  => $receipt
            ])
        ) {
            Session::forget('user_id');
            Session::forget('user_name');
            Session::forget('user_email');
            Session::forget('user_phone');
            return redirect()->back()->with(["response" => 1]);
        } else {
            return redirect()->back()->with(["response" => 0]);
        }
    }

    function storeStudentCourse(Request $request)
    {



        DB::transaction(function () use ($request) {



            //     $this->validate($request, [
            //        'username' => 'required',
            //        'email' => 'required|unique:users',
            //        'phone' => 'required|unique:users',
            //        'national_id' => 'required|unique:students',
            //        'nationality' => 'required',
            //        'address' => 'required',
            //        'city' => 'required'
            //    ]);

            if (Auth::check()) {
                $student_course = new StudentCourse();
                $student_course->user_id = Auth::user()->id;
                $student_course->course_id = $request->input('course_id');
                $student_course->save();
            } else {

                $user = new User();
                $user->username = $request->input('username');
                $user->email = $request->input('email');
                $user->phone = $request->input('phone');

                if ($user->photo != null) {
                    $user->photo  = $this->ImageUploader($request->photo, 'uploads/user/images');

                    $user->photo = $this->ImageUploader($request->photo, 'uploads/user/images');
                }
                $user->type = 0;
                $user->save();

                $student = new Student();
                $student->address = $request->input('address');
                $student->city = $request->input('city');
                $student->national_id = $request->input('national_id');
                $student->nationality = $request->input('nationality');
                $student->interests = $request->input('interests');

                $student->user_id = $user->id;
                $student->save();

                $student_course = new StudentCourse();
                $student_course->user_id = $user->id;
                $student_course->course_id = $request->input('course_id');

                $student_course->save();
            }
        });
        return back();
    }

    public function myCourses()
    {

        return view('user.profile.mycourses')->with(["courses" => StudentCourse::where('user_id', Auth::user()->id)->get()]);
    }

    public function removeCourseFromMyCourses($course_id)
    {
        $deleteCourse = StudentCourse::where('course_id', '=', $course_id)->where('user_id', '=', auth()->user()->id)->delete();
        return back()->with('messageDeleted', 'تم مسح الدورة بنجاح');
    }

    public function getCartWithoutProfile()
    {
        $cartsWithoutProfile = Cart::with('cart_courses')->where('user_id', Auth::user()->id)->get();
        return view('user.profile.cartsWithoutProfile', ['cartsWithoutProfile' => $cartsWithoutProfile]);
    }

    public function getCoursesInCart()
    {
        $carts = Cart::with('cart_courses')->where('user_id', Auth::user()->id)->get();
        return view('user.profile.carts', ['carts' => $carts]);
    }

    public function coursesFinished()
    {
        $finishedCourse = FinishedCourse::with('courses_finished')->where('user_id', Auth::user()->id)->get();
        return view('user.profile.finishedCourses', ['finishedCourse' => $finishedCourse]);
    }

    public function favouriteCourses()
    {
        $favouritesCourse = Favourite::with('favourites_courses')->where('user_id', Auth::user()->id)->get();
        return view('user.profile.favourites', ['favouritesCourse' => $favouritesCourse]);
    }

    public function getFavouritesForUserJavascript()
    {
        $favourites = Favourite::where('user_id', '=', auth()->user()->id)->get('course_id');
        return response()->json($favourites);
    }

    public function addToFavourites($course_id)
    {
        if (Auth::check()) {
            $newFavouriteCourse = new Favourite();
            $newFavouriteCourse->course_id = $course_id;
            $newFavouriteCourse->user_id = auth()->user()->id;

            $newFavouriteCourse->save();
        }
        return 1;
    }

    public function removeFavourites($course_id)
    {
        if (Auth::check()) {
            Favourite::where('course_id', '=', $course_id)->where('user_id', '=', auth()->user()->id)->delete();
        }
        return 1;
    }

    public function buyFromFavourite($course_id)
    {
        $getCourseFromFavourite = Favourite::with('favourites_courses')->where('course_id', '=', $course_id)->where('user_id', '=', auth()->user()->id)->get();
        return view('user.profile.PaymentForFavouriteCourse', ['getCourseFromFavourite' => $getCourseFromFavourite]);
    }

    public function getCoursesType($type_id)
    {
        $getCourseType = Favourite::with('favourites_courses')->whereHas('favourites_courses', function ($q) use ($type_id) {
            $q->where('type', '=', $type_id);
        })->where('user_id', '=', auth()->user()->id)->get();
        return response()->json($getCourseType);
    }

    public function getAllFavouriteCourses()
    {
        $allFavouritesCourses = Favourite::with('favourites_courses')->where('user_id', Auth::user()->id)->get();
        return response()->json($allFavouritesCourses);
    }




    public function addNewPaymentCourses(Request $request)
    {
        // dd($request->all());
        $request->validate(
            [
                'course_id' => 'required',
            ],
            [
                'course_id.required' => 'من فضلك اختر الدورات التي تريد شرائها',
            ]
        );

        foreach ($request->input('course_id') as $addCoursesToPayment) {
            if (PaymentTransaction::with('course')->where('course_id', '=', $addCoursesToPayment)->where('user_id', Auth::user()->id)->first()) {
                continue;
            } else {
                PaymentTransaction::create([
                    'user_id' => auth()->user()->id,
                    'course_id' => $addCoursesToPayment
                ]);
            }
            // Cart::where('course_id' , '=' , $addCoursesToPayment)->where('user_id' , '=' , auth()->user()->id)->delete();
        }
        return redirect()->route('getListOfPayments');
    }

    public function checkIfCourseInPaymentList($course_id)
    {
        if (PaymentTransaction::with('course')->where('course_id', '=', $course_id)->where('user_id', Auth::user()->id)->first()) {
            PaymentTransaction::with('course')->where('course_id', '=', $course_id)->where('user_id', Auth::user()->id)->delete();
            return 0;
        } else {
            return 1;
        }
    }

    public function removeCoursesFromPaymentList($course_id)
    {
        $courseDeleted = PaymentTransaction::with('course')->where('course_id', '=', $course_id)->where('user_id', '=', auth()->user()->id)->delete();
        // Cart::where('course_id' , '=' , $course_id)->where('user_id' , '=' , auth()->user()->id)->delete();
        return back();
    }

    public function couponsForUser($code)
    {
        $coupon = Coupon::where('code', '=', $code)->where('type', '=', 1)->first();
        $user_id = Session::get("user_id");
        if (Auth::guard("web")->check()) {

            $user_id = auth()->user()->id;
        }
        $users = (array)@json_decode($coupon->users);

        if (empty($coupon)) {

            return 0;
        } elseif (Coupon::where('code', '=', $code)->whereNotIn('fromDate', [Carbon::today()->toDateString()])->whereNotIn('toDate', [Carbon::today()->toDateString()])->first()) {

            return 3;
        } elseif (in_array($user_id, $users)) {

            return 2;
        } else {

            $users[] = $user_id;
            $coupon->users = @json_encode($users);
            $coupon->save();

            return $coupon;
        }
    }

    public function addToCart($course_id)
    {
        if (Auth::check()) {
            if (Cart::where('course_id', '=', $course_id)->where('user_id', '=', auth()->user()->id)->first()) {
                return 0;
            } else {
                $cartFromCourse = new Cart();
                $cartFromCourse->user_id = auth()->user()->id;
                $cartFromCourse->course_id = $course_id;

                $cartFromCourse->save();
                return 1;
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function postCertificateAdmin(Request $request)
    {

        if (Certificate::where('course_id', '=', $request->course_id)->where('user_id', '=', auth()->user()->id)->first()) {
            return 0;
        } else {
            $certificate = new Certificate();
            $certificate->user_id = auth()->user()->id;
            $certificate->course_id = $request->input('course_id');
            $certificate->type = 1;

            $certificate->save();
            return 1;
        }
    }

    public function checkIfCertificateRequested($course_id)
    {
        if (Certificate::where('course_id', '=', $course_id)->where('user_id', '=', auth()->user()->id)->where('type', '=', 0)->first()) {
            return 2;
        } elseif (Certificate::where('course_id', '=', $course_id)->where('user_id', '=', auth()->user()->id)->where('type', '=', 1)->first()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function openPageDownload($course_id)
    {
        $certificateDownloaded = Certificate::where('course_id', '=', $course_id)->where('user_id', '=', auth()->user()->id)->first();
        return view('user.profile.downloadPage', ['certificateDownloaded' => $certificateDownloaded]);
    }

    public function checkIfPdfOrLinkDownload($id)
    {
        if (Certificate::where('id', '=', $id)->where('user_id', '=', auth()->user()->id)->where('isLink', '=', 0)->first()) {
            return 1;
        } else {
            return 2;
        }
    }

    public function DownloadCertificates($id)
    {
        $file = Certificate::find($id);
        $path = url('/uploads/certificates/images/') . "/" . $file->pdf;
        //            $mimeType = mime_content_type($path);
        return response()->download($path);
    }

    public function filterCourses(Request $request)
    {
        if ($request->byName) {
            //return 1;
            Session::forget('date');
            Session::forget('type');
            Session::put('name', $request->byName);
            return view('user.courses.index')->with([
                'courses' =>   Course::where('title', 'like', '%' . $request->byName . '%')->paginate(6),
                'specialists' => Specialist::join('courses', 'specialists.id', 'courses.specialist_id')->distinct()->titlesOnLY()
            ]);
        } elseif ($request->byType) {
            Session::forget('name');
            Session::forget('date');
            Session::put('type', $request->byType);
            return view('user.courses.index')->with([
                'courses' =>   Course::where('type', $request->byType)->paginate(6),
                'specialists' => Specialist::join('courses', 'specialists.id', 'courses.specialist_id')->distinct()->titlesOnLY()
            ]);
        } elseif ($request->byDate) {
            Session::forget('name');
            Session::forget('type');
            Session::put('date', $request->byDate);
            return view('user.courses.index')->with([
                'courses' =>   Course::where('date', $request->byDate)->paginate(6),
                'specialists' => Specialist::join('courses', 'specialists.id', 'courses.specialist_id')->distinct()->titlesOnLY()
            ]);
        } elseif ($request->byType && $request->byDate) {
            Session::forget('name');
            Session::put('type', $request->byType);
            Session::put('date', $request->byDate);

            return view('user.courses.index')->with([
                'courses' => Course::where('type', $request->byType)->where('date', $request->byDate)->paginate(6),
                'specialists' => Specialist::join('courses', 'specialists.id', 'courses.specialist_id')->distinct()->titlesOnLY()
            ]);
        } elseif ($request->byType && $request->byName) {
            Session::forget('date');
            Session::put('type', $request->byType);
            Session::put('name', $request->byName);
            return view('user.courses.index')->with([
                'courses' =>   Course::where('type', $request->byType)->where('date', $request->byDate)->paginate(6),
                'specialists' => Specialist::join('courses', 'specialists.id', 'courses.specialist_id')->distinct()->titlesOnLY()
            ]);
        } else {

            return view('user.courses.index')->with([
                'courses' =>   Course::paginate(6),
                'specialists' => Specialist::join('courses', 'specialists.id', 'courses.specialist_id')->distinct()->titlesOnLY()
            ]);
        }
    }

    private function CheckAuthFavourite($courses, $auth_user)
    {
        $courses->each(function ($course) use ($auth_user) {
            if (Favourite::where(['user_id' => $auth_user->id, 'course_id' => $course->id])->first()) {
                $course->isFavouritToAuthUser = 1;
            } else {
                $course->isFavouritToAuthUser = 0;
            }
            return $course;
        });
        return $courses;
    }
}
