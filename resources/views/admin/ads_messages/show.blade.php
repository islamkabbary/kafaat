@extends('admin.index')
@section('main')

<div class="page">
    <div class="page-main h-100">

        <div class="app-content my-3 my-md-5">
            <div class="side-app">
                <div class="card m-b-20">
                    <div class="card-header">
                        <h3 class="card-title" style="font-family:ar;">رسائل ترويجية</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group" style="font-family:ar;">
                            <label class="form-label">الرسالة</label>
                            <textarea col="50" rows="4" name="message" class="form-control" required placeholder="الرسالة">{{$showData->message}}</textarea>
                        </div>
                        <div class="form-group" style="font-family:ar;">
                            <label class="form-label">المستخدم / المستخدمين</label>
                            <input type="text" name="name" value="{{$showData->allUsers == 0 ? $showData->user->username : 'كل المستخدمين'}}" class="form-control" required placeholder="المستخدم">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection