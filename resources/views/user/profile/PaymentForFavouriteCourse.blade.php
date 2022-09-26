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

<section>
    <div class="container">
        <div class="col-md-12">
            <div class="card mb-0" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
                <div class="card-body">
                    <div class="my-favadd table-responsive border-top userprof-tab">
                        <table class="table table-bordered table-hover mb-0 text-nowrap" style="font-family:ar;color:#808080">
                            <thead>
                            <tr>
                                <th width="60%">الدورات</th>
                                <th width="40%">السعر</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $array = array(); ?>
                                
                            @if($getCourseFromFavourite->count())
                                @foreach($getCourseFromFavourite as $course)
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
                                <td class="text-center" style="font-family:ar;color:#808080;font-size:30px">{{$course->favourites_courses->price}}<span style="font-family:ar;color:red;font-size:15px">SR</span></td>
                            </tr>
                                <?php 
                                    array_push($array , $course->favourites_courses->price);
                                ?>
                                @endforeach
                                @else
                                
                            @endif
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
                                    echo "<span id='priceInThisPage' style='font-family:ar;color:#808080;font-size:30px'>" .$total . "</span>" . "<span style='font-family:ar;color:red;font-size:15px'>SR</span>";
                                    echo "<span id='priceAfterChange' style='font-family:ar;color:#808080;display:none;font-size:30px'>" .$total . "</span>";
                                ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="col-md-12">
			<div class="card" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
				<div class="card-body">
					<div class="card-pay">
						<ul class="tabs-menu nav">
							<li class=""><a href="#tab1" class="active" style="font-family:ar;" data-toggle="tab"><i class="fa fa-credit-card"></i> &nbsp;  بطاقة ائتمانية</a></li>
							<li><a href="#tab3" data-toggle="tab" style="font-family:ar;" class=""><i class="fa fa-university"></i> &nbsp;  حوالة بنكية</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active show" id="tab1">
								<div class="form-group">
									<label class="form-label" style="font-family:ar;color:#AAAAA9;">الاسم</label>
									<input type="text" class="form-control formInputPayment1" id="name1" placeholder="الاسم">
								</div>
								<div class="form-group">
									<label class="form-label" style="font-family:ar;color:#AAAAA9;">رقم الحساب</label>
									<div class="input-group">
										<input type="text" class="form-control formInputPayment2" placeholder="رقم الحساب">
										<span class="input-group-append">
											<button class="btn btn-danger" type="button"><i class="fa fa-cc-visa"></i> &nbsp; <i class="fa fa-cc-amex"></i> &nbsp;
											<i class="fa fa-cc-mastercard"></i></button>
										</span>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-8">
										<div class="form-group">
											<label class="form-label" style="font-family:ar;color:#AAAAA9;">تاريخ الانتهاء</label>
											<div class="input-group">
												<input type="number" class="form-control formInputPayment3" placeholder="MM" name="expire-month">
												<input type="number" class="form-control formInputPayment4" placeholder="YY" name="expire-year">
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<label class="form-label" style="font-family:ar;color:#AAAAA9;">CVV <i class="fa fa-question-circle"></i></label>
											<input type="number" class="form-control formInputPayment5" required="">
										</div>
									</div>
									<a class="btn text-center" onclick="functionIdentify(event)" style="font-family:ar;color:#ffffff;background-color:#E64448;cursor:pointer">شراء الآن</a>
								</div>
							</div>
							
							<div class="tab-pane" id="tab3">
								<h6 class="font-weight-semibold" style="font-family:ab;color:#808080;">تفاصيل البنك</h6>
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
            // var totalPrice = $('#priceInThisPage').text();
            // var afterDiscount = 0;
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
            //             afterDiscount = totalPrice * data.discount;
            //             document.getElementById('priceInThisPage').innerHTML = afterDiscount;
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
                                $('#modal_message').text('عذرا كود الخصم المدخل ليس موجود').css('font-family', 'ar');
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
                                $('#modal_message').text('خطأ بكود الخصم . من فضلك تأكد من كود الخصم').css('font-family' , 'ar');
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
                            $('#modal_message').('يرجي إدخال كود الخصم').css('font-family' , 'ar');
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