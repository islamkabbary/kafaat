@extends('admin.index')
@section('main')


    <!-- select2 Plugin -->
    <link href="{{url('/assets/plugins/select2/select2.min-rtl.css')}}" rel="stylesheet" />
    <script src="https://cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
    <style>
        *{
            font-family: 'ar';
        }
        ::placeholder{
            color: black;
        }
        fieldset
        {
            border: solid 1px #000;
            padding:10px;
            display:block;
            clear:both;
            margin:5px 0px;
        }
        legend
        {
            padding:0px 10px;
background-color: #56ad00ad;
            color:#FFF;
        }
        input.add
        {
            float:right;
        }
        input.fieldname
        {
            float:left;
            clear:left;
            display:block;
            margin:5px;
        }
        select.fieldtype
        {
            float:left;
            display:block;
            margin:5px;
        }
        input.remove
        {
            float:left;
            display:block;
            margin:5px;
        }
        #yourform label
        {
            float:left;
            clear:left;
            display:block;
            margin:5px;
        }
        #yourform input, #yourform textarea
        {
            float:left;
            display:block;
            margin:5px;
        }
        h3:hover {
            color: #15bdce;
        }

        .option-heading:hover {
            color: #E64448;
        }
        .option-heading:before           { content: "\f0dd";
             font-family: FontAwesome;
             color: #8492a6;
            padding-left: 15px;
font-size: 30px;
            transform: rotate(0deg);
            transition: transform 1s linear;
        }
        .option-heading.is-active:before { content: "\f0de";
            font-family: FontAwesome;
            color: #E64448;
            font-size: 30px;
            transform: rotate(180deg);
            transition: transform 1s linear;
        }
        .option-heading.is-active span{
            color: #E64448;
        }

        /* Helpers */
        .is-hidden { display: none; }
        .lds-hourglass {
            display: inline-block;
            position: relative;
            width: 80px;
            height: 80px;
        }
        .lds-hourglass:after {
            content: " ";
            display: block;
            border-radius: 50%;
            width: 0;
            height: 0;
            margin: 8px;
            box-sizing: border-box;
            border: 32px solid #fff;
            border-color: #fff transparent #fff transparent;
            animation: lds-hourglass 1.2s infinite;
            background-color: deepskyblue;
        }
        @keyframes lds-hourglass {
            0% {
                transform: rotate(0);
                animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
            }
            50% {
                transform: rotate(900deg);
                animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
            }
            100% {
                transform: rotate(1800deg);
            }
        }
        .lds-roller {
            display: inline-block;
            position: relative;
            width: 80px;
            height: 80px;

        }
        .lds-roller div {
            animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
            transform-origin: 40px 40px;
            color:red;
        }
        .lds-roller div:after {
            content: " ";
            display: block;
            position: absolute;
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: red;
            margin: -4px 0 0 -4px;

        }
        .lds-roller div:nth-child(1) {
            animation-delay: -0.036s;
        }
        .lds-roller div:nth-child(1):after {
            top: 63px;
            left: 63px;
        }
        .lds-roller div:nth-child(2) {
            animation-delay: -0.072s;
        }
        .lds-roller div:nth-child(2):after {
            top: 68px;
            left: 56px;
        }
        .lds-roller div:nth-child(3) {
            animation-delay: -0.108s;
        }
        .lds-roller div:nth-child(3):after {
            top: 71px;
            left: 48px;
        }
        .lds-roller div:nth-child(4) {
            animation-delay: -0.144s;
        }
        .lds-roller div:nth-child(4):after {
            top: 72px;
            left: 40px;
        }
        .lds-roller div:nth-child(5) {
            animation-delay: -0.18s;
        }
        .lds-roller div:nth-child(5):after {
            top: 71px;
            left: 32px;
        }
        .lds-roller div:nth-child(6) {
            animation-delay: -0.216s;
        }
        .lds-roller div:nth-child(6):after {
            top: 68px;
            left: 24px;
        }
        .lds-roller div:nth-child(7) {
            animation-delay: -0.252s;
        }
        .lds-roller div:nth-child(7):after {
            top: 63px;
            left: 17px;
        }
        .lds-roller div:nth-child(8) {
            animation-delay: -0.288s;
        }
        .lds-roller div:nth-child(8):after {
            top: 56px;
            left: 12px;
        }
        @keyframes lds-roller {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
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
        .bootstrap-tagsinput{
            width: 100%;
        }

        .bootstrap-tagsinput{
            width: 100%;
        }
        .label-info{
            background-color: #E64448;

        }
        .label {
            display: inline-block;
            padding: 15px;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25rem;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,
            border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
    </style>


    <div id="global-loader">
        <img src="{{url('../assets/images/loader.svg')}}" class="loader-img" alt="">
    </div>

    <div class="page">
        <div class="page-main h-100 container">

            <div class="app-content my-3 my-md-5">
                <div class="side-app">
{{--                                        <div class="card">--}}
{{--                                            <div class="card-header">--}}
{{--                                                <h3 class="card-title">File Uploads</h3>--}}
{{--                                            </div>--}}
{{--                                            <div class=" card-body">--}}
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-lg-4 col-sm-12">--}}
{{--                                                        <input type="file" class="dropify" data-height="180" />--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-lg-4 col-sm-12">--}}
{{--                                                        <input type="file" class="dropify" data-default-file="../assets/images/media/media1.jpg" data-height="180"  />--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-lg-4 col-sm-12">--}}
{{--                                                        <input type="file" class="dropify" disabled="disabled" data-height="180" />--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <br>--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <div class="custom-file">--}}
{{--                                                        <input type="file" class="custom-file-input" name="example-file-input-custom">--}}
{{--                                                        <label class="custom-file-label">Choose file</label>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                    <form id="myForm" action="{{route('courses.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="card m-b-20" style="max-width: 1000px">
                        <div class="card-header">
                            <h3 class="card-title">إضافة دورة جديدة</h3>
                        </div>


                        <div class="card-body" style="padding: 0px">


                            <a class=" " data-toggle="collapse" onclick="openAndDownToggelling(2)" href="#collapseExample0" role="button" aria-expanded="false" aria-controls="collapseExample0" style="">
                                <div id="container" class="" style="font-size: 20px;    margin-right: 35px;
    margin-top: 12px;
">
                                    <i id="icon_2" class="fa fa-angle-down fa-lg"></i>

                                    <span id="content_2" class="option-content color" style="margin-right: 15px;">
                                إضافة النظرة العامة للدورة :
                                    </span>
                                </div>


                            </a>

                            <div class="collapse" id="collapseExample0">
                                <br>
                                <div class="card card-body">


                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">النظرة العامة</label>
                                        <textarea class="form-control" name="overview" rows="4" placeholder="النظرة العامة للدورة" required></textarea>

                                    </div>



                                </div>
                            </div>
<hr>
                            <a class=" " data-toggle="collapse" onclick="openAndDownToggelling(1)" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" >

                                <div id="container" class=""  style="font-size: 20px;    margin-right: 35px

">
                                    <i id="icon_1" class="fa fa-angle-down fa-lg"></i>

                                    <span id="content_1" class="option-content color" style="margin-right: 15px;">
                                          إضافة بيانات الدورة :
                                          </span>


                                </div>






                            </a>

                            <div class="collapse" id="collapseExample">
                                <br>
                                <div class="card card-body">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputname">عنوان الدورة</label>
                                        <input type="text" name="title" class="form-control" id="exampleInputname"  placeholder="عنوان الدورة" required>
                                    </div>


                                    {{--                                    <div class="form-group">--}}
                                    {{--                                        <label class="form-label" for="exampleInputEmail1"> # كود الدورة</label>--}}
                                    {{--                                        <input type="number" name="code" class="form-control" id="exampleInputname"  placeholder="كود الدورة" required>--}}
                                    {{--                                    </div>--}}



                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputselect">نوع الدورة</label>
                                        <select class="form-control select2-show-search typeSelect" data-placeholder="Choose one (with searchbox)" name="type" id="exampleInputselect" required>

                                            <option value="1" >حضورى</option>
                                            <option value="2" >عن بعد</option>
                                            <option value="3" >مشاهدة</option>
                                        </select>
                                    </div>




                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">تخصص الدورة</label>
                                        <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)" name="specialist" id="exampleInputselect" required>
                                            @foreach($specialists as $specialist)
                                                <option value="{{$specialist->id}}">{{$specialist->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">مدة الدورة</label>
                                        <input type="number" name="duration" class="form-control" id="exampleInputname"  placeholder="مدة الدورة" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">سعر الدورة</label>
                                        <input type="number" name="price" class="form-control" id="exampleInputname"  placeholder="سعر الدورة" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">إضافة عرض ( % خصم)</label>
                                        <input type="number" name="offer" class="form-control" id="test" min="1" placeholder="إضافة عرض على هذة الدورة" >
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">تاريخ إنتهاء الدورة</label>
                                        <input type="date" name="date" class="form-control" id="txtDate"  placeholder="تاريخ الدورة" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">عدد الأيام الدورة</label>
                                        <input type="number" name="days" class="form-control" id="txtDate"  placeholder="عدد الأيام الدورة" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">رقم الإعتماد الدورة</label>
                                        <input type="number" name="assurance_number" class="form-control" id="txtDate"  placeholder="رقم الإعتماد الدورة" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">فئه حضور الدورة</label>
                                        <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)" name="attendance_type" id="exampleInputselect" required>

                                            <option value="0">رجالى</option>
                                            <option value="1">رجالى و نسائى</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="">صورة غلاف الدورة</label>
                                        <input type="file" class="dropify" name="image_cover" required>


                                    </div>
                                    <div class="form-group" style="font-family:ar;">
                                        <label class="form-label" for="exampleInputEmail1">فيديو أو صورة تعريفية للدورة</label>
                                        <input type="file" class="dropify" name="intro"
                                               required>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputselect"> الكلمات المفتاحية للدورة (قم بإضافه الكلمة واضغط مفتاح الإنتر )</label>
                                        <input type="text" data-role="tagsinput" name="tags" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <hr>
                                <a class=" " data-toggle="collapse" onclick="openAndDownToggelling(3)" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2" style="">
                                    <div id="container" class="" style="font-size: 20px;    margin-right: 35px;
    margin-top: 12px;
">
                                        <i id="icon_3" class="fa fa-angle-down fa-lg"></i>

                                        <span id="content_3" class="option-content color" style="margin-right: 15px;">
                                     إضافة بيانات المدرب :
                                        </span>
                                    </div>
                                </a>

                                <div class="collapse" id="collapseExample2">
                                    <br>
                                    <div class="card card-body">
                                <div class="form-group">
                                    <label class="form-label" for="exampleInputname">إسم مدرب الدورة</label>
                                    <input type="text" name="instructor" class="form-control" id="exampleInputname"  placeholder=" مدرب  الدورة" required>
                                </div>


                                <div class="form-group">
                                    <label class="form-label" for="exampleInputEmail1">نبذة عن مدرب الدورة (إختيارى)</label>
                                    <textarea class="form-control" name="instructor_overview" rows="4" placeholder="نبذة عن مدرب الدورة" ></textarea>

                                </div>

                                <div class="form-group">
                                    <label class="">صورة لمدرب الدورة (إختياري)</label>
                                        <input type="file" class="dropify" name="instructor_img" >


                                </div>

                                    </div>

                                </div>

                            <hr>

                                <a class="  " data-toggle="collapse" onclick="openAndDownToggelling(4)" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample3" style="padding-bottom: 25px;" >
                                    <div id="container" class="" style="font-size: 20px;    margin-right: 35px;padding-bottom: 30px;
    margin-top: 12px;
">
                                        <i id="icon_4" class="fa fa-angle-down fa-lg"></i>

                                        <span id="content_4" class="option-content color" style="margin-right: 15px;">
                                    إضف محتوى وتفاصيل الدورة  :
                                        </span>
                                    </div>
                                </a>

                                <div class="collapse" id="collapseExample3">
                                    <br>
                                    <div class="card card-body">
                                    <div class="form-group">
                                        <label > وصف الدورة</label>
                                        <textarea class="form-control" name="descriptionCourse" rows="4" placeholder="وصف الدورة" required></textarea>

                                    </div>
                                    <div class="toggle_show" style="display: none">

                                        <input type="button" value="إضافة عنوان رئيسي + " onclick="addContent()" class=" btn btn-info btn-sm" id="" style="width: 20%" />
                                    </div>

                                    <div class="card card-body toggle_show " id="row-0" style="display: none">
                                        <div>
                                            <input type="button" value="إضافة عنوان فرعى +" onclick="addButtons(0)" class="add btn btn-success btn-sm add" id="" style="
    float: left;
    width: 18%;
">

                                        </div>
                                        <fieldset id="buildyourform_0">
                                           <label>العنوان الرئيسى للمحتوى</label>

                                            <input type="text" class="form-control conflict" name="content_title[]" placeholder="إضف عنوان رئيسي" required>
                                            <br>

                                            <div class="fieldwrapper row" id="field0">
                                                <div class="col-md-3">
                                                    <input type="text" name="media_title_0" class="fieldname form-control conflict" placeholder="إضف عنوان فرعى" required>
                                                </div>
                                                <div class="col-md-2">
                                                    <select class="fieldtype form-control media_type_0 conflict " name="media_type_0[]" onchange="mediaType(0)"  required>
                                                        <option selected="" disabled=""> الصيغة </option>
                                                        <option value="0">ملف</option>
                                                        <option value="1">فيديو</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="file" name="media_file_0[]" class="fieldname form-control media_file_0 conflict" id="file_1" disabled="" placeholder="إضافة  (الفيديو أو ملف )" required>
                                                </div>
                                                <div class="col-md-2">
                                                    <select class="fieldtype form-control conflict" name="media_lock[]" required >
                                                        <option value="0">مفتوح</option>
                                                        <option value="1">مغلق</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-1">
                                                </div>
                                            </div>

                                        </fieldset>
<br>
                                        <div><input type="button" onclick="popUpAlert(0)" class=" remove2 btn btn-danger btn-sm" value="حذف" /></div>
                                    </div>

                                    <div class="content"></div>

                                        <div class="toggle_show2" >
                                            <label>معلومات إضافيه</label>
                                            <textarea class="form-control ckeditor" name="extra_info" dir="rtl"></textarea>
                                        </div>
                                </div>
                                </div>

                        </div>


                    </div>
                        <div class="form-group mb-0">
                            <div class="checkbox checkbox-secondary">
                                <button id="SubmitButton" type="submit" class="btn btn-danger btn-block " >إنشاء الدورة</button>
                            </div>
                        </div>
                    </form>
                    <div class="modal" id="deleteContentAlert" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">

                                <div class="modal-body" style="padding: 40px">
                                    <h5 class="modal-title text-danger" style="font-family: 'ab';">ةل تريد  حذف ةذا العنوان الرئيسى لمحتوى الدورة  !</h5>
                                    <input type="hidden" id="row_id">
                                </div>

                                <div class="modal-footer">
                                    <button type="button" onclick="removeContentBlock()" class="btn btn-danger">حذف</button>
                                    <button type="button" class="btn btn-info" data-dismiss="modal">لا أريد</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal" id="deleteContentMediaAlert" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="modal-body" style="padding: 40px">
                                <h5 class="modal-title text-danger" style="font-family: 'ab';text-align: center">ةل تريد  حذف ةذا العنوان الفرعى لمحتوى الدورة !</h5>
                                <input type="hidden" id="media_id">
                            </div>

                            <div class="modal-footer">
                                <button type="button" onclick="removeFieldSet()" class="btn btn-danger">حذف</button>
                                <button type="button" class="btn btn-info" data-dismiss="modal">لا أريد</button>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="modal" id="uploadingModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="modal-body text-center" style="padding: 40px">
                                <h3>جارى رفع المحتوى يرجى الإنتظار </h3>
                                <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>


    <!-- file uploads js -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js" integrity="sha512-VvWznBcyBJK71YKEKDMpZ0pCVxjNuKwApp4zLF3ul+CiflQi6aIJR+aZCP/qWsoFBA28avL5T5HA+RE+zrGQYg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput-angular.min.js" integrity="sha512-KT0oYlhnDf0XQfjuCS/QIw4sjTHdkefv8rOJY5HHdNEZ6AmOh1DW/ZdSqpipe+2AEXym5D0khNu95Mtmw9VNKg==" crossorigin="anonymous"></script>
    <script>


        CKEDITOR.replace( 'extra_info' );
        CKEDITOR.config.removeButtons  = 'About,Source,Blockquote,Anchor,Image,SpecialChar,ShowBlocks,Format,Styles,Iframe,Flash,Div,Button,TextField,Textarea,SelectionField,HiddenField,ImageButton,Save,NewPage,ExportPdf,Preview,Print,Templates,Paste,Find,Replace,CreateDiv,Format,Font,Cut,Copy,Paste,PasteText,PasteFromWord,Print,SpellChecker,Scayt,Form,Checkbox,Radio, TextField, Textarea,SelectAll,Select,Language';


    </script>
    <script >
        var counter = 0;
        var row_counter = 0;
        var field_row_counter = 0;
        var fMedia = '';
        var notValid = 1;
    </script>
    <script>
        $("#test").on("input", function() {
            if (/^0/.test(this.value)) {
                this.value = this.value.replace(/^0/, "")
            }
        })
    </script>

    <script>
        function toggleArrowView(){
            $('.arrow_1').toggleClass('rotate2 rotate');
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            var elements = document.getElementsByTagName("INPUT");
            for (var i = 0; i < elements.length; i++) {
                elements[i].oninvalid = function(e) {
                    e.target.setCustomValidity("");
                    if (!e.target.validity.valid) {
                        e.target.setCustomValidity("برجاء إدخال بيانات هذة الحقل بصورة صحيحة");
                        notValid = 0;
                    }
                };
                elements[i].oninput = function(e) {
                    e.target.setCustomValidity("");
                };
            }
        })
    </script>

<script>
    $('.conflict').prop('required',false);
</script>
    <script>

             function addButtons(counter){
                 field_row_counter++;
                var lastField =  $("#buildyourform_"+counter);
                var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
                var fieldWrapper = $("<div class=\"fieldwrapper row\" id=\"field" + field_row_counter + "\"/>");
                fieldWrapper.data("idx", intId);
                 var fName = $("<div class=\"col-md-3\"> <input type=\"text\" name=\'media_title_"+counter+"[]' class=\"fieldname form-control\" placeholder=\"إضف عنوان فرعى\" required /></div>");
                 var fType = $("<div class=\"col-md-2\"><select class=\"fieldtype form-control media_type_"+field_row_counter+" \" name=\'media_type_"+counter+"[]' onchange='mediaType("+field_row_counter+")'  required><option disabled selected>نوع </option><option value=\"0\">ملف</option><option value=\"1\">فيديو</option></select></div>");
                 fMedia    = $("<div class=\"col-md-4\"> <input type=\"file\" name=\'media_file_"+counter+"[]' class=\"fieldname form-control media_file_"+field_row_counter+"\" placeholder=\"إضافة  (الفيديو أو ملف )\" disabled required /></div>");
                 var fLock = $("<div class=\"col-md-2\"><select class=\"fieldtype form-control\" name=\'media_lock_"+counter+"[]' required><option value=\"0\">مفتوح</option><option value=\"1\">مغلق</option></select></div>");
                 var removeButton = $("<div class=\"col-md-1\"><input type=\"button\" onclick='PopUpRemoveFieldSetAlert("+field_row_counter+")' class=\"remove btn btn-danger btn-sm\" value=\"-\" /></div>");
                // removeButton.click(function() {
                //     $(this).parent().remove();
                // });
                fieldWrapper.append(fName);
                 fieldWrapper.append(fType);
                fieldWrapper.append(fMedia);
                 fieldWrapper.append(fLock);

                fieldWrapper.append(removeButton);
                $("#buildyourform_"+counter).append(fieldWrapper);
            }
            $("#preview").click(function() {
                $("#yourform").remove();
                var fieldSet = $("<fieldset id=\"yourform\"><legend>Your Form</legend></fieldset>");
                $("#buildyourform div").each(function() {
                    var id = "input" + $(this).attr("id").replace("field","");
                    var label = $("<label for=\"" + id + "\">" + $(this).find("input.fieldname").first().val() + "</label>");
                    var input;
                    switch ($(this).find("select.fieldtype").first().val()) {
                        case "checkbox":
                            input = $("<input type=\"checkbox\" id=\"" + id + "\" name=\"" + id + "\" />");
                            break;
                        case "textbox":
                            input = $("<input type=\"text\" id=\"" + id + "\" name=\"" + id + "\" />");
                            break;
                        case "textarea":
                            input = $("<textarea id=\"" + id + "\" name=\"" + id + "\" ></textarea>");
                            break;
                    }
                    fieldSet.append(label);
                    fieldSet.append(input);
                });
                $("body").append(fieldSet);
            });

    </script>

    <script>
        function addContent(){
            row_counter++;
            counter++;
            field_row_counter++;
              $('.content').append(` <div class="card card-body " id="row-`+row_counter+`"><div>
<input type="button" value="إضافة عنوان فرعى +" onclick="addButtons(`+counter+`)" class="add btn btn-success btn-sm add" id="" style="
    float: left;
    width: 18%;
"></div>
                                        <fieldset id="buildyourform_`+counter+`">

                                          <label>العناون الئيسي للمحتوى</label>

                                            <input type="text" class="form-control" name="content_title[]" placeholder="إضف عنوان رئيسي" required>
                                            <br>
                                            <div class="fieldwrapper row" id="field`+field_row_counter+`">
<div class="col-md-3">
<input type="text" name="media_title_`+counter+`[]" class="fieldname form-control" placeholder="إضف عنوان فرعى" required="">
</div>
<div class="col-md-2">
<select class="fieldtype form-control media_type_`+field_row_counter+` " name="media_type_`+counter+`[]" onchange="mediaType(`+field_row_counter+`)" required="">
<option selected disabled> الصيغة </option>
<option value="0">ملف</option>
<option value="1">فيديو</option>
</select>
</div>
<div class="col-md-4">
<input type="file" name="media_file_`+counter+`[]" class="fieldname form-control media_file_`+field_row_counter+`" id="file_`+counter+`" disabled placeholder="إضافة  (الفيديو أو ملف )" required>
</div>
<div class="col-md-2">
<select class="fieldtype form-control" name="media_lock_`+counter+`[]" required="">
<option value="0">مفتوح</option>
<option value="1">مغلق</option>
</select>
</div>
<div class="col-md-1">
</div>
</div>
                                        </fieldset>
<br>
<div><br><input type=\"button\" onclick="popUpAlert(`+row_counter+`)" class=\" remove2 btn btn-danger btn-sm\" value=\"حذف\" /></div>
                                    </div>
                                    `);
        }

        function removeContentBlock(){

            $('#row-'+$('#row_id').val()).remove();
            $('#deleteContentAlert').modal('hide').fadeOut(550);
        }

        function removeFieldSet(){
            var row_id = $('#row_id').val();
            $('#deleteContentMediaAlert').modal('hide').fadeOut(550);
            $('#field'+  row_id).remove();
        }

        function PopUpRemoveFieldSetAlert(id){
            $('#row_id').val(id);
            $('#deleteContentMediaAlert').fadeIn(550).modal({'show': true});
        }


        $('.typeSelect').on('change' , function (){
               var swietch = $(this).val();
            if (swietch == 3){
                $('.toggle_show').css('display' , 'block');
                $('.conflict').prop('required',true);
                $('.toggle_show2').css('display' , 'none');
            }else{
                $('.toggle_show').css('display' , 'none');
                $('.conflict').prop('required',false);
                $('.toggle_show2').css('display' , 'block');
            }
        })

        function mediaType(counter){

            $('.media_file_'+counter).prop('disabled', false);
            var type = $('.media_type_'+counter).val();
            if (type == 1){

                $('.media_file_'+counter).attr('accept' , 'video/*');
            }else{
                $('.media_file_'+counter).attr('accept' , ['application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf']);
            }
        }




        // jQuery(function($) { // DOM ready and $ alias in scope
        //
        //     /**
        //      * Option dropdowns. Slide toggle
        //      */
        //     $(".option-heading").on('click', function() {
        //         $(this).toggleClass('is-active').next(".option-content").stop().slideToggle(500);
        //
        //     });
        //
        // });

        function popUpAlert(id){
            $('#row_id').val(id);
            $('#deleteContentAlert').fadeIn(550).modal({'show': true});
        }
    </script>
    <script>
        if($('.typeSelect').val() == 3){
            $('.toggle_show').css('display' , 'block');
            $('.conflict').prop('required',true);
        }
    </script>
    <script>
//


        function openAndDownToggelling(id){
            $('#icon_'+id).toggleClass("fa fa-angle-down fa fa-angle-down open");
            $('#content_'+id).toggleClass("color1 color2");
        }

    </script>

    <script>
        $(document).on('submit','form#myForm',function(){
            $('#uploadingModal').fadeIn(450).show();
        });


    </script>
    <script>
        $(function(){
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if(month < 10)
                month = '0' + month.toString();
            if(day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;

            $('#txtDate').attr('min', maxDate);
        });

    </script>
    
    <script src="https://cdn.ckeditor.com/4.16.1/basic/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'overview' );
        CKEDITOR.replace( 'instructor_overview' ); 
        CKEDITOR.replace( 'extra_info' );
        CKEDITOR.replace( 'descriptionCourse' ); 
    </script>

@endsection
