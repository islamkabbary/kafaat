<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Service;
use App\ServicesOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{


    public function getServiceById($id){
        $service = Service::find($id);
        return view('user.services.index')->with(['service' => $service,'services' =>Service::take(3)->get()]);
    }

    public function serviceOrder(Request $request){
        $user = Auth::user();
        if($user && $user->type == 0){

            ServicesOrder::create([
                "service_id" => $request->service_id,
                "full_name" =>  $user->username,
                "email" =>  $user->email,
                "phone" =>  $user->phone,
                "content" => $request->content
            ]);
        }else{

            ServicesOrder::create($request->all());
        }
        return redirect()->back()->with('message' , 'تم إرسال طلب الخدمه بنجاح');
    }
}
