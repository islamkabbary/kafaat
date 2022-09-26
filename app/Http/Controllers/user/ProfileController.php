<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Specialist;
use App\Student;
use App\Traits\ImageUploaderTrait;
use App\User;
use App\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    use ImageUploaderTrait;
    public function profile(){
        return view('user.profile.index')->with(['specialists' => Specialist::titlesOnLY() , 'states' => State::all()]);
    }

    public function updateUserInfo(Request $request){
        $user_info = $request->only(['username' , 'email' ,'phone', 'photo']);
        $student_info = $request->only(['national_id' , 'nationality' , 'interests' , 'city' , 'address']);
        if($request->password) {
            if ($request->password == $request->password_confirm)
//                return $request->password .'--'.$request->password_confirm;
                $user_info['password'] = Hash::make($request->password);
            else
//                return 0;
                return redirect('/profile')->with('error', 'passwords don\'t match');
        }

        if ($request->has('photo')){
            $user_info['photo'] =  $this->ImageUploader($request->photo,'uploads/users/images/');
        }

        User::find(Auth::user()->id)->update($user_info);
        Student::where('user_id',Auth::user()->id)->update($student_info);

        return redirect('/profile')->with('success' , 'تم تعديل الملف الشخصي');
    }
}
