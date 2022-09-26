<style>
    .overlay {
        background: rgb(128,16,3);
        background: linear-gradient(360deg, rgba(128,16,3,1) 0%, rgba(171,42,33,1) 100%);
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 10;
        opacity:30%;
        pointer-events: none;
    }
     @media (min-width: 768px) and (max-width: 979px) {
      .overlay{
        width:100%;
        height:100%;
    }
 }

  @media (max-width: 767px) {
     .overlay{
          width:100%;
          height:100%;
      }
  }
@media (max-width: 480px) {
   .overlay{
       width:100%;
      height:100%;
  }
}
@media (max-width: 500px){
    .nameOfUserHeader{
        font-size:10px;
    }
}
@media only screen and (width: 360px){
    .nameOfUserHeader{
        font-size:9px;
    }
}
@media only screen and (width: 320px){
    .nameOfUserHeader{
        font-size:8px;
    }
}
/* .horizontalMenu>.horizontalMenu-list>li>a{
    color: #808080 !important; 
} */


</style>
<div class="banner-1 cover-image" style="background-color: #ffffff">

    <!--Topbar-->
    <div class="header-main">

        <div class="top-bar" style="background: url('../assets/images/points.svg') no-repeat center center fixed , linear-gradient(-90deg, rgba(161,42,33,1) 0%, rgba(225,68,72,1) 100%) ; background-size:cover; background-color:rgb(161,42,33);">

            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-sm-4 col-7">
                        <div class="top-bar-right d-flex">
                            <div class="clearfix">
                                <div>
                                    <a id="horizontal-navtoggle" class="social-icon  animated-arrow"><span></span></a>
                                    <a class="header-logo" href="{{url('/')}}">
                                        @auth <img src="{{session()->get('logo')}}" class="newLogo"> @else <img src="{{session()->get('logo')}}" class="imgHeaderLogo1 newLogo"> @endauth
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-sm-8 col-5">
                        <li class="top-bar-left">
                            <ul class="custom mt-3">
                                @if(auth()->guard('web')->check() && auth()->guard('web')->user()->type == 0)

                                    <a href="#" class="text-dark" data-toggle="dropdown"> <img src="{{asset('assets/images/home.svg')}}" height="20px">  <span class="nameOfUserHeader" style="font-family:ar"> {{auth()->user()->username}} &nbsp;<i class="fa fa-caret-down text-white ml-1"></i></span></a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="{{url('/profile')}}" style="font-family:ar">
                                            <i class="fa fa-home"></i> الصفحة الشخصية
                                        </a>
                                        <a class="dropdown-item" href="/logout" style="font-family:ar">

                                            <i class="dropdown-icon icon icon-power"></i> تسجيل خروج
                                        </a>
                                    </div>
                                    </li>
                                @else


                                    <li>
                                        <a href="{{route('register')}}" class="text-dark"> <span style="font-family:ar">التسجيل</span> <img src="{{asset('assets/images/sign in.svg')}}" height="25px"> </a>
                                    </li>
                                    <li>
                                        <a href="{{route('login')}}" class="text-dark"> <span style="font-family:ar">تسجيل الدخول</span> <img src="{{asset('assets/images/loge in .svg')}}"  height="25px"> </a>
                                    </li>


                                @endauth
                            </ul>
                        </li>
                    </div>
                </div>
            </div>
        </div><!--/Topbar-->


        <!--Horizontal-main -->
        <div class="header-style horizontal-main bg-dark-transparent clearfix nav_edeited" style="background:#fff;color:#000;">
            <div class="horizontal-mainwrapper container clearfix">

                <nav class="horizontalMenu clearfix d-md-flex">
                    <ul class="horizontalMenu-list" style="font-family:ab;padding:2px">
                        <li aria-haspopup="true"><a href="/">الرئيسية</a>

                        </li>
                        <li aria-haspopup="true"><a href="#" class=""> <span class="fe fe-chevron-down"></span> الخدمات </a>
                            <ul class="sub-menu">
                                <?php

                                $services = \App\Service::all();

                                ?>

                                @foreach($services as $service)
                                    <li aria-haspopup="true"><a href="{{url('/service-details/'.$service->id)}}" class="" style="color:#808080;font-family:ar">{{$service->title}}</a>

                                @endforeach
                            </ul>
                        </li>

                        <li aria-haspopup="true"><a href="#" class=""> <span class="fe fe-chevron-down"></span> مجالات الأعمال </a>
                            <ul class="sub-menu">
                                <?php
                                    $business_areas = \App\BusinessArea::all();
                                ?>
                                @foreach($business_areas as $business_area)
                                    <li aria-haspopup="true"><a href="/business-areas/{{$business_area->id}}" class="" style="color:#808080;font-family:ar">{{$business_area->title}}</a>
                                @endforeach

                            </ul>
                        </li>

                        <li aria-haspopup="true"><a href="/achievements" class="achieve"> <span class="fe fe-chevron-down"></span> الإنجازات </a>
                            <ul class="sub-menu">
                                <li aria-haspopup="true"><a href="/achievements" class="" style="color:#808080;font-family:ar">تنظيم المعارض</a>
                                <li aria-haspopup="true"><a href="/achievements" class="" style="color:#808080;font-family:ar">دورات تأهيلية</a>
                                <li aria-haspopup="true"><a href="/achievements" class="" style="color:#808080;font-family:ar">حملات إعلامية</a>
                                <li aria-haspopup="true"><a href="/achievements" class="" style="color:#808080;font-family:ar">تقديم إستشارات</a>
                                <li aria-haspopup="true"><a href="/achievements" class="" style="color:#808080;font-family:ar">حقائب تدريبية</a>
                                <li aria-haspopup="true"><a href="/achievements" class="" style="color:#808080;font-family:ar">برنامج التعاقد</a>
                            </ul>
                        </li>

                        <li aria-haspopup="true"><a href="{{url('courses')}}" class="/courses"> الدورات </a>
{{--                            <ul class="sub-menu">--}}
{{--                                <li aria-haspopup="true"><a href="/courses" class="" style="color:#808080;font-family:ar">حضوري</a>--}}
{{--                                <li aria-haspopup="true"><a href="/courses" class="" style="color:#808080;font-family:ar">عن بعد</a>--}}
{{--                                <li aria-haspopup="true"><a href="/courses" class="" style="color:#808080;font-family:ar">مشاهدة</a>--}}
{{--                            </ul>--}}
                        </li>
                        <li aria-haspopup="true"><a href="/about-us" class="">من نحن </a></li>
                        <li aria-haspopup="true"><a href="{{url('contact')}}" class="">تواصل معنا</a></li>


                    </ul>

                </nav>
            </div>
        </div>
    </div><!--/Horizontal-main -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(window).on('load' , function(){
            if($(window).width() < 1024){
                $('.horizontalMenu>.horizontalMenu-list>li>a').css('color' , '#808080');
                $('.horizontalMenu>.horizontalMenu-list>li>a.active').css('color' , '#AB2A21');
            }else{
                $('.horizontalMenu>.horizontalMenu-list>li>a').css('color' , '#808080');
                $('.horizontalMenu>.horizontalMenu-list>li>a.active').css('color' , '#AB2A21');
            }
        });
       $(window).scroll(function(){
            if($(window).scrollTop() > 100 && $(window).width() >= 1024){
                $('.horizontalMenu .horizontalMenu-list li a').css('color' , '#808080');
                $('.horizontalMenu .horizontalMenu-list li a.active').css('color' , '#AB2A21');
                // $('.horizontalMenu-list li a:hover').css('color' , '#808080');
                $('.horizontalMenu>.horizontalMenu-list>li>ul.sub-menu>li>a').css('color' , '#808080');
                $('.sticky-wrapper.is-sticky .horizontalMenu>.horizontalMenu-list>li>a.active').css('color' , '#AB2A21');
            }
            else{
                // $('.horizontalMenu-list li a').css('color' , '#808080');
                // $('.horizontalMenu-list li a.active').css('color' , '#AB2A21');
                // $('.horizontalMenu-list li a:hover').css('color' , '#AB2A21');
                // $('.horizontalMenu>.horizontalMenu-list>li>ul.sub-menu>li>a').css('color' , '#808080');
                // $('.sticky-wrapper.is-sticky .horizontalMenu>.horizontalMenu-list>li>a.active').css('color' , '#AB2A21');
            }
        });

        $(window).on('resize' , function(){

            if($(window).width() < 1024){
                $('.horizontalMenu .horizontalMenu-list li a').css('color' , '#808080');
                $('.horizontalMenu .horizontalMenu-list li a.active').css('color' , '#AB2A21');
            }
            else {
                $('.horizontalMenu>.horizontalMenu-list>li>a').css('color' , '#ffffff');
                $('.horizontalMenu>.horizontalMenu-list>li>a.active').css('color' , '#808080');
            }
        });


    </script>
