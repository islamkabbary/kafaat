@extends('admin.index')
@section('main')

<div class="page">
    <div class="page-main h-100">

        <div class="app-content my-3 my-md-5">
            <div class="side-app">
                <div class="card m-b-20">
                    <div class="card-header">
                        <h3 class="card-title" style="font-family:ar;">رسائل التواصل</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group" style="font-family:ar;">
                            <label class="form-label">الاسم</label>
                            <input type="text" name="name" value="{{$showContact->name}}" class="form-control" required placeholder="الاسم">
                        </div>
                        <div class="form-group" style="font-family:ar;">
                            <label class="form-label">البريد الإلكتروني</label>
                            <input type="email" name="email" value="{{$showContact->email}}" class="form-control" required placeholder="البريد الإلكتروني">
                        </div>
                        <div class="form-group" style="font-family:ar;">
                            <label class="form-label">الرسالة</label>
                            <textarea col="50" rows="4" name="message" class="form-control" required placeholder="الرسالة">{{$showContact->message}}</textarea>
                        </div>
                        <div class="form-group" style="font-family:ar;">
                            <label class="form-label">رقم الجوال</label>
                            <input type="text" name="phone" value="{{$showContact->phone}}" class="form-control" required placeholder="رقم الجوال">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection