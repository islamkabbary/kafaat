@extends('admin.index')
@section('main')
<style>
    @media screen and (min-width:1025px) and (max-width:1299px) {
        .imgRightMessages2{
            width:900px;
            height:700px;
        }
    }
</style>
<div class="page">
    <div class="page-main h-100">

        <div class="app-content my-3 my-md-5">
            <div class="side-app">
                <div class="card m-b-20">
                    <div class="card-header">
                        <h3 class="card-title" style="font-family:ar;">الشهادات</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group" style="font-family:ar;">
                            <label class="form-label">الدورة</label>
                            <input type="text" value="{{$cerificates->course->title}}" style="font-family:ar" class="form-control">
                        </div>
                        <div class="form-group" style="font-family:ar;">
                            <label class="form-label">محتوي الدورة</label>
                            <textarea col="50" rows="4" style="font-family:ar;resize:none" class="form-control">{{$cerificates->course->overview}}</textarea>
                        </div>
                        <div class="form-group" style="font-family:ar;">
                            <label class="form-label">وصف الدورة</label>
                            <textarea col="50" rows="4" style="font-family:ar;resize:none" class="form-control">{{$cerificates->course->description}}</textarea>
                        </div>
                        <div class="form-group" style="font-family:ar;">
                            <label class="form-label">الطالب</label>
                            <input type="text" value="{{$cerificates->user->username}}" style="font-family:ar" class="form-control">
                        </div>
                        <div class="form-group" style="font-family:ar;">
                            <label class="form-label">البريد الإلكتروني</label>
                            <input type="text" value="{{$cerificates->user->email}}" style="font-family:ar" class="form-control">
                        </div>
                        <div class="form-group" style="font-family:ar;">
                            <label class="form-label">الجوال</label>
                            <input type="text" value="{{$cerificates->user->phone}}" style="font-family:ar;direction:ltr;" class="form-control">
                        </div>
                        <div class="form-group" style="font-family:ar;">
                            <label class="form-label">رقم الهوية</label>
                            <input type="text" value="{{!empty($dataStudent) ? $dataStudent->national_id : ''}}" style="font-family:ar" class="form-control">
                        </div>
                        <div class="form-group" style="font-family:ar;">
                            <label class="form-label">الجنسية</label>
                            <input type="text" value="{{!empty($dataStudent) ? $dataStudent->state->name : ''}}" style="font-family:ar" class="form-control">
                        </div>
                        <div class="form-group" style="font-family:ar;">
                            <label class="form-label">الاهتمامات</label>
                            <select name="interests" class="form-control" style="color:#808080;font-family:ar;box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
                              <option selected disabled>اختر اهتماماتك</option>
                                @foreach($specialists as $specialist)
                                    <option @if($dataStudent->interests == $specialist->id) selected  @endif value="{{$specialist->id}}">{{$specialist->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group" style="font-family:ar;">
                            <label class="form-label">المدينة</label>
                            <input type="text" value="{{!empty($dataStudent) ? $dataStudent->city : ''}}" style="font-family:ar" class="form-control">
                        </div>
                        <div class="form-group" style="font-family:ar;">
                            <label class="form-label">العنوان</label>
                            <input type="text" value="{{!empty($dataStudent) ? $dataStudent->address : ''}}" style="font-family:ar" class="form-control">
                        </div>
                        @if($cerificates->link != null)
                        <div class="form-group" style="font-family:ar;">
                            <label class="form-label">رابط الموقع لاستخراج الشهادة</label>
                            <input type="text" value="{{$cerificates->link}}" style="font-family:ar" class="form-control">
                        </div>
                        @else
                        
                        @endif
                        
                        @if($cerificates->pdf != null)
                        <div class="form-group" style="font-family:ar;">
                            <label class="form-label">الشهادة</label>
                            <embed class="imgRightMessages2" src="{{asset('/uploads/certificates/images/'. $cerificates->pdf)}}" /> 
                        </div>
                        @else
                        
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection