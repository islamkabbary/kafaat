@component('components.app')

    <x-header />
    <style>
        .table-hover tbody tr:hover{
            color:#E64448;
        }
    </style>
    <br class="spaceHeader">
    <br class="spaceHeader">
    <br class="spaceHeader">
    <br>
    <br>
    <br>

<section class="sptb">
    <div class="container">
         <div class="section-title center-block text-center">
            <h2 style="color:#808080;font-family:ar">دوراتي</h2>
            <img src="{{asset('/assets/images/sub.png')}}" style="width: 150px;height: 20px">
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-12 col-md-12">
                <div class="card" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
                    <div class="card-header">
                        <h3 class="card-title" style="font-family:ab;color:#808080">الصفحة الشخصية</h3>
                    </div>
                    <div class="card-body text-center item-user border-bottom">
                        <div class="profile-pic">
                            <div class="profile-pic-img">
                                <span class="bg-success dots" data-toggle="tooltip" data-placement="top" title="online"></span>
                                <img src="{{auth()->user()->photo}}" height="80px" class="brround">
                            </div>
                            <a href="userprofile.html" class="" style="font-family:ab;color:#808080;"><h4 class="mt-3 mb-0 font-weight-semibold">
                                {{auth()->user()->username}}</h4></a>
                        </div>
                    </div>
                    <br>
                    <div class="item1-links  mb-0">
                        <a href="{{url('profile')}}" style="font-family:ar" class="d-flex border-bottom">
                            <span class="icon1"></span> تعديل الملف الشخصي <img src="{{asset('assets/images/my-profile-01.svg')}}"  class="profileImg1" width="20px" height="25px">
                        </a>
                        <a href="{{url('my-courses')}}" style="font-family:ar" class="active d-flex  border-bottom">
                            <span class="icon1"></span> دوراتي  <img src="{{asset('assets/images/my-courses-01.svg')}}" class="profileImg2" width="20px" height="25px">
                        </a>
                        <a href="{{url('favourites-courses')}}" style="font-family:ar" class="d-flex  border-bottom">
                            <span class="icon1"></span> المفضلة  <img src="{{asset('assets/images/like-01.svg')}}" class="profileImg3" width="20px" height="25px">
                        </a>
                        <a href="{{url('finished-courses')}}" style="font-family:ar" class="d-flex  border-bottom">
                            <span class="icon1"></span> دورات مكتسبة  <img src="{{asset('assets/images/done-01.svg')}}" class="profileImg4" width="20px" height="25px">
                        </a>
                        <a href="{{url('cart-courses')}}" style="font-family:ar" class="d-flex  border-bottom">
                            <span class="icon1"></span> السلة  <img src="{{asset('assets/images/The-basket-01.svg')}}" class="profileImg5" width="20px" height="25px">
                        </a>
                        <a href="{{route('logout')}}" style="font-family:ar" class="d-flex">
                            <span class="icon1"></span> تسجيل خروج <img src="{{asset('assets/images/logout-01.svg')}}" class="profileImg6" width="20px" height="25px">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-12 col-md-12">
                <div class="card mb-0" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
                    <div class="card-header">
                        <h3 class="card-title" style="color:#808080;font-family:ab;">دوراتي</h3>
                    </div>
                    @if(session()->has('messageDeleted'))
                        <div id="messageErrorEngineerDeleted" style="font-family:ar" class="alert alert-danger">{{ Session::get('messageDeleted') }}</div>
                    @endif
                    <div class="card-body">
                        <div class="my-favadd table-responsive border-top userprof-tab">
                            <table class="table table-bordered table-hover mb-0 text-nowrap" style="font-family:ar;color:#808080">
                                <thead>
                                <tr>
                                    <th width="60%">الدورات</th>
                                    <th width="10%">المجال</th>
                                    <th width="5%">السعر</th>
{{--                                    <th width="25%">عمل</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @if($courses->count())
                                    @foreach($courses as $course)
                                <tr>
                                    <td>
                                        <div class="media mt-0 mb-0">
                                            <div class="card-aside-img">
                                                <a href="#"></a>
                                                <img src="{{$course->course->image_cover}}" alt="img">
                                            </div>
                                            &nbsp;&nbsp;&nbsp;
                                            <div class="media-body">
                                                <div class="card-item-desc ml-4 p-0 mt-2">
                                                    <a href="{{url('course-details2/'.$course->course->id)}}" class="" style="font-family:ar;color:#808080;"><h4 class="font-weight-semibold">
                                                        {{$course->course->title}}</h4></a><br>
                                                    <a href="#" style="font-family:ar;color:#808080;"><img src="{{asset('assets/images/clock-01.svg')}}"> {{$course->course->date}}</a>
                                                    <a href="#" style="font-family:ar;color:#808080;float:left"><img src="{{asset('assets/images/offline-01.svg')}}">{{$course->course->type}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if($course->course->specialist_id == 1)
                                           مجال مالي
                                        @elseif($course->course->specialist_id == 2)
                                           مجال إداري
                                        @elseif($course->course->specialist_id == 3)
                                            مجال سياحي
                                        @elseif($course->course->specialist_id == 4)
                                            مجال إجتماعي
                                        @elseif($course->course->specialist_id == 5)
                                            مجال تطوير  ذاتي
                                        @elseif($course->course->specialist_id == 6)
                                            مجال حاسب آلي
                                        @elseif($course->course->specialist_id == 7)
                                            مجال إلكترونيات
                                        @else
                                            مجال نعليم لغة إنجليزية
                                        @endif
                                    </td>
                                    <td class="" style="font-family:ar;color:#808080;">
                                        @if($course->course->offer)
                                        {{$course->course->price_after_discount}}
                                        @else
                                            {{$course->course->price}}
                                        @endif
                                            <span style="font-family:ar;color:red;font-size:10px">SR</span></td>
{{--
    <td class="text-center">--}}

{{--                                        <br>--}}
{{--                                        <a href="/deleteCourseFromMyCourses/{{$course->course->id}}" class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="حذف"><i class="fa fa-trash"></i></a>--}}
{{--                                    </td>--}}
                                </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <br>
    <br>
    <br>
    <br>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
           $(window).on('load' , function(){
                if ($(window).width() < 991) {
                   $('.spaceHeader').css('display' , 'none');
                }
                else {
                   $('.spaceHeader').css('display' , 'block');
                }
            });
            $(window).on('resize' , function(){
                if ($(window).width() < 991) {
                   $('.spaceHeader').css('display' , 'none');
                }
                else {
                   $('.spaceHeader').css('display' , 'block');
                }
            });
            setTimeout(function(){
               $('#messageErrorEngineerDeleted').fadeOut('slow');// or fade, css display however you'd like.
            }, 3000);
        });
    </script>
@endcomponent
