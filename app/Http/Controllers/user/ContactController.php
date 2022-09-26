<?php

namespace App\Http\Controllers\user;

use App\Contact;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact(){
        return view('user.contact');
    }
    public function storeContact(Request $request){
        
        if(Contact::where('email' ,'=', $request->email)->first()){
            return 0;
        }else{
            $contacts = new Contact();
            $contacts->name = $request->input('name');
            $contacts->email = $request->input('email');
            $contacts->phone = $request->input('phone');
            $contacts->message = $request->input('message');
            
            $contacts->save();
            return 1;
        }
    }
    public function storeContactFooter(Request $request){
        
        if(Contact::where('email' ,'=', $request->email)->first()){
            return 0;
        }else{
            $contacts = new Contact();
            $contacts->name = $request->input('name');
            $contacts->email = $request->input('email');
            $contacts->phone = $request->input('phone');
            $contacts->message = $request->input('message');
            $contacts->save();
            
            return 1;
        }
    }
}
