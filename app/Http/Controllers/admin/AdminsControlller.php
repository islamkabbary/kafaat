<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ImageUploaderTrait;
use App\User;
use Illuminate\Support\Facades\Hash;

class AdminsControlller extends Controller
{
    use ImageUploaderTrait;

    public function index(){

        return view('admin.admins.index')->with(['admins' => User::where('type' , 1)->latest()->paginate(4)]);
        // return view ('admin.admins.index');
    }

    public function create(){
        return view('admin.admins.create');
    }


    public function store(Request $request){
        $request_array = $request->all();
        if($request->hasFile('photo')){

            $returned_image = $this->ImageUploader($request_array['photo'] , 'uploads/admins/images');
            $request_array['photo'] = $returned_image;
        }

        $request_array['type'] = 1;
             $request_array['password'] = Hash::make($request->password);
         User::create($request_array);
        return redirect()->route('admins.index')->with('success' , 'created successfully');
    }

    public function edit($id){


        return view('admin.admins.edit')->with(['admin' =>   User::find($id)]);
        // return view ('admin.admins.edit' , ['admins' , $admins]);
    }

    public function update(Request $request , $id){
        $request_array = $request->all();
         $admin = User::find($id);
        if($request->hasFile('photo')){

            $returned_image = $this->ImageUploader($request_array['photo'] , 'uploads/admins/images');
            $request_array['photo'] = $returned_image;
        }
        $request_array['password'] = Hash::make($request->password);
        $admin->update($request_array);
        return redirect()->route('admins.index')->with('success' , 'updated successfully');
    }

    public function destroy($id){


        $admin = User::find($id);
//         unlink(public_path('uploads/admins/images/'. substr($admins->media, strpos($admins->media, "images/") + 7)));
         $admin->delete();
         return redirect()->back()->with('success' , 'success deletion');
    }
}
