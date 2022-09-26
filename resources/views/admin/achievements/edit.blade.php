@extends('admin.index')
@section('main')

<style>
    .hi{
        font-family:ar;
    }
</style>

<div class="page">
    <div class="page-main h-100">

        <div class="app-content my-3 my-md-5">
            <div class="side-app">
                @if(session()->has('success'))
                    <div id="messageErrorEngineer4" style="font-family:ar;" class="alert alert-info">{{ Session::get('success') }}</div>
                @endif
                <div class="card m-b-20" >
                    <div class="card-header">
                        <h3 class="card-title" style="font-family:ar;">الإنجازات</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/achievements/update/'. $achievement->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group" style="font-family:ar;">
                                <input type="file" class="dropify" name="media" @if(@$achievement->media != '')
                                            data-default-file="{{$achievement->media}}" @endif>
                            </div>
                            <div class="form-group" style="font-family:ar;">
                                <label class="form-label">الاسم</label>
                                <input type="text" name="name" value="{{$achievement->name}}" style="font-family:ar" class="form-control" placeholder="الاسم">
                            </div>
                            
                            <div class="form-group" style="font-family:ar;">
                                <label class="form-label">الوصف</label>
                                <textarea col="50" rows="4" name="description1" class="form-control" style="font-family:ar;resize:none" required placeholder="الوصف">{{$achievement->description}}</textarea>
                            </div>
                            <div class="form-group" style="font-family:ar;">
                                <label class="form-label" style="font-family:ar">نوع الإنجاز</label>
                                <select name="type" style="font-family:ar" class="form-control" id="type">
                                    <option class="hi from-control" style="font-family:ar;" value="1" @if($achievement->type == 1) selected @endif>تنظيم المعارض</option>
                                    <option class="hi from-control" style="font-family:ar;" value="2" @if($achievement->type == 2) selected @endif>دورات تأهيلية</option>
                                    <option class="hi from-control" style="font-family:ar;" value="3" @if($achievement->type == 3) selected @endif>حملات إعلامية</option>
                                    <option class="hi from-control" style="font-family:ar;" value="4" @if($achievement->type == 4) selected @endif>تقديم استشارات</option>
                                    <option class="hi from-control" style="font-family:ar;" value="5" @if($achievement->type == 5) selected @endif>حقائب تدريبية</option>
                                    <option class="hi from-control" style="font-family:ar;" value="6" @if($achievement->type == 6) selected @endif>برنامج التعاقد</option>
                                </select>
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

<script src="https://cdn.ckeditor.com/4.16.1/basic/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'description1' );
</script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(){
           setTimeout(function(){
           $('#messageErrorEngineer4').fadeOut(2000);// or fade, css display however you'd like.
        }, 2000);
        
        var select = document.getElementById('type');
            select.onchange = function () {
                select.className = this.options[this.selectedIndex].className;
            }
            
    });
</script>

@endsection