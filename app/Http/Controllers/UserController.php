<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function checkCodes(Request $request){

        // $codeFromUser = $request->input('num1') . $request->input('num2') . $request->input('num3') . $request->input('num4');

        // $codeFromGenerate = Session::get('codes');

        // if($codeFromUser == $codeFromGenerate){
            $user = new User();
            $user->username = $request->input('username');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->phone = $request->input('phone');
            $user->type = 0;
            $user->verified = 1;
            $user->save();
            Auth::loginUsingId($user->id);
            return $user;
            // return redirect('/');
        //     return 1;
        // }else{
        //     return 0;
        // }
    }

    public function checkCodes2(Request $request){


        $user = User::where('email' , 'like' , $request->email)->first();

        $user->verified = 1;
        $user->save();
        Auth::login($user);
        return 1;

    }

    public function RegisterUsers(Request $request){

        if(User::where('email' ,'=', $request->email)->first()){
            return 0;
        }elseif(User::where('phone' ,'=', $request->phone)->first()){
            return 1;
        }else{
            $arrayUser = $request->all();

            $code = generate_code(CODE_LENGTH);
            Session::put('codes' , $code);

            $arrayUser["Code"] = $code;

            $client = new \GuzzleHttp\Client();
            $res = $client->request('GET', 'http://www.sms4ksa.com/api/sendsms.php?username=yahy&password=102030&message=رمز التحقق الخاص بك: '.$code.'&numbers='.$arrayUser['phone'].'&sender=kafaat');

            $body = (string) $res->getBody();

            return $arrayUser;
        }
    }
    public function resendCode(Request $request , $phone){

        $code = Session::get('codes');

        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET',
        'http://www.sms4ksa.com/api/sendsms.php?username=yahy&password=102030&message=رمز التحقق الخاص بك :'.$code.'&numbers='.$phone.'&sender=kafaat');
        $body = (string) $res->getBody();

        return $phone;
    }
}
