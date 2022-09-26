<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Coupon;
use Validator;
use App\User;

class CouponController extends Controller
{
    public function index(){
        $coupons = Coupon::paginate(10);
        return view('admin.coupons.index' , ['coupons' => $coupons]);
    }
    
    public function create(){
        return view('admin.coupons.create');
    }
    
    public function store(Request $request){
        $validator = Validator::make($request->all(),  [
            'code' => 'required',
            'discount' => 'required',
            'type' => 'required',
            'fromDate' => 'required',
            'toDate' => 'required',
            
        ]);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }else{
            $coupons = new Coupon();
            $coupons->code = $request->input('code');
            $coupons->discount = $request->input('discount')/100;
            $coupons->type = $request->input('type');
            $coupons->fromDate = $request->input('fromDate');
            $coupons->toDate = $request->input('toDate');
            
            $coupons->save();
        }
        return redirect()->route('coupons.index');
    }
    
    public function edit($id){
        $coupons = Coupon::find($id);
        $users = User::all();
        return view('admin.coupons.edit' , ['coupons' => $coupons , 'users' => $users]);
    }
    
    public function update(Request $request , $id){
        $validator = Validator::make($request->all(),  [
            'code' => 'required',
            'discount' => 'required',
            'type' => 'required',
            'fromDate' => 'required',
            'toDate' => 'required',
            
        ]);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }else{
            $coupons = Coupon::find($id);
            $coupons->code = $request->input('code');
            $coupons->discount = $request->input('discount')/100;
            $coupons->type = $request->input('type');
            $coupons->fromDate = $request->input('fromDate');
            $coupons->toDate = $request->input('toDate');
            
            $coupons->save();
        }
        return redirect()->route('coupons.index');
    }
    
    public function destroy($id){
        $coupons = Coupon::find($id)->delete();
        return redirect()->back()->with('success' , 'success deletion');
    }
    
}