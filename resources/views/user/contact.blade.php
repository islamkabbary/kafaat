@component('components.app')

    <x-header />

    <br class="spaceHeader">
    <br class="spaceHeader">
    <br class="spaceHeader">
    <br>
    <br>
    <br>
    <br>

    <div class="container">
        <div class="section-title center-block text-center">
            <h2 style="color:#808080;font-family:ar">تواصل معنا</h2>
            <img src="{{asset('/assets/images/sub.png')}}" style="width: 150px;height: 20px">
        </div>
 <div class="sptb bg-white">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="row text-white">
							<div class="col-lg-6 col-md-12">
								<div class="card border-0" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
									<div class="support-service" style="background-color:#fff">
										<i class="fa fa-phone"></i>
										<h6 style="color:#E64448;font-family:ar;direction:ltr;">+9660553273701 </h6>
										<P style="color:#E64448;font-family:ar;">رقم الجوال</P>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-12">
								<div class="card border-0" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
									<div class="support-service" style="background-color:#fff">
										<i class="fa fa-clock-o"></i>
										<h6 style="color:#E64448;font-family:ar;">    الاحد – الخميس ( 5م – 9م )   </h6>
										<p style="color:#E64448;font-family:ar;">ساعات العمل</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-12">
								<div class="card border-0 mb-lg-0" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
									<div class="support-service" style="background-color:#fff">
										<i class="fa fa-map-marker"></i>
										<h6 ><a style="color:#E64448;font-family:ar;" target="_blank" href="https://www.google.com/maps/place/معهد+كفاءات+الأعمال+للتدريب%E2%80%AD/@18.2985075,42.7614666,17z/data=!3m1!4b1!4m5!3m4!1s0x15e35378d10ee28b:0x529d919dc32dd7f8!8m2!3d18.2985075!4d42.7592779?shorturl=1"> خميس مشيط - حي الصقور - طريق الامير سلطان </a></h6>
										<p style="color:#E64448;font-family:ar;">الموقع الجغرافي</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-12">
								<div class="card border-0 mb-0" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
									<div class="support-service" style="background-color:#fff">
										<i class="fa fa-envelope-o"></i>
										<h6 style="color:#E64448;font-family:ar;">hello@kafaat22.com</h6>
										<p style="color:#E64448;font-family:ar;">البريد الإلكتروني</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="sptb">
			<div class="container">
				<div class="row">
				    <div class="col-md-12">
                        <form id="registerContactUs">
                            @csrf
                            <div class="card mb-0" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
                                <div class="card-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control nameInContactUs" style="height:50px;box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);" name="name" id="name1" placeholder="الاسم">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control emailInContactUs" style="height:50px;box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);" name="email" id="email1" placeholder="الايميل">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control phoneInContactUs" style="height:50px;box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);" name="phone" id="phone1" placeholder="الجوال">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control messageInContactUs" id="message1" style="resize:none;box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2)" name="message" rows="6" placeholder="الرسالة"></textarea>
                                    </div>
                                        <button type="submit" onclick="storeToContactServer()" class="btn form-control" style="height:50px;background-color:#E64448;color:#ffffff;font-family:ar;box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">إرسال</button>
                                </div>
                            </div>
                        </form>
					</div>
				</div>
			</div>
		</div>
		<!--/Contact-->
		<div class="modal" id="variableModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
            <div class="modal-dialog modal-sm modal-notify modal-success" role="document" style="max-width: 400px;background-color: wheat">

                <div class="modal-content text-center" style="background:white";>

                    <div class="modal-header2 d-flex justify-content-center text-center ">


                    </div>

                    <div class="modal-body">
                        <h6 class="heading text-center" id="modal_message2"></h6>
                    </div>


                </div>

            </div>
        </div>
    </div>

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

            try{
                var phone = document.getElementById('phone');
                phone.addEventListener('input' , function(e){
                    var tel = e.target.value;
                   if(tel.length != 0){
                       $(this).css('direction' , 'ltr');
                   }else{
                       $(this).css('direction' , 'rtl');
                   }
                });
            }catch(e){

            }
        });

        function storeToContactServer(){
            $('#registerContactUs').on('submit' , function(e){
               e.preventDefault();
            });

            var name = $('#name1').val();
            var email = $('#email1').val();
            var phone = $('#phone1').val();
            var message = $('#message1').val();

            if(name == "" || email == "" || phone == "" || message == ""){
                $('#modal_message2').text('من فضلك أدخل بيانات التواصل بصورة صحيحة').css('font-family', 'ar');
                $('.modal-header2').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>')
                $('#variableModal2').fadeIn().show();
                setTimeout(function (){
                    $('#variableModal2').fadeOut("slow").hide();
                },4000)
            }else{
                $.ajax({
                 url: "{{ route('userContact') }}",
                 type: 'POST',
                 data: {_token: "{{ csrf_token() }}", name: name, email:email, phone:phone, message:message},
                 success: function (returnedMessage) {
                     if (returnedMessage == 0) {
                            $('#modal_message2').text('البريد الإلكتروني المدخل موجود مسبقا').css('font-family', 'ar');
                            $('.modal-header2').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>')
                            $('#variableModal2').fadeIn().show();
                            setTimeout(function (){
                                $('#variableModal2').fadeOut("slow").hide();
                            },4000)
                     }else{
                            $('#modal_message2').text('سوف يتم الرد علي استفسارك في أقرب وقت').css('font-family' , 'ar');
                            $('.modal-header2').empty().html('<svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg>');
                            $('#variableModal2').fadeIn(450).show();
                            setTimeout(function (){
                                $('#variableModal2').fadeOut("slow").hide();
                                },4000);
                    }
                 },
                 error: function (exception) {
                     console.log(exception);
                 }
             });
            }
        }
    </script>
@endcomponent
