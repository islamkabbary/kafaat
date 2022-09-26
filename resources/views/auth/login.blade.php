@component('components.app')
    <x-header />

  <style>
      input{
          box-shadow: 0px -1px 3px 0px rgba(0,0,0,0.2)
      }
      input:-webkit-autofill,
      input:-webkit-autofill:hover,
      input:-webkit-autofill:focus
      input:-webkit-autofill,
      textarea:-webkit-autofill,
      textarea:-webkit-autofill:hover
      textarea:-webkit-autofill:focus,
      select:-webkit-autofill,
      select:-webkit-autofill:hover,
      select:-webkit-autofill:focus {
          -webkit-text-fill-color: black;
          -webkit-box-shadow: 0 0 0px 1000px #fff inset;
      }
      ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
          color: #AAAAA9;
          opacity: 1; /* Firefox */
      }

      /*#variableModal{*/
      /*    position: absolute;left: 50%;top: 100%;transform: translate(-50%, -50%);*/

      /*}*/
      #num1Ver{
          position:relative;
          right:0px;
          top:0px;
          width:50px;
      }
      #num2Ver{
          position:relative;
          right:0px;
          top:0px;
          width:50px;
      }
      #num3Ver{
          position:relative;
          right:0px;
          top:0px;
          width:50px;
      }
      #num4Ver{
          position:relative;
          right:0px;
          top:0px;
          width:50px;
      }
      .formsInline{
          display:flex;
          position:relative;
          right:70px;
          top:50px;
      }
      .btnInModal{
          position: relative;
          right: 170px;
          top: -90px;
          font-family:ar;
      }
      .modalInRegisterLogin{
          position:relative;
          top:0px;
          height:200px;
          font-family:ar;
      }
      .messagesInRegisterLogin{
          color: black;
          font-family: ar;
          position:relative;
          top:90px;
          right:30px;
          font-family:ar;
      }
      .modalForInputsSquares{
          position:relative;
          top:120;
          font-family:ar;
          color:#808080;
      }
      .after30Seconds{
          position:relative;
          top:-60px;
      }
      .modalIndicator {
          display: none;
          position: fixed;
          z-index: 1;
          left: 0;
          top: 0;
          width: 100%;
          height: 100%;
          overflow: hidden;
          background-color: rgb(0,0,0);
          background-color: rgba(0,0,0,0.4);
      }

      /* Modal Content/Box */
      .modal-contentIndicator {
          background-color: #fefefe;
          margin: 30% auto;
          padding: 30px;
          border: 1px solid #888;
          width: 40%;
          height:300px;
          border-radius:20px;
          margin-top:190px;
      }
      #pModalIndicatorBox{
          position:relative;
          right:0px;
          top:0px;
          font-size:20px;
          font-family:ar;
          color:#808080;
          text-align:center;
      }
      @media screen and (min-width:1025px) and (max-width:1200px) {
          .formsInline{
              right:350px;
          }
          .btnInModal{
              right: 450px;
              top: -90px;
          }
          .modal-contentIndicator{
              width:100%;
              margin-top:350px;
          }
          #pModalIndicatorBox{
              right:10px;
              font-size:20px;
          }
      }
      @media only screen and (width: 1024px){
          .formsInline{
              right:350px;
          }
          .btnInModal{
              right: 450px;
              top: -90px;
          }
          .modal-contentIndicator{
              width:100%;
              margin-top:350px;
          }
          #pModalIndicatorBox{
              right:10px;
              font-size:20px;
          }
      }
      @media screen and (min-width:600px) and (max-width:991px) {
          .formsInline{
              right:220px;
          }
          .btnInModal{
              right: 315px;
              top: -90px;
          }
          .modal-contentIndicator{
              width:100%;
          }
          #pModalIndicatorBox{
              right:10px;
              font-size:20px;
          }
      }
      @media (max-width: 500px){
          .formsInline{
              right:0px;
          }
          .btnInModal{
              right: 100px;
              top: -90px;
          }
          .modal-contentIndicator{
              width:100%;
          }
          #pModalIndicatorBox{
              right:10px;
              font-size:18px;
          }
      }
      @media only screen and (width: 414px){
          .formsInline{
              right:30px;
          }
          .btnInModal{
              right: 130px;
              top: -90px;
          }
          .modal-contentIndicator{
              width:100%;
          }
          #pModalIndicatorBox{
              right:10px;
              font-size:20px;
          }
      }
      @media only screen and (width: 412px){
          .formsInline{
              right:30px;
          }
          .btnInModal{
              right: 130px;
              top: -90px;
          }
          .modal-contentIndicator{
              width:100%;
          }
          #pModalIndicatorBox{
              right:10px;
              font-size:20px;
          }
      }
      @media only screen and (width: 411px){
          .formsInline{
              right:20px;
          }
          .btnInModal{
              right: 120px;
              top: -90px;
          }
          .modal-contentIndicator{
              width:100%;
          }
          #pModalIndicatorBox{
              right:10px;
              font-size:20px;
          }
      }
      @media only screen and (width: 393px){
          .formsInline{
              right:10px;
          }
          .btnInModal{
              right: 110px;
              top: -90px;
          }
          .modal-contentIndicator{
              width:100%;
          }
          #pModalIndicatorBox{
              right:10px;
              font-size:18px;
          }
      }
      @media only screen and (width: 375px){
          .formsInline{
              right:0px;
          }
          .btnInModal{
              right: 100px;
              top: -90px;
          }
          .modal-contentIndicator{
              width:100%;
          }
          #pModalIndicatorBox{
              right:10px;
              font-size:18px;
          }
      }
      @media only screen and (width: 360px){
          .formsInline{
              right:0px;
          }
          .btnInModal{
              right: 100px;
              top: -90px;
          }
          .modal-contentIndicator{
              width:100%;
          }
          #pModalIndicatorBox{
              right:10px;
              font-size:15px;
          }
      }
      @media only screen and (width: 320px){
          .formsInline{
              right:-20px;
          }
          .btnInModal{
              right: 80px;
              top: -90px;
          }
          .modal-contentIndicator{
              width:100%;
          }
          #pModalIndicatorBox{
              right:10px;
              font-size:15px;
          }
      }
  </style>

    <div class="top-bar visita" style="background: url('../assets/images/POINTS.png') no-repeat center center fixed , linear-gradient(-90deg, rgba(161,42,33,1) 0%, rgba(225,68,72,1) 100%) ; background-size:cover; background-color:rgb(161,42,33);">

        <section>
            <div class="sptb-2 sptb-tab" style="padding-top: 145px">
    <h3 class="text-center text-white" style="font-family: 'ab'">تسجيل الدخول</h3>
            </div>
        </section>
    </div>

    <br> <br> <br>


    <section class="sptb">
        <div class="container ">
            <div class="row">
                <div class="single-page"  >
                    <div class="col-lg-5 col-xl-4 col-md-6 d-block mx-auto">
                        <div class="wrapper wrapper2" style="box-shadow:0px 5px 10px 2px rgba(0,0,0,0.2)">
                            <form id="login"  class="card-body" tabindex="500" action="{{route('login')}}">
                                @if(session()->has('success'))
                                    <div id="messageErrorEngineer3Login" style="font-family:ar;" class="alert alert-info">{{ Session::get('success') }}</div>
                                @endif
                                @csrf
                                @if ($errors->all())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <input type="hidden" value="1" name="login_scope">

                                <div class="email">
                                    <input type="email" name="email" id="email" placeholder="الإيميل / إسم المستخدم" style="font-family: 'ar'">

                                </div>

                                <div class="passwd">
                                    <input type="password" name="password" id="email" placeholder="الرقم السري"  style="font-family: 'ar';">

                                </div>
                                <div class="submit">
                                    <button class="btn btn-block" onclick="loginMuthes()" style="font-family:ar;background-color:#E64448;color:#fff; box-shadow: 1px 4px 14px 0px rgba(0,0,0,0.2)" id="login_btn">     <span id="text_login">تسجيل دخول</span>   <span class="loader_area"></span></button>
                                </div>

{{--                                <a href="{{ route('password.request') }}" class="ml-1" style="font-family: 'ar';text-decoration: underline;color: #AAAAA9" target="_blank"> &nbsp; هل نسيت كلمه المرور</a>--}}
<br>
                                <p class=" mb-0" style="font-family:'ar';color: #AAAAA9">ليس لديك حساب ؟<a href="{{route('register')}}" class="ml-1" style="color:#E64448;font-family: 'ar'"> &nbsp; التسجيل </a></p>
                            </form>
{{--                            <hr class="divider2">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="text-center">--}}
{{--                                    <div class="btn-group" style="background-color:#808080;border-radius:50%">--}}
{{--                                        <a href="https://www.google.com/">--}}
{{--                                            <img src="{{asset('assets/images/mail.svg')}}" height="40px" alt="">--}}
{{--                                        </a>--}}
{{--                                    </div>--}}

{{--                                    <div class="btn-group" style="background-color:#808080;border-radius:50%;    margin-left: 20px;--}}
{{--    margin-right: 20px;--}}
{{--}">--}}
{{--                                        <a href="https://www.instagram.com/" >--}}
{{--                                            <img src="{{asset('assets/images/instagramAchieve.svg')}}" height="40px" alt="">--}}
{{--                                        </a>--}}
{{--                                    </div>--}}

{{--                                    <div class="btn-group" style="background-color:#808080;border-radius:50%">--}}
{{--                                        <a href="https://twitter.com/">--}}
{{--                                            <img src="{{asset('assets/images/twitterAchieve.svg')}}" height="40px" alt="">--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div id="myModalIndicator" class="modalIndicator">
                <div class="modal-contentIndicator">
                    <p id="pModalIndicatorBox"></p>
                    <h6 class="heading text-center modalInRegisterLogin" id="modal_message2"></h6>
                    <button class="btn btn-danger btnInModal" id="buttonCheckCode">تأكيد الرمز</button>
                    <h6 class="after30Seconds text-center" style="color:#808080;font-family:ar;">لم يصلك رمز التحقق ؟ <a onclick="resendCode(event)" style="color:#808080;cursor:default;pointer-events:none;font-family:ar;">إعادة إرسال</a></h6>
                </div>
            </div>


            <div  class="modal" id="variableModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                <div class="modal-dialog modal-sm modal-notify modal-success" role="document" style="max-width: 400px;background-color: wheat">

                    <div class="modal-content text-center" >

                        <div class="modal-header d-flex justify-content-center text-center " >


                        </div>

                        <div class="modal-body">
                            <h6 class="heading" id="modal_message" style="color: black;font-family: ar" ></h6>

                        </div>


                    </div>

                </div>
            </div>

            <div class="modal" id="variableModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                <div class="modal-dialog modal-sm modal-notify modal-success" role="document" style="max-width: 400px;background-color: wheat">

                    <div class="modal-content text-center" style="background:white";>

                        <div class="modal-header2 d-flex justify-content-center text-center ">


                        </div>

                        <div class="modal-body">
                            <h6 class="heading text-center" id="modal_message3"></h6>
                        </div>


                    </div>

                </div>
            </div>
        </div>



    </section>

    <br><br>


    <script>
        function autotab(current,to){
            if (current.getAttribute &&
                current.value.length==current.getAttribute("maxlength")) {
                to.focus()
            }
        }
        var phoneFromUser="";
        function loginMuthes(){

            $("#login").submit(function(e) {

                //prevent Default functionality
                e.preventDefault();
$('#login_btn').prop('disabled' , true);
                //get the action-url of the form
                var actionurl = e.currentTarget.action;
                //do your own request an handle the results
                $('.loader_area').html('<i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i><span class="sr-only">Loading...</span>');
                $('#text_login').html(' جارى تسجيل الدخول ');

                $.ajax({
                    url: actionurl,
                    type: 'POST',
                    data: $('form#login').serialize(),
                    success: function(response) {


                         if(response == 1){

                            window.location.replace('{{url('/courses')}}');
                        }else{
 console.log(response);
                             $('.loader_area').html('<i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i><span class="sr-only">Loading...</span>');
                             $('#pModalIndicatorBox').text('يرجي إدخال رمز التحقق المرسل لهاتفك').css('font-family' , 'ar');
                             $('#modal_message2').empty().html(`
                                <div class="row">
                                    <form  style="direction:ltr" id="Register2" name="inputsReq" class="formsInline">
                                    @csrf
                             <div class="col-md-3">
                                 <input type="text" class="form-control" onkeyup="autotab(this ,document.inputsReq.num2)" maxlength="1" required id="num1Ver" name="num1">
                             </div>
                             <div class="col-md-3">
                                 <input type="text" class="form-control" maxlength="1" onkeyup="autotab(this ,document.inputsReq.num3)" required id="num2Ver" name="num2">
                             </div>
                             <div class="col-md-3">
                                 <input type="text" class="form-control" onkeyup="autotab(this ,document.inputsReq.num4)" required maxlength="1"  id="num3Ver" name="num3">
                             </div>
                             <div class="col-md-3">
                                 <input type="text" class="form-control" maxlength="1" id="num4Ver" required name="num4">
                             </div>
                             <input type="hidden" class="form-control" value="`+response.code+`" id="code" name="code">
                               <input type="hidden" id="password" value="" name="password" /> <input type="hidden" id="phonesFromUser" value="`+response.phone+`" name="phone" />
                                     </form>
                                 </div>`);
                             $('#myModalIndicator').fadeIn().show();
                             $('body').css('overflow' , 'hidden');
                             $('.horizontal-main').css('display' , 'none');
                             $('.registerationH3').css('display' , 'none');
                             setTimeout(function(){
                                 $('.after30Seconds a').css({
                                     'color' : '#E64448',
                                     'pointer-events' : 'auto',
                                     'cursor' : 'pointer'
                                 }).fadeIn(5000);
                                 $('.after30Seconds a').on('mouseover' , function(){
                                     $(this).css('color' , 'blue');
                                 });
                                 $('.after30Seconds a').on('mouseout' , function(){
                                     $(this).css('color' , '#E64448');
                                 });
                             } , 30000);
                            // $('#modal_message').text('هذا الحساب غير مسجل لدينا  ...برجاءإدخال البريد والرقم السرى مره أخرى  ');
                            // $('.modal-header').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>')
                            // $('#variableModal').fadeIn(450).show();
                            // setTimeout(function (){
                            //     $('#variableModal').fadeOut("slow").hide();
                            // },5000)


                        }
                        var phoneFromUser2 = $('#phonesFromUser').val();
                        phoneFromUser = phoneFromUser2
                        console.log(phoneFromUser);
                    }, error: function (jqXHR, exception) {
                        var msg = [];
                        if (jqXHR.status === 0) {
                            msg = 'Not connect.\n Verify Network.';
                        } else if (jqXHR.status == 404) {
                            msg = 'Requested page not found. [404]';
                        } else if (jqXHR.status == 500) {
                            msg = 'Internal Server Error [500].';
                        } else if (exception === 'parsererror') {
                            msg = 'Requested JSON parse failed.';
                        } else if (exception === 'timeout') {
                            msg = 'Time out error.';
                        } else if (exception === 'abort') {
                            msg = 'Ajax request aborted.';
                        } else {
                            msg.push(jqXHR.responseText);
                        }
                        $('#modal_message').text('رجاء إدخال  البريد الإلكترونى او كلمه السر بصوره صحيحه');
                        $('.modal-header').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>')
                        $('#variableModal').fadeIn(450).show();
                        setTimeout(function (){
                            $('#variableModal').fadeOut("slow").hide();
                        },5000)
                        $('#login_btn').prop('disabled' , false);
                        $('.loader_area').empty();
                        $('#text_login').html('  تسجيل الدخول ');
                    },
                });




            });


        }
         setTimeout(function(){
           $('#messageErrorEngineer3Login').fadeOut(2000);// or fade, css display however you'd like.
        }, 2000);

        $('#buttonCheckCode').on('click' , function(){
            var codeGenerated = $('#code').val();


            // document.getElementById("num1Ver").required = true;
            //   $("#Register2").submit();
            $('#Register2').on('submit' , function(e){
                e.preventDefault();
            });

          var email = $('#email').val();

            var num1 = $('#num1Ver').val();
            var num2 = $('#num2Ver').val();
            var num3 = $('#num3Ver').val();
            var num4 = $('#num4Ver').val();

            var InputUser = num1 + num2 + num3 + num4;
            console.log(InputUser);

            if(num1 == "" || num2 == "" || num3 == "" || num4 == ""){
                $('#modal_message3').text('يرجى إدخال رمز التحقق').css('font-family', 'ar');
                $('.modal-header2').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>')
                $('#variableModal2').fadeIn().show();
                setTimeout(function (){
                    $('#variableModal2').fadeOut("slow").hide();
                },4000)
            }else{
                if(codeGenerated == InputUser){
                    $.ajax({
                        url:'/verifyCodes2',
                        method:'POST',
                        data:{_token: "{{ csrf_token() }}" , email:email},
                        success:function(response){

                            window.location.href="https://kafaat2.cmark.sa/";
                        },
                    });
                }else{
                    $('#modal_message3').text('من فضلك تأكد من الرموز التأكيدية المرسلة لهاتفك').css('font-family', 'ar');
                    $('.modal-header2').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>')
                    $('#variableModal2').fadeIn().show();
                    setTimeout(function (){
                        $('#variableModal2').fadeOut("slow").hide();
                    },4000)
                }
            }
        });

        setTimeout(function(){
            $('#messageErrorEngineer3Register').fadeOut(4000);// or fade, css display however you'd like.
        }, 4000);

        setTimeout(function(){
            $('.afterErrorsAppeared').fadeOut(3000);// or fade, css display however you'd like.
        }, 3000);

        function resendCode(e){
            e.preventDefault();
            console.log('resendedCode');
            console.log(phoneFromUser);
            $.ajax({
                url:'/resendCodeForUser/'+phoneFromUser,
                method:'POST',
                data:{_token: "{{ csrf_token() }}"},
                success:function(data){
                    console.log('fromResendCode Successed');
                    //   console.log(data);
                    $('.after30Seconds a').css({
                        'color':'#808080',
                        'cursor':'default',
                        'pointer-events':'none'
                    });
                    $('.after30Seconds a').on('mouseover' , function(){
                        $(this).css('color' , '#808080');
                    });
                    $('.after30Seconds a').on('mouseout' , function(){
                        $(this).css('color' , '#808080');
                    });
                    setTimeout(function(){
                        $('.after30Seconds a').css({
                            'color' : '#E64448',
                            'pointer-events' : 'auto',
                            'cursor' : 'pointer'
                        }).fadeIn(5000);
                        $('.after30Seconds a').on('mouseover' , function(){
                            $(this).css('color' , '#808080');
                        });
                        $('.after30Seconds a').on('mouseout' , function(){
                            $(this).css('color' , '#E64448');
                        });
                    } , 30000);
                },
            });
        }
    </script>


@endcomponent
