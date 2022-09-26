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

@media (min-width:992px) {
	.horizontalMenu>.horizontalMenu-list>li>a:hover{
	    color:#808080;
	}
}
.chooseCourseTypeHere{
    position:relative;
    top:-10px;
}
.imgSearchBar{
    top:25px;
}

@media screen and (min-width:1025px) and (max-width:1200px) {
  .imgSearchBar{
     top:24px;
    }
    .chooseCourseTypeHere{
        width:980px;
    }
    .imageInHeaderCarousel{
        height:474px;
    }
}

@media only screen and (width: 1024px){
  .imgSearchBar{
     top:24px;
     right:-994px;
    }
    .chooseCourseTypeHere{
        width:980px;
    }
    .imageInHeaderCarousel{
        height:474px;
    }
}

@media screen and (min-width:600px) and (max-width:991px) {
    .imageInHeaderCarousel{
        height:355.45px;
    }
}

@media (max-width: 500px){
    .imageInHeaderCarousel{
        height:180px;
    }
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
                                <a id="horizontal-navtoggle" class="social-icon animated-arrow"><span></span></a>
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
        <div class="header-style horizontal-main bg-dark-transparent clearfix" >
            <div class="horizontal-mainwrapper container clearfix">

                <nav class="horizontalMenu clearfix d-md-flex">
                    <ul class="horizontalMenu-list" style="font-family:ab;padding:2px">
                        <li aria-haspopup="true"><a href="/" class="active">الرئيسية</a>

                        </li>
                        <li aria-haspopup="true"><a href="#" class=""> <span class="fe fe-chevron-down"></span> الخدمات </a>
                            <ul class="sub-menu">
                                <?php

                                $services =     $services = \App\Service::all();
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

                        <li aria-haspopup="true"><a href="/achievements" class=""> <span class="fe fe-chevron-down"></span> الإنجازات </a>
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
                        <li aria-haspopup="true" class="whenWidthSmall" style="cursor:pointer;"><img class="imgSearch" src="{{asset('assets/images/greySearch.svg')}}" width="20px" height="20px"></li>


                    </ul>

                </nav>
            </div>
            <form id="formInSearchBar" action="{{url('/courses/filter')}}" method="POST">
                @csrf
                <img class="imgSearchBar" src="{{asset('assets/images/xRed.png')}}" width="20px" height="20px">
                <div class="col-xl-10 col-lg-12 col-md-12 d-block mx-auto chooseCourseTypeHere">
                    <div class="search-background bg-transparent" style="box-shadow: 4px 19px 20px 5px rgba(0,0,0,0.2);border-radius: 10px;font-family: 'ar'">
                        <div class="form row no-gutters " >
                            <div class="form-group  col-xl-4 col-lg-3 col-md-12 mb-0  ">
                                <input type="text" name="byName" class="form-control input-lg br-tr-md-0 br-br-md-0" id="text4" placeholder="إبحث عن دوره بالإسم " style="border-radius: 10px;">
                            </div>
                            <div class="form-group  col-xl-3 col-lg-3 col-md-12 mb-0 ">
                                <select type="text" name="byType" class="form-control input-lg br-md-0" id="text5"  >
                                    <option disabled selected style="color: #AAAAA9"> النوع</option>
                                    <option value="1">حضورى</option>
                                    <option value="2"> عن بعد</option>
                                    <option value="3">مشاهدة</option>
                                </select>


                            </div>
                            <div class="form-group col-xl-3 col-lg-3 col-md-12 s  mb-0 ">
                                <input class="form-control input-lg br-tr-md-0 br-br-md-0" type="date" id="tbDate" name="byDate">
                            </div>
                            <div class="col-xl-2 col-lg-3 col-md-12 mb-0">
                                <button  type="submit" class="btn btn-lg btn-block btn-danger br-tl-md-0 br-bl-md-0" style="box-shadow: 4px 19px 20px 5px rgba(0,0,0,0.2);font-family: ar">ابحث هنا</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<!--/Horizontal-main -->
<section style="background-color: #ffffff">

    <div class="sptb-2 sptb-tab">

        <div class="header-text mb-0">
            <div class="">
                <?php
                $ads = session()->get('ads');
                ?>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach ($ads as $key => $adss)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"
                                class="active"></li>
                        @endforeach
                    </ol>

                    <div class="carousel-inner">
                        <div class="overlay"></div>

                        @foreach ($ads as $key => $adss)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <div class="row container text-center text-white adsHeader">
                                    <div class="col-md-4">
                                        <h1 class="adsHeader1 text-center">{{ $adss->title }}</h1>

                                        @php
                                            
                                            $desc = strip_tags(htmlspecialchars_decode($adss->description));
                                            
                                        @endphp
                                        <p class="adsHeader2 text-center">{{ Str::limit($desc, 100) }}</p>
                                        <a href="/advertisementDetails/{{ $adss->id }}"
                                            class="btn btn btn-danger text-center adsHeader3">المزيد</a>
                                    </div>
                                </div>
                                <img src="{{ $adss->image }}" height="594px"
                                    class="d-block image w-100 imageInHeaderCarousel" alt="...">
                            </div>
                        @endforeach
                    </div>

                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                        data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                        data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/Section-->

</div>
<!--/Section-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>

   $(window).scroll(function(){
        if($(window).scrollTop() > 55 && $(window).width() >= 1024){
            $('.horizontalMenu-list li a').css('color' , '#ffffff');
            $('.horizontalMenu-list li a.active').css('color' , '#fff');
            $('.horizontalMenu-list li a.active').css('border-bottom' , '2px solid #ddd');

            // $('.horizontalMenu-list li a:hover').css('color' , '#808080');
            $('.horizontalMenu>.horizontalMenu-list>li>ul.sub-menu>li>a').css('color' , '#808080');
            // $('.sticky-wrapper.is-sticky .horizontalMenu>.horizontalMenu-list>li>a.active').css('color' , '#808080');
            $('.whenWidthSmall img').attr('src' , '/assets/images/search.svg');
            $('.imgSearchBar').attr('src' , '/assets/images/wightX.svg');
        }
        else{
            $('.horizontalMenu-list li a').css('color' , '#808080');
            $('.horizontalMenu-list li a.active').css('color' , '#AB2A21');
            $('.horizontalMenu-list li a.active').css('border-bottom' , 'none');
            // $('.horizontalMenu-list li a:hover').css('color' , '#AB2A21');
            // $('.horizontalMenu>.horizontalMenu-list>li>ul.sub-menu>li>a').css('color' , '#808080');
            // $('.sticky-wrapper.is-sticky .horizontalMenu>.horizontalMenu-list>li>a.active').css('color' , '#AB2A21');
            $('.whenWidthSmall img').attr('src' , '/assets/images/greySearch.svg');
            $('.imgSearchBar').attr('src' , '/assets/images/xRed.png');
        }
    });

    $('#formInSearchBar').hide();
    $(window).on('load' , function(){
       if ($(window).width() < 1024) {
           $('.whenWidthSmall').css('display' , 'none');
        }
        else {
           $('.whenWidthSmall').css('display' , 'block');
        }
    });
    $(window).on('resize' , function(){

        if ($(window).width() < 1024) {
           $('.whenWidthSmall').css('display' , 'none');
        }
        else {
           $('.whenWidthSmall').css('display' , 'block');
        }
    });
    $('.imgSearch').on('click' , function(e){
        // console.log('fahmy');
        $('.horizontal-mainwrapper').slideToggle('slow');
        $('#formInSearchBar').slideToggle('slow');
    });

    $('.imgSearchBar').on('click' , function(){
    //   console.log('fahmy');
       $('.horizontal-mainwrapper').slideToggle('slow');
       $('#formInSearchBar').slideToggle('slow');
    });

</script>
