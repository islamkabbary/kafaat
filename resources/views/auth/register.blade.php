@component('components.app')
<x-header />
<style>
    .horizontal-main{
        height:200px;
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
    ::placeholder{
        color:#808080;
        font-family:ar;
    }
    #phone::placeholder{
        direction:ltr;
    }
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

<h3 class="text-center registerationH3">التسجيل</h3>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<section class="sptb">
    <div class="container customerpage">
        <div class="row">
            <div class="single-page" >
                <div class="col-lg-5 col-xl-4 col-md-6 d-block mx-auto">
                    <div class="wrapper wrapper2">
                        <form id="Register" class="card-body" tabindex="500">
                            @if(session()->has('success'))
                                <div id="messageErrorEngineer3Register" style="font-family:ar;" class="alert alert-danger">{{ Session::get('success') }}</div>
                            @endif
                            @error('num1')
                                <div class="alert alert-danger" id="messageErrorEngineer3Register2" style="font-family:ar">{{ $message }}</div>
                            @enderror
                           @csrf
                            
                            <div class="username">
                                <input type="text"style="font-family:ar" id="username" value="{{ old('username') }}" name="username">
                                <label style="font-family:ar">الأسم</label>
                            </div>
                            <div class="email">
                                <input type="email" style="font-family:ar" id="email" value="{{ old('email') }}" name="email">
                                <label style="font-family:ar">الأيميل</label>
                            </div>
                            <div class="phone">
                                <input style="font-family:ar" id="phone" type="text" placeholder="+966544754648" value="{{ old('phone') }}" name="phone">
                                <label style="font-family:ar">الجوال</label>
                                
                            </div>
                            <div class="passwd">
                                <input type="password" style="font-family:ar" id="password" name="password">
                                <label style="font-family:ar">الرقم السري</label>
                            </div>
                            <div class="submit">
                                <button class="btn btn-block" id="btnClickGlobal" onclick="RegisterMuthes()" type="submit" style="font-family:ar;background-color:#E64448;color:#fff">تسجيل<span class="loader_area"></span></button>
                            </div>
                            <p class="text-dark mb-0" style="font-family:ar">هل لديك حساب ؟<a href="{{ route('login') }}" class="ml-1" style="color:#E64448"> &nbsp; تسجيل دخول </a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <!--<div class="modal" id="variableModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color:black;opacity:0.98">-->
        <!--        <div class="modal-dialog modal-sm modal-notify modal-success" role="document" style="max-width: 400px;background-color: wheat">-->
        <!--            <div class="modal-content text-center modalInRegisterLogin" style="background-color:white">-->
        <!--                <div class="modal-header d-flex justify-content-center text-center modalForInputsSquares">-->

                            
        <!--                </div>-->
        <!--<select name="country_code" id="" class="form-control col-md-3">-->
        <!--                            <option data-countryCode="SA" value="966">Saudi Arabia (+966)</option>-->
        <!--                        </select>-->

        <!--                <div class="modal-body">-->
        <!--                    <h6 class="heading text-center messagesInRegisterLogin" id="modal_message"></h6>-->
                            <!--<button class="btn btn-danger btnInModal" id="buttonCheckCode">تأكيد الرمز</button>-->
                            <!--<h6 class="after30Seconds text-center" style="display:none;pcolor:#808080;font-family:ar;">لم يصلك رمز التحقق ؟ <a  href="#"style="color:#E64448;cursor:pointer;font-family:ar;">إعادة إرسال</a></h6>-->
        <!--                </div>-->

        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
            
            <div id="myModalIndicator" class="modalIndicator">
                <div class="modal-contentIndicator">
                    <p id="pModalIndicatorBox"></p>
                    <h6 class="heading text-center modalInRegisterLogin" id="modal_message"></h6>
                    <button class="btn btn-danger btnInModal" id="buttonCheckCode">تأكيد الرمز</button>
                    <h6 class="after30Seconds text-center" style="color:#808080;font-family:ar;">لم يصلك رمز التحقق ؟ <a onclick="resendCode(event)" style="color:#808080;cursor:default;pointer-events:none;font-family:ar;">إعادة إرسال</a></h6>
                </div>
            </div>
            
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
</section>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
        function autotab(current,to){
            if (current.getAttribute && 
              current.value.length==current.getAttribute("maxlength")) {
                to.focus() 
                }
        }
        
    $(window).on('resize' , function(){
        
        if ($(window).width() < 991) {
           $('.horizontalMenu-list li a').css('color' , '#808080');
        }
        else {
           $('.horizontalMenu-list li a').css('color' , '#ffffff')
        }
    });
    $(window).scroll(function(){
        if($(window).scrollTop() > 100){
            $('.horizontal-main').css('height' , '65px');
            $('.registerationH3').css('display' , 'none');
        }
        else{
            $('.horizontal-main').css('height' , '200px');
            $('.registerationH3').css('display' , 'block');
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
    var phoneFromUser="";
    function RegisterMuthes(){
        $("#Register").submit(function(e) {
            e.preventDefault();
        });
        var username = $('#username').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var password = $('#password').val();
        var maxLengthPassword = 8;
        if(username == "" || email == "" || phone == "" || password == ""){
            $('#modal_message2').text('تأكد من إدخال جميع البيانات بصورة صحيحة').css('font-family', 'ar');
                $('.modal-header2').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>')
                $('#variableModal2').fadeIn().show();
                setTimeout(function (){
                    $('#variableModal2').fadeOut("slow").hide();
                },4000)
        }else if(password.length < maxLengthPassword){
            $('#modal_message2').text('الرقم السري ليس أقل من 8 رموز . تأكد من إدخال الرقم السري').css('font-family' , 'ar');
                $('.modal-header2').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>')
                $('#variableModal2').fadeIn().show();
                setTimeout(function (){
                    $('#variableModal2').fadeOut("slow").hide();
                },4000)
        }else{
            $('.loader_area').html('<i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i><span class="sr-only">Loading...</span>');
            $('#btnClickGlobal').prop('disabled' , true);
            $.ajax({
                url: '/RegisterUser',
                type: 'POST',
                data: $('form#Register').serialize(),
                success: function(response) {
                    if(response == 0){
                        $('#modal_message2').text('هذا البريد الإلكتروني موجود مسبقا. من فضلك تأكد من صحة البريد الإلكتروني').css('font-family', 'ar');
                        $('.modal-header2').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>')
                        $('#variableModal2').fadeIn().show();
                        setTimeout(function (){
                            $('#variableModal2').fadeOut("slow").hide();
                        },4000)
                        $('.loader_area').css('display' , 'none');
                        $('#btnClickGlobal').prop('disabled' , false);
                    }else if(response == 1){
                        $('#modal_message2').text('هذا الجوال موجود مسبقا. من فضلك تأكد من صحة الجوال المدخل').css('font-family', 'ar');
                        $('.modal-header2').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>')
                        $('#variableModal2').fadeIn().show();
                        setTimeout(function (){
                            $('#variableModal2').fadeOut("slow").hide();
                        },4000)
                        $('.loader_area').css('display' , 'none');
                        $('#btnClickGlobal').prop('disabled' , false);
                    }else{
                        console.log(response);
                        $('#pModalIndicatorBox').text('يرجى إدخال رمز التحقق المرسل لهاتفك').css('font-family' , 'ar');
                        $('#modal_message').empty().html(`
                        <div class="row">
                            <form style="direction:ltr" id="Register2" name="inputsReq" class="formsInline">
                                <div class="col-md-3">
                                    <input type="text" class="form-control" onkeyup="autotab(this ,document.inputsReq.num2)" maxlength="1" id="num1Ver" name="num1">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" maxlength="1" onkeyup="autotab(this ,document.inputsReq.num3)" id="num2Ver" name="num2">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" onkeyup="autotab(this ,document.inputsReq.num4)" maxlength="1"  id="num3Ver" name="num3">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" maxlength="1" id="num4Ver" name="num4">
                                </div>
                                <input type="hidden" id="username" value="`+response.username+`" name="username" /> <input type="hidden" id="email" value="`+response.email+`" name="email" />
                                <input type="hidden" id="password" value="`+response.password+`" name="password" /> <input type="hidden" id="phonesFromUser" value="`+response.phone+`" name="phone" />
                                <input type="hidden" id="codeFromServer" value="`+response.Code+`" />
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
                              $(this).css('color' , '#808080'); 
                           });
                           $('.after30Seconds a').on('mouseout' , function(){
                              $(this).css('color' , '#E64448'); 
                           });
                        } , 30000);
                    }
                    var phoneFromUser2 = $('#phonesFromUser').val();
                    phoneFromUser = phoneFromUser2
                    console.log(phoneFromUser);
                }, error: function (error) {
                    $('#modal_message2').text('تأكد من إدخال البريد الإلكتروني وكلمة السر 8 حروف أو أكثر بصورة صحيحة').css('font-family' , 'ar');
                    $('.modal-header2').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>')
                    $('#variableModal2').fadeIn().show();
                    setTimeout(function (){
                        $('#variableModal2').fadeOut("slow").hide();
                    },4000)
                },
            });
        }
    }
        $('#buttonCheckCode').on('click' , function(){
            // document.getElementById("num1Ver").required = true;
        //   $("#Register2").submit();
            $('#Register2').on('submit' , function(e){
                e.preventDefault();
            });
            
            var username = $('#username').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var phone = $('#phonesFromUser').val();
            
            var codeGenerated = $('#codeFromServer').val();
            console.log(codeGenerated);
            var num1 = $('#num1Ver').val();
            var num2 = $('#num2Ver').val();
            var num3 = $('#num3Ver').val();
            var num4 = $('#num4Ver').val();
            
            var InputUser = num1 + num2 + num3 + num4;
            console.log(InputUser);
            
            if(num1 == "" || num2 == "" || num3 == "" || num4 == ""){
                $('#modal_message2').text('يرجى إدخال رمز التحقق').css('font-family', 'ar');
                $('.modal-header2').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>')
                $('#variableModal2').fadeIn().show();
                setTimeout(function (){
                    $('#variableModal2').fadeOut("slow").hide();
                },4000)
            }else{
                if(codeGenerated == InputUser){
                    $.ajax({
                      url:'/verifyCodes',
                      method:'POST',
                      data:{_token: "{{ csrf_token() }}" , username:username , email:email , password:password , phone:phone},
                      success:function(response){
                          console.log(response);
                          window.location.href="https://kafaat2.cmark.sa/";
                      },
                    });
                }else{
                    $('#modal_message2').text('من فضلك تأكد من الرموز التأكيدية المرسلة لهاتفك').css('font-family', 'ar');
                    $('.modal-header2').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>')
                    $('#variableModal2').fadeIn().show();
                    setTimeout(function (){
                        $('#variableModal2').fadeOut("slow").hide();
                    },4000)
                }
            }
        });
                
        
        setTimeout(function(){
           $('#messageErrorEngineer3Register').fadeOut(5000);// or fade, css display however you'd like.
        }, 5000);
        
        setTimeout(function(){
           $('#messageErrorEngineer3Register2').fadeOut(5000);// or fade, css display however you'd like.
        }, 5000);
        
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