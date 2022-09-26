@extends('admin.index')
@section('main')
    <!-- Data table css -->
    <link href="../assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="../assets/plugins/datatable/jquery.dataTables.min.css" rel="stylesheet" />
    <!-- file Uploads -->
    <link href="{{url('/assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css" />
    <!--Loader-->

    <!-- select2 Plugin -->
    <link href="{{url('/assets/plugins/select2/select2.min-rtl.css')}}" rel="stylesheet" />
    <script src="https://cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
    <div id="global-loader">
        <img src="../assets/images/loader.svg" class="loader-img" alt="">
    </div>
    <style>
        *{
            font-family: 'ar';
        }
        .option-heading:hover {
            color: #15bdce;
        }.option-heading:before           { content: "\25bc";color: #15bdce; }
        .option-heading.is-active:before { content: "\25b2"; }
        .fa-angle-down{
            transform: rotate(0deg);
            transition: transform 0.5s linear;
            color: #8492a6;
            font-size: xx-large;

        }

        .fa-angle-down.open{
            transform: rotate(180deg);
            transition: transform 0.5s linear;
            color: #E64448;

        }

        .color{
            color: #8492a6;
        }

        .color2{
            color: #E64448;
        }
    </style>

    <div class="page">
        <div class="page-main h-100 container">

            <div class="app-content my-3 my-md-5">
                <div class="side-app">
                    {{--                    <div class="card">--}}
                    {{--                        <div class="card-header">--}}
                    {{--                            <h3 class="card-title">File Uploads</h3>--}}
                    {{--                        </div>--}}
                    {{--                        <div class=" card-body">--}}
                    {{--                            <div class="row">--}}
                    {{--                                <div class="col-lg-4 col-sm-12">--}}
                    {{--                                    <input type="file" class="dropify" data-height="180" />--}}
                    {{--                                </div>--}}
                    {{--                                <div class="col-lg-4 col-sm-12">--}}
                    {{--                                    <input type="file" class="dropify" data-default-file="../assets/images/media/media1.jpg" data-height="180"  />--}}
                    {{--                                </div>--}}
                    {{--                                <div class="col-lg-4 col-sm-12">--}}
                    {{--                                    <input type="file" class="dropify" disabled="disabled" data-height="180" />--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                            <br>--}}
                    {{--                            <div class="form-group">--}}
                    {{--                                <div class="custom-file">--}}
                    {{--                                    <input type="file" class="custom-file-input" name="example-file-input-custom">--}}
                    {{--                                    <label class="custom-file-label">Choose file</label>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                        <div class="card m-b-20" style="max-width: 1000px">
                            <div class="card-header">
                                <h3 class="card-title">عرض  تفاصيل بيانات الدورة </h3>
                            </div>
                            <div class="card-body voc">
                                <a class=" " data-toggle="collapse" onclick="openAndDownToggelling(1)" href="#collapseExample0" role="button" aria-expanded="false" aria-controls="collapseExample0" >

                                    <div id="container" class=""  style="font-size: 20px;    margin-right: 15px
">
                                        <i id="icon_1" class="fa fa-angle-down"></i>

                                        <span id="content_1" class="option-content color" style="margin-right: 15px;">
                                      النظرة العامة للدورة :
                                        </span>

                                    </div>
                                </a>
                                <div class="collapse" id="collapseExample0">
                                    <br>
                                    <div class="card card-body">


                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputEmail1">النظرة العامة</label>
                                            <textarea class="form-control" name="overview" rows="4" placeholder="النظرة العامة للدورة" required>{{$course->overview}}</textarea>

                                        </div>




                                    </div>
                                </div>

                                <hr>
                                <a class=" " data-toggle="collapse" onclick="openAndDownToggelling(2)" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" >

                                    <div id="container" class=""  style="font-size: 20px;    margin-right: 15px
">
                                        <i id="icon_2" class="fa fa-angle-down"></i>

                                        <span id="content_2" class="option-content color" style="margin-right: 15px;">
                                         بيانات الدورة :
                                        </span>
                                    </div>
                                </a>
                                <div class="collapse" id="collapseExample">
                                    <br>
                                    <div class="card card-body">
                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputname">عنوان الدورة</label>
                                            <input type="text" name="title" class="form-control" id="exampleInputname" value="{{$course->title}}"  placeholder="عنوان الدورة" required>
                                        </div>





                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputEmail1"> # كود الدورة</label>
                                            <input type="number" name="code" class="form-control" id="exampleInputname" value="{{$course->code}}"    placeholder="كود الدورة" required>
                                        </div>


                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputselect1">نوع الدورة</label>
                                            <select class="form-control select2-show-search typeSelect" data-placeholder="Choose one (with searchbox)"   name="type" id="exampleInputselect1" required>

                                                <option value="1" @if($course->type == 'حضورى') selected @endif>حضورى</option>
                                                <option value="2" @if($course->type == 'عن بعد') selected @endif>عن بعد</option>
                                                <option value="3" @if($course->type == 'مشاةدة') selected @endif>مشاةدة</option>
                                            </select>
                                        </div>





                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputEmail1">تخصص الدورة</label>
                                            <select class="form-control select2-show-search " data-placeholder="Choose one (with searchbox)" name="specialist" id="exampleInputselect" required>
                                                @foreach($specialists as $specialist)
                                                    <option value="{{$specialist->id}}" @if($course->specialist_id == $specialist->id) selected @endif>{{$specialist->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputEmail1">مدة الدورة</label>
                                            <input type="number" name="duration" class="form-control" id="exampleInputname" value="{{$course->duration}}"  placeholder="مدة الدورة" required>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="course_offer">سعر الدورة قبل الخصم</label>
                                            <input type="number" name="price" class="form-control" id="course_price"  value="{{$course->price}}" placeholder="سعر الدورة" required>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="course_offer">سعر الدورة بعد الخصم  (% {{$course->offer}} )</label>
                                            <input type="number" name="price" class="form-control" id="course_price"  value="{{$course->price_after_discount}}" placeholder="سعر الدورة" required>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputEmail1"> العرض ( % خصم)</label>
                                            <input type="number" name="offer" class="form-control" value="{{$course->offer}}" disabled >
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputEmail1">تاريخ الدورة</label>
                                            <input type="date" name="date" class="form-control" id="exampleInputname" value="{{$course->date}}" placeholder="تاريخ الدورة" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputEmail1">عدد الأيام الدورة</label>
                                            <input type="number" name="days" class="form-control"  value="{{$course->days}}" id="txtDate"  placeholder="عدد الأيام الدورة" required>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputEmail1">رقم الإعتماد الدورة</label>
                                            <input type="number" name="assurance_number"  value="{{$course->assurance_number}}" class="form-control" id="txtDate"  placeholder="رقم الإعتماد الدورة" required>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputEmail1">فئه حضور الدورة</label>
                                            <select class="form-control select2-show-search"  data-placeholder="Choose one (with searchbox)" name="attendance_type" id="exampleInputselect" required>

                                                <option value="0" @if($course->attendance_type == 0) selected @endif>رجالى</option>
                                                <option value="1" @if($course->attendance_type == 1) selected @endif>رجالى و نسائى</option>

                                            </select>
                                        </div>
                                        <div class="form-group" style="font-family:ar;">
                                            <label class="form-label" for="exampleInputEmail1">الصورة</label>
                                            <input type="file" class="dropify" name="image_cover"
                                                   @if(@$course->image_cover != '')
                                                   data-default-file="{{$course->image_cover}}" @endif>
                                        </div>
                                        <div class="form-group" style="font-family:ar;">
                                            <label class="form-label" for="exampleInputEmail1">فيديو أو صورة تعريفية للدورة</label>
                                            <input type="file" class="dropify" name="intro"
                                                   @if(@$course->intro != '')
                                                   data-default-file="{{$course->intro}}" @endif>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputselect">تعديل الكلمات المفتاحية للدورة </label>
                                            @if($course->tags)
                                                <?php $tags = json_decode($course->tags) ?>

                                                @foreach($tags as $tag)
                                                    <span class="tag label label-info" style="color: white;background-color: #E64448">{{$tag}}<span data-role="remove"></span></span>
                                                @endforeach


                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <a class=" " data-toggle="collapse" onclick="openAndDownToggelling(3)" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2" >

                                    <div id="container" class=""  style="font-size: 20px;    margin-right: 15px
">
                                        <i id="icon_3" class="fa fa-angle-down"></i>

                                        <span id="content_3" class="option-content color" style="margin-right: 15px;">
                                         بيانات المدرب :
                                        </span>

                                    </div>
                                </a>

                                <div class="collapse" id="collapseExample2">
                                    <br>
                                    <div class="card card-body">
                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputname">إسم مدرب الدورة</label>
                                            <input type="text" name="instructor" class="form-control" id="exampleInputname" value="{{$course->instructor}}"  placeholder=" مدرب الدورة" required>
                                        </div>


                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputEmail1">نبذة عن مدرب الدورة (إختيارى)</label>
                                            <textarea class="form-control" name="instructor_overview" rows="4" placeholder="نبذة عن مدرب الدورة" >{{$course->instructor_overview}}</textarea>

                                        </div>

                                        <div class="form-group" style="font-family:ar;">
                                            <label class="form-label" for="exampleInputEmail1">صورة لمدرب الدورة (اختياري)</label>
                                            <input type="file" class="dropify" name="instructor_img"  @if(@$course->instructor_img != '')
                                            data-default-file="{{$course->instructor_img}}" @endif>
                                        </div>

                                    </div>

                                </div>

                                <hr>

                                <a class=" " data-toggle="collapse" onclick="openAndDownToggelling(4)" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample3" >

                                    <div id="container" class=""  style="font-size: 20px;    margin-right: 15px
">
                                        <i id="icon_4" class="fa fa-angle-down"></i>

                                        <span id="content_4" class="option-content color" style="margin-right: 15px;">
                                         محتوى وتفاصيل الدورة  :
                                        </span>
                                    </div>
                                </a>

                                <div class="collapse" id="collapseExample3">
                                    <br>

                                    <div class="form-group">
                                        <label > وصف الدورة</label>


                                        <textarea class="form-control" name="description" rows="4" placeholder="وصف الدورة" required>{{$course->description}}</textarea>



                                    </div>
                                    <div class="toggle_show" style="display: none">

                                        <input type="button" value="إضافة عنوان رئيسي + " onclick="addContent()" class=" btn btn-info btn-sm" id="" style="width: 20%" />
                                    </div>

                                    @if($course->registeredCourses)
                                        <?php $counter = 0 ?>
                                        <?php $field_counter = 0 ?>
                                        @foreach($course->registeredCourses as $registeredCourse)

                                            <div class="card card-body toggle_show " id="row-{{$registeredCourse->id}}"  style="display: none">
                                                <div>
                                                    <input type="button" value="إضافة عنوان فرعى +" onclick="addButtons2({{$counter}},{{$registeredCourse->id}})" class="add btn btn-success btn-sm add" id="" style="
    float: left;
    width: 18%;
">

                                                </div>
                                                <fieldset id="buildyourform_2_{{$counter}}">
                                                    <label>العنوان الرئيسى للمحتوى</label>

                                                    <input type="text" class="form-control" name="content_title_2[]" value="{{$registeredCourse->content_title}}" placeholder="إضف عنوان رئيسي" required>
                                                    <br>

                                                    @foreach($registeredCourse->media as $media)

                                                        <div class="fieldwrapper row" id="field_2_{{$field_counter}}">


                                                            <div class="col-md-3">
                                                                <input type="text" name="media_title_2_{{$counter}}[]" class="fieldname form-control" value="{{$media->media_title}}" placeholder="إضف عنوان فرعى" required>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <select class="fieldtype form-control media_type_2_{{$counter}} " id="media_type_2_{{$counter}}" name="media_type_2_{{$counter}}[]" onchange="mediaType2({{$counter}})" required>

                                                                    <option value="0" @if($media->media_type == 0) selected @endif>ملف</option>
                                                                    <option value="1" @if($media->media_type == 1) selected @endif>فيديو</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="hidden" name="media_file_temp_2_{{$counter}}[]"   value="{{substr($media->media_file, strpos($media->media_file, "files/") + 6)   }}" >

                                                                <input type="file" name="media_file_2_{{$counter}}[]"  class="fieldname form-control media_file_2_{{$counter}} dropify"  id="file_2_{{$counter}}" accept="@if($media->media_type == 1) video/* @else 'application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf'  @endif" placeholder="إضافة  (الفيديو أو ملف )" >
                                                            </div>
                                                            <div class="col-md-2">
                                                                <select class="fieldtype form-control" name="media_lock_2_{{$counter}}[]" required="">
                                                                    <option value="0" @if($media->media_lock == 0) selected @endif>مفتوح</option>
                                                                    <option value="1" @if($media->media_lock == 1) selected @endif>مغلق</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <input type="button" onclick="removeFieldSet2({{$field_counter}} , {{$media->id}})" class="remove btn btn-danger btn-sm" value="-">
                                                            </div>


                                                        </div>
                                                        <?php $field_counter++ ?>
                                                    @endforeach
                                                </fieldset>

                                                <div><input type="button" onclick="popUpAlert({{$registeredCourse->id}})" class=" remove2 btn btn-danger btn-sm" value="حذف"  /></div>
                                            </div>
                                            <?php $counter++ ?>
                                        @endforeach
                                    @endif

                                    <div class="content"></div>

                                    <div class="toggle_show2" >
                                        <label>معلومات إضافيه</label>
                                        <textarea class="form-control ckeditor" name="extra_info" dir="rtl">{!! $course->extra_info !!}</textarea>
                                    </div>
                                </div>




                            </div>
                        </div>




                </div>
            </div>
        </div>
    </div>

    <!-- file uploads js -->
    <script src="{{url('/assets/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script src="{{url('/assets/plugins/select2/select2.full.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        CKEDITOR.instances.extra_info.getData();
    </script>
    <script>
        jQuery(function($) { // DOM ready and $ alias in scope

            /**
             * Option dropdowns. Slide toggle
             */
            $(".option-heading").on('click', function() {
                $(this).toggleClass('is-active').next(".option-content").stop().slideToggle(500);
            });

        });
    </script>
    <script>
        $(".voc :input").attr("disabled", true);
        function openAndDownToggelling(id){
            $('#icon_'+id).toggleClass("fa fa-angle-down fa fa-angle-down open");
            $('#content_'+id).toggleClass("color1 color2");
        }
    </script>
@endsection
