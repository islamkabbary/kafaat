@extends('admin.index')
@section('main')

<div class="page">
    <div class="page-main h-100">

        <div class="app-content my-3 my-md-5">
            <div class="side-app">
                <div class="card m-b-20">
                    <div class="card-header">
                        <h3 class="card-title" style="font-family:ar;">الاشتراكات</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group" style="font-family:ar;">
                            <label class="form-label">رقم الجوال</label>
                            <input type="text" name="phone" value="{{$subscribe->phone}}" style="font-family:ar" class="form-control" placeholder="رقم الجوال">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection