<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ImageUploaderTrait;
use App\Certificate;
use App\Student;
use App\Specialist;
use Validator;

class CertificateController extends Controller
{
    use ImageUploaderTrait;
    
    public function index(){
        $cerificates = Certificate::where('type' , '=' , 0)->paginate(10);
        return view ('admin.certificates.index' , ['cerificates' => $cerificates]);
    }
    
    public function indexCertificateRequested(){
        $cerificates = Certificate::where('type' , '=' , 1)->paginate(10);
        return view ('admin.certificates.indexRequestedCertificate' , ['cerificates' => $cerificates]);
    }
    
    public function show($id){
        $cerificates = Certificate::find($id);
        $dataStudent = Student::where('user_id' , '=' , $cerificates->user_id)->first();
        $specialists = Specialist::titlesOnLY();
        return view ('admin.certificates.show' , ['cerificates' => $cerificates , 'dataStudent' => $dataStudent , 'specialists' => $specialists]);
    }
    
    public function destroy($id){
        $cerificates = Certificate::find($id)->delete();
        return back();
    }
    
    public function extract($id){
        $certificate = Certificate::find($id);
        return view ('admin.certificates.extractCertificate' , ['certificate' => $certificate]);
    }
    
    public function update(Request $request , $id){
         $request_array = $request->all();
         $certificate = Certificate::find($id);
         $certificate->type = 0;
         if($request->pdf && $request_array['pdf'] != null){
//             unlink(public_path('uploads/achievements/images/'. substr($achievements->media, strpos($achievements->media, "images/") + 7)));
             $returned_image = $this->ImageUploader($request_array['pdf'] , 'uploads/certificates/images');
             $request_array['pdf'] = $returned_image;
             $request->isLink = 0;
         }else{
             $request->link = $request->input('link');
             $request->isLink = 1;
         }
         $certificate->update($request_array);
        //  dd($certificate);
         return redirect()->route('certificates.index'); 
    }
}