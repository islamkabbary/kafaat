<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index(){
        $subscribes = Subscription::paginate(10);
        return view('admin.subscriptions.index' , ['subscribes' => $subscribes]);
    }
    
    public function show($id){
        $subscribe = Subscription::find($id);
        return view('admin.subscriptions.show' , ['subscribe' => $subscribe]);
    }
    
    public function destroy($id){
        $deleteSubscribe = Subscription::find($id)->delete();
        return back();
    }

}
