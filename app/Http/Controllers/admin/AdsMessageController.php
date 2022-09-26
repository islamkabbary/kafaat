<?php

namespace App\Http\Controllers\admin;

use App\AdsMessage;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ImageUploaderTrait;

class AdsMessageController extends Controller
{
    public function index(){
        $messagesAds = AdsMessage::paginate(10);
        return view ('admin.ads_messages.index' , ['messagesAds' => $messagesAds]);
    }
    
    public function create(){
        $users = User::all();
        return view ('admin.ads_messages.create' , ['users' => $users]);
    }
    
    public function store(Request $request){
        $messagesAds = new AdsMessage();
        $messagesAds->message = $request->input('message');
        if($request->user_id != null){
            $messagesAds->user_id = $request->input('user_id');
            $messagesAds->allUsers = 0;
            $client = new \GuzzleHttp\Client();
            $res = $client->request('GET', 'http://www.sms4ksa.com/api/sendsms.php?username=yahy&password=102030&message='.$messagesAds->message.'&numbers=+966'.$request->input('phone').'&sender=kafaat-AD');
            $body = (string) $res->getBody();
            $messagesAds->save();
            return 1;
        }elseif($request->allUsers == 1){
            $messagesAds->allUsers = 1;
            $phones = User::all();
            foreach($phones as $phone){
                $phoneUser[] = $phone->phone;
            }
            for($i = 0 ; $i<count($phoneUser) ; $i++){
                $client = new \GuzzleHttp\Client();
                $res = $client->request('GET', 'http://www.sms4ksa.com/api/sendsms.php?username=yahy&password=102030&message='.$messagesAds->message.'&numbers=+966'.$phoneUser[$i].'&sender=kafaat-AD');
                $body = (string) $res->getBody();
            }
            $messagesAds->save();
            return 2;
        }else{
            return 3;
        }
    }
    
    public function show($id){
        $showData = AdsMessage::find($id);
        return view ('admin.ads_messages.show' , ['showData' => $showData]);
    }
    
    public function getPhoneOfUser($id){
        $phoneUser = User::find($id)->phone;
        return response()->json($phoneUser);
    }
}