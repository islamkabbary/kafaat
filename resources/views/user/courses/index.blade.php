@component('components.app')
<x-header />

<style>
    ::-webkit-inner-spin-button {
        display:none;
    }
    ::-webkit-calendar-picker-indicator { background-color:white}
    input[type=date]{
        font-size:25px;
    }
    ::-webkit-datetime-edit-text { color:#555555}
    ::-webkit-datetime-edit-month-field { color:#555555 }
    ::-webkit-datetime-edit-day-field { color: #555555; }
    ::-webkit-datetime-edit-year-field { color:#555555; }
    ::-webkit-calendar-picker-indicator{
        background-image: url('../assets/images/down.svg');
        background-position:center;
        background-size:20px 20px;
        background-repeat:no-repeat;
        color:rgba(204,204,204,0);
    }

    ::-webkit-datetime-edit-year-field:not([aria-valuenow]),
    ::-webkit-datetime-edit-month-field:not([aria-valuenow]),
    ::-webkit-datetime-edit-day-field:not([aria-valuenow]) {
        color: transparent;
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


    .vendetta{
        height: 425px;
    }
    @media only screen and (width: 1024px){
        .vendetta{
            height: 200px;
        }
    }
    .ui-datepicker-calendar {
        display: none;
    }
</style>

<br><br><br>


</div>
{{--<div style="  background: rgb(128,16,3);--}}
{{--        background: linear-gradient(360deg, rgba(128,16,3,1) 0%, rgba(171,42,33,1) 100%);--}}
{{--        overflow: hidden;">--}}
{{--    <div class="section-title center-block text-center courses_title_header" style="background-color: #dad7d785;background: url('../assets/images/courseBCK.jpg') no-repeat center center  ;background-size: cover;">--}}
{{--        <h2 style="color:#ffffff;font-family:ar"> قائمه الدورات</h2>--}}


{{--    </div>--}}
{{--</div>--}}


<section class="sptb" >
    <div class="container" >
        <h1 class="text-center mt-5 mb-5 text-muted" style="font-weight:bold;font-family:ar;">قائمة الدورات</h1>
        <br>
        <div class="row">
            <!--Right Side Content-->
            <div class="col-xl-3 col-lg-4 col-md-4">

                <div class="card mb-0" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);border-radius: 10px;">
                    <div class="card-header">
                        <h3 class="card-title" style="font-family: 'ab'; color: #808080">مجالات الدورات</h3>
                    </div>
                    <div class="card-body">
                        <div class="" id="container">
                            <div class="filter-product-checkboxs">
                                @foreach($specialists as $specialist)
                                    <label class="custom-control custom-checkbox mb-3">
                                        <input onclick="getCoursesBySpecialist({{$specialist->id}})" id="spec_id_input-{{$specialist->id}}" type="checkbox" class="custom-control-input" name="checkbox7" value="option3">
                                            <span class="custom-control-label">
                                				<a style="font-family: 'ab';color: #AAAAA9 ">{{$specialist->title}}<span class="label label-secondary float-left" style="color: #AAAAA9;background-color: #F2F2F2">{{$specialist->courses2($specialist->id)}}</span></a>
                                			</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>

                @if($specialists->count() > 8)
                    <a href="#" class="btn btn-danger btn-sm  center-block" style="width: 120px;font-family: 'ab'">المزيد</a><br><br>
                @endif
                    <div class="card-header border-top">
                        <h3 class="card-title" style="font-family: 'ab'; color: #808080">النوع</h3>
                    </div>
                    <div class="card-body">
                        <label class="custom-control custom-checkbox mb-3">
                            <input onclick=" getCoursesByTypeId(1)" id="type_id_input-1"   type="checkbox" class="custom-control-input" name="checkbox7" value="option3">
                            <span class="custom-control-label">
                                <a onclick=" getCoursesByTypeId(1)" id="type_id_input-1"   style="font-family: 'ab';color: #AAAAA9">حضورى</a>
                            </span>
                        </label>
                        <label class="custom-control custom-checkbox mb-3">
                            <input onclick=" getCoursesByTypeId(2)"  id="type_id_input-2" type="checkbox" class="custom-control-input" name="checkbox7" value="option3">
                            <span class="custom-control-label">
                                <a onclick=" getCoursesByTypeId(2)"  id="type_id_input-2" style="font-family: 'ab';color: #AAAAA9">عن بعد</a>
                            </span>
                        </label>
                        <label class="custom-control custom-checkbox mb-3">
                            <input onclick=" getCoursesByTypeId(3)"  id="type_id_input-3"  type="checkbox" class="custom-control-input" name="checkbox7" value="option3">
                            <span class="custom-control-label">
                                <a onclick=" getCoursesByTypeId(3)" id="type_id_input-3"   style="font-family: 'ab'; color: #AAAAA9">مشاهده</a>
                            </span>
                        </label>
                    </div>
                    
                </div>
            </div>
            <br><br>
            <div class="col-xl-9 col-lg-8 col-md-8" >
            <!--/Right Side Content-->

                    <div class="row fetchDataHere" id="myDiv">

                <!--Coursed lists-->
                <?php $arrayFavourites = array(); ?>
                @if($courses->count() > 0)
                    @foreach($courses as $course)
                                <div class="col-lg-6 col-md-6 col-xl-4 " >
                        <div class="card overflow-hidden" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);border-radius: 10px;">
                            @if($course->offer > 0)
                            <div class="ribbon ribbon-top-right text-danger"><span class="bg-danger" style="font-family: 'ab'">عرض</span></div>
                            @endif
                                <div class="card mb-0 "  style="height: 615px;" >
                                <div class="item-card7-img vendetta" style="height: 400px">
                                    <a href="page-details.html"></a>
                                    <div class="item-card7-imgs" >

                                        <div class="overlay"></div>

                                        <img src="{{$course->image_cover}}" alt="img" class="cover-image" style="height:200px;" >

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
                                <div class="item-card2-icons tropicana2">
                                    <a  onclick="copyLink({{$course->id}})" href="javascript:void(0);" data-toggle="tooltip" title="إضغط لنسخ رابط الدوره" class="item-card2-icons-l favItem1 " >
                                        <i class="fa fa-share-alt" ></i></a>
                                            @auth
                                            <?php if(in_array($course->id , $arrayFavourites)){
                                                ?>
                                                <a style="cursor:pointer;" class="item-card2-icons-l favItem2"  data-toggle="tooltip" title="إزاله الدوره من المفضله"> <i onclick="removeFavourites(event)" data-id="{{$course->id}}" class="fa fa-heart favss2{{$course->id}} text-danger"></i></a>
                                            <?php

                                            }else{
                                                ?>
                                                <a style="cursor:pointer;" class="item-card2-icons-l favItem2" data-toggle="tooltip" title="إضافه الدوره للمفضله" > <i onclick="addFavourites(event)" data-id="{{$course->id}}" class="fa fa-heart favss{{$course->id}} text-white"></i></a>
                                            <?php
                                            }
                                            ?>

                                            @endauth
                                            @guest
                                                <a href="{{route('login')}}" class="item-card2-icons-l favItem2" data-toggle="tooltip" title="إضافه الدوره للمفضله"> <i class="fa fa-heart text-white"></i></a>
                                            @endguest
                                </div>
                                <div class="card-body courses_body" style="font-family: ar;color: #808080">
                                    <div class="course_category" style="width: 155px;padding-right: 20px;margin-bottom: 20px">
                                        <ul class="row">
                                            <li style="padding-right: 20px;margin-left:10px;font-family: 'ab'; color: #ffffff">
                                                {{$course->specialist->title}}</li>
                                            <li> <img src="{{asset('uploads/courses/images/category.png')}}" width="25px" height="25px"/> </li>

                                        </ul>

                                    </div>
                                    <div class="item-card2">
                                        <div class="item-card2-desc" >
                                            <div class="item-card2-text mb-3">
                                                <h4 class="course_title" style="color: #808080;font-size: 18px">{{Str::limit($course->title,27)}}</h4>
                                            </div>
                                            <p class="" style="text-align: justify;padding-top: 30px">{{Str::limit($course->description,150)}} </p>
                                             @if($course->date < date('Y-m-d'))
                                            <span class="" style="color: darkred">غير متاح التسجيل</span>
                                            @else
                                            <span class="" style="color: green">متاح التسجيل</span>
                                            @endif
                                        </div>
                                        <div class="crs_info w-100 d-flex justify-content-between">
                                            <span> {{$course->instructor}}</span>
                                            <span>{{$course->date}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="item-card2-footer courses_footer">
                                        <ul class="">
                                            <li>
                                                <a class="float-left priceItem">  <p style="font-family:ar;font-size: 25px">@if($course->offer){{$course->price_after_discount}} @else {{$course->price}} @endif   <span class="text-danger" style="float: right;padding-top: 4px">SR</span></p></a>
                                            </li>
                                            <li>
                                                <a href="{{url('/course-details/'.$course->id)}}" class="btn btn-danger  text-white float-right" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);border-radius: 10px;font-family:ar"> عرض الدوره</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                                </div>
                @endforeach
                <ul class="pagination mb-0">
                    {!! $courses->withQueryString()->links('pagination::bootstrap-5') !!}
                </ul>
                @else
                <div class="card overflow-hidden" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);border-radius: 10px;">
                    <h3 class="text-danger text-center" style="font-family: 'ar'">لا توجد دورات</h3>
                </div>
            @endif
                <!--/Coursed lists-->
            </div>




            </div>
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
</section>

<!--Section-->
{{--<div class="card mb-0">--}}
{{--    <div class="card-header">--}}
{{--        <h3 class="card-title">Specialists</h3>--}}
{{--    </div>--}}
{{--    <div class="card-body">--}}
{{--        <div class="" id="container">--}}
{{--            <div class="filter-product-checkboxs">--}}
{{--                @foreach($specialists as $specialist)--}}
{{--                    <label class="custom-control custom-checkbox mb-3">--}}
{{--                        <input onclick="getCoursesBySpecialistId({{$specialist->id}})" id="spec_id_input-{{$specialist->id}}" type="checkbox" class="custom-control-input" name="checkbox7" value="option3">--}}
{{--                        <span class="custom-control-label">--}}
{{--												<a href="#"  class="text-dark">{{$specialist->title}}<span class="label label-secondary float-right">{{$specialist->courses->count()}}</span></a>--}}
{{--											</span>--}}
{{--                    </label>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="card-footer">--}}
{{--        <a href="#" class="btn btn-primary btn-block">Apply Filter</a>--}}
{{--    </div>--}}
{{--</div>--}}


{{--<script src="{{url('assets/js/custom.js')}}"></script>--}}

<script>
    $(window).on('load', function(){

        $([document.documentElement, document.body]).animate({
            scrollTop: $("#myDiv").offset().top
        }, 2000);
    });

    $(function() {
        $( ".meeting" ).datepicker({dateFormat: 'yy'});
    });
</script>
<script>
// 	$(document).ready(function(){
	// 	var type="";
	// 	$('#type').on('change' , function(e){
	// 		type = e.target.value;
	// 	});
    //
	// 	$("#formGet").on('change' , function(e){
	// 		name = e.target.value;
	// 		// console.log(name);
	// 		if(name != ""){
    //         $.get('/getDataCourse' , {search:name , type:type} , function(response , status){
    //             $('.fetchDataHere').empty();
    //             console.log(response.data);
	// 			if(response.data != ""){
	// 				var courseType="";
    //
	// 				for(var i = 0 ; i < response.data.length ; i++){
	// 					if(response.data[i].type == 1){
	// 						courseType = 'Online'
	// 					}else if(response.data[i].type == 2){
	// 						courseType = 'Registered'
	// 					}else{
	// 						courseType = 'Headquarter'
	// 					}
	// 					$('.fetchDataHere').append(`
	// 						<div class="card overflow-hidden">
	// 							<div class="d-md-flex">
	// 								<div class="item-card9-img">
	// 									<div class="item-card9-imgs">
	// 										<a href="/course-details/`+response.data[i].id+`"></a>
	// 										<img src="../assets/images/media/11.jpg" alt="img" class="cover-image">
	// 									</div>
	// 									<div class="item-overly-trans">
	// 										<a href="/course-details/`+response.data[i].id+`" class="bg-primary">`+courseType+`</a>
	// 									</div>
	// 								</div>
	// 								<div class="card border-0 mb-0">
	// 									<div class="card-body ">
	// 										<div class="item-card9">
	// 											<a href="/course-details/`+response.data[i].id+`" class="text-dark"><h3 class="font-weight-semibold mt-1">`+response.data[i].title+`</h3></a>
	// 												<div class="mt-2 mb-2">
	// 												<a href="#" class="mr-4"><span class="text-muted fs-13"><i class="fa fa-clock-o text-muted mr-1"></i>`+response.data[i].date+`</span></a>
	// 											</div>
	// 											<p class="mb-0 leading-tight">`+response.data[i].description+`</p>
	// 										</div>
	// 									</div>
	// 									<div class="card-footer pt-4 pb-4">
	// 										<div class="item-card9-footer d-flex">
	// 											<div class="item-card9-cost">
	// 												<h4 class="text-dark font-weight-semibold mb-0 mt-0">`+response.data[i].price+`</h4>
	// 											</div>
	// 										</div>
	// 									</div>
	// 								</div>
	// 							</div>
	// 						</div>
	// 					`);
	// 				}
	// 			}else{
	// 				$('.fetchDataHere').append(`
    // 		            <div class="text-center text-danger">لا توجد بيانات</div>
    // 		        `);
	// 			}
    //         });
	// 	}else{
	// 		    getAllCourses();
	// 	}
    //     });
    //
// 	});
</script>

<script>
    $(document).ready(function () {
        $('input[id$=tbDate]').datepicker({});
        var origin   = window.location.origin;


    });

    $('input:checkbox').click(function() {
        $('input:checkbox').not(this).prop('checked', false);
    });


</script>


    <script>

        // var newArrayJavascript = [];
        //     $.ajax({
        //       url:'/getFavouritesJavascripts',
        //       method:'GET',
        //       success:function(data){
        //         //   console.log(data);
        //         for(var i=0; i<data.length; i++){
        //           newArrayJavascript.push(data[i].course_id);
        //         }
        //       },
        //     });



        function getCoursesBySpecialist(id){
            // console.log(newArrayJavascript);
            if ($('#spec_id_input-'+id).is(':checked')){
                $.ajax({
                    url: '/specialist-id/courses/'+id,
                    type:'GET',
                    success:function (courses){
                        console.log(courses);
                        $('.fetchDataHere').empty();
                        if(courses !== 0){
                            for(var i = 0 ; i < courses.length ; i++){
                                var FavouriteIcon = '';
                                if (courses[i].isFavouritToAuthUser == 1){
                                    FavouriteIcon = "<a style='cursor:pointer;' class='item-card2-icons-l favItem2'  data-toggle='tooltip' title='إزاله الدوره من المفضله'> <i onclick='removeFavourites(event)' data-id='"+courses[i].id+"' class='fa fa-heart favss2"+courses[i].id+" text-danger'></i></a>";
                                }else{
                                    FavouriteIcon  = "<a style='cursor:pointer;' class='item-card2-icons-l favItem2' data-toggle='tooltip' title='إضافه الدوره للمفضله' > <i onclick='addFavourites(event)' data-id='"+courses[i].id+"' class='fa fa-heart favss"+courses[i].id+" text-white'></i></a>";
                                }
                                var  course_type = null;
                                var  course_offer = '';
                                if(courses[i].type === 1){
                                    course_type = "Online";
                                }else if(courses[i].type === 2){
                                    course_type = "Registered";
                                }else{
                                    course_type = "Headquarter";
                                }
                                if(courses[i].offer != null){
                                    course_offer = '<div class="ribbon ribbon-top-right text-danger"><span class="bg-danger" style="font-family: \'ab\'">عرض</span></div>';
                                }
                                $('.fetchDataHere').append(`
    <div class="col-lg-6 col-md-6 col-xl-4 " >
        						    <div class="card overflow-hidden" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);border-radius: 10px;">
                              `+course_offer+`
                            <div class="card mb-0 "  style="height: 615px;">
                                <div class="item-card7-img" style="height: 425px;">
                                    <a href="page-details.html"></a>
                                    <div class="item-card7-imgs" >
                                        <div class="overlay"></div>
                                        <img src="`+courses[i].image_cover+`" alt="img" class="cover-image" style="height:200px;" >
                            </div>
                            <div class="item-overly-trans">
                              <input type="text" id="myInput">
                                <div class="rating-stars d-flex text-white">
                                        <span style="font-family: ar">`+courses[i].type+`</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-card2-icons tropicana2">
    <a  onclick="copyLink(`+courses[i].id+`)" href="javascript:void(0);" data-toggle="tooltip" title="إضغط لنسخ رابط الدوره" class="item-card2-icons-l favItem1 " >
                                        <i class="fa fa-share-alt" ></i></a>
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
                                            <li style="padding-right: 20px;margin-left:10px;font-family: 'ab'; color: #ffffff">تطوير الذات</li>
                                            <li> <img src="`+courses[i].cat_img+`" width="25px" height="25px"/> </li>
                                        </ul>
                                    </div>
                                    <div class="item-card2">
                                        <div class="item-card2-desc" >
                                            <div class="item-card2-text mb-3">
                                                <h4 class="course_title" style="color: #808080;font-size: 16px">`+courses[i].title +`</h4>
                                            </div>
                                            <p class="" style="text-align: justify;padding-top:25px">`+courses[i].description.substring(0,150) +` </p>
                                        </div>
                                    </div>
                                    <div class="crs_info w-100 d-flex justify-content-between">
                                        <span>`+courses[i].instructor+`</span>
                                        <span>`+courses[i].date+`</span>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="item-card2-footer courses_footer">
                                        <ul class="">
                                            <li>
                                                <a class="float-left priceItem">  <p style="font-family:ar;font-size: 25px">`+courses[i].price_after_discount+`  <span class="text-danger" style="float: right;padding-top: 4px">SR</span></p></a>

                                            </li>

                                            <li>
                                                <a href="`+origin+`/course-details/`+courses[i].id+`" class="btn btn-danger  text-white float-right" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);border-radius: 10px;font-family:ar"> عرض الدوره</a>

                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
</div>
        					`);
                            }
                        }else{
                            getCourses();
                        }
                    },
                    error:function (exception){
                        alert('error');
                    }
                })
            }else{
                getCourses();
            }
        }

        function getCoursesByTypeId(id){
            if ($('#type_id_input-'+id).is(':checked')) {
                $.ajax({
                    url: '/type-id/courses/' + id,
                    type: 'GET',
                    success: function (courses) {
                        $('.fetchDataHere').empty();
                        var url = window.location.origin;
                        if (courses != 0) {
                            for (var i = 0; i < courses.length; i++) {
                                var FavouriteIcon = '';
                                if (courses[i].isFavouritToAuthUser == 1){
                                    FavouriteIcon = "<a style='cursor:pointer;' class='item-card2-icons-l favItem2'  data-toggle='tooltip' title='إزاله الدوره من المفضله'> <i onclick='removeFavourites(event)' data-id='"+courses[i].id+"' class='fa fa-heart favss2"+courses[i].id+" text-danger'></i></a>";
                                }else{
                                    FavouriteIcon  = "<a style='cursor:pointer;' class='item-card2-icons-l favItem2' data-toggle='tooltip' title='إضافه الدوره للمفضله' > <i onclick='addFavourites(event)' data-id='"+courses[i].id+"' class='fa fa-heart favss"+courses[i].id+" text-white'></i></a>";
                                }
                                var  course_offer = '';
                                if(courses[i].type === 1){
                                    course_type = "Online";
                                }else if(courses[i].type === 2){
                                    course_type = "Registered";
                                }else{
                                    course_type = "Headquarter";
                                }
                                if(courses[i].offer != null){
                                    course_offer = '<div class="ribbon ribbon-top-right text-danger"><span class="bg-danger" style="font-family: \'ab\'">عرض</span></div>';
                                }
                                $('.fetchDataHere').append(`
    <div class="col-lg-6 col-md-6 col-xl-4 " >
        						    <div class="card overflow-hidden" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);border-radius: 10px;">
                               `+course_offer+`
                            <div class="card mb-0 "  style="height: 615px;">
                                <div class="item-card7-img" style="height: 425px;">
                                    <a href="page-details.html"></a>
                                    <div class="item-card7-imgs" >
                                        <div class="overlay"></div>
                                        <img src="` + courses[i].image_cover + `" alt="img" class="cover-image" style="height:200px;" >
                            </div>
                            <div class="item-overly-trans">
                                 <input type="text" id="myInput">
                                <div class="rating-stars d-flex text-white">
                                        <span style="font-family: ar">`+courses[i].type+`</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-card2-icons tropicana2">
    <a  onclick="copyLink(`+courses[i].id+`)" href="javascript:void(0);" data-toggle="tooltip" title="إضغط لنسخ رابط الدوره" class="item-card2-icons-l favItem1 " >
                                        <i class="fa fa-share-alt" ></i></a>
                                            @auth
                                `+FavouriteIcon+`                                            @endauth
                                            @guest
                                                <a href="{{route('login')}}" class="item-card2-icons-l favItem2" data-toggle="tooltip" title="إضافه الدوره للمفضله"> <i class="fa fa-heart text-white"></i></a>
                                            @endguest
                                </div>
                                <div class="card-body courses_body" style="font-family: ar;color: #808080">
                                    <div class="course_category" style="width: 155px;padding-right: 20px;margin-bottom: 20px">
                                        <ul class="row">
                                            <li style="padding-right: 20px;margin-left:10px;font-family: 'ab'; color: #ffffff">تطوير الذات</li>
                                            <li> <img src="` + courses[i].cat_img + `" width="25px" height="25px"/> </li>
                                        </ul>
                                    </div>
                                    <div class="item-card2">
                                        <div class="item-card2-desc" >
                                            <div class="item-card2-text mb-3">
                                                <h4 class="course_title" style="color: #808080;font-size: 16px">` + courses[i].title + `</h4>
                                            </div>
                                            <p class="" style="text-align: justify;padding-top:25px">` + courses[i].description.substring(0, 150) + ` </p>
                                        </div>
                                    </div>
                                    <div class="crs_info w-100 d-flex justify-content-between">
                                        <span>`+courses[i].instructor+`</span>
                                        <span>`+courses[i].date+`</span>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="item-card2-footer courses_footer">
                                        <ul class="">
                                            <li>
                                                <a class="float-left priceItem">  <p style="font-family:ar;font-size: 25px">` + courses[i].price_after_discount + `  <span class="text-danger" style="float: right;padding-top: 4px">SR</span></p></a>
                                            </li>
                                            <li>
                                                <a href="` + origin + `/course-details/` + courses[i].id + `" class="btn btn-danger  text-white float-right" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);border-radius: 10px;font-family:ar"> عرض الدوره</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
</div>
        					`);
                            }
                        } else {
                            $('.fetchDataHere').html(`<div class="card overflow-hidden" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);border-radius: 10px;">
                                                     <h3 class="text-danger text-center">لا توجد دورات</h3>
                                             </div>`)
                        }
                    },
                    error: function (exception) {
                        alert('error');
                    }
                })
            }else{
                getCourses();
            }
        }
        function getCourses(){
            $.ajax({
                url:'/getAllCourseAjax',
                method:'GET',
                success:function(courses){
                    // console.log(newArrayJavascript);
                    if(courses != ""){
                        var courseType="";


                        $('.fetchDataHere').empty();
                        for(var i = 0 ; i < courses.length ; i++){
                            var FavouriteIcon = '';
                            if (courses[i].isFavouritToAuthUser == 1){

                                FavouriteIcon = "<a style='cursor:pointer;' class='item-card2-icons-l favItem2'  data-toggle='tooltip' title='إزاله الدوره من المفضله'> <i onclick='removeFavourites(event)' data-id='"+courses[i].id+"' class='fa fa-heart favss2"+courses[i].id+" text-danger'></i></a>";
                            }else{

                                FavouriteIcon  = "<a style='cursor:pointer;' class='item-card2-icons-l favItem2' data-toggle='tooltip' title='إضافه الدوره للمفضله' > <i onclick='addFavourites(event)' data-id='"+courses[i].id+"' class='fa fa-heart favss"+courses[i].id+" text-white'></i></a>";
                            }

                            var  course_offer = '';
                            if(courses[i].type == 1){
                                courseType = 'Online'
                            }else if(courses[i].type == 2){
                                courseType = 'Registered'
                            }else{
                                courseType = 'Headquarter'
                            }
                            if(courses[i].offer != null){
                                course_offer = '<div class="ribbon ribbon-top-right text-danger"><span class="bg-danger" style="font-family: \'ab\'">عرض</span></div>';
                            }
                            $('.fetchDataHere').append(`
    <div class="col-lg-6 col-md-6 col-xl-4 " >
            <div class="card overflow-hidden" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);border-radius: 10px;">
  `+course_offer+`
<div class="card mb-0 "  style="height: 615px;">
                                <div class="item-card7-img" style="height: 425px;">
                                    <a href="page-details.html"></a>
                                    <div class="item-card7-imgs" >
                                        <div class="overlay"></div>

                                        <img src="`+courses[i].image_cover+`" alt="img" class="cover-image" style="height:200px;" >


                            </div>
                            <div class="item-overly-trans">
                                <input type="text" id="myInput">
                                <div class="rating-stars d-flex text-white">

                                        <span style="font-family: ar">`+courses[i].type+`</span>


                                        </div>
                                    </div>
                                </div>
                                <div class="item-card2-icons tropicana2">
    <a  onclick="copyLink(`+courses[i].id+`)" href="javascript:void(0);" data-toggle="tooltip" title="إضغط لنسخ رابط الدوره" class="item-card2-icons-l favItem1 " >
                                        <i class="fa fa-share-alt" ></i></a>

                                            @auth
                            `+FavouriteIcon+`                                            @endauth

                                            @guest
                                                <a href="{{route('login')}}" class="item-card2-icons-l favItem2" data-toggle="tooltip" title="إضافه الدوره للمفضله"> <i class="fa fa-heart text-white"></i></a>
                                            @endguest

                                </div>
                                <div class="card-body courses_body" style="font-family: ar;color: #808080">
                                    <div class="course_category" style="width: 155px;padding-right: 20px;margin-bottom: 20px">
                                        <ul class="row">
                                            <li style="padding-right: 20px;margin-left:10px;font-family: 'ab'; color: #ffffff">تطوير الذات</li>
                                            <li> <img src="`+courses[i].cat_img+`" width="25px" height="25px"/> </li>

                                        </ul>

                                    </div>
                                    <div class="item-card2">

                                        <div class="item-card2-desc" >
                                            <div class="item-card2-text mb-3">
                                                <h4 class="course_title" style="color: #808080;font-size: 18px">`+courses[i].title+ `</h4>
                                            </div>
                                            <ul>
                                                <li>`+courses[i].instructor+`</li>
                                                <li>`+courses[i].date+`</li>
                                            </ul>
                                            <p class="" style="text-align: justify;padding-top:45px">`+courses[i].description.substring(0,150) + ` </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="item-card2-footer courses_footer">
                                        <ul class="">
                                            <li>
                                                <a class="float-left priceItem">  <p style="font-family:ar;font-size: 25px">`+courses[i].price_after_discount+`  <span class="text-danger" style="float: right;padding-top: 4px">SR</span></p></a>

                                            </li>

                                            <li>
                                                <a href="`+origin+`/course-details/`+courses[i].id+`" class="btn btn-danger  text-white float-right" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);border-radius: 10px;font-family:ar"> عرض الدوره</a>

                                            </li>
                                        </ul>





                                    </div>
                                </div>
                            </div>
                        </div>
</div>
						`);
                        }
                    }else{
                        $('.fetchDataHere').append(`
    		            <div class="text-center text-danger">لا توجد بيانات</div>
    		        `);
                    }
                }
            });
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
