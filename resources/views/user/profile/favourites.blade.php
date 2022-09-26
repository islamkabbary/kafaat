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
            <h2 style="color:#808080;font-family:ar">المفضلة</h2>
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
                        <a href="{{url('favourites-courses')}}" style="font-family:ar" class="active d-flex  border-bottom">
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
                        <h3 class="card-title" style="color:#808080;font-family:ab;">المفضلة</h3>
                    </div>
                    <br>
                    <br>
                    <div class="">
                        <div class="tabs-menu">
                            <ul class="nav panel-tabs eductaional-tabs mb-6" style="font-family: ar;color: #808080">
                                <li class="tabLink"><a href="#tab1" style="font-family: ar;" class="active show tab_text" id="All" data-toggle="tab">الكل</a></li>
                                <li><a href="#tab2" data-toggle="tab" style="font-family: ar;" id="attended" class="tab_text">حضوري</a></li>
                                <li><a href="#tab3" data-toggle="tab" style="font-family: ar;" id="fromSided" class="tab_text">عن بعد</a></li>
                                <li><a href="#tab3" data-toggle="tab" style="font-family: ar;" id="watched" class="tab_text">مشاهدة</a></li>
                            </ul>
                        </div>
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
                                <tbody id="DataGets">
                                @if($favouritesCourse->count())
                                    @foreach($favouritesCourse as $course)
                                <tr>
                                    <td>
                                        <div class="media mt-0 mb-0">
                                            <div class="card-aside-img">
                                                <a href="#"></a>
                                                <img src="{{$course->favourites_courses->image_cover}}" alt="img">
                                            </div>
                                            &nbsp;&nbsp;&nbsp;
                                            <div class="media-body">
                                                <div class="card-item-desc ml-4 p-0 mt-2">
                                                    <a href="#" class="" style="font-family:ar;color:#808080;"><h4 class="font-weight-semibold">
                                                        {{$course->favourites_courses->title}}</h4></a><br>
                                                    <a href="#" style="font-family:ar;color:#808080;"><img src="{{asset('assets/images/clock-01.svg')}}"> {{$course->favourites_courses->date}}</a>
                                                    <a href="#" style="font-family:ar;color:#808080;float:left;"><img src="{{asset('assets/images/offline-01.svg')}}">{{$course->favourites_courses->type}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if($course->favourites_courses->specialist_id == 1)
                                           مجال مالي 
                                        @elseif($course->favourites_courses->specialist_id == 2)
                                           مجال إداري
                                        @elseif($course->favourites_courses->specialist_id == 3)
                                            مجال سياحي
                                        @elseif($course->favourites_courses->specialist_id == 4)
                                            مجال إجتماعي
                                        @elseif($course->favourites_courses->specialist_id == 5)
                                            مجال تطوير  ذاتي
                                        @elseif($course->favourites_courses->specialist_id == 6)
                                            مجال حاسب آلي
                                        @elseif($course->favourites_courses->specialist_id == 7)
                                            مجال إلكترونيات
                                        @else
                                            مجال نعليم لغة إنجليزية
                                        @endif
                                    </td>
                                    <td class="" style="font-family:ar;color:#808080;">{{$course->favourites_courses->price}}<span style="font-family:ar;color:red;font-size:10px">SR</span></td>
                                    <td class="text-center">
                                        <a href="/getCourseFromFavouritesPay/{{$course->favourites_courses->id}}" class="btn text-white" style="font-family:ar;background-color:#E64448;color:#ffffff" data-original-title="شراء الآن" data-toggle="tooltip" >شراء</a>
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
            $('#All').on('click' , function(e){
                var  specialistType = "";
                $.ajax({
                   url:'/allCoursesFavourites',
                   method:'GET',
                   success:function(data){
                    if(data.length > 0){
                          $('#DataGets').empty();
                              for(var i=0;i<data.length;i++){
                                   
                                    if(data[i].favourites_courses.specialist_id == 1){
                                        specialistType = "مجال مالي";
                                    }else if(data[i].favourites_courses.specialist_id == 2){
                                        specialistType = "مجال إداري";
                                    }else if(data[i].favourites_courses.specialist_id == 3){
                                        specialistType = "مجال سياحي";
                                    }else if(data[i].favourites_courses.specialist_id == 4){
                                        specialistType = "مجال اجتماعي";
                                    }else if(data[i].favourites_courses.specialist_id == 5){
                                        specialistType = "مجال تطوير الذات";
                                    }else if(data[i].favourites_courses.specialist_id == 6){
                                        specialistType = "مجال حاسب آلي";
                                    }else if(data[i].favourites_courses.specialist_id == 7){
                                        specialistType = "مجال إلكترونيات";
                                    }else{
                                        specialistType = "مجال تعليم لغة إنجليزية";
                                    }
                                  $('#DataGets').append(`
                                        <tr>
                                            <td>
                                                <div class="media mt-0 mb-0">
                                                    <div class="card-aside-img">
                                                        <a href="#"></a>
                                                        <img src="`+data[i].favourites_courses.image_cover+`" alt="img">
                                                    </div>
                                                    &nbsp;&nbsp;&nbsp;
                                                    <div class="media-body">
                                                        <div class="card-item-desc ml-4 p-0 mt-2">
                                                            <a href="#" class="" style="font-family:ar;color:#808080;"><h4 class="font-weight-semibold">
                                                                `+data[i].favourites_courses.title+`</h4></a><br>
                                                            <a href="#" style="font-family:ar;color:#808080;"><img src="{{asset('assets/images/clock-01.svg')}}"> `+data[i].favourites_courses.date+`</a>
                                                            <a href="#" style="font-family:ar;color:#808080;float:left;"><img src="{{asset('assets/images/offline-01.svg')}}">`+data[i].favourites_courses.type+`</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                `+specialistType+`
                                            </td>
                                            <td class="" style="font-family:ar;color:#808080;">`+data[i].favourites_courses.price+`<span style="font-family:ar;color:red;font-size:10px">SR</span></td>
                                            <td class="text-center">
                                                <a href="/getCourseFromFavouritesPay/`+data[i].favourites_courses.id+`" class="btn text-white" style="font-family:ar;background-color:#E64448;color:#ffffff" data-original-title="شراء الآن" data-toggle="tooltip" >شراء</a>
                                            </td>
                                        </tr>
                                  `);
                              }
                    }else{
                        $('#DataGets').empty();
                        $('#DataGets').append('<tr class="text-center text-danger"><td style="font-family:ar">لا توجد دورات</td></tr>');
                    }
                   },
                });
            });
            
            $('#attended').on('click' , function(e){
                var  specialistType2 = '';
                $.ajax({
                   url:'/getTypeOfCourseInProfile/1',
                   method:'GET',
                   success:function(data){
                      console.log(data);
                    if(data.length > 0){
                          $('#DataGets').empty();
                              for(var i=0;i<data.length;i++){
                                  
                                if(data[i].favourites_courses.specialist_id == 1){
                                    specialistType2 = "مجال مالي";
                                }else if(data[i].favourites_courses.specialist_id == 2){
                                    specialistType2 = "مجال إداري";
                                }else if(data[i].favourites_courses.specialist_id == 3){
                                    specialistType2 = "مجال سياحي";
                                }else if(data[i].favourites_courses.specialist_id == 4){
                                    specialistType2 = "مجال اجتماعي"
                                }else if(data[i].favourites_courses.specialist_id == 5){
                                    specialistType2 = "مجال تطوير الذات";
                                }else if(data[i].favourites_courses.specialist_id == 6){
                                    specialistType2 = "مجال حاسب آلي";
                                }else if(data[i].favourites_courses.specialist_id == 7){
                                    specialistType2 = "مجال إلكترونيات";
                                }else{
                                    specialistType2 = "مجال تعليم لغة إنجليزية";
                                }
                                  $('#DataGets').append(`
                                        <tr>
                                            <td>
                                                <div class="media mt-0 mb-0">
                                                    <div class="card-aside-img">
                                                        <a href="#"></a>
                                                        <img src="`+data[i].favourites_courses.image_cover+`" alt="img">
                                                    </div>
                                                    &nbsp;&nbsp;&nbsp;
                                                    <div class="media-body">
                                                        <div class="card-item-desc ml-4 p-0 mt-2">
                                                            <a href="#" class="" style="font-family:ar;color:#808080;"><h4 class="font-weight-semibold">
                                                                `+data[i].favourites_courses.title+`</h4></a><br>
                                                            <a href="#" style="font-family:ar;color:#808080;"><img src="{{asset('assets/images/clock-01.svg')}}"> `+data[i].favourites_courses.date+`</a>
                                                            <a href="#" style="font-family:ar;color:#808080;float:left;"><img src="{{asset('assets/images/offline-01.svg')}}">`+data[i].favourites_courses.type+`</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                `+specialistType2+`
                                            </td>
                                            <td class="" style="font-family:ar;color:#808080;">`+data[i].favourites_courses.price+`<span style="font-family:ar;color:red;font-size:10px">SR</span></td>
                                            <td class="text-center">
                                                <a href="/getCourseFromFavouritesPay/`+data[i].favourites_courses.id+`" class="btn text-white" style="font-family:ar;background-color:#E64448;color:#ffffff" data-original-title="شراء الآن" data-toggle="tooltip" >شراء</a>
                                            </td>
                                        </tr>
                                  `);
                              }
                    }else{
                        $('#DataGets').empty();
                        $('#DataGets').append('<tr class="text-center text-danger"><td style="font-family:ar">لا توجد دورات</td></tr>');
                    }
                   },
                });
            });
            
            $('#fromSided').on('click' , function(e){
                var  specialistType3 = '';
                $.ajax({
                   url:'/getTypeOfCourseInProfile/2',
                   method:'GET',
                   success:function(data){
                      console.log(data.length);
                    if(data.length > 0){
                          $('#DataGets').empty();
                              for(var i=0;i<data.length;i++){
                                  
                                if(data[i].favourites_courses.specialist_id = 1){
                                    specialistType3 = "مجال مالي";
                                }else if(data[i].favourites_courses.specialist_id = 2){
                                    specialistType3 = "مجال إداري";
                                }else if(data[i].favourites_courses.specialist_id== 3){
                                    specialistType3 = "مجال سياحي";
                                }else if(data[i].favourites_courses.specialist_id== 4){
                                    specialistType3 = "مجال اجتماعي";
                                }else if(data[i].favourites_courses.specialist_id = 5){
                                    specialistType3 = "مجال تطوير الذات";
                                }else if(data[i].favourites_courses.specialist_id = 6){
                                    specialistType3 = "مجال حاسب آلي";
                                }else if(data[i].favourites_courses.specialist_id = 7){
                                    specialistType3 = "مجال إلكترونيات";
                                }else{
                                    specialistType3 = "مجال تعليم لغة إنجليزية";
                                }
                                  $('#DataGets').append(`
                                        <tr>
                                            <td>
                                                <div class="media mt-0 mb-0">
                                                    <div class="card-aside-img">
                                                        <a href="#"></a>
                                                        <img src="`+data[i].favourites_courses.image_cover+`" alt="img">
                                                    </div>
                                                    &nbsp;&nbsp;&nbsp;
                                                    <div class="media-body">
                                                        <div class="card-item-desc ml-4 p-0 mt-2">
                                                            <a href="#" class="" style="font-family:ar;color:#808080;"><h4 class="font-weight-semibold">
                                                                `+data[i].favourites_courses.title+`</h4></a><br>
                                                            <a href="#" style="font-family:ar;color:#808080;"><img src="{{asset('assets/images/clock-01.svg')}}"> `+data[i].favourites_courses.date+`</a>
                                                            <a href="#" style="font-family:ar;color:#808080;float:left;"><img src="{{asset('assets/images/offline-01.svg')}}">`+data[i].favourites_courses.type+`</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                `+specialistType3+`
                                            </td>
                                            <td class="" style="font-family:ar;color:#808080;">`+data[i].favourites_courses.price+`<span style="font-family:ar;color:red;font-size:10px">SR</span></td>
                                            <td class="text-center">
                                                <a href="/getCourseFromFavouritesPay/`+data[i].favourites_courses.id+`" class="btn text-white" style="font-family:ar;background-color:#E64448;color:#ffffff" data-original-title="شراء الآن" data-toggle="tooltip" >شراء</a>
                                            </td>
                                        </tr>
                                  `);
                              }
                    }else{
                        $('#DataGets').empty();
                        $('#DataGets').append('<tr class="text-center text-danger"><td style="font-family:ar">لا توجد دورات</td></tr>');
                    }
                   },
                });
            });
            
            
            $('#watched').on('click' , function(e){
                 var  specialistType4 = '';
                $.ajax({
                   url:'/getTypeOfCourseInProfile/3',
                   method:'GET',
                   success:function(data){
                    //   console.log(data);
                    
                    if(data.length > 0){
                          $('#DataGets').empty();
                              for(var i=0;i<data.length;i++){
                                 
                    
                                    if(data[i].favourites_courses.specialist_id == 1){
                                        specialistType4 = "مجال مالي";
                                    }else if(data[i].favourites_courses.specialist_id == 2){
                                        specialistType4 = "مجال إداري";
                                    }else if(data[i].favourites_courses.specialist_id == 3){
                                        specialistType4 = "مجال سياحي";
                                    }else if(data[i].favourites_courses.specialist_id == 4){
                                        specialistType4 = "مجال اجتماعي";
                                    }else if(data[i].favourites_courses.specialist_id == 5){
                                        specialistType4 = "مجال تطوير الذات";
                                    }else if(data[i].favourites_courses.specialist_id == 6){
                                        specialistType4 = "مجال حاسب آلي";
                                    }else if(data[i].favourites_courses.specialist_id == 7){
                                        specialistType4 = "مجال إلكترونيات";
                                    }else{
                                        specialistType4 = "مجال تعليم لغة إنجليزية";
                                    }
                                  $('#DataGets').append(`
                                        <tr>
                                            <td>
                                                <div class="media mt-0 mb-0">
                                                    <div class="card-aside-img">
                                                        <a href="#"></a>
                                                        <img src="`+data[i].favourites_courses.image_cover+`" alt="img">
                                                    </div>
                                                    &nbsp;&nbsp;&nbsp;
                                                    <div class="media-body">
                                                        <div class="card-item-desc ml-4 p-0 mt-2">
                                                            <a href="#" class="" style="font-family:ar;color:#808080;"><h4 class="font-weight-semibold">
                                                                `+data[i].favourites_courses.title+`</h4></a><br>
                                                            <a href="#" style="font-family:ar;color:#808080;"><img src="{{asset('assets/images/clock-01.svg')}}"> `+data[i].favourites_courses.date+`</a>
                                                            <a href="#" style="font-family:ar;color:#808080;float:left;"><img src="{{asset('assets/images/offline-01.svg')}}">`+data[i].favourites_courses.type+`</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                `+specialistType4+`
                                            </td>
                                            <td class="" style="font-family:ar;color:#808080;">`+data[i].favourites_courses.price+`<span style="font-family:ar;color:red;font-size:10px">SR</span></td>
                                            <td class="text-center">
                                                <a href="/getCourseFromFavouritesPay/`+data[i].favourites_courses.id+`" class="btn text-white" style="font-family:ar;background-color:#E64448;color:#ffffff" data-original-title="شراء الآن" data-toggle="tooltip" >شراء</a>
                                            </td>
                                        </tr>
                                  `);
                              }
                    }else{
                        $('#DataGets').empty();
                        $('#DataGets').append('<tr class="text-center text-danger"><td style="font-family:ar">لا توجد دورات</td></tr>');
                    }
                   },
                });
            });
            
        });
    </script>
@endcomponent
