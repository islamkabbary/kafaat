@extends('admin.index')
@section('main')
<div class="page">
    <div class="page-main h-100">

        <div class="app-content my-3 my-md-5">
            <div class="side-app">
                @if(session()->has('success'))
                    <div id="messageErrorEngineer2" style="font-family:ar;" class="alert alert-info">{{ Session::get('success') }}</div>
                @endif
                <div class="card m-b-20">
                    <div class="card-header">
                        <h3 class="card-title" style="font-family:ar">مجالات الأعمال</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/business_area/update/' . $business_area->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="form-label" style="font-family:ar">الاسم</label>
                                <input type="text" name="title" value="{{$business_area->title}}" style="font-family:ar" required class="form-control" placeholder="الاسم">
                            </div>
                            <div class="form-group">
                                <label class="form-label" style="font-family:ar">الوصف</label>
                                <textarea col="50" rows="4" name="description1" class="form-control" style="font-family:ar;resize:none;" required placeholder="الوصف">{{$business_area->description}}</textarea>
                            </div>
                            <div class="form-group" style="font-family:ar;">
                                <label class="form-label" style="font-family:ar">الصورة</label>
                                <input type="file" class="dropify" name="image" @if(@$business_area->image != '')
                                            data-default-file="{{$business_area->image}}" @endif>
                            </div>
                            <div class="form-group mb-0">
                                <div class="checkbox checkbox-secondary">
                                    <button type="submit" style="font-family:ar;" class="btn btn-success ">تأكيد</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.1/basic/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'description1' );
    </script>
<script>
    $(document).ready(function(){
           setTimeout(function(){
           $('#messageErrorEngineer2').fadeOut(2000);// or fade, css display however you'd like.
        }, 2000); 
    });
</script>

@endsection