@component('components.app')

    <x-header />
    <style>
        .table-hover tbody tr:hover{
            color:#E64448;
        }
        ::placeholder{
            font-family:ar;
            color:#808080;
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

.togglingPaymentMethod{
    background-color: #f2f3f8;
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
    </style>
    <br class="spaceHeader">
    <br class="spaceHeader">
    <br class="spaceHeader">
    <br>
    <br>
    <br>
    <section class="sptb">
        <div class="container">
            @if(session()->has('response'))
                <!-- 000.100.110 success -->
                    <!-- 000.200.000 pending -->
                    <!-- 100.396.101 cancelling -->
                    <!-- 800.100.162 declined transaction -->
                    <!-- 800.100.161 too many tries -->
                    @if(session()->get("response")['result']['code'] == '000.100.112')
                        <div class="container-fluid alert alert-success"  style="font-family: 'ar'" >
                            <span >  حاله العمليه : عمليه دفع ناجحه</span>
                            {{--                @elseif(session()->get("response")['result']['code'] == '000.200.000')--}}
                            {{--                    <span >  حاله العمليه : عمليه الدفع معلقه</span>--}}
                            {{--                @elseif(session()->get("response")['result']['code'] == '100.396.101')--}}
                            {{--                    <span >  حاله العمليه : عمليه الدفع ملغيه </span>--}}
                            <br>
                            <span >  كود العمليه : {{session()->get("response")['id']}}</span>
                            <br>
{{--                            <span >   المبلغ الكلى : {{intval(session()->get("response")['amount'])}}  SAR</span>--}}
                        </div>
                    @elseif(session()->get("response")['result']['code'] == '800.400.200')
                        <div class="container-fluid alert alert-danger"  style="font-family: 'ar'" >
                            <span >  حاله العمليه : عمليه الدفع مرفوضه</span>
                            <br>
                            <span >  كود العمليه : {{session()->get("response")['id']}}</span>
                            <br>
{{--                            <span >   المبلغ الكلى : {{intval(session()->get("response")['amount'])}}  SAR</span>--}}
                        </div>

                    @elseif(session()->get("response") == '1')
                        <div class="container-fluid alert alert-success"  style="font-family: 'ar'" >
                            <span >  تم رفع إيصال الحواله البنكيه وجارى التحقق وتفعيل الدورة خلال 24 ساعة القادمة</span>
                            ....... سيتم تحويل تلقائيا خلال <span id="demo"></span>    ثوان
                        </div>
                        <script>
                            // Set the date we're counting down to
                            var countDown = 12;

                            // Update the count down every 1 second
                            var x = setInterval(function() {

                                var seconds = countDown--;



                                document.getElementById("demo").innerHTML = seconds;

                                // If the count down is over, write some text
                                if (seconds == 0) {
                                    clearInterval(x);
                                    window.location.href = "{{url('/courses')}}"
                                }
                            }, 1000);
                        </script>

                    @elseif(session()->get("response") == '0')
                        <div class="container-fluid alert alert-success"  style="font-family: 'ar'" >
                            <span >  عذرا هناك خطأ حدث يرجى المحاولة مرة أخرى</span>
                        </div>
                    @else
                        <div class="container-fluid alert alert-warning"  style="font-family: 'ar'" >
                            <span >  حاله العمليه : خطا حدث بسبب كثرة المحاولات </span>
                            <br>
                            <span >  كود العمليه : {{session()->get("response")['id']}}</span>
                            <br>
{{--                            <span >   المبلغ الكلى : {{intval(session()->get("response")['amount'])}}  SAR</span>--}}
                        </div>
                    @endif
            @endif

    @if(session()->has('error'))

        <div class="container-fluid alert alert-warning" style="font-family: 'ar'" >
            <span style="float: right">{{session()->get('error')}}</span>
{{--            <script>--}}
{{--                setTimeout(function (){--}}

{{--                    window.location.href('/courses');--}}
{{--                },5000)--}}
{{--            </script>--}}
        </div>

    @endif
        </div>
    </section>
    @if($payments->count() > 0)
<section class="sptb">
    <div class="container">
         <div class="section-title center-block text-center">
            <h2 style="color:#808080;font-family:ar">صفحة الدفع</h2>
            <img src="{{asset('/assets/images/sub.png')}}" style="width: 150px;height: 20px">
        </div>
        <div class="row">
            <div class="col-md-12">


                @if(session()->has('failed'))
                    <div class="container-fluid alert alert-danger" style="padding: 40px;font-family: 'ar'">
                        <span style="float: right">{{session()->get('failed')}}</span>

                    </div>

                @endif
                <div class="card mb-0" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
                    <div class="card-body">
{{--                        @if(session()->has('response'))--}}
{{--                            <div class="ribbon ribbon-top-left text-danger"><span class="bg-danger" style="font-family: 'ab">--}}
{{--                                     @if(session()->get("response")['result']['code'] == '000.100.110')--}}
{{--                                        عمليه دفع ناجحه--}}
{{--                                    @elseif(session()->get("response")['result']['code'] == '000.200.000')--}}
{{--                                        عمليه الدفع معلقه--}}
{{--                                    @elseif(session()->get("response")['result']['code'] == '100.396.101')--}}
{{--                                        عمليه الدفع ملغيه--}}
{{--                                    @elseif(session()->get("response")['result']['code'] == '800.100.162')--}}
{{--                                        عمليه الدفع مرفوضه--}}

{{--                                    @endif--}}


{{--                                </span></div>--}}

{{--                        @endif--}}
                        <div class="my-favadd table-responsive border-top userprof-tab">
                            <table class="table table-bordered table-hover mb-0 text-nowrap" style="font-family:ar;color:#808080">
                                <thead>
                                <tr>
                                    <th width="50%">الدورات</th>
                                    <th width="30%">السعر</th>
                                    <th width="20%"></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $array = array(); ?>
                                    <?php $ids = []?>


                                    @foreach($payments as $course)
                                        <?php array_push($ids , $course->course->id) ?>
                                <tr>
                                    <td>
                                        <div class="media mt-0 mb-0">
                                            <div class="card-aside-img">
                                                <a href="#"></a>
                                                <img src="{{$course->course->image_cover}}" alt="img">
                                            </div>
                                            &nbsp;&nbsp;&nbsp;
                                            <div class="media-body">
                                                <div class="card-item-desc ml-4 p-0 mt-2">
                                                    <a href="#" class="" style="font-family:ar;color:#808080;"><h4 class="font-weight-semibold">
                                                        {{$course->course->title}}</h4></a><br>
                                                    <a href="#" style="font-family:ar;color:#808080;"><img src="{{asset('assets/images/clock-01.svg')}}"> {{$course->course->date}}</a>
                                                    <a href="#" style="font-family:ar;color:#808080;float:left;"><img src="{{asset('assets/images/offline-01.svg')}}">{{$course->course->type}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center" style="font-family:ar;color:#808080;font-size:30px">@if($course->course->offer){{$course->course->price_after_discount}} @else {{$course->course->price}} @endif<span style="font-family:ar;color:red;font-size:15px">SR</span></td>
                                    <td class="text-center">
                                        <br>
                                        <a href="/deleteCourseFromPaymentList/{{$course->course->id}}" class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="حذف"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php
                                if($course->course->offer)
                                    array_push($array , $course->course->price_after_discount);
                                else
                                    array_push($array , $course->course->price);
                                ?>

                                    @endforeach



                                <tr>
                                    <td class="text-center" style="font-family:ab;background-color:#f2f2f2;color:#808080;">كود الخصم</td>
                                    <td class="text-center" style="font-family:ar;"><input type="text" id="coooode" class="form-control codeCoupun" name="code" placeholder="كود الخصم"></td>
                                    <td class="text-center" style="font-family:ar;"><button id="btnsssss" onclick="checkCopon(event)" class="btn btn-danger">تأكيد الخصم</button></td>
                                </tr>
                                <tr>
                                    <td class="text-center" style="font-family:ab;background-color:#f2f2f2;color:#808080;">الإجمالي</td>
                                    <td class="text-center"><?php $total=0;
                                        for($i = 0 ; $i < count($array) ; $i++){
                                            $total = $total + $array[$i];
                                        }
                                        echo "<span id='priceInThisPage' style='font-family:ar;color:#808080;font-size:30px'>" .intval($total) . "</span>" . "<span style='font-family:ar;color:red;font-size:15px'>SR</span>";
                                        echo "<span id='priceAfterChange' style='font-family:ar;color:#808080;display:none;font-size:30px'>" .$total . "</span>";
                                    ?></td>
                                </tr>
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

<section id="paymentGateWaySection">
    <div class="container">
        <div class="col-md-12">

			<div class="card" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
				<div class="card-header">
					<h3 class="card-title" style="font-family:ab;color:#808080;">الدفع الإلكتروني</h3>
				</div>
				<div class="card-body">
					<div class="card-pay" style="margin-right: 250px;">
						<ul class="tabs-menu nav">
							<li class=""><a href="#tab1" class="active" style="font-family:ar;" data-toggle="tab"><i class="fa fa-credit-card"></i> &nbsp;  بطاقة ائتمانية</a></li>
							<li><a href="#tab3" data-toggle="tab" style="font-family:ar;" class=""><i class="fa fa-university"></i> &nbsp;  حوالة بنكية</a></li>
						</ul>

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


                                <div class="tab-content" >

                                    <div class="tab-pane active show" id="type1">
                                    <form  action="{{route('pay-status',["checkoutWizard" =>$checkOutResponse,"ids" => json_encode($ids)])}}" class="paymentWidgets" data-brands="VISA MASTER" id="fomrsIfUserAuth">

{{--								<div class="form-group">--}}
{{--									<label class="form-label" style="font-family:ar;color:#AAAAA9;">الاسم</label>--}}
{{--									<input type="text" class="form-control formInputPayment1" id="name1" placeholder="الاسم">--}}
{{--								</div>--}}
{{--								<div class="form-group">--}}
{{--									<label class="form-label" style="font-family:ar;color:#AAAAA9;">رقم الحساب</label>--}}
{{--									<div class="input-group">--}}
{{--										<input type="text" class="form-control formInputPayment2" placeholder="رقم الحساب">--}}
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
{{--									<a class="btn text-center" onclick="functionIdentify(event)" style="font-family:ar;color:#ffffff;background-color:#E64448;cursor:pointer">شراء الآن</a>--}}
{{--								</div>--}}
                                </form>
							</div>
                                    <div class="tab-pane " id="type2">
                                        <form  action="{{url('/pay2/status/'.$checkOutResponse2."/".$course->id)}}" class="paymentWidgets" data-brands="MADA" ></form>

                                    </div>
                                </div>
                            </div>

							<div class="tab-pane" id="tab3">
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

                                    <form action="{{route('pay-status2', json_encode($ids))}}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">

                                            <input type="text" id="username" name="username" class="form-control" value="@auth {{auth()->guard('web')->user()->username}} @else{{session()->get("user_name")}}" @endauth" style="color:#808080;font-family:ar;box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);    background-color: white;" placeholder="الاسم" required readonly>

                                        </div>

                                        <div class="form-group">

                                            <input type="email"  name="email" class="form-control" style="color:#808080;font-family:ar;box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);    background-color: white;"  value="@auth {{auth()->guard('web')->user()->email}} @else{{session()->get("user_email")}}  @endauth" placeholder=" البريد الإلكتروني " required readonly>

                                        </div>

                                        <div class="form-group">

                                            <input type="text" name="phone" class="form-control" style="color:#808080;font-family:ar;box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);direction:rtl;    background-color: white;" value="@auth {{auth()->guard('web')->user()->country_code.auth()->guard('web')->user()->phone }}+ @else{{session()->get("user_phone")}}  @endauth" placeholder= " رقم الجوال +966" required readonly>

                                        </div>


                                        <div class="form-group">


                                            <label for="file-upload" class="form-control custom-file-upload"  style="font-family:'ar'">
                                                <i class="fa fa-cloud-upload"></i> رفع إيصال الدفع
                                            </label>
                                            <input name="receipt" id="file-upload" type="file" accept="image/* , application/pdf" style="visibility: hidden"/>
                                        </div>
                                        <div class="form-group mb-0">

                                            <input type="submit"  onclick="loading()"  class="btn btn-danger btn-block " id="submitReceipt" style="font-family: 'ar';" value="إرسال"><span id="text_register" style="font-family: 'ab'" ></span> <span class="loader"></span> </a>

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
    <div id="checkoutScript">

        <script  src="https://oppwa.com/v1/paymentWidgets.js?checkoutId={{$checkOutResponse}}"></script>
    </div>
</section>
    @else
        <div class="container alert alert-warning text-center" >
            <span style="font-family: 'ar'">
               إضغط  <a href="{{url('/courses')}}" style="text-decoration:underline ">هنا</a> للعوده لصفحه الدورات الرئيسيه
            </span>

        </div>
@endif

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
        function loading(){
            $('.loader').html('<i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i><span class="sr-only">Loading...</span>');
            $('#submitReceipt').val('جارى رفع الفاتورة يرجى الإنتظار ....')
        }
    </script>
    <script>
        if ({{session()->has('processed')}}){
            $('#paymentGateWaySection').hide();
        }
    </script>
    <script>
        var wpwlOptions = {
            style: "plain",
            locale: "ar"

        }

        $('.wpwl-button-pay').prop('value', 'شراء الأن');
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


            // $('#coooode').on('input' , function(e){
            //     var couponFromUser = e.target.value;
            //     // console.log(couponFromUser);
            //     console.log(totalPrice);
            //     $.ajax({
            //       url:'/getCouponsForUsers',
            //       method:'GET',
            //       success:function(data){
            //         //   console.log(data);
            //         if(couponFromUser == data.code){
            //          afterDiscount = totalPrice * data.discount;
            //          document.getElementById('priceInThisPage').innerHTML = afterDiscount;
            //         }else{
            //             console.log('Not Found');
            //             document.getElementById('priceInThisPage').innerHTML = totalPrice;
            //         }
            //       }
            //     });
            // });
        });

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
        function functionIdentify(e){
            e.preventDefault();
             $('#modal_message').text('تحت التطوير لحين جاهزية عملية الدفع');
             $('.modal-header').empty().html('<svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg>');
             $('#variableModal').fadeIn(450).show();
             setTimeout(function (){
                $('#variableModal').fadeOut("slow").hide();
                },4000);
                console.log('fahmy');
        }
    </script>
@endcomponent
