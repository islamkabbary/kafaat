@component('components.app')
    <x-header />
    <br><br><br>
    <style>
        .card{
            box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);
        }


        .tabs-menu ul.eductaional-tabs li a{
            margin: 25px;
        }

        .rotate {
            content: url("../assets/images/up.png");

            /*transform: rotate(180deg);*/
            transition: .3s;
        }
        .rotate2 {
            content: url("../assets/images/down.png");

            transition: .3s;
        }

        .tabLink{
            width: 33%;
            text-align: center;
        }

        .background_color{
            background-color: #AAAAA961;

        }
        .background_color1{
            background-color: #dc3545;

        }


        .front_color{

            color: #808080;
        }

        .front_color1{
            color: white;
        }




        input[type="date"] {
            display:block;
            position:relative;
            padding:1rem 3.5rem 1rem 0.75rem;

            font-size:1rem;
            font-family:monospace;

            border:1px solid #8292a2;
            border-radius:0.25rem;
            background:
                white
                url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='22' viewBox='0 0 20 22'%3E%3Cg fill='none' fill-rule='evenodd' stroke='%23688EBB' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' transform='translate(1 1)'%3E%3Crect width='18' height='18' y='2' rx='2'/%3E%3Cpath d='M13 0L13 4M5 0L5 4M0 8L18 8'/%3E%3C/g%3E%3C/svg%3E")
                right 1rem
                center
                no-repeat;

            cursor:pointer;
        }
        input[type="date"]:focus {
            outline:none;
            border-color:#3acfff;
            box-shadow:0 0 0 0.25rem rgba(0, 120, 250, 0.1);
        }

        ::-webkit-datetime-edit {}
        ::-webkit-datetime-edit-fields-wrapper {}
        ::-webkit-datetime-edit-month-field:hover,
        ::-webkit-datetime-edit-day-field:hover,
        ::-webkit-datetime-edit-year-field:hover {
            background:rgba(0, 120, 250, 0.1);
        }
        ::-webkit-datetime-edit-text {
            opacity:0;
        }
        ::-webkit-clear-button,
        ::-webkit-inner-spin-button {
            display:none;
        }
        ::-webkit-calendar-picker-indicator {
            position:absolute;
            width:2.5rem;
            height:100%;
            top:0;
            right:0;
            bottom:0;

            opacity:0;
            cursor:pointer;

            color:rgba(0, 120, 250, 1);
            background:rgba(0, 120, 250, 1);

        }

        input[type="date"]:hover::-webkit-calendar-picker-indicator { opacity:0.05; }
        input[type="date"]:hover::-webkit-calendar-picker-indicator:hover { opacity:0.15; }

        .checkmark__circle {
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            stroke-width: 2;
            stroke-miterlimit: 10;
            stroke: #7ac142;
            fill: none;
            animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
        }

        .checkmark {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            display: block;
            stroke-width: 2;
            stroke: #fff;
            stroke-miterlimit: 10;
            margin: 10% auto;
            box-shadow: inset 0px 0px 0px #7ac142;
            animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both;
        }

        .checkmark__check {
            transform-origin: 50% 50%;
            stroke-dasharray: 48;
            stroke-dashoffset: 48;
            animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
        }

        @keyframes stroke {
            100% {
                stroke-dashoffset: 0;
            }
        }
        @keyframes scale {
            0%, 100% {
                transform: none;
            }
            50% {
                transform: scale3d(1.1, 1.1, 1);
            }
        }
        @keyframes fill {
            100% {
                box-shadow: inset 0px 0px 0px 30px #7ac142;
            }
        }

        @keyframes floating {
            0% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(10px);
            }
            100% {
                transform: translateY(0px);
            }
        }

        @-webkit-keyframes animatebottom {
            from { bottom:-100px; opacity:0 }
            to { bottom:0px; opacity:1 }
        }

        @keyframes animatebottom {
            from{ bottom:-100px; opacity:0 }
            to{ bottom:0; opacity:1 }
        }
        .animate-bottom {
            position: relative;
            -webkit-animation-name: animatebottom;
            -webkit-animation-duration: 1s;
            animation-name: animatebottom;
            animation-duration: 1s
        }

        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }


        @-webkit-keyframes animatebottom {
            from { bottom:-100px; opacity:0 }
            to { bottom:0px; opacity:1 }
        }

        @keyframes animatebottom {
            from{ bottom:-100px; opacity:0 }
            to{ bottom:0; opacity:1 }
        }


        #fade {
            display: none;
            position: fixed;
            top: 0%;
            left: 0%;
            width: 100%;
            height: 100%;
            background-color: black;
            z-index: 1001;
            -moz-opacity: 0.8;
            opacity: .80;
            filter: alpha(opacity=80);
        }

        /*#light {*/
        /*    display: none;*/
        /*    position: absolute;*/
        /*    top: 50%;*/
        /*    left: 50%;*/
        /*    max-width: 600px;*/
        /*    max-height: 360px;*/
        /*    margin-left: -300px;*/
        /*    margin-top: -180px;*/
        /*    border: 2px solid #FFF;*/
        /*    background: #FFF;*/
        /*    z-index: 1002;*/
        /*    overflow: visible;*/
        /*}*/

        #boxclose {
            float: right;
            cursor: pointer;
            color: #fff;
            border: 1px solid #AEAEAE;
            border-radius: 3px;
            background: #222222;
            font-size: 31px;
            font-weight: bold;
            display: inline-block;
            line-height: 0px;
            padding: 11px 3px;
            position: absolute;
            right: 2px;
            top: 2px;
            z-index: 1002;
            opacity: 0.9;
        }

        .boxclose:before {
            content: "×";
        }

        #fade:hover ~ #boxclose {
            display:none;
        }

        .test:hover ~ .test2 {
            display: none;
        }
        #headerPopup{
            width:75%;
            margin:0 auto;
        }

        #headerPopup iframe{
            width:100%;
            margin:0 auto;
        }
        #container {
            width: 100%;
            height: 100%;
            top: 0;
            position: absolute;
            visibility: hidden;
            display: none;
            background-color: rgba(22,22,22,0.5); /* complimenting your modal colors */
        }
        #container:target {
            visibility: visible;
            display: block;
        }
        video::-webkit-media-controls-overlay-play-button {
            display: none;
        }
        .overlayHeader{
            background: rgb(128,16,3);
            background: linear-gradient(360deg, rgba(128,16,3,1) 0%, rgba(171,42,33,1) 100%);
            overflow: hidden;
        }

    </style>


        @if(session()->has('success'))
            <div id="messageErrorEngineer3" style="color:#4f695f;background-color:#f2f2f2;border-color:#AAAAA9;" class="alert alert-info">{{ Session::get('success') }}</div>
        @endif

      
    


    <!--Section-->
    <section class="sptb">
        <div class="container">
            <h1 class="text-center mt-5 mb-5 text-muted" style="font-weight:bold;font-family:ar;">تفاصيل الدورة</h1>
            <br>
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12">
                    <!--Coursed Description-->
                    <div class="card overflow-hidden">
                        @if($course->offer > 0)
                            <div class="ribbon ribbon-top-left text-danger"><span class="bg-danger" style="font-family: 'ab">عرض</span></div>
                        @endif
                        <div class="card-body">
                            <div class="item-det mb-4">
                                <a href="#" class="text-dark"><h3 class="font-weight-semibold" style="font-family: 'ab'; color: #808080">{{$course->title}}  <span style="    font-size: 18px;">({{$course->type}})</span> </h3></a>
                                <div class=" d-flex">

                                    <ul class="d-flex mb-0">
                                        <li class="mr-5"><a href="#" class="icons" style="font-family: 'ar'"><img src="{{asset('../assets/images/time.svg')}}" width="25px" height="15px"> {{$course->duration}} ساعة</a></li>
{{--                                        											<li class="mr-5"><a href="#" class="icons" style="font-family: 'ar'"></a></li>--}}

                                    </ul>

                                    <ul class="d-flex mb-0">
                                        <li class="mr-5"><a href="#" class="icons" style="font-family: 'ar'"><img src="{{asset('../assets/images/time.svg')}}" width="25px" height="15px"> {{$course->days}} يوم</a></li>
                                        {{--                                        											<li class="mr-5"><a href="#" class="icons" style="font-family: 'ar'"></a></li>--}}

                                    </ul>

                                    <ul class="d-flex mb-0">
                                        <li class="mr-5"><a href="#" class="icons" style="font-family: 'ar'"><img src="{{asset('../assets/images/sign in.svg')}}" width="25px" height="15px">  رقم الإعتماد {{$course->assurance_number}}</a></li>
                                        {{--                                        											<li class="mr-5"><a href="#" class="icons" style="font-family: 'ar'"></a></li>--}}

                                    </ul>

                                    <ul class="d-flex mb-0">
                                        <li class="mr-5"><a href="#" class="icons" style="font-family: 'ar'"><img src="{{asset('../assets/images/people.svg')}}" width="25px" height="15px"> @if($course->attendance_type == 0) رجالى @else  رجالى ونسائي @endif </a></li>
                                        {{--                                        											<li class="mr-5"><a href="#" class="icons" style="font-family: 'ar'"></a></li>--}}

                                    </ul>


                                    <div class="rating-stars d-flex ml-5">

                                    </div>
                                    <div class="rating-stars d-flex">
                                        <div class="rating-stars-container ml-2">
                                            <div class="rating-star sm">
                                                <i class="fa fa-heart"></i>
                                            </div>
                                        </div>
                                        {{$course->favourits_count}}
                                    </div>
                                </div>
                            </div>
                            <!-- product-slider class for overlay-->
                            <div class="">
                                <ul class="list-unstyled video-list-thumbs">
                                    <li class="mb-0">
                                        <a data-toggle="modal" data-target="#homeVideo" class="class-video p-0">
                                            @if($course->offer > 0)
                                                <div class="arrow-ribbon bg-danger" style="font-family: 'ar';margin-top:42px ">

                                                       خصم  {{$course->offer}} %



                                                </div>
                                            @endif
                                            <?php $ext = pathinfo($course->intro, PATHINFO_EXTENSION) ?>
                                                @if($ext == 'png' || $ext == 'jpg' || $ext == 'gif' || $ext == 'jpeg')
                                                    <img src="{{$course->intro}}" alt="img" class="img-responsive br-3" style="width: 100%;
    height: 100%;">
                                                    @else
                                            <video id="vid" width="100%"  controls disablePictureInPicture controlsList="nodownload" preload="metadata" style="video::-webkit-media-controls-overlay-play-button {
  display: none;
}">
                                                <source src="{{$course->intro}}" alt="img" class="img-responsive br-3" type="video/mp4">
                                                <source src="{{$course->intro}}" alt="img" class="img-responsive br-3" type="image/*">

                                            </video>
                                            {{--												<img src="https://d3c33hcgiwev3.cloudfront.net/yxO83REhEealrgo0ik8CQQ.processed/full/360p/index.webm?Expires=1609804800&Signature=fJHQoyB~kmTlbguEQEY2Brp5ss5OrB3nkQ6LqKYXiDgfDLjfwDhiqxvEBWyHaetZPGnL7nAWuvUP4R6pG3FmA8~ranFnUp14WuH682qxDhD0k1a42otCVSofVEIdFmXH1cKJWwZEQaCv6v24CPcY0BUyUuEFzYHyZuhebsjSXPI_&Key-Pair-Id=APKAJLTNE6QMUY6HBC5A" alt="img" class="img-responsive br-3">--}}
                                            <span id="vidPlay" class="fe fe-play-circle text-white class-icon"></span>
                                        @endif
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="accordion3">


                        <div class="wideget-user-tab wideget-user-tab3">
                            <div class="tab-menu-heading">
                                <div class="tabs-menu1">

                                    <!-- Tabs -->
                                    <ul class="nav" style="font-family: 'ab';">

                                        <li class="tabLink" ><a class=" tab_text course_tab active" data-toggle="tab" href="#tab-1" role="tab" >النظرة العامة</a></li>
                                        <li class="tabLink" ><a class="tab_text course_tab" data-toggle="tab" href="#tab-2" role="tab" >تفاصيل الدورة</a></li>
                                        <li class="tabLink" ><a class="tab_text course_tab" data-toggle="tab" href="#tab-3" role="tab"  >المدرب</a></li>
                                    </ul>

                                </div>
                            </div>
                        </div>


                        <div id="" class="card collapse show" data-parent="#accordion3">
                            <div class="card-block">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-1">


                                        <div class="card-body">
                                            <div class="mb-4 description">
                                                <p style="font-family: 'ar';color: #808080;line-height: 1.6;text-align: justify">{!!$course->overview!!}</p>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="tab-pane" id="tab-2">

                                        <div class="card-body">
                                            <div class="mb-4 description">
                                                <p style="font-family: 'ar';color: #808080;line-height: 1.6;text-align: justify">{!!$course->description!!}</p>
                                                <br>
                                                @if(count($course->registeredCourses) > 0)

                                                    <div class="text-center">
                                                        <h3  style="color:#808080;font-family:ar">محتوى دورة</h3>
                                                        <img src="{{asset('/assets/images/sub2.png')}}" style="width: 150px;height: 20px">

                                                    </div>
                                                    <br>  <br>
                                                    {{--                                                    <div id="accordion">--}}
                                                    {{--                                                        <div class="card">--}}
                                                    {{--                                                            <div class="card-header background_color1 con" role="tab" id="headingOne" >--}}
                                                    {{--                                                                <h5 class="mb-0">--}}
                                                    {{--                                                                    <a class="arrow"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">--}}
                                                    {{--                                                                        <img class="arrow-img rotate" src="{{asset('/assets/images/up.png')}}" style="width: 22px;height: 12px">--}}

                                                    {{--                                                                    </a>--}}
                                                    {{--                                                                    <button id="btn-1" style="font-family: 'ab';font-size: 19px" class="btn  front_color1 ">--}}

                                                    {{--                                                                        {{$course->registeredCourses[0]['content_title']}}--}}
                                                    {{--                                                                    </button>--}}


                                                    {{--                                                                </h5>--}}
                                                    {{--                                                            </div>--}}

                                                    {{--                                                            <div id="collapseOne" class="collapse show " aria-labelledby="headingOne" data-parent="#accordion">--}}
                                                    {{--                                                                <div class="card-body">--}}

                                                    {{--                                                                            <div class="row">--}}

                                                    {{--                                                                                <div class="col-md-8 col-sm-6">--}}
                                                    {{--                                                                                   <p style="font-family: 'ab';color: #808080;"> <img src="{{asset('../assets/images/vidicon.png')}}" width="20px" height="20px"> &nbsp;&nbsp;  مقدمة </p>--}}

                                                    {{--                                                                                </div>--}}

                                                    {{--                                                                                <div class="col-md-2 col-sm-4">--}}
                                                    {{--                                                                                    <p><a style="font-family: 'ar';color: #808080;">00:59  </a></p>--}}

                                                    {{--                                                                                </div>--}}

                                                    {{--                                                                                <div class="col-md-2 col-sm-6">--}}

                                                    {{--                                                                                   <p><a style="font-family: 'ab';color: #808080;text-decoration: underline" href="#">عرض</a></p>--}}
                                                    {{--                                                                                </div>--}}
                                                    {{--<div class="divider"></div>--}}




                                                    {{--                                                                            </div>--}}


                                                    {{--                                                                                                                           </div>--}}
                                                    {{--                                                            </div>--}}
                                                    {{--                                                        </div>--}}
                                                    @foreach($course->registeredCourses as $registeredCourse)
                                                        <div class="card">

                                                            <div class="card-header @if ($loop->first) background_color1 @else background_color @endif" onclick="arrowClick({{$registeredCourse->id}})" id="heading_{{$registeredCourse->id}}" data-toggle="collapse" href="#collapse_{{$registeredCourse->id}}" role="button" aria-expanded="false" aria-controls="collapse_{{$registeredCourse->id}}" >
                                                                <h5 class="mb-0">
                                                                    <a class="arrow_{{$registeredCourse->id}}" onclick="arrowClick({{$registeredCourse->id}})" data-toggle="collapse" href="#collapse_{{$registeredCourse->id}}" role="button" aria-expanded="false" aria-controls="collapse_{{$registeredCourse->id}}">
                                                                        <img class="arrow-img-{{$registeredCourse->id}} @if ($loop->first) rotate @else rotate2 @endif" onclick="arrowClick({{$registeredCourse->id}})" src="{{asset('/assets/images/down.png')}}" style="width: 22px;height: 12px">



                                                                    </a>
                                                                    <button id="btn-{{$registeredCourse->id}}" style="font-family: 'ab';" class="btn @if ($loop->first) front_color1 @else front_color @endif  collapsed" >


                                                                        {{$registeredCourse->content_title}}
                                                                    </button>
                                                                </h5>
                                                            </div>
                                                            <div id="collapse_{{$registeredCourse->id}}" class="collapse   @if ($loop->first) show @endif" >
                                                                <div class="card-body" style="font-family: 'ab';">

                                                                    <div class="row">
                                                                        @if($registeredCourse->media)
                                                                    @foreach($registeredCourse->media as $media)
                                                                        <!-- start row one -->
                                                                            <div class=" col-md-6 col-sm-6 col-xs-4">
                                                                                @if($media->media_type == 1)
                                                                                    <p><a style="font-family: 'ab';color: #808080"> <img src="{{asset('../assets/images/vidicon2.png')}}" width="20px" height="20px"> &nbsp;
                                                                                @else
                                                                                    <p>
                                                                                        <a style="font-family: 'ab';color: #808080"> <img src="{{asset('../assets/images/file.svg')}}" width="20px" height="20px"> &nbsp;
                                                                                            @endif
                                                                                            {{$media->media_title}}
                                                                                        </a>

                                                                                    </p>

                                                                            </div>
                                                                        <!-- Override Course Media Locking On Paid For this User -->
                                                                            @if($course->paid == 1)
                                                                                 @php($media->media_lock = 0)
                                                                            @endif
                                                                            <div class="  col-md-4 col-sm-2 col-xs-4">
                                                                                <p>



                                                                                    @if($media->media_type == 1)
                                                                                        @if($media->media_lock == 1)
                                                                                            <a href="javascript:void(0)" style="font-family: 'ab';color: #808080;text-decoration: underline"> عرض</a>
                                                                                </p>
                                                                                @else
                                                                                    <div id="light" class="modal" tabindex="-1" role="dialog">
                                                                                        <div class="modal-dialog" role="document">
                                                                                            <div class="modal-content" style="width: 600px">
                                                                                                <div class="modal-header" style="background-color: #dc3545;padding: 10px">
                                                                                                    <h5 class="modal-title" style="font-family: 'ar';color: white;padding: 5px 10px 0px 0px;">{{$media->media_title}}</h5>
                                                                                                    <button type="button" class="close" onclick="lightbox_close({{$media->id}})" aria-label="Close">
                                                                                                        <span aria-hidden="true" style="color: white;font-size: 25px;padding-left: 10px;">&times;</span>
                                                                                                    </button>
                                                                                                </div>
                                                                                                <div class="modal-body" style="background-color: #000000">
                                                                                                    <video id="{{$media->id}}" disablePictureInPicture   controlsList="nodownload" controls  style="width: -webkit-fill-available;">
                                                                                                        <source src="{{$media->media_file}}" alt="img" class="img-responsive br-3" type="video/mp4">

                                                                                                    </video>


                                                                                                </div>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>




                                                                                    <p> <a href="javascript:void(0)" onclick="lightbox_open({{$media->id}});" style="font-family: 'ab';color: #808080;text-decoration: underline">  عرض</a></p>



                                                                                @endif
                                                                                @else
                                                                                    <p>
                                                                                    @if($media->media_lock == 1)
                                                                                        <a href="javascript:void(0)" style="font-family: 'ab';color: #808080;text-decoration: underline"> تنزيل</a>

                                                                                    @else
                                                                                        <a href="{{$media->media_file}}" style="font-family: 'ab';color: #808080;text-decoration: underline" download> تنزيل</a>


                                                                                        @endif

                                                                                        @endif

                                                                                        </p>

                                                                            </div>

                                                                            <div class="  col-md-2 col-sm-2 col-xs-4">
                                                                                <p>
                                                                                    @if($media->media_lock == 1)
                                                                                        <img src="{{asset('../assets/images/lock.svg')}}" width="15px" height="20px">


                                                                                  @else

{{--                                                                                    <p style="font-family: 'ab';color: #808080;" >$duration</p>--}}

                                                                                    @endif
                                                                                </p>
                                                                            </div>


                                                                            <!-- end row one -->
                                                                            <br>
                                                                            {{--                                                                        <!-- start row two -->--}}
                                                                            {{--                                                                        <div class=" col-md-6 col-sm-6 col-xs-4">--}}
                                                                            {{--                                                                            <p style="font-family: 'ab';color: #808080"> <img src="{{asset('../assets/images/file.svg')}}" width="20px" height="20px"> &nbsp;    مصادر الدورة </p>--}}

                                                                            {{--                                                                        </div>--}}

                                                                            {{--                                                                        <div class="col-md-4 col-sm-2 col-xs-4">--}}
                                                                            {{--                                                                            <p>--}}

                                                                            {{--                                                                                <a href="#" style="font-family: 'ab';color: #808080;text-decoration: underline">تنزيل</a>--}}
                                                                            {{--                                                                            </p>--}}

                                                                            {{--                                                                        </div>--}}

                                                                            {{--                                                                        <div class="col-md-2 col-sm-4 col-xs-4">--}}
                                                                            {{--                                                                            <p>--}}
                                                                            {{--                                                                            <img src="{{asset('../assets/images/lock.svg')}}" width="15px" height="20px">--}}
                                                                            {{--                                                                            </p>--}}
                                                                            {{--                                                                        </div>--}}

                                                                            {{--                                                                        <!-- end row two -->--}}



                                                                        @endforeach
                                                                            @else
                                                                        <p style="font-family: 'ab';color: #808080;text-decoration: underline">لم يتم رفع المحتوى بعد !</p>
                                                                        @endif

                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>

                                                    @endforeach





                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="tab-3">

                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img src="{{$course->instructor_img}}" class="brround avatar-xxl" alt="user" style="width: 125px;height: 125px">
                                                </div>

                                                <div class="col-md-8">
                                                    <a href="#" class="text-dark"><h4 class="mt-3 mb-1 font-weight-semibold" style="font-family: 'ar';color: #808080">{{$course->instructor}}</h4></a>

                                                    <p style="font-family: 'ar';color: #808080">{!!!$course->instructor_overview!!}</p>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>





                    <!--/Coursed Description-->
                </div>
                <!--Right Side Content-->
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-5 text-center">
                                <div class="text-dark mb-2">
                                    @if($course->offer)
                                     <span style="font-family:'ar';font-size: 45px;color: #808080">{{intVal($course->price_after_discount)}}  <span class="text-danger" style="padding-top: 22px;font-size: 25px">SAR</span></span>
                                    <span class=" h3 font-weight-normal ml-1" style="color: #808080;font-size: 30px"><span class="strike-text">&nbsp;{{intVal($course->price)}}</span></span>
                                    @else
                                        <a class="priceItem">  <p style="font-family:'ar';font-size: 45px;color: #808080"> <span class="text-danger" style="padding-top: 22px;font-size: 25px">SAR</span>{{intVal($course->price)}} </p></a>

                                    @endif
                                </div>

                            </div>
                            <div class="">

                                {{--									<a href="#" class="btn btn-info btn-lg btn-block">Trail Now</a>--}}
                                @guest
                                <a href="/showPageEnroll/{{$course->id}}" class="btn btn-danger btn-lg btn-block " style="font-family: 'ab'">شراء الأن</a>
                                @else
                                    @if($course->paid == 1)
                                    <button href="javascript:void()" class="btn btn-default btn-lg btn-block " style="font-family: 'ab'" disabled=""> تم شراء هذة الدورة</button>
                               @else
                                        <a href="/showPageEnroll/{{$course->id}}" class="btn btn-danger btn-lg btn-block " style="font-family: 'ab'">شراء الأن</a>
                                        <a onclick="addToCarts(event)" data-id="{{$course->id}}" class="btn btn-info btn-lg btn-block text-white"  style="font-family:ab;cursor:pointer">إضافة إلى العربة</a>

                                    @endif
                                    @endguest
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title" style="font-family: 'ab'; color: #808080">مقدم الدورة</h3>
                        </div>
                        <div class="card-body  item-user">
                            <div class="profile-pic mb-0">
                                <img src="{{$course->instructor_img}}" class="brround avatar-xxl" alt="user">
                                <div >
                                    <a href="#" class="text-dark"><h4 class="mt-3 mb-1 font-weight-semibold" style="font-family: 'ar';color: #808080">{{$course->instructor}}</h4></a>

                                </div>
                                <br>
                                {{--                                    <h6 class="mt-2 mb-0" style="color:#808080;font-family: ar">--}}
                                {{--                                        <a href="#" class="btn  btn-sm"  style="background-color: #dcdcdc52;color: grey">المزيد...</a>--}}
                                {{--                                        <a href="#" class="btn  btn-sm" style="background-color: #dcdcdc52;color: grey">145 المشاةدات</a>--}}
                                {{--                                        <a href="#" class="btn  btn-sm"  style="background-color: #dcdcdc52;color: grey">850 الدورة</a>--}}
                                {{--                                    </h6>--}}
                            </div>
                        </div>

                    </div>
{{--                    <div class="card">--}}
{{--                        <div class="card-header">--}}
{{--                            <h3 class="card-title" style="font-family: 'ab'; color: #808080">الكلمات المفتاحية</h3>--}}
{{--                        </div>--}}
{{--                        <div class="card-body product-filter-desc">--}}
{{--                            <div class="product-tags clearfix">--}}

{{--                                <ul class="list-unstyled mb-0">--}}
{{--                                    @if($course->tags)--}}
{{--                                    <div class="row">--}}


{{--                                            <?php $tags = json_decode($course->tags)  ?>--}}
{{--                                            @foreach($tags as $tag)--}}

{{--                                        <div class="col-md-4">--}}
{{--                                            <br>--}}
{{--                                            <li><span  class="btn btn-block" style="background-color: #ebececb5;font-family: 'ab';color: #808080;    width: fit-content;">{{$tag}}</span></li>--}}
{{--                                        </div>--}}



{{--                                                @endforeach--}}




{{--                                    </div>--}}

{{--                                    @else--}}
{{--                                        <h5 class="text-center" style="color: #808080;font-family: 'ar'">لا يوجد كلمات مفتاحية لهذة الدورة</h5>--}}

{{--                                    @endif--}}


{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title" style="font-family: 'ab'; color: #808080">شارك دورتنا</h3>
                        </div>
                        <div class="card-body product-filter-desc">
                            <div class="product-filter-icons text-center">
                                <a  href="https://www.facebook.com/sharer/sharer.php?u={{Request::url()}}" target="_blank" class=""><img src="{{asset('uploads/social/f.png')}}" width="35px" height="35px"></a>
                                <a href="mailto:user@domain.com?Subject=Hello%20User?url={{Request::url()}}" target="_blank" class=""><img src="{{asset('uploads/social/g.png')}}" width="35px" height="35px"></a>
                                <a href="https://twitter.com/intent/tweet?text=courses_details&amp;url={{Request::url()}}" target="_blank" class=""><img src="{{asset('assets/images/twitter.svg')}}" width="35px" height="35px"></a>
                                <a  href="https://instagram.com?url={{Request::url()}}" target="_blank" class=""><img src="{{asset('assets/images/instagram.png')}}" width="35px" height="35px"></a>
                                <a  href="https://wa.me/{{Session::get('whatsapp_linkHeader')}}" target="_blank" class=""><img  src="{{asset('assets/images/whatsappFooter.svg')}}" width="35px" height="35px"></a>

                                <a  href="#" target="_blank" class="" style="width: 25px"><img src="{{asset('assets/images/telegram.svg')}}" width="35px" height="35px"></a>

                            </div>
                        </div>
                    </div>
                </div>
                <!--Right Side Content-->
            </div>
        </div>
        <?php $arrayFavourites = array(); ?>
        @if($courses->count() > 0)
            <div class="container">
                <!--/Right Side Content-->

                <div class="row ">
                    @foreach($courses as $course)
                        <div class="col-md-4">
                            <div class="card overflow-hidden" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);border-radius: 10px;">
                                <div class="card mb-0 "  style="height: 625px">
                                    <div class="item-card7-img" style="height: 745px">
                                        <a href="page-details.html"></a>
                                        <div class="item-card7-imgs" >
                                            <div class="overlay"></div>

                                            <img src="{{$course->image_cover}}" alt="img" class="cover-image" style="height:auto;" >

                                            {{--                            <div class="item-tag">--}}
                                            {{--                                <h4  class="mb-0">SR {{$course->price}}</h4>--}}
                                            {{--                            </div>--}}
                                        </div>
                                        <div class="item-overly-trans">
                                            <input type="text" id="myInput">
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
                                    <div class="item-card2-icons tropicana3">
                                        <a  onclick="copyLink({{$course->id}})" href="javascript:void(0);" data-toggle="tooltip" title="إضغط لنسخ رابط الدورة" class="item-card2-icons-l favItem1 " >
                                            <i class="fa fa-share-alt" ></i></a>
                                        @auth
                                            <?php if(in_array($course->id , $arrayFavourites)){
                                            ?>
                                            <a style="cursor:pointer;" class="item-card2-icons-l favItem2" data-toggle="tooltip" title="إضافة الدورة للمفضلة"> <i onclick="removeFavourites(event)" data-id="{{$course->id}}" class="fa fa-heart favss2{{$course->id}} text-danger"></i></a>
                                            <?php

                                            }else{
                                            ?>
                                            <a style="cursor:pointer;" class="item-card2-icons-l favItem2" data-toggle="tooltip" title="إضافة الدورة للمفضلة"> <i onclick="addFavourites(event)" data-id="{{$course->id}}" class="fa fa-heart favss{{$course->id}} text-white"></i></a>
                                            <?php
                                            }
                                            ?>

                                        @endauth
                                        @guest
                                            <a href="{{route('login')}}" class="item-card2-icons-l favItem2" data-toggle="tooltip" title="إضافة الدورة للمفضلة"> <i class="fa fa-heart text-white"></i></a>
                                        @endguest
                                    </div>
                                    <div class="card-body courses_body" style="font-family: ar;color: #808080">
                                        <div class="course_category" style="width: 155px;padding-right: 20px;margin-bottom: 20px">
                                            <ul class="row">
                                                <li style="padding-left: 20px">تطوير الذات</li>
                                                <li> <img src="{{$course->cat_img}}" width="25px" height="25px"/> </li>
                                            </ul>

                                        </div>
                                        <div class="item-card2">
                                            <div class="item-card2-desc" >
                                                <div class="item-card2-text mb-3">
                                                    <h4 class="" style="color: #808080">{{Str::limit($course->title,30)}}</h4>
                                                </div>
                                                <p class="" style="text-align: justify">{{Str::limit($course->description,150)}} </p>
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
                                                    <a class="float-left priceItem">  <p style="font-family:ar;font-size: 25px">{{$course->price_after_discount}}  <span class="text-danger" style="float: right;padding-top: 4px">SR</span></p></a>

                                                </li>

                                                <li>
                                                    <a href="{{url('course-details/'.$course->id)}}" class="btn btn-danger  text-white float-right" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);border-radius: 10px;font-family:ar"> عرض الدورة</a>

                                                </li>
                                            </ul>





                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
                <div  class="modal" id="variableModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                    <div class="modal-dialog modal-sm modal-notify modal-success" role="document" style="max-width: 400px;background-color: wheat">

                        <div class="modal-content text-center" style="background: white;">

                            <div class="modal-header d-flex justify-content-center text-center " >


                            </div>

                            <div class="modal-body">
                                <h6 class="heading" id="modal_message" style="color: black;font-family: ar" ></h6>

                            </div>


                        </div>

                    </div>
                </div>
            </div>
        @endif

    </section><!--/Section-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $('input[id$=tbDate]').datepicker({});
            setTimeout(function(){
                $('#messageErrorEngineer3').fadeOut(2000);// or fade, css display however you'd like.
            }, 2000);
        });
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
        function addToCarts(e){
            e.preventDefault();
            var id2 = e.target.getAttribute('data-id');
            $.ajax({
                url:'/storeCartFromCourse/'+id2,
                method:'GET',
                success:function(response){
                    if(response == 1){
                        $('#modal_message').text('لقد تم إضافة الدورة بنجاح في العربة الخاصة بك');
                        $('.modal-header').empty().html('<svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg>');
                        $('#variableModal').fadeIn(450).show();
                    }else if(response == 0){
                        $('#modal_message').text('لقد تم إضافة هذة الدورة من قبل في العربة الخاصة بك');
                        $('.modal-header').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>');
                        $('#variableModal').fadeIn(450).show();
                    }else{
                        window.location.replace('{{url("/login")}}');
                    }
                    setTimeout(function (){
                        $('#variableModal').fadeOut("slow").hide();
                    },5000);
                },error:function(error){
                    console.log(error);
                }
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

    <script>
        function arrowClick(row){
            $('#heading_'+row).toggleClass('background_color background_color1');



            $('#btn-'+row).toggleClass('front_color front_color1');



            $('.arrow-img-'+row).toggleClass('rotate2 rotate');


        }

    </script>
    <script>
        $('#vidPlay').click(function() {
            var video = $("#vid").get(0);





            if ( video.paused ) {
                $('#vidPlay').css('display' , 'block');
                $('#vidPlay').toggleClass('fe fe-pause-circle text-white class-icon fe fe-play-circle text-white class-icon');
                video.play();

            } else
            {

                $('#vidPlay').toggleClass('fe fe-play-circle text-white class-icon fe fe-pause-circle text-white class-icon');
                setTimeout(function (){
                    $('#vidPlay').css('display' , 'none');
                },5000)
                video.pause();
            }

            return false;


        });

        // $('#vidPlay').hover(function (){
        //
        //         var video = $("#vid").get(0);
        //
        //
        //
        //
        //
        //         if ( video.paused ) {
        //             $('#vidPlay').css('display' , 'block');
        //             $('#vidPlay').toggleClass('fe fe-pause-circle text-white class-icon fe fe-play-circle text-white class-icon');
        //
        //
        //         } else
        //         {
        //
        //             $('#vidPlay').toggleClass('fe fe-play-circle text-white class-icon fe fe-pause-circle text-white class-icon');
        //             setTimeout(function (){
        //                 $('#vidPlay').css('display' , 'none');
        //             },5000)
        //         }
        //
        //         return false;
        //
        // });

    </script>
    <script>


        function lightbox_open(id) {
            $('#light').fadeIn(450).modal('show');

        }

        function lightbox_close(id) {
            var lightBoxVideo = document.getElementById(id);
            $('#light').modal('hide').fadeOut(450);
            lightBoxVideo.pause();
        }
    </script>
@endcomponent
