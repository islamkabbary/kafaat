@component('components.app')

    <x-header />
    
    <br class="spaceHeader">
    <br class="spaceHeader">
    <br class="spaceHeader">
    <br>
    <br>
    <br>
    
    <section class="sptb">
        <div class="container">
            @if(session()->has('success'))
                <div class="alert alert-info toaster-div">
                    <span>{{session()->get('success')}}</span>
                </div>
            @endif
            @if(session()->has('error'))
                <div class="alert alert-danger toaster-div">
                    <span>{{session()->get('error')}}</span>
                </div>
            @endif
            <div class="section-title center-block text-center">
                <h2 style="color:#808080;font-family:ar">الملف الشخصي</h2>
                <img src="{{asset('/assets/images/sub.png')}}" style="width: 150px;height: 20px">
            </div>
            <br>
            <br>
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
                        <a href="{{url('profile')}}" style="font-family:ar" class="active d-flex border-bottom">
                            <span class="icon1"></span> تعديل الملف الشخصي <img src="{{asset('assets/images/my-profile-01.svg')}}"  class="profileImg1" width="20px" height="25px">
                        </a>
                        <a href="{{url('my-courses')}}" style="font-family:ar" class=" d-flex  border-bottom">
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
                            <h3 class="card-title" style="color:#808080;font-family:ab;">تعديل الملف الشخصي</h3>
                        </div>
                        <form method="post" action="{{route('update-user-info')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="font-family:ar">الاسم</label>
                                        <input type="text" name="username" class="form-control" style="color:#808080;font-family:ar;box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);" value="{{auth()->user()->username}}" placeholder="الاسم" required>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="font-family:ar">البريد الإلكتروني</label>
                                        <input type="email" name="email" class="form-control" style="color:#808080;font-family:ar;box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);" value="{{auth()->user()->email}}" placeholder="البريد الإلكتروني" required>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="font-family:ar">رقم الجوال</label>
                                        <input type="number" name="phone" class="form-control" style="color:#808080;font-family:ar;box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);direction:ltr;" value="{{auth()->user()->phone}}" placeholder="رقم الجوال">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="font-family:ar">رقم الهوية</label>
                                        <input type="number" name="national_id" class="form-control" style="color:#808080;font-family:ar;box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);" value="{{ !empty(auth()->user()->student) ? auth()->user()->student->national_id : ''}}" placeholder="رقم الهوية" >
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="font-family:ar">الجنسية</label>
                                        <!--<input type="text" name="nationality" class="form-control" style="color:#808080;font-family:ar;box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);" value="{{ !empty(auth()->user()->student) ? auth()->user()->student->nationality : ''}}" placeholder="الجنسية">-->
                                        <select name="nationality" class="form-control" style="color:#808080;font-family:ar;box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
                                          <option selected disabled>اختر الجنسية</option>
                                            @foreach($states as $state)
                                                <option @if(auth()->user()->student->nationality == $state->id) selected  @endif value="{{$state->id}}">{{$state->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="font-family:ar">الاهتمامات</label>
                                        <select name="interests" class="form-control" style="color:#808080;font-family:ar;box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
                                          <option selected disabled>اختر اهتماماتك</option>
                                            @foreach($specialists as $specialist)
                                                <option @if(auth()->user()->student->interests == $specialist->id) selected  @endif value="{{$specialist->id}}">{{$specialist->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="font-family:ar">المدينة</label>
                                        <input type="text" name="city" value="{{ !empty(auth()->user()->student) ? auth()->user()->student->city : ''}}" style="color:#808080;font-family:ar;box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);" class="form-control" placeholder="المدينة">
                                    </div>

                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="font-family:ar">العنوان</label>
                                        <input type="text" name="address" value="{{ !empty(auth()->user()->student) ? auth()->user()->student->address : ''}}" style="color:#808080;font-family:ar;box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);" class="form-control" placeholder="العنوان">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="font-family:ar">تجديد الرقم السري</label>
                                        <input type="password" style="color:#808080;font-family:ar;box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);" name="password" class="form-control" placeholder="تجديد الرقم السري">
                                    </div>

                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="font-family:ar">تأكيد الرقم السري الجديد</label>
                                        <input type="password" style="color:#808080;font-family:ar;box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);" name="password_confirm" class="form-control"  placeholder="تأكيد الرقم السري الجديد">
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="photo">
                                            <label class="custom-file-label" style="color:#808080;font-family:ar;">اضف صورة</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                            <div class="image_render_div center-block" style="display: none">
                                <img id="image_render" src="#" width="150px" height="150px" alt="your image" class="brround" />
                            </div>
                            <div class="card-footer" style="border-top:none;">
                                <button type="submit" class="btn text-left" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);font-family:ar;color:#ffffff;background-color:#AB2A21;">تحديث الملف</button>
                            </div>
                        </form>
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
        });
    </script>

@endcomponent
