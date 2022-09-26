<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request){
        Subscription::create($request->email);
        return redirect()->back()->with('success' , 'subscribed successfully');
    }


}
