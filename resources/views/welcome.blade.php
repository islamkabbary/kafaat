@component('components.app')
    <x-main-header />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <style>
        .card{
            box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);
        }

        .tooltip {
            position: relative;
            display: inline-block;
        }
        .tooltip .tooltiptext {
            visibility: hidden;
            width: 140px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px;
            position: absolute;
            z-index: 1;
            bottom: 150%;
            left: 50%;
            margin-left: -75px;
            opacity: 0;
            transition: opacity 0.3s;
        }
        .tooltip .tooltiptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }
        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }
    </style>
    <section class="sptb bg-white" id="about-us"></section>

    <section class="sptb bg-white ">
        <div class="container">
            <div class="section-title center-block text-center">
                <h2 style="color:#808080;font-family:ar">الدورات</h2>
                <img src="{{asset('/assets/images/sub.png')}}" style="width: 150px;height: 20px">
            </div>
            <div class="panel panel-primary">
                <div class="">
                    <div class="tabs-menu ">
                        <!-- Tabs -->
                        <ul class="crs_scroll panel-tabs nav eductaional-tabs mb-6" style="font-family: ar;color: #ffffff;cursor: pointer">
                            <li><a onclick="coursesFilter(1)"  class="active show tab_text" data-toggle="tab"> &nbsp;&nbsp;&nbsp;&nbsp;  حضوري &nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                            <li><a onclick="coursesFilter(2)" data-toggle="tab" class="tab_text"> &nbsp;&nbsp;&nbsp;&nbsp;عن بعد   &nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                            <li><a onclick="coursesFilter(3)"  data-toggle="tab" class="tab_text"> &nbsp;&nbsp;&nbsp;&nbsp;مشاهده &nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                            <li><a href="{{url('/courses')}}" class="tab_text"><img src="{{asset('assets/images/more.png')}}" width="15px" height="13px">&nbsp;المزيد&nbsp;&nbsp;</a></li>
                        </ul>
                    </div>
                </div>
                <br>  <br>
                <div class="courses_area">
                    <?php $arrayFavourites = array(); ?>
                    @if($courses->count() > 0)
                <div id="myCarousel1" class="owl-carousel Card-owlcarousel owl-carousel-icons carouselPosition1 "  >

                        @foreach($courses as $course)

                            <div  class="card overflow-hidden" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);border-radius: 10px;">
                                <div class="card mb-0" id="courses_area"  >
                                    <div class="item-card7-img" style="height: 250px" >
                                        <a href="page-details.html"></a>
                                        <div class="item-card7-imgs">
                                            <div class="overlay"></div>

                                            <img src="{{$course->image_cover}}" alt="img" class="cover-image" style="height: 250px;"  >

                                            {{--                            <div class="item-tag">--}}
                                            {{--                                <h4  class="mb-0">SR {{$course->price}}</h4>--}}
                                            {{--                            </div>--}}
                                        </div>
                                        <div class="item-overly-trans">
                                            <div class="rating-stars d-flex text-white">
                                                <span style="font-family: ar">{{$course->type}}</span>

                                            </div>
                                        </div>
                                    </div>
                                    @auth
                                    @foreach(getFavouritesForUser() as $fav)
                                        @if($fav->course_id == $course->id)
                                            <?php array_push($arrayFavourites , $fav->course_id) ?>
                                        @else

                                        @endif
                                    @endforeach
                                    @endauth
                                    <div class="item-card2-icons tropicana">
                                        <a  onclick="copyLink({{$course->id}})" href="javascript:void(0);" data-toggle="tooltip" title="إنسخ رابط الدوره" class="item-card2-icons-l favItem1 " >
                                            <i class="fa fa-share-alt" ></i></a>
                                            @auth
                                            <?php if(in_array($course->id , $arrayFavourites)){
                                                ?>
                                                <a style="cursor:pointer;" class="item-card2-icons-l favItem2" data-toggle="tooltip" title="إزالة الدورة من المفضلة"> <i onclick="removeFavourites(event)" data-id="{{$course->id}}" class="fa fa-heart favss2{{$course->id}} text-danger"></i></a>
                                            <?php

                                            }else{
                                                ?>
                                                <a style="cursor:pointer;" class="item-card2-icons-l favItem2" data-toggle="tooltip" title="إضافه الدوره للمفضله"> <i onclick="addFavourites(event)" data-id="{{$course->id}}" class="fa fa-heart favss{{$course->id}} text-white"></i></a>
                                            <?php
                                            }
                                            ?>

                                            @endauth
                                            @guest
                                                <a href="{{route('login')}}" class="item-card2-icons-l favItem2" data-toggle="tooltip" title="إضافه الدوره للمفضله"> <i class="fa fa-heart text-white"></i></a>
                                            @endguest
                                    </div>
                                    <div class="card-body courses_body position-relative" style="height:300px;font-family: ar;color: #808080">
                                        <div class="course_category" style="width: 155px;padding-right: 20px;margin-bottom: 20px">
                                            <ul class="row">
                                                <li style="padding-left: 20px">تطوير الذات</li>
                                                <li> <img src="{{asset('uploads/courses/images/category.png')}}" width="25px" height="25px"/> </li>
                                            </ul>

                                        </div>
                                        <div class="item-card2">
                                            <div class="item-card2-desc" >
                                                <div class="item-card2-text mb-3">
                                                    <h4 class="" style="color: #808080">{{Str::limit($course->title,28)}}</h4>
                                                </div>
                                                <p class="" style="padding-top: 20px;text-align: justify">{{Str::limit($course->description,150)}} </p>
                                            </div>
                                        </div>
                                        <div class="crs_info w-100 d-flex justify-content-between">
                                            <span>الدكتور {{$course->instructor}}</span>
                                            <span>{{$course->date}}</span>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="item-card2-footer courses_footer">
                                            <ul class="">
                                                <li>
                                                    <a class="float-left priceItem">  <p style="font-family:ar;font-size: 25px">
                                                            @if($course->offer)
                                                            {{$course->price_after_discount}}
                                                            @else
                                                                {{$course->price}}
                                                            @endif
                                                            <span class="text-danger" style="float: right;padding-top: 4px">SR</span></p></a>

                                                </li>
                                                <li>
                                                    <a href="{{url('course-details/'.$course->id)}}" class="btn btn-danger  text-white float-right" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);border-radius: 10px;font-family:ar"> عرض الدوره</a>

                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        @endforeach

                </div>
                    @else
                        <h3 style="font-family: 'ar';color: #dc3545;text-align:center">لا توجد دورات</h3>
                    @endif
                </div>
                </div>
                    <div  class="modal" id="variableModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                    <div class="modal-dialog modal-sm modal-notify modal-success" role="document" style="max-width: 400px;background-color: wheat">

                        <div class="modal-content text-center" style="background: white;">

                            <div class="modal-header d-flex justify-content-center text-center " >


                            </div>

                            <div class="modal-body">
                                <h6 class="heading text-center" id="modal_message" style="color: black;font-family: ar"></h6>

                            </div>


                        </div>

                    </div>
                </div>
        </div>
    </section>
    <section class="sptb bg-white">
        <div class="container">
            <div class="section-title center-block text-center">
                <h2 style="color:#808080;font-family:ar">مجالات أعمالنا</h2>
                <img src="{{asset('/assets/images/sub.png')}}" style="width: 150px;height: 20px">
            </div>
            <div class="item-all-cat center-block text-center education-categories">
                <div class="row">
                    @if($business_areas->count() > 0)

                        <div class="col-md-12 cardsForMobs">
                            <div id="small-categories" class="owl-carousel client-carousel carouselPosition1" >
                                @foreach($business_areas as $business_area)
                                    <div class="item">
                                        <div class="card" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
                                            <div class="card-body">
                                                <div class="card-item">
                                                    <a href="/business-areas/{{$business_area->id}}"></a>
                                                    <img src="{{$business_area->image}}" style="width: 40px;height: 40px" alt="img">
                                                </div>
                                                <div class="item-all-text mt-3">
                                                    <h5 class="mb-0" style="font-family:ar;color:#808080">{{$business_area->title}}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        @foreach($business_areas as $business_area)
                            <div class="col-md-3 cardsForComps">
                                <div class="item-all-card text-dark text-center" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
                                    <a href="/business-areas/{{$business_area->id}}"></a>
                                    <div class="iteam-all-icon">
                                        <img src="{{$business_area->image}}" style="width: 40px;height: 40px">
                                    </div>
                                    <div class="item-all-text mt-3">
                                        <h5 class="mb-0" style="font-family:ar;color:#808080">{{$business_area->title}}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    @else

                    @endif
                </div>
            </div>
        </div>
    </section>
    <!--/Section-->

    <!--Section-->
    <section id="services" class="sptb bg-white">
        <div class="container">
            <div class="section-title center-block text-center">
                <h2 style="color:#808080;font-family:ar">الخدمات</h2>
                <img src="{{asset('/assets/images/sub.png')}}" style="width: 150px;height: 20px">
            </div>
        
            @if($services->count() > 0)
                <div id="myCarousel" class="owl-carousel Card-owlcarousel owl-carousel-icons carouselPosition1" >
                    @foreach($services as $service)
                        <div class="card" style="border-radius: 10px;max-width: 500px;height: 445px">
                            <div class="item-card2-img">
                                <div class="item-card2-imgs">
                                    <div class="overlay"></div>
                                    <img src="{{$service->image}}" alt="img" class="cover-image" style="height: 200px" >
                                </div>
                                {{--                                    <div class="item-card7-overlaytext">--}}
                                {{--                                        <a href="education.html" class="text-white"> SERVICE TYPE</a>--}}
                                {{--                                    </div>--}}
                            </div>
                            <div class="card-body" style="height: 125px;font-family: ar;color: #8080">
                                <div class="item-card2-desc" >
                                    <div class="item-card2-text">
                                        <a href="{{url('service-details/'.$service->id)}}" class="text-dark"><h2 class="font-weight-semibold" style="color: #808080">
                                                {{Str::limit($service->title,25)}}</h2></a>
                                    </div>
                                    {{--                                        <ul class="d-flex mb-2">--}}
                                    {{--                                            <li class=""><a href="#" class="icons text-muted"><i class="icon icon-location-pin  mr-1"></i> Saudi Arabia</a></li>--}}
                                    {{--                                            <li><a href="#" class="icons text-muted"><i class="icon icon-event  mr-1"></i>{{date('m' , strtotime($service->created_at))}} min ago</a></li>--}}
                                    {{--                                            <li class=""><a href="#" class="icons text-muted"><i class="icon icon-phone  mr-1"></i> 14 675 65</a></li>--}}
                                    {{--                                        </ul>--}}
                                    <p class="mb-0" style="padding-top: 12px;">{{\Illuminate\Support\Str::limit($service->description , 60)}}</p>
                                </div>
                            </div>
                            <div class="service_footer" style="font-family: ar;color: #808080">
                                <a href="{{url('service-details/'.$service->id)}}" class="btn btn-danger roun " style="margin-top: 25px">المزيد</a>
                                <img src="{{asset('/assets/images/downstyle.png')}}" class="float-left"   height="80px">
                            </div>
                        </div>
                    @endforeach
                    @else
                        <span class="text-warning text-center"> no services provided yet !</span>
                </div>
            @endif
        </div>
    </section>
    <!--/Section-->

    <section class="sptb" style="background-color:#fff">
        <div class="container">
            <div class="section-title center-block text-center">
                <h2 style="color:#808080;font-family:ar">الإنجازات</h2>
                <img src="{{asset('/assets/images/sub.png')}}" style="width: 150px;height: 20px">
            </div>
            <div class="">
                <div class="tabs-menu">
                    <!-- Tabs -->
                    <ul class="crs_scroll nav panel-tabs eductaional-tabs mb-6" style="font-family: ar;color: #808080">
                        <li class="tabLink"><a href="#tab1" class="active show tab_text" id="Taahil" data-toggle="tab">دورات تأهيليه</a></li>
                        <li><a href="#tab2" data-toggle="tab" id="organized" class="tab_text">تنظيم المعارض</a></li>
                        <li><a href="#tab3" data-toggle="tab" id="adsConfer" class="tab_text">حملات إعلانيه</a></li>
                        <li id="mores"><a href="/achievements" class="tab_text"><img src="{{asset('assets/images/more.png')}}" width="25px" height="13px">&nbsp;المزيد&nbsp;&nbsp;</a></li>
                    </ul>
                </div>
            </div>
            <br> 
            <br> 
            <div id="demo"></div>
            <div id="myCarousel" class="owl-carousel Card-owlcarousel owl-carousel-icons carouselPosition1 getDataSliderHere">
                @if($achievements->count() > 0)
                    @foreach($achievements as $achievement)
                        <div class="card overflow-hidden " style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
                            <div class="item-card7-img" style="height: 250px">
                                <a href="/achievementDetails/{{$achievement->id}}"></a>
                                <div class="item-card7-imgs">
                                    <img src="{{$achievement->media}}" alt="img" class="cover-image" style="height: 250px">
                                </div>
                            </div>
                            <div class="card-body" style="height: 220px;font-family: ar;color: #808080">
                                <div class="item-card2">
                                    <div class="item-card2-desc" >
                                        <div class="item-card2-text mb-3">
                                            <a href="/achievementDetails/{{$achievement->id}}" class="text-dark"><h4 class="mb-2" style="color: #808080">{{$achievement->name}}</h4></a>
                                        </div>
                                        <br>
                                        <p>{{Str::limit($achievement->description,60)}} </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    {{--    <!--Section-->--}}
    {{--    <section>--}}
    {{--        <div class="cover-image about-widget sptb bg-background-color" data-image-src="../assets/images/banners/banner4.jpg">--}}
    {{--            <div class="content-text mb-0">--}}
    {{--                <div class="container">--}}
    {{--                    <div class="text-center text-white ">--}}
    {{--                        <h2 class="mb-2 font-weight-400">Let's Update Your Skills with Our Training Professionals...</h2>--}}
    {{--                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>--}}
    {{--                        <div class="mt-5">--}}
    {{--                            <a href="{{route('register')}}" class="btn btn-lg btn-primary">Register Now!</a>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section><!--/Section-->--}}

    @if($partners->count() > 0)
        <section class="sptb partners" style="background: url('../assets/images/POINTS.png') no-repeat center center fixed;background-size:cover;padding:40px;background-color:#ffffff">
            <div class="container">
                <div class="section-title center-block text-center">
                    <h2 style="color:#808080;font-family:ar">الشركاء</h2>
                    <img src="{{asset('/assets/images/sub.png')}}" style="width: 150px;height: 20px">
                </div>
                <div class="col-md-12">
                    <div id="small-categories" class="owl-carousel client-carousel carouselPosition1" >
                        @foreach($partners as $partner)
                            <div class="item">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-item">
                                            <a href="#"></a>

{{--                                            <div class="center-block" >--}}
                                                <img src="{{$partner->logo}}"    alt="img" style="max-height: 65px">
{{--                                            </div>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
    <script src="https://cdn.jsdelivr.net/clipboard.js/1.5.12/clipboard.min.js"></script>
<!--<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>-->
<!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>-->
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>-->
<script>
    $(document).ready(function(){
        $(window).on('resize' , function(){
        var owl = $(".owl-carousel");
            
            if($(window).width() == 768){

                owl.owlCarousel({
                    margin: 25,
                    items:2,
                    loop: true,
                    nav: true,
                    autoplay: true,
                    dots: false,
                    rtl:true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        800: {
                            items: 2
                        },
                        1300: {
                            items: 3
                        }
                    }
                });
            }
        });
        // $('#mores').on('click' , function(){
        //    window.location.href = 'https://kafaat2.cmark.sa/achievements';
        //
        // });

        $('#Taahil').on('click' , function(){
            $('.getDataSliderHere').remove();
            $('#demo').empty();
            $.ajax({
               url:'/getAchievementWithHisType/2',
               method:'GET',
               success:function(data){
                   $('#demo').html('<div id="testing" class="owwlCarousel"></div>');
                    for(var i=0;i<data.length;i++){
                        $(".owwlCarousel").append(`
                            <div class="card overflow-hidden " style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
                                <div class="item-card7-img" style="height: 250px">
                                    <a href="/achievementDetails/`+data[i].id+`"></a>
                                    <div class="item-card7-imgs">
                                        <img src="`+data[i].media+`" alt="img" width="" height="" class="cover-image" style="height: 250px" >
                                    </div>
                                </div>
                                <div class="card-body" style="height: 220px;font-family: ar;color: #808080">
                                    <div class="item-card2">
                                        <div class="item-card2-desc" >
                                            <div class="item-card2-text mb-3">
                                                <a href="/achievementDetails/`+data[i].id+`" class="text-dark"><h4 class="mb-2" style="color: #808080">`+data[i].name+`</h4></a>
                                            </div><br>
                                            <p class="">`+data[i].description.substring(0, 60)+`</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `);
                    };
                    $('#testing').addClass('owl-carousel Card-owlcarousel owl-carousel-icons carouselPosition1');
                    var owl = $("#testing");
                   owl.owlCarousel({
                       margin: 25,
                       items:3,
                       loop: true,
                       nav: true,
                       autoplay: true,
                       dots: false,
                       rtl:true,
                       responsive: {
                           0: {
                               items: 1
                           },
                           800: {
                               items: 2
                           },
                           1300: {
                               items: 3
                           }
                       }
                   });
               },
            });
        });

        $('#organized').on('click' , function(){
            $('.getDataSliderHere').remove();
            $('#demo').empty();
            $.ajax({
               url:'/getAchievementWithHisType/1',
               method:'GET',
               success:function(data){
                   $('#demo').html('<div id="testing" class="owwlCarousel"></div>');
                    for(var i=0;i<data.length;i++){
                        $(".owwlCarousel").append(`
                            <div class="card overflow-hidden " style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
                                <div class="item-card7-img">
                                    <a href="/achievementDetails/`+data[i].id+`"></a>
                                    <div class="item-card7-imgs" style="height: 250px">
                                        <img src="`+data[i].media+`" alt="img" width="" height="" class="cover-image" style="height: 250px"  >
                                    </div>
                                </div>
                                <div class="card-body" style="height: 220px;font-family: ar;color: #808080">
                                    <div class="item-card2">
                                        <div class="item-card2-desc">
                                            <div class="item-card2-text mb-3">
                                                <a href="/achievementDetails/`+data[i].id+`" class="text-dark"><h4 class="mb-2" style="color: #808080">`+data[i].name+`</h4></a>
                                            </div><br>
                                            <p class="">`+data[i].description.substring(0, 60)+`</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `);
                    };
                    $('#testing').addClass('owl-carousel Card-owlcarousel owl-carousel-icons carouselPosition1');
                    var owl = $("#testing");
                   owl.owlCarousel({
                       margin: 25,
                       items:3,
                       loop: true,
                       nav: true,
                       autoplay: true,
                       dots: false,
                       rtl:true,
                       responsive: {
                           0: {
                               items: 1
                           },
                           800: {
                               items: 2
                           },
                           1300: {
                               items: 3
                           }
                       }
                   });
               },
            });
        });

        $('#adsConfer').on('click' , function(){
            $('.getDataSliderHere').remove();
            $('#demo').empty();
            $.ajax({
               url:'/getAchievementWithHisType/3',
               method:'GET',
               success:function(data){
                   $('#demo').html('<div id="testing" class="owwlCarousel"></div>');
                    for(var i=0;i<data.length;i++){
                        $(".owwlCarousel").append(`
                            <div class="card overflow-hidden " style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
                                <div class="item-card7-img" style="height: 250px">
                                    <a href="/achievementDetails/`+data[i].id+`"></a>
                                    <div class="item-card7-imgs">
                                        <img src="`+data[i].media+`" alt="img" width="" height="" class="cover-image" style="height: 250px"  >
                                    </div>
                                </div>
                                <div class="card-body" style="height: 220px;font-family: ar;color: #808080">
                                    <div class="item-card2">
                                        <div class="item-card2-desc" >
                                            <div class="item-card2-text mb-3">
                                                <a href="/achievementDetails/`+data[i].id+`" class="text-dark"><h4 class="mb-2" style="color: #808080">`+data[i].name+`</h4></a>
                                            </div><br>
                                            <p class="">`+data[i].description.substring(0, 60)+`</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `);
                    };
                    $('#testing').addClass('owl-carousel Card-owlcarousel owl-carousel-icons carouselPosition1');
                    var owl = $("#testing");
                    owl.owlCarousel({
                       margin: 25,
                       items:3,
                       loop: true,
                       nav: true,
                       autoplay: true,
                       dots: false,
                       rtl:true,
                       responsive: {
                           0: {
                               items: 1
                           },
                           800: {
                               items: 2
                           },
                           1300: {
                               items: 3
                           }
                       }
                   });
               },
            });
        });



    });


</script>

    <script>
        function coursesFilter(by){

            $('.courses_area').empty();
            var origin = window.location.origin;
            $.ajax({
                url : '/courses/filter/byTags/'+by,
                type : 'get',
                success:function (courses){
                    console.log(courses);
                    if (courses != 0) {
                        $('.courses_area').html('<div id="myCarousel1" class="owl-carousel Card-owlcarousel owl-carousel-icons carouselPosition1 "></div>');
                        // alert(courses.length);
                        for (var pointer = 0; pointer < courses.length; pointer++) {
                            var FavouriteIcon = '';
                                if (courses[pointer].isFavouritToAuthUser == 1){

                                    FavouriteIcon = "<a style='cursor:pointer;' class='item-card2-icons-l favItem2'  data-toggle='tooltip' title='إزاله الدوره من المفضله'> <i onclick='removeFavourites(event)' data-id='"+courses[pointer].id+"' class='fa fa-heart favss2"+courses[pointer].id+" text-danger'></i></a>";
                                }else{

                                    FavouriteIcon  = "<a style='cursor:pointer;' class='item-card2-icons-l favItem2' data-toggle='tooltip' title='إضافه الدوره للمفضله' > <i onclick='addFavourites(event)' data-id='"+courses[pointer].id+"' class='fa fa-heart favss"+courses[pointer].id+" text-white'></i></a>";
                                }
                            $('#myCarousel1').append(`
                            <div  class="card overflow-hidden" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);border-radius: 10px;">
                            <div class="card mb-0" id="courses_area" >
                            <div class="item-card7-img" style="height: 250px;">
                            <a href="page-details.html"></a>
                            <div class="item-card7-imgs" >
                            <div class="overlay"></div>
                            <img src="` + courses[pointer].image_cover + `" alt="img" class="cover-image" style="height: 250px;"  >
                            </div> <div class="item-overly-trans"> <div class="rating-stars d-flex text-white"> <span style="font-family: ar">` + courses[pointer].type + `</span> </div>
                            </div>
                            </div>
                            <div class="item-card2-icons tropicana">
                            <a href="javascript:void(0)" onclick="copyLink(`+courses[pointer].id+`)" data-toggle="tooltip" title="إنسخ رابط الدوره" class="item-card2-icons-l favItem1" > <i class="fa fa-share-alt"></i></a>
                            @auth
                                `+FavouriteIcon+`
                            @endauth

                            @guest
                                <a href="{{route('login')}}" class="item-card2-icons-l favItem2" data-toggle="tooltip" title="إضافه الدوره للمفضله"> <i class="fa fa-heart text-white"></i></a>
                            @endguest
                            </div>
                            <div class="card-body courses_body" style="font-family: ar;color: #808080">
                                <div class="course_category" style="width: 155px;padding-right: 20px;margin-bottom: 20px"> 
                                    <ul class="row"> 
                                        <li style="padding-left: 20px">تطوير الذات</li> 
                                        <li> <img src="`+courses[pointer].cat_img+`" width="25px" height="25px"/> </li> 
                                    </ul> 
                                </div>
                                <div class="item-card2"> 
                                    <div class="item-card2-desc"> 
                                        <div class="item-card2-text mb-3"> 
                                            <h4 class="" style="color: #808080">` + courses[pointer].title.substring(0, 28) + `</h4>
                                        </div> 
                                        <p class="" style="padding-top: 20px;text-align: justify">` + courses[pointer].description.substring(0, 150) +  `</p> 
                                    </div>
                                </div> 
                                <div class="crs_info w-100 d-flex justify-content-between">
                                    <span>الدكتور `+courses[pointer].instructor+`</span>
                                    <span>`+courses[pointer].date+`</span>
                                </div>
                            </div> 
                            
                            <div class="card-footer"> <div class="item-card2-footer courses_footer"> <ul class=""> <li> <a class="float-left priceItem">  <p style="font-family:ar;font-size: 25px">`+ courses[pointer].price_after_discount + `  <span class="text-danger" style="float: right;padding-top: 4px">SR</span></p></a> </li> <li> <a href="`+origin+`/course-details/`+courses[pointer].id+`" class="btn btn-danger  text-white float-right" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);border-radius: 10px;font-family:ar"> عرض الدوره</a></li></ul> </div> </div></div>`);
                        }

                        var owl = $("#myCarousel1");
                        owl.owlCarousel({
                            margin: 25,
                            items: 3,
                            loop: true,
                            nav: true,
                            autoplay: true,
                            dots: false,
                            rtl: true,
                            responsive: {
                                0: {
                                    items: 1
                                },
                                800: {
                                    items: 3
                                },
                                1300: {
                                    items: 3
                                }
                            }
                        });
                    }else{
                        $('.courses_area').html('<h3 class="text-center" style="font-family: ar;color: #e64448">لا توجد دورات</h3>');
                    }
                }
            })
        }

        function addFavourites(e){
            e.preventDefault();
            var id = e.target.getAttribute('data-id');
            $.ajax({
               url:'/storeFavourites/'+id,
               method:'GET',
               success:function(response){
                   if(response == 1){
                     $('.favss'+id).removeClass('text-white');
                     $('.favss'+id).addClass('text-danger');
                     $('.favss'+id).attr('onclick','removeFavourites(event)');
                     $('.favss'+id).addClass('favss2'+id).removeClass('favss'+id);
                   }else{
                       window.location.replace('{{url("/login")}}');
                   }

               },error:function(error){
                   console.log(error);
               },
            });
        }

        function removeFavourites(e){
            e.preventDefault();
            var id = e.target.getAttribute('data-id');

            $.ajax({
               url:'/removeFavs/'+id,
               method:'GET',
               success:function(response){
                   console.log(response);
                   if(response == 1){
                     $('.favss2'+id).removeClass('text-danger');
                     $('.favss2'+id).addClass('text-white');
                     $('.favss2'+id).attr('onclick','addFavourites(event)');
                     $('.favss2'+id).addClass('favss'+id).removeClass('favss2'+id);
                   }else{
                       console.log('there is issue');
                   }

               },error:function(error){
                   console.log(error);
               },
            });
        }


    </script>


    <script>
        function copyLink(id){

            var copyText = document.getElementById("myInput");
            copyText.value = window.location.origin + '/course-details/'+ id;

            copyText.select();
            copyText.setSelectionRange(0, 99999);

            document.execCommand("copy");
        }
        
    </script>


@endcomponent
