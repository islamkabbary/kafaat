@extends('admin.index')
@section('main')
    <!-- Data table css -->
    <link href="../assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="../assets/plugins/datatable/jquery.dataTables.min.css" rel="stylesheet" />
    <!-- file Uploads -->
    <link href="{{url('/assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css" />
    <!--Loader-->
    <div id="global-loader">
        <img src="../assets/images/loader.svg" class="loader-img" alt="">
    </div>
    <style>
        *{
            font-family: 'ar';
        }
        #phonesWhats{
            direction:ltr;
        }
    </style>

    <div class="page">
        <div class="page-main h-100">

            <div class="app-content my-3 my-md-5">
                <div class="side-app container">


                    <div class="card m-b-20" style="max-width: 1000px">
                        <div class="card-header">
                            <h3 class="card-title">إعدادات الموقع</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('settings.update')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label class="form-label" for="exampleInputEmail1">إسم الموقع</label>
                                    <input type="text" name="site_name" class="form-control" id="exampleInputname"  value="{{$settings->site_name}}" placeholder="إسم الموقع" required>
                                </div>

                                <div class="form-group">
                                    <div class="custom-file">

                                        <input type="file" class="custom-file-input" name="logo" data-value="{{$settings->logo}}"  >
                                        <label class="custom-file-label">شعار الموقع</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="exampleInputEmail1">رقم الجوال</label>
                                    <input type="text" name="phone" class="form-control" id="exampleInputname" value="{{$settings->phone}}"  placeholder="رقم الجوال" required>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="exampleInputEmail1">العنوان</label>
                                    <input type="text" name="address" class="form-control" id="exampleInputname" value="{{$settings->address}}"  placeholder="العنوان" required>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="exampleInputEmail1">رابط فيسبوك</label>
                                        <input type="text" class="form-control" value="{{$settings->facebook_link}}"  name="facebook_link" >


                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="exampleInputEmail1">رابط الأنستقرام</label>
                                        <input type="text" class="form-control" value="{{$settings->instagram_link}}"   name="instagram_link" >


                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="exampleInputEmail1">رابط تويتر</label>
                                        <input type="text" class="form-control" value="{{$settings->twitter_link}}"   name="twitter_link" >


                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="exampleInputEmail1">رابط سناب شات</label>
                                        <input type="text" class="form-control" value="{{$settings->snap_link}}"   name="snap_link" >
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="exampleInputEmail1">رقم واتس اب</label>
                                        <input type="text" class="form-control" value="{{$settings->whatsapp_link}}" id="phonesWhats"  name="whatsapp_link" >
                                </div>


                                <div class="form-group">
                                    <label class="form-label" for="exampleInputEmail1">رابط ليندك إن</label>
                                    <input type="text" class="form-control" value="{{$settings->linkedin_link}}" id="phonesWhats"  name="linkedin_link" >
                                </div>


                                <div class="form-group">
                                    <label class="form-label" for="exampleInputEmail1">رابط يوتيوب</label>
                                    <input type="text" class="form-control" value="{{$settings->youtube_link}}" id="phonesWhats"  name="youtube_link" >
                                </div>


                                <div class="form-group">
                                    <label class="form-label" for="exampleInputEmail1">رابط تليقرام</label>
                                    <input type="text" class="form-control" value="{{$settings->telegram_link}}" id="phonesWhats"  name="telegram_link" >
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="exampleInputEmail1">البريد الإلكترونى</label>
                                    <input type="text" name="contact_email" class="form-control" id="exampleInputname" value="{{$settings->contact_email}}"  placeholder="البريد الإلكترونى" required>
                                </div>


{{--                                <div class="form-group">--}}
{{--                                    <label class="form-label" for="exampleInputEmail1">وصف الموقع</label>--}}
{{--                                    <textarea class="form-control" name="site_description" rows="4" placeholder="وصف الموقع" required>{{$settings->site_description}}</textarea>--}}
{{--                                </div>--}}


                                <div class="form-group">
                                    <label class="form-label" for="exampleInputEmail1">الموقع الجغرافى</label>
                                    <input type="text" name="location" class="form-control" id="exampleInputname" value="{{$settings->location}}"  placeholder="الموقع الجغرافى" required>
                                </div>

                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input"  name="site_icon" >
                                        <label class="custom-file-label"> شعار الوصف</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="payment_1" >
                                        <label class="custom-file-label"> وسيله الدفع الأولى</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="payment_2" >
                                        <label class="custom-file-label"> وسيله الدفع الأولى</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="payment_3" >
                                        <label class="custom-file-label"> وسيله الدفع الثالثه</label>
                                    </div>
                                </div>


                                <div class="form-group mb-0">
                                    <div class="checkbox checkbox-secondary">
                                        <button type="submit" class="btn btn-danger btn-block ">تعديل</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="{{url('/assets/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script>
        $("input").prop('required',true);


    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var elements = document.getElementsByTagName("INPUT");
            for (var i = 0; i < elements.length; i++) {
                elements[i].oninvalid = function(e) {
                    e.target.setCustomValidity("");
                    if (!e.target.validity.valid) {
                        e.target.setCustomValidity("رجاء إدخال كافه البيانات بصوره صحيحه");
                    }
                };
                elements[i].oninput = function(e) {
                    e.target.setCustomValidity("");
                };
            }
        })
    </script>
@endsection
