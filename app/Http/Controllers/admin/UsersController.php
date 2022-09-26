<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Http\Request;
use App\Traits\ImageUploaderTrait;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    use ImageUploaderTrait;

    public function index(){

        return view('admin.users.index')->with(['users' => User::where('type' , 0)->latest()->paginate(6)]);
        // return view ('admin.users.index');
    }

    public function create(){
        return view('admin.users.create');
    }


    public function store(Request $request){
        $user_request_array = $request->only(['username' , 'email' , 'password' , 'phone' , 'country_code' , 'photo' , 'verified']);
        $student_request_array = $request->only(['address' , 'city' , 'national_id' , 'nationality']);
        if (User::where('type' , 0)->where('email' , 'like' , $request->email)->orWhere('phone' , 'like' , $request->phone)->first()){
            return  redirect()->back()->with('error' , 'البريد الإلكترونى او رقم الجوال مسجل من قبل');
        }else {
            if ($request->hasFile('photo')) {

                $returned_image = $this->ImageUploader($user_request_array['photo'], 'uploads/users/images');
                $user_request_array['photo'] = $returned_image;
            }

            $user_request_array['password'] = Hash::make($request->password);
            $user = User::create($user_request_array);
            $student_request_array['user_id'] = $user->id;

            Student::create($student_request_array);
            return redirect()->route('users.index')->with('success', 'created successfully');
        }
    }

    public function edit($id){


        return view('admin.users.edit')->with(['user' =>   User::find($id)]);
        // return view ('admin.users.edit' , ['users' , $users]);
    }

    public function update(Request $request , $id){
        $user_request_array = $request->only(['username' , 'email' , 'password' , 'phone' , 'country_code' , 'photo' , 'verified']);
        $student_request_array = $request->only(['address' , 'city' , 'national_id' , 'nationality']);

         $user = User::find($id);


            if ($request->file('photo')) {

                $returned_image = $this->ImageUploader($user_request_array['photo'], 'uploads/users/images');
                $user_request_array['photo'] = $returned_image;
            }
            if ($request->password){

                $user_request_array['password'] = Hash::make($request->password);
            }else{
                $user_request_array['password'] = $user->password;
            }
            $user->update($user_request_array);
            Student::where('user_id' , $user->id)->update($student_request_array);
            return redirect()->route('users.index')->with('success', 'updated successfully');

    }

    public function destroy($id){


        $user = User::find($id);
//         unlink(public_path('uploads/users/images/'. substr($users->media, strpos($users->media, "images/") + 7)));
         $user->delete();
         return redirect()->back()->with('success' , 'success deletion');
    }
}
