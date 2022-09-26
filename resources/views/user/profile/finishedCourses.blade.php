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
            <h2 style="color:#808080;font-family:ar">الدورات المكتسبة</h2>
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
                        <a href="{{url('my-courses')}}" style="font-family:ar" class=" d-flex  border-bottom">
                            <span class="icon1"></span> دوراتي  <img src="{{asset('assets/images/my-courses-01.svg')}}" class="profileImg2" width="20px" height="25px">
                        </a>
                        <a href="{{url('favourites-courses')}}" style="font-family:ar" class="d-flex  border-bottom">
                            <span class="icon1"></span> المفضلة  <img src="{{asset('assets/images/like-01.svg')}}" class="profileImg3" width="20px" height="25px">
                        </a>
                        <a href="{{url('finished-courses')}}" style="font-family:ar" class="active d-flex  border-bottom">
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
                        <h3 class="card-title" style="color:#808080;font-family:ab;">دورات مكتسبة</h3>
                    </div>
                    <div class="card-body">
                        <div class="my-favadd table-responsive border-top userprof-tab">
                            <table class="table table-bordered table-hover mb-0 text-nowrap" style="font-family:ar;color:#808080">
                                <thead>
                                <tr>
                                    <th width="60%">الدورات</th>
                                    <th width="10%">المجال</th>
                                    <th width="5%">السعر</th>
                                    <th width="25%">عمل</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($finishedCourse->count())
                                    @foreach($finishedCourse as $course)
                                <tr>
                                    
                                    <td>
                                        <div class="media mt-0 mb-0">
                                            <div class="card-aside-img">
                                                <a href="#"></a>
                                                <img src="{{$course->courses_finished->image_cover}}" alt="img">
                                            </div>
                                            &nbsp;&nbsp;&nbsp;
                                            <div class="media-body">
                                                <div class="card-item-desc ml-4 p-0 mt-2">
                                                    <a href="#" class="" style="font-family:ar;color:#808080;"><h4 class="font-weight-semibold">
                                                        {{$course->courses_finished->title}}</h4></a><br>
                                                    <a href="#" style="font-family:ar;color:#808080;"><img src="{{asset('assets/images/clock-01.svg')}}"> {{$course->courses_finished->date}}</a>
                                                    <a href="#" style="font-family:ar;color:#808080;float:left;"><img src="{{asset('assets/images/offline-01.svg')}}">{{$course->courses_finished->type}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if($course->courses_finished->specialist_id == 1)
                                           مجال مالي 
                                        @elseif($course->courses_finished->specialist_id == 2)
                                           مجال إداري
                                        @elseif($course->courses_finished->specialist_id == 3)
                                            مجال سياحي
                                        @elseif($course->courses_finished->specialist_id == 4)
                                            مجال إجتماعي
                                        @elseif($course->courses_finished->specialist_id == 5)
                                            مجال تطوير  ذاتي
                                        @elseif($course->courses_finished->specialist_id == 6)
                                            مجال حاسب آلي
                                        @elseif($course->courses_finished->specialist_id == 7)
                                            مجال إلكترونيات
                                        @else
                                            مجال نعليم لغة إنجليزية
                                        @endif
                                    </td>
                                    <td class="" style="font-family:ar;color:#808080;">{{$course->courses_finished->price}}<span style="font-family:ar;color:red;font-size:10px">SR</span></td>
                                    <td class="text-center">
                                        <a id="checkCertifi" onclick="getCertificate(event)" data-id="{{$course->courses_finished->id}}" class="btn text-white fahmico certific{{$course->courses_finished->id}}" style="font-family:ar;background-color:#E64448;color:#ffffff;cursor:pointer;" data-toggle="tooltip" >طلب شهادة</a>
                                    </td>
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
        
        <div class="modal" id="variableModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
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

    <br>
    <br>
    <br>
    <br>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
            // var Course_Id = document.getElementById('checkCertifi').getAttribute('data-id');
           $(window).on('load' , function(){
                if ($(window).width() < 991) {
                   $('.spaceHeader').css('display' , 'none');
                }
                else {
                   $('.spaceHeader').css('display' , 'block');
                }
                $('.fahmico').each(function() {
                    var Course_Id = $(this).attr('data-id');
                    // console.log(Course_Id);
                    $.ajax({
                       url:'/checkCertificates/'+Course_Id,
                       method:'GET',
                       success:function(response){
                        //   console.log(response);
                           if(response == 0){
                                $('.certific'+Course_Id).replaceWith(`
                                    <a id="checkCertifi" onclick="getCertificate(event)" data-id="`+Course_Id+`" class="btn text-white fahmico certific`+Course_Id+`" style="font-family:ar;background-color:#E64448;color:#ffffff;cursor:pointer;" data-toggle="tooltip" >طلب شهادة</a>
                                `);
                           }else if(response == 2){
                                $('.certific'+Course_Id).replaceWith(`
                                    <a href="/pageDownload/`+Course_Id+`" class="btn text-white certific`+Course_Id+`" style="font-family:ar;background-color:#E64448;">تحميل الشهادة</a>
                                `);
                           }else{
                               $('.certific'+Course_Id).css('background-color' , 'grey');
                               $('.certific'+Course_Id).text('تم طلب الشهادة ...');
                           }
                       },
                    });
                });
                
            });
            $(window).on('resize' , function(){
                if ($(window).width() < 991) {
                   $('.spaceHeader').css('display' , 'none');
                }
                else {
                   $('.spaceHeader').css('display' , 'block');
                }
            });
        });
        function getCertificate(e){
            e.preventDefault();
            var id = e.target.getAttribute('data-id');
            $.ajax({
                url:'/getCertificateToAdmin',
                method:'POST',
                data:{_token: "{{ csrf_token() }}", course_id:id},
                success:function(response){
                    if(response == 0){
                        $('#modal_message').text('لقد تم طلب الشهادة لهذه الدورة من قبل:').css('font-family' , 'ar');
                        $('.modal-header').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>');
                        $('#variableModal').fadeIn(450).show();
                        setTimeout(function (){
                            $('#variableModal').fadeOut("slow").hide();
                            },5000);
                    }else{
                        $('.certific'+id).css('background-color' , 'grey');
                        $('.certific'+id).text('تم طلب الشهادة...');
                    }
                },
            });
        }
    </script>
@endcomponent
