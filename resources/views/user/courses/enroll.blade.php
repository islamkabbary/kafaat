@component('components.app')
    <x-header />
    <style>
        ::placeholder {
            color: #000000;
            font-family:ar;
        }

        :-ms-input-placeholder {
            color: #808080;
            font-family:ar;
        }

        ::-ms-input-placeholder {
            color: #808080;
            font-family:ar;
        }
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

        input[type="file"] {
            display: none;
        }
        .custom-file-upload {
            border: 1px solid #ccc;
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
        }
        .togglingPaymentMethod{
            background-color: #f2f3f8;
        }
    </style>

    <br class="spaceHeader">
    <br class="spaceHeader">
    <br class="spaceHeader">
    <br>
    <br>
    <br>

    {{--@guest--}}

    {{--<br>--}}
    {{--<br>--}}
    {{--<section>--}}
    {{--    <div class="container">--}}
    {{--        <div class="col-md-12">--}}
    {{--			<div class="card" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">--}}
    {{--				<div class="card-header">--}}
    {{--					<h3 class="card-title" style="font-family:ab;color:#808080;">الدفع الإلكتروني</h3>--}}
    {{--				</div>--}}
    {{--				<div class="card-body">--}}
    {{--					<div class="card-pay">--}}
    {{--						<ul class="tabs-menu nav">--}}
    {{--							<li class=""><a href="#tab1" class="active" style="font-family:ar;" data-toggle="tab"><i class="fa fa-credit-card"></i> &nbsp;  بطاقة ائتمانية</a></li>--}}
    {{--							<li><a href="#tab2" data-toggle="tab" style="font-family:ar;" class=""><i class="fa fa-university"></i> &nbsp;  حوالة بنكية</a></li>--}}
    {{--						</ul>--}}
    {{--						<div class="tab-content">--}}
    {{--                            <form  action="{{url('/pay/status/'.$checkOutResponse['id']."/".$course->id)}}" class="paymentWidgets" data-brands="VISA MASTER" id="fomrsIfUserAuth"></form>--}}
    {{--							<div class="tab-pane active show" id="tab1">--}}
    {{--								<div class="form-group">--}}
    {{--									<label class="form-label" style="font-family:ar;color:#AAAAA9;">الاسم</label>--}}
    {{--									<input type="text" class="form-control formInputPayment1" id="name1" placeholder="الاسم">--}}
    {{--								</div>--}}
    {{--								<div class="form-group">--}}
    {{--									<label class="form-label" style="font-family:ar;color:#AAAAA9;">رقم الحساب</label>--}}
    {{--									<div class="input-group">--}}
    {{--										<input type="text" class="form-control formInputPayment2" dir="ltr" placeholder="رقم الحساب">--}}
    {{--										<span class="input-group-append">--}}
    {{--											<button class="btn btn-danger" type="button"><i class="fa fa-cc-visa"></i> &nbsp; <i class="fa fa-cc-amex"></i> &nbsp;--}}
    {{--											<i class="fa fa-cc-mastercard"></i></button>--}}
    {{--										</span>--}}
    {{--									</div>--}}
    {{--								</div>--}}
    {{--								<div class="row">--}}
    {{--									<div class="col-sm-8">--}}
    {{--										<div class="form-group">--}}
    {{--											<label class="form-label" style="font-family:ar;color:#AAAAA9;">تاريخ الانتهاء</label>--}}
    {{--											<div class="input-group">--}}
    {{--												<input type="number" class="form-control formInputPayment3" placeholder="MM" name="expire-month">--}}
    {{--												<input type="number" class="form-control formInputPayment4" placeholder="YY" name="expire-year">--}}
    {{--											</div>--}}
    {{--										</div>--}}
    {{--									</div>--}}
    {{--									<div class="col-sm-4">--}}
    {{--										<div class="form-group">--}}
    {{--											<label class="form-label" style="font-family:ar;color:#AAAAA9;">CVV <i class="fa fa-question-circle"></i></label>--}}
    {{--											<input type="number" class="form-control formInputPayment5" required="">--}}
    {{--										</div>--}}
    {{--									</div>--}}
    {{--									<button type="submit" onclick="functionIdentify(event)" class="btn text-center" style="font-family:ar;color:#ffffff;background-color:#E64448;">شراء الآن</button>--}}
    {{--								</div>--}}
    {{--							</div>--}}
    {{--							</form>--}}
    {{--							<div class="tab-pane" id="tab2">--}}
    {{--								<h6 class="font-weight-semibold" style="font-family:ab;color:#808080;">تفاصيل البنك</h6>--}}
    {{--								<dl class="card-text" style="font-family:ar;color:#AAAAA9;">--}}
    {{--								  <dt style="font-family:ar;color:#808080;">اسم البنك: </dt>--}}
    {{--								  <dt style="font-family:ar;color:#AAAAA9;">بنك الراجحي</dt>--}}
    {{--								</dl>--}}
    {{--								<dl class="card-text" style="font-family:ar;color:#AAAAA9;">--}}
    {{--								  <dt style="font-family:ar;color:#808080;">رقم الحساب: </dt>--}}
    {{--								  <dt style="font-family:ar;color:#AAAAA9;">2352365236623</dt>--}}
    {{--								</dl>--}}
    {{--								<dl class="card-text" style="font-family:ar;color:#AAAAA9;">--}}
    {{--								  <dt style="font-family:ar;color:#808080;">الآيبان: </dt>--}}
    {{--                                    <dt style="font-family:ar;color:#AAAAA9;">5662353</dt>--}}
    {{--								</dl>--}}
    {{--							</div>--}}
    {{--						</div>--}}
    {{--					</div>--}}
    {{--				</div>--}}
    {{--			</div>--}}
    {{--		</div>--}}
    {{--    </div>--}}
    {{--</section>--}}
    {{--		@endguest--}}

    <div class="modal" id="variableModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-sm modal-notify modal-success" role="document" style="max-width: 400px;background-color: wheat">
            <div class="modal-content text-center" style="background: aliceblue;">
                <div class="modal-header d-flex justify-content-center text-center " >

                </div>

                <div class="modal-body">
                    <h6 class="heading" id="modal_message" style="color: black;font-family: ar" ></h6>

                </div>
            </div>
        </div>
    </div>


    {{--            <form action="{shopperResultUrl}" class="paymentWidgets" data-brands="VISA MASTER"></form>--}}

    <section class="sptb">
        <div class="container">
            <div class="section-title center-block text-center">
                <h2 style="color:#808080;font-family:ar">صفحة الدفع</h2>
                <img src="{{asset('/assets/images/sub.png')}}" style="width: 150px;height: 20px">
            </div>
        @if(session()->has('response'))

            <!-- 000.100.110 success -->
                <!-- 000.200.000 pending -->
                <!-- 100.396.101 cancelling -->
                <!-- 800.100.162 declined transaction -->
                <!-- 800.100.161 too many tries -->
                @if(session()->get("response")['result']['code'] == '000.100.112' || session()->get("response")['result']['code'] == '000.100.110')
                    <div class="container-fluid alert alert-success"  style="font-family: 'ar'" >
                        <span >  حاله العمليه : عمليه دفع ناجحه</span>
                        {{--                @elseif(session()->get("response")['result']['code'] == '000.200.000')--}}
                        {{--                    <span >  حاله العمليه : عمليه الدفع معلقه</span>--}}
                        {{--                @elseif(session()->get("response")['result']['code'] == '100.396.101')--}}
                        {{--                    <span >  حاله العمليه : عمليه الدفع ملغيه </span>--}}
                        <br>
                        <span >  كود العمليه : {{session()->get("response")['id']}}</span>
                        <br>
{{--                        <span >   المبلغ الكلى : {{intval(session()->get("response")['amount'])}}  SAR</span>--}}
                    </div>
                @elseif(session()->get("response")['result']['code'] == '800.400.200')
                    <div class="container-fluid alert alert-danger"  style="font-family: 'ar'" >
                        <span >  حاله العمليه : عمليه الدفع مرفوضه</span>
                        <br>
                        <span >  كود العمليه : {{session()->get("response")['id']}}</span>
                        <br>
{{--                        <span >   المبلغ الكلى : {{intval(session()->get("response")['amount'])}}  SAR</span>--}}
                    </div>

                @elseif(session()->get("response") == '1')
                    <div class="container-fluid alert alert-success"  style="font-family: 'ar'" >
                        <span >  تم رفع إيصال الحواله البنكيه وجارى التحقق وتفعيل الدورة خلال 24 ساعة القادمة</span>

                    </div>


                @elseif(session()->get("response") == '0')
                    <div class="container-fluid alert alert-success"  style="font-family: 'ar'" >
                        <span >  عذرا هناك حدث خطأ يرجى المحاولة مرة أخرى</span>
                    </div>
                @else
                    <div class="container-fluid alert alert-warning"  style="font-family: 'ar'" >
                        <span >  حاله العمليه مرفوضه : حدث خطأ رجاء إعاده إدخال رقم الكارد وال cvv مره أخرى بصوره صحيحه أو تواصل مع البنك الخاص بك مباشر </span>
                        <br>
                        <span >  كود العمليه : {{session()->get("response")['id']}}</span>
                        <br>
{{--                        <span >@if(session()->has("response")["amount"])   المبلغ الكلى : {{intval(session()->get("response")['amount'])}} @endif  SAR</span>--}}
                    </div>
                @endif



                @guest
                    <div class="container alert alert-warning text-center">
                        <span style="font-family: 'ar'">
                            إضغط   <a href="{{url('/login')}}" style="text-decoration:underline ">هنا</a>  لتسجيل  الدخول  و تفعيل  حسابك
                             .....أو سيتم تحويل تلقائيا خلال    <span id="demo"></span>    ثوان

                        </span>
                        <script>
                            // Set the date we're counting down to
                            var countDown = 15;

                            // Update the count down every 1 second
                            var x = setInterval(function() {

                                var seconds = countDown--;



                                document.getElementById("demo").innerHTML = seconds;

                                // the count down is over, write some text
                                if (seconds == 0) {
                                    clearInterval(x);
                                    window.location.href = "{{url('/login')}}"
                                }
                            }, 1000);
                        </script>


                    </div>
                @endguest


            @endif

            @if(session()->has('failed'))
                <div class="container-fluid alert alert-danger">
                    <span >{{session()->get('failed')}}</span>

                </div>

            @endif
            @if($course->paid !=1)
                <div class="col-md-12">
                    <div class="card mb-0" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">

                        <div class="card-body">
                            <div class="my-favadd table-responsive border-top userprof-tab">
                                <table class="table table-bordered table-hover mb-0 text-nowrap" style="font-family:ar;color:#808080">
                                    <thead>
                                    <tr>
                                        <th width="50%">الدوره</th>
                                        <th width="30%">السعر</th>
                                        {{--                                    @if($course->paid == 0)--}}
                                        <th width="20%">الخصم</th>
                                        {{--                                        @endif--}}
                                    </tr>
                                    </thead>
                                    <tbody>



                                    <tr>
                                        <td>
                                            <div class="media mt-0 mb-0">
                                                <div class="card-aside-img">
                                                    <a href="#"></a>
                                                    <img src="{{$course->image_cover}}" alt="img">
                                                </div>
                                                &nbsp;&nbsp;&nbsp;
                                                <div class="media-body">
                                                    <div class="card-item-desc ml-4 p-0 mt-2">
                                                        <a href="{{url('course-details/'.$course->id)}}" class="" style="font-family:ar;color:#808080;"><h4 class="font-weight-semibold">
                                                                {{$course->title}}</h4></a><br>
                                                        <a href="#" style="font-family:ar;color:#808080;"><img src="{{asset('assets/images/clock-01.svg')}}"> {{$course->date}}</a>
                                                        <a href="#" style="font-family:ar;color:#808080;float:left;"><img src="{{asset('assets/images/offline-01.svg')}}">{{$course->type}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center" style="font-family:ar;color:#808080;font-size:30px">@if($course->offer){{$course->price_after_discount}} @else {{$course->price}} @endif<span style="font-family:ar;color:red;font-size:15px">SR</span></td>
                                        @if($course->paid == 0)
                                            <td class="text-center">
                                                {{--                                                                                                <br>--}}
                                                {{--                                                                                                <a href="/deleteCourseFromPaymentList/{{$course->id}}" class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="حذف"><i class="fa fa-trash"></i></a>--}}
                                            </td>
                                        @endif
                                    </tr>

                                    @if($course->paid == 0)
                                        <tr>
                                            <td class="text-center" style="font-family:ab;background-color:#f2f2f2;color:#808080;">كود الخصم</td>
                                            <td class="text-center" style="font-family:ar;"><input type="text" id="coooode" class="form-control codeCoupun" name="code" placeholder="كود الخصم"></td>
                                            <td class="text-center" style="font-family:ar;"><button id="btnsssss" onclick="checkCopon(event)" class="btn btn-danger">تأكيد الخصم</button></td>
                                        </tr>
                                    @endif
                                    {{--                                <tr>--}}
                                    {{--                                    <td class="text-center" style="font-family:ab;background-color:#f2f2f2;color:#808080;">الإجمالي</td>--}}
                                    {{--                                    <td class="text-center"><span id='priceInThisPage' style='font-family:ar;color:#808080;font-size:30px'>{{$course->price_after_discount}}</span><span style='font-family:ar;color:red;font-size:15px'>SR</span></td>--}}
                                    {{--                                </tr>--}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="container alert alert-success text-center" >
            <span style="font-family: 'ar'">
               إضغط  <a href="{{url('/course-details/'.$course->id)}}" style="text-decoration:underline ">هنا</a> للعوده لصفحه تفاصيل الدوره
            </span>

                </div>
            @endif
            @guest
                {{--            <div class="row">--}}
                {{--                <div class="col-md-12">--}}
                {{--                    <div class="card mb-0" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">--}}

                {{--                        <div class="card-body">--}}
                {{--                            --}}{{--                        @if(session()->has('response'))--}}
                {{--                            --}}{{--                            <div class="ribbon ribbon-top-left text-danger"><span class="bg-danger" style="font-family: 'ab">--}}
                {{--                            --}}{{--                                     @if(session()->get("response")['result']['code'] == '000.100.110')--}}
                {{--                            --}}{{--                                          عمليه دفع ناجحه--}}
                {{--                            --}}{{--                                    @elseif(session()->get("response")['result']['code'] == '000.200.000')--}}
                {{--                            --}}{{--                                          عمليه الدفع معلقه--}}
                {{--                            --}}{{--                                    @elseif(session()->get("response")['result']['code'] == '100.396.101')--}}
                {{--                            --}}{{--                                           عمليه الدفع ملغيه--}}
                {{--                            --}}{{--                                    @elseif(session()->get("response")['result']['code'] == '800.100.162')--}}
                {{--                            --}}{{--                                           عمليه الدفع مرفوضه--}}

                {{--                            --}}{{--                                    @endif--}}


                {{--                            --}}{{--                                </span></div>--}}

                {{--                            --}}{{--                        @endif--}}
                {{--                            @if($course->paid == 2)--}}
                {{--                                <div class="ribbon ribbon-top-left text-danger"><span class="bg-danger" style="font-family: 'ab">--}}
                {{--                                            عمليه الدفع معلقه--}}
                {{--                                    </span></div>--}}

                {{--                            @endif--}}
                {{--                            @if($course->paid == 3)--}}
                {{--                                <div class="ribbon ribbon-top-left text-danger"><span class="bg-danger" style="font-family: 'ab">--}}
                {{--                                            عمليه الدفع ملفيه--}}
                {{--                                    </span></div>--}}

                {{--                            @endif--}}
                {{--                            @if($course->paid == 4)--}}
                {{--                                <div class="ribbon ribbon-top-left text-danger"><span class="bg-danger" style="font-family: 'ab">--}}
                {{--                                            عمليه الدفع مرفوضه--}}
                {{--                                    </span></div>--}}

                {{--                            @endif--}}

                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--            </div>--}}
                @if(!session()->has('response'))
                    <section class="sptb container" id="userCreateBlock">

                        <div class="">
                            <div class="row ">
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="card mb-0" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
                                        <div class="alert alert-danger" style="display: none" id="userCreateError">
                                            <span class="text-white" style="font-family: 'ar'">هناك خطأ حدث</span>
                                        </div>
                                        <div class="card-header">
                                            <h3 class="card-title" style="color:#808080;font-family:ab;">تسجيل عضو جديد لشراء الدورة</h3>
                                        </div>


                                        <div class="card-body" style="padding-bottom: 0px;">
                                            <form id="fomrsIfUserNotAuth" action="{{url('fast/register/guest')}}" method="POST"  >
                                                @csrf
                                                <input id="course_id" type="hidden" value="{{$course->id}}" name="course_id">
                                                <input id="course_price" type="hidden" value="@if($course->offer){{$course->price_after_discount}}@else {{$course->price}} @endif" name="course_price">
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label" style="font-family:ar">الاسم</label>
                                                            <input type="text" id="username" name="username" class="form-control" style="color:#808080;font-family:ar;box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);" placeholder="الاسم" required>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label" style="font-family:ar">البريد الإلكتروني</label>
                                                            <input type="email"  name="email" class="form-control" style="color:#808080;font-family:ar;box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);" placeholder=" البريد الإلكتروني " required>
                                                            <span class="text-danger error_messages" id="email" style="display: none;font-family: 'ar'">البريد الإلكترونى مسجل من قبل</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label" style="font-family:ar">رقم الجوال</label>
                                                            <input type="number" name="phone" class="form-control" style="color:#808080;font-family:ar;box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);direction:rtl;" placeholder= " رقم الجوال +966" required>
                                                            <span class="text-danger error_messages" id="phone" style="display: none;font-family: 'ar'">رقم الجوال مسجل من قبل</span>
                                                        </div>
                                                    </div>
                                                    {{--                                    <div class="col-sm-6 col-md-6">--}}
                                                    {{--                                        <div class="form-group">--}}
                                                    {{--                                            <label class="form-label" style="font-family:ar">رقم الهوية</label>--}}
                                                    {{--                                            <input type="number" name="national_id" class="form-control" style="color:#808080;font-family:ar;box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);" value="" placeholder="رقم الهوية" >--}}
                                                    {{--                                        </div>--}}
                                                    {{--                                    </div>--}}
                                                    {{--                                    <div class="col-sm-6 col-md-6">--}}
                                                    {{--                                        <div class="form-group">--}}
                                                    {{--                                            <label class="form-label" style="font-family:ar">الجنسية</label>--}}
                                                    {{--                                            <input type="text" name="nationality" class="form-control" style="color:#808080;font-family:ar;box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);" value="" placeholder="الجنسية">--}}
                                                    {{--                                        </div>--}}
                                                    {{--                                    </div>--}}
                                                    {{--                                    <div class="col-sm-6 col-md-6">--}}
                                                    {{--                                        <div class="form-group">--}}
                                                    {{--                                            <label class="form-label" style="font-family:ar">الاهتمامات</label>--}}
                                                    {{--                                            <select name="interests" class="form-control" style="color:#808080;font-family:ar;box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">--}}
                                                    {{--                                                <option selected disabled>اختر اهتماماتك</option>--}}

                                                    {{--                                            </select>--}}

                                                    {{--                                        </div>--}}
                                                    {{--                                    </div>--}}
                                                    {{--                                    <div class="col-md-6">--}}
                                                    {{--                                        <div class="form-group">--}}
                                                    {{--                                            <label class="form-label" style="font-family:ar">المدينة</label>--}}
                                                    {{--                                            <input type="text" name="city" value="" style="color:#808080;font-family:ar;box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);" class="form-control" placeholder="المدينة">--}}
                                                    {{--                                        </div>--}}

                                                    {{--                                    </div>--}}
                                                    {{--                                    <div class="col-sm-6 col-md-6">--}}
                                                    {{--                                        <div class="form-group">--}}
                                                    {{--                                            <label class="form-label" style="font-family:ar">العنوان</label>--}}
                                                    {{--                                            <input type="text" name="address" value="" style="color:#808080;font-family:ar;box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);" class="form-control" placeholder="العنوان">--}}
                                                    {{--                                        </div>--}}
                                                    {{--                                    </div>--}}

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label" style="font-family:ar"> الرقم السري</label>
                                                            <input type="password"  style="color:#808080;font-family:ar;box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);" name="password" class="form-control" placeholder=" الرقم السري" required>
                                                        </div>

                                                    </div>


                                                    {{--                                    <div class="col-md-12">--}}
                                                    {{--                                        <div class="form-group mb-0">--}}
                                                    {{--                                            <div class="custom-file">--}}
                                                    {{--                                                <input type="file" class="custom-file-input" name="photo">--}}
                                                    {{--                                                <label class="custom-file-label" style="color:#808080;font-family:ar;">اضف صورة</label>--}}
                                                    {{--                                            </div>--}}
                                                    {{--                                        </div>--}}
                                                    {{--                                    </div>--}}
                                                </div>
                                                <span class="text-danger error_messages" id="password" style="display: none;font-family: 'ar'">الرقم السرى وتأكيد الرقم السرى غير متطابقان</span>
                                                <div class="image_render_div center-block" style="display: none">
                                                    <img id="image_render" src="#" width="150px" height="150px" alt="your image" class="brround" />
                                                </div>
                                                <br>
                                                <div class="form-group mb-0">

                                                    <button  onclick="fastRegister()" class="btn btn-danger btn-block "><span id="text_register" style="font-family: 'ab'">تسجيل</span> <span class="loader"></span> </button>

                                                </div>
                                                <br><br>
                                                <div class="text-center" style="position:relative;top:-20px;"><span style="font-family:ab;color:#E64448;">  عضو بالفعل ؟</span> <a style="font-family:'ar';color:#E64448;text-decoration: underline; " href="{{route('login')}}"> &nbsp;   تسجيل دخول &nbsp;</a>  </div>
                                            </form>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>
                @endif
            @endguest

        </div>
    </section>

    <br>
    <br>

    @if($course->paid == 0)
        <section id="paymentGateWaySection" style="@guest display: none @endguest">
            <div class="container">
                <div class="col-md-12">

                    <div class="alert alert-success" style="display: none;    float: right;
    width: 100%;" id="userCreateSuccess">
                        <span class="text-white" style="font-family: 'ar';float: right" id="userFastRegisterMessage">تم تسجيلك كعضو بنجاح</span>
                    </div>

                    <div class="card" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
                        <div class="card-header">
                            <h3 class="card-title" style="font-family:ab;color:#808080;">الدفع الإلكتروني</h3>
                        </div>
                        <div class="card-body">
                            <div class="card-pay" style="margin-right: 250px;">
                                <ul class="tabs-menu nav"  >
                                    <li class=""><a href="#tab1" class="active" style="font-family:ar;" data-toggle="tab"><i class="fa fa-credit-card"></i> &nbsp;  بطاقة ائتمانية</a></li>
                                    <li><a href="#tab3" data-toggle="tab" style="font-family:ar;" class=""><i class="fa fa-university"></i> &nbsp;  حوالة بنكية</a></li>
                                </ul>
                                <br>
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="tab1" style="margin-left: 250px;">
                                        <ul class="tabs-menu nav" style="margin-right: 128px" >
                                            <li id="method_1" style="border-top: 3px #00a1ff solid;cursor: pointer">
                                                {{--                                                <a class="active" data-toggle="tab" onclick="fireScript1()" href="#type1"  ></a>--}}
                                                <img class="active" data-toggle="tab" onclick="fireScript1()" href="#type1" src="{{url("uploads/courses/credits/visa.png")}}" style="width: 250px;


   " >
                                            </li>
                                            <li id="method_2" style=" border-top: 3px green solid;cursor: pointer"  class="togglingPaymentMethod">
                                                {{--                                                <a class=""  data-toggle="tab" onclick="fireScript2()" href="#type2"  ></a>--}}
                                                <img  class=""  data-toggle="tab" onclick="fireScript2()" href="#type2" src="{{url("uploads/courses/credits/mada.png")}}" style="width: 250px;

    ;">

                                            </li>


                                        </ul>
                                        @guest
                                        <div class="tab-content" >
                                            <div class="tab-pane active show"  id="type1">
                                             <div class="pay_form" >

                                                </div>
                                            </div>
                                            <div class="tab-pane "  id="type2">
                                           <div class="pay_form2" >

                                                </div>
                                            </div>
                                        </div>

@endguest

                                        @auth
                                            <div class="tab-content" >

                                                <div class="tab-pane active show" id="type1">
                                            <form  action="{{url('/pay/status/'.$checkOutResponse."/".$course->id)}}" class="paymentWidgets" data-brands="VISA MASTER" >    </form>
{{--                                            <div class="form-group">--}}
{{--                                                <label class="form-label" style="font-family:ar;color:#AAAAA9;">الاسم</label>--}}
{{--                                                <input autocomplete="off" name="card.holder" type="text" class="form-control formInputPayment1" id="name1" placeholder="الاسم">--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label class="form-label" style="font-family:ar;color:#AAAAA9;">رقم الحساب</label>--}}
{{--                                                <div class="input-group">--}}
{{--                                                    <input autocomplete="off" type="tel" name="card.number"   class="form-control formInputPayment2" placeholder="رقم الحساب">--}}
{{--                                                    <span class="input-group-append">--}}
{{--											<button class="btn btn-danger" type="button"><i class="fa fa-cc-visa"></i> &nbsp; <i class="fa fa-cc-amex"></i> &nbsp;--}}
{{--											<i class="fa fa-cc-mastercard"></i></button>--}}
{{--										</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-sm-8">--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <label class="form-label" style="font-family:ar;color:#AAAAA9;">تاريخ الانتهاء</label>--}}
{{--                                                        <div class="wpwl-group wpwl-group-expiry wpwl-clearfix">--}}
{{--                                                            <div class="wpwl-wrapper wpwl-wrapper-expiry">--}}
{{--                                                                <input autocomplete="off" type="tel" name="card.expiry" class="form-control formInputPayment4 wpwl-control wpwl-control-expiry" placeholder="MM / YY">--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-sm-4">--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <label class="form-label" style="font-family:ar;color:#AAAAA9;">CVV <i class="fa fa-question-circle"></i></label>--}}
{{--                                                        <input  autocomplete="off" type="tel" name="card.cvv"  placeholder="CVV" class="form-control formInputPayment5" required="">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                --}}{{--                                                <input type="hidden" name="shopperResultUrl" value="{{route('course-payment-confirm',$checkOutResponse['id'])}}">--}}
{{--                                                --}}{{--                                                <input type="hidden" name="card.expiryMonth" value="">--}}
{{--                                                --}}{{--                                                <input type="hidden" name="card.expiryYear" value="">--}}
{{--                                                <button type="submit" class="btn text-center wpwl-button wpwl-button-pay" style="font-family:ar;color:#ffffff;background-color:#E64448;cursor:pointer" value="شراء الآن"></button>--}}
{{--                                            </div>--}}

                                                </div>
                                                <div class="tab-pane " id="type2">
                                                    <form  action="{{url('/pay2/status/'.$checkOutResponse2."/".$course->id)}}" class="paymentWidgets" data-brands="MADA" ></form>

                                                </div>
                                            </div>
                                    @endauth
                                    </div>

                                    <div class="tab-pane container" id="tab3">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h6 class="font-weight-semibold" style="font-family:ab;color:#808080;">تفاصيل البنك</h6>
                                                <br>
                                                <dl class="card-text" style="font-family:ar;color:#AAAAA9;">
                                                    <dt style="font-family:ar;color:#808080;">اسم البنك: </dt>
                                                    <dt style="font-family:ar;color:#AAAAA9;">بنك الراجحي</dt>
                                                </dl>
                                                <dl class="card-text" style="font-family:ar;color:#AAAAA9;">
                                                    <dt style="font-family:ar;color:#808080;">رقم الحساب: </dt>
                                                    <dt style="font-family:ar;color:#AAAAA9;">2352365236623</dt>
                                                </dl>
                                                <dl class="card-text" style="font-family:ar;color:#AAAAA9;">
                                                    <dt style="font-family:ar;color:#808080;">الآيبان: </dt>
                                                    <dt style="font-family:ar;color:#AAAAA9;">5662353</dt>
                                                </dl>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="font-weight-semibold" style="font-family:ab;color:#808080;">تفاصيل العميل</h6><br>
                                                <form action="{{url('/bank_transaction/checkout/'.json_encode([$course->id]))}}" method="POST" enctype="multipart/form-data">
                                                    @csrf

                                                    <div class="form-group">

                                                        <input type="text" id="un" name="username" class="form-control" value="@auth {{auth()->guard('web')->user()->username}} @endauth" style="color:#808080;font-family:ar;box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);    background-color: white;" placeholder="الاسم" required readonly>

                                                    </div>

                                                    <div class="form-group">

                                                        <input type="email" id="el" name="el" class="form-control" style="color:#808080;font-family:ar;box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);    background-color: white;"  value="@auth {{auth()->guard('web')->user()->email}}   @endauth" placeholder=" البريد الإلكتروني " required readonly>

                                                    </div>

                                                    <div class="form-group">

                                                        <input type="text" id="ph" name="ph" class="form-control" style="color:#808080;font-family:ar;box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);direction:rtl;    background-color: white;" value="@auth {{auth()->guard('web')->user()->country_code.auth()->guard('web')->user()->phone }}+  @endauth" placeholder= " رقم الجوال +966" required disabled>

                                                    </div>

                                                    <div class="form-group">


                                                        <label for="file-upload" class="form-control custom-file-upload"  style="font-family:ar">
                                                            <i class="fa fa-cloud-upload"></i> رفع إيصال الدفع
                                                        </label>
                                                        <input name="receipt" id="file-upload" type="file" accept="image/* , application/pdf"/>
                                                    </div>
                                                    <div class="form-group mb-0">

                                                        <input type="submit" onclick="loading()" class="btn btn-danger btn-block " id="submitReceipt" style="font-family: 'ar'" value="إرسال"><span id="text_register" style="font-family: 'ab'" ></span> <span class="loader"></span>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="checkoutScript">

                <script  src="https://oppwa.com/v1/paymentWidgets.js?checkoutId=@auth{{$checkOutResponse}}@endauth"></script>
            </div>
        </section>




    @endif


    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        var checkout_id = "<?php echo @$checkOutResponse ?>";
        var checkout_id2 = "<?php echo @$checkOutResponse2 ?>";
        var course_id = "<?php echo @$course->id?>";
    </script>
   <script>

       function fireScript1(){
// alert(checkout_id);
           $("#type1").empty();
           $("#type2").empty();
           $('#checkoutScript').empty();
           $("#type1").html("<form  action='/pay/status/"+checkout_id+"/"+course_id+"'  class='paymentWidgets' data-brands='VISA MASTER' ></form>");
           var s = document.createElement("script");
           s.type = "text/javascript";
           s.src = "https://oppwa.com/v1/paymentWidgets.js?checkoutId="+checkout_id;
           $('#checkoutScript').html(s);
           $('#method_1').toggleClass("togglingPaymentMethod");
           $('#method_2').toggleClass("togglingPaymentMethod");
       }
       function fireScript2(){
           // alert(checkout_id2);
           $("#type1").empty();
           $("#type2").empty();
           $('#checkoutScript').empty();
           $("#type2").html("<form  action='/pay2/status/"+checkout_id2+"/"+course_id+"'  class='paymentWidgets' data-brands='MADA' ></form>");
           var s = document.createElement("script");
           s.type = "text/javascript";
           s.src = "https://oppwa.com/v1/paymentWidgets.js?checkoutId="+checkout_id2;
           $('#checkoutScript').html(s);
           $('#method_1').toggleClass("togglingPaymentMethod");
           $('#method_2').toggleClass("togglingPaymentMethod");
       }
   </script>
    <script>
        function loading(){
            $('.loader').html('<i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i><span class="sr-only">Loading...</span>');
            $('#submitReceipt').val('جارى رفع الفاتورة يرجى الإنتظار ....')
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#file-upload').change(function () {
                var i = $(this).prev('label').clone();
                var file = $('#file-upload')[0].files[0].name;
                if ($(window).width() < 700) {
                    $(this).prev('label').text(file.substring(0, 20)+'..' );
                } else {
                    $(this).prev('label').text(file.substring(0, 45));
                }

            });
        })
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var elements = document.getElementsByTagName("INPUT");
            for (var i = 0; i < elements.length; i++) {
                elements[i].oninvalid = function(e) {
                    e.target.setCustomValidity("");
                    if (!e.target.validity.valid) {
                        e.target.setCustomValidity("برجاء إدخال بيانات هذه الحقل بشكل صحيح");
                    }
                };
                elements[i].oninput = function(e) {
                    e.target.setCustomValidity("");
                };
            }
        })
    </script>
    <script>
        if ({{session()->has('processed')}}){
            $('#paymentGateWaySection').hide();
        }
    </script>
    <script>
        var wpwlOptions = {
            style: "plain",
            locale: "ar",

        }

        $('.wpwl-button-pay').prop('value', 'شراء الأن');
    </script>
    <script>
        setTimeout(function (){
            $('.alert-danger').hide()
        },8000);
    </script>
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
        function functionIdentify(e){
            e.preventDefault();
            $('#modal_message').text('تحت التطوير لحين جاهزية عملية الدفع');
            $('.modal-header').empty().html('<svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg>');
            $('#variableModal').fadeIn(450).show();
            setTimeout(function (){
                $('#variableModal').fadeOut("slow").hide();
            },5000);

        }

        function checkCopon(e){
            e.preventDefault();
            var totalPrice = $('#priceInThisPage').text();
            var afterDiscount = 0;
            var code = $('#coooode').val();
            if(code != ""){
                $.ajax({
                    url:'/getCouponsForUsers/'+code,
                    method:'GET',
                    success:function(response){
                        if(response == 0){
                            $('#modal_message').text('كود الخصم المدخل غير موجود . تأكد أنه (مفعل)').css('font-family', 'ar');
                            $('.modal-header').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>');
                            $('#variableModal').fadeIn(450).show();
                            setTimeout(function (){
                                $('#variableModal').fadeOut("slow").hide();
                            },4000);
                        }else if(response == 2){
                            $('#modal_message').text('عذرا كود الخصم المدخل تم استخدامه لك من قبل').css('font-family', 'ar');
                            $('.modal-header').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>');
                            $('#variableModal').fadeIn(450).show();
                            setTimeout(function (){
                                $('#variableModal').fadeOut("slow").hide();
                            },4000);
                        }else if(response == 3){
                            $('#modal_message').text('عذرا كود الخصم المدخل منتهي الصلاحية').css('font-family', 'ar');
                            $('.modal-header').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>');
                            $('#variableModal').fadeIn(450).show();
                            setTimeout(function (){
                                $('#variableModal').fadeOut("slow").hide();
                            },4000);
                        }else{
                            $('#modal_message').text('تم استخدام كود الخصم بنجاح').css('font-family' , 'ar');
                            $('.modal-header').empty().html('<svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg>');
                            $('#variableModal').fadeIn(450).show();
                            setTimeout(function (){
                                $('#variableModal').fadeOut("slow").hide();
                            },4000);

                            $('#priceAfterChange').css('display' , 'block');
                            afterDiscount = Math.trunc(totalPrice * response.discount);
                            document.getElementById('priceAfterChange').innerHTML = afterDiscount;
                            $('#priceInThisPage').css('text-decoration', 'line-through');
                        }
                    }, error:function(xhr , thrownError){
                        console.log(xhr);
                        if(xhr.status == 500){
                            $('#modal_message').text('خطأ بكود الخصم . من فضلك تأكد من كود الخصم').css('font-family', 'ar');
                            $('.modal-header').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>');
                            $('#variableModal').fadeIn(450).show();
                            setTimeout(function (){
                                $('#variableModal').fadeOut("slow").hide();
                            },4000);
                            document.getElementById('priceInThisPage').innerHTML = totalPrice;
                        }
                    },
                });
            }else{
                $('#modal_message').text('يرجي إدخال كود الخصم').css('font-family' , 'ar');
                $('.modal-header').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>');
                $('#variableModal').fadeIn(450).show();
                setTimeout(function (){
                    $('#variableModal').fadeOut("slow").hide();
                },4000);
            }
        }
    </script>

    <script>
        function fastRegister(){
            $('#fomrsIfUserNotAuth').submit(function (e){
                e.preventDefault();
                var actionURL = e.currentTarget.action;
                $('.loader').html('<i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i><span class="sr-only">Loading...</span>');
                $('#text_register').html(' جارى تسجيل عضوية جديده ');
                $.ajax({
                    url: actionURL,
                    type:'POST',
                    data: $('form#fomrsIfUserNotAuth').serialize(),
                    success:function(response){
                        $('.error_messages').css('display' , 'none');
                        if (response == 0){
                            $('#userCreateError').css('display' , 'block');
                            $('#paymentGateWaySection').css('display' , 'none');


                        }else if(response == 2){
                            $('#email').css('display' , 'block');
                            $('#paymentGateWaySection').css('display' , 'none');
                        }else if(response == 3){
                            $('#phone').css('display' , 'block');
                            $('#paymentGateWaySection').css('display' , 'none');
                        }else if(response == 4){
                            $('#password').css('display' , 'block');
                            $('#paymentGateWaySection').css('display' , 'none');
                        }else{
                            $('#paymentGateWaySection').css('display' , 'block');
                            setTimeout(function (){

                                $('#userFastRegisterMessage').text('رجاء إدخال بيانات الدفع الخاصه بكم لإتمام عمليه الدفع')
                            },3000);
                            $('#userCreateSuccess').css('display' , 'block');
                            $('#userCreateBlock').css('display' , 'none');
                            $('#un').val(response.username);
                            $('#el').val(response.email);
                            $('#ph').val(response.phone);
                            var course_id = $('#course_id').val();
                            $(".pay_form").html("<form  action='/pay/status/"+response.checkout_id+"/"+course_id+"' class='paymentWidgets' data-brands='VISA MASTER' ></form>");
                            var s = document.createElement("script");
                            s.type = "text/javascript";
                            s.src = "https://oppwa.com/v1/paymentWidgets.js?checkoutId="+response.checkout_id;
                            $('#checkoutScript').html(s);
                            checkout_id = response.checkout_id;
                            checkout_id2 = response.checkout_id2;
                            // $(".pay_form2").html("<form  action='/pay2/status/"+response.checkout_id2+"/"+course_id+"' class='paymentWidgets' data-brands='MADA' ></form>");
                            // var s2 = document.createElement("script");
                            // s2.type = "text/javascript";
                            // s2.src = "https://test.oppwa.com/v1/paymentWidgets.js?checkoutId="+response.checkout_id2;


                            $('#checkoutScript2').html(s2);

                            // alert(response.checkout_id);
                        }
                        $('.loader').empty();
                        $('#text_register').html('تسجيل');
                    }
                });
            });
        }

    </script>
@endcomponent
