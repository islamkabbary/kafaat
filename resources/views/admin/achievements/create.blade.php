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
                    <div id="messageErrorEngineer3" style="font-family:ar;" class="alert alert-info">{{ Session::get('success') }}</div>
                @endif
                <div class="card m-b-20" >
                    <div class="card-header">
                        <h3 class="card-title" style="font-family:ar;">الإنجازات</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('achievements.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group" style="font-family:ar;">
                                <input type="file" name="media" class="dropify" />
                            </div>
                            <div class="form-group">
                                <label class="form-label" style="font-family:ar;">الاسم</label>
                                <input type="text" name="name" style="font-family:ar" class="form-control" required placeholder="الاسم">
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label" style="font-family:ar;">الوصف</label>
                                <textarea col="50" rows="4" name="description1" style="font-family:ar" class="form-control" required placeholder="الوصف"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label" style="font-family:ar;">نوع الإنجاز</label>
                                <select name="type" class="form-control mySelect" required id="type">
                                    <option class="hi form-control" selected disabled>اختر نوع إنجاز</option>
                                    <option class="hi form-control" style="font-family:ar;" value="1">تنظيم المعارض</option>
                                    <option class="hi form-control" style="font-family:ar;" value="2">دورات تأهيلية</option>
                                    <option class="hi form-control" style="font-family:ar;" value="3">حملات إعلامية</option>
                                    <option class="hi form-control" style="font-family:ar;" value="4">تقديم استشارات</option>
                                    <option class="hi form-control" style="font-family:ar;" value="5">حقائب تدريبية</option>
                                    <option class="hi form-control" style="font-family:ar;" value="6">برنامج التعاقد</option>
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
           $('#messageErrorEngineer3').fadeOut(2000);// or fade, css display however you'd like.
        }, 2000);
        
        var elem = document.getElementById('type');
          var selectedOption= elem[elem.selectedIndex];
          if(selectedOption.disabled == true){
           elem.style.fontFamily='ar';
        }
        
        var select = document.getElementById('type');
            select.onchange = function () {
                select.className = this.options[this.selectedIndex].className;
            }
        
    });
</script>

@endsection