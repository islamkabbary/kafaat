<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Service;
use App\ServicesOrder;
use App\Traits\ImageUploaderTrait;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Description;

class ServiceController extends Controller
{
    use ImageUploaderTrait;

    public function index(){
        return view('admin.services.index')->with(['services' => Service::latest()->paginate(10)]);
    }

    public function orders(){
        return view('admin.services.orders')->with(['orders' => ServicesOrder::latest()->paginate(6)]);
    }
    public function orderShow($id){
        return view('admin.services.orders_show')->with(['order' => ServicesOrder::find($id)]);
    }
    public function orderEdit($id){
        return view('admin.services.orders_edit')->with(['order' => ServicesOrder::find($id)]);
    }
    public function orderUpdate(Request $request , $id){
        $request_array = $request->all();
        $order = ServicesOrder::find($id);
        $order->update($request_array);
        return redirect()->route('services.orders');
    }
    public function orderDelete($id){
        ServicesOrder::find($id)->delete();
        return redirect()->back();
    }
     public function create(){
        return view('admin.services.create');
     }

     public function edit($service_id){
         $service = Service::find($service_id);
         return view('admin.services.edit')->with('service' , $service);
     }
     public function store(Request  $request)
     {

         $request_array = $request->all();
         if($request_array['image'] != null){

             $request_array['image'] = $this->ImageUploader($request_array['image'] , 'uploads/services/images');

         }
         $request_array['description'] = $request->description1;
         Service::create($request_array);
         return redirect()->route('services.index')->with('success' , 'created successfully');
     }

     public function destroy($service_id){
         $service = Service::find($service_id);
//         unlink(public_path('uploads/services/images/'. substr($service->image, strpos($service->image, "images/") + 7)));
         $service->delete();
         return redirect()->back()->with('success' , 'success deletion');
     }

     public function update(Request $request , $service_id){

         $request_array = $request->all();

         $service = Service::find($service_id);
         if($request->image && $request_array['image'] != null){
//             unlink(public_path('uploads/services/images/'. substr($service->image, strpos($service->image, "images/") + 7)));
             $returned_image = $this->ImageUploader($request_array['image'] , 'uploads/services/images');
             $request_array['image'] = $returned_image;
         }
         $service->update([
            "description" => $request->description1
        ]);
         $service->update($request_array);
         return redirect()->back()->with('success' , 'updated successfully');
     }
}
