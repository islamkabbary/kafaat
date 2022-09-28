<style>
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

        0%,
        100% {
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
        from {
            bottom: -100px;
            opacity: 0
        }

        to {
            bottom: 0px;
            opacity: 1
        }
    }

    @keyframes animatebottom {
        from {
            bottom: -100px;
            opacity: 0
        }

        to {
            bottom: 0;
            opacity: 1
        }
    }

    .animate-bottom {
        position: relative;
        -webkit-animation-name: animatebottom;
        -webkit-animation-duration: 1s;
        animation-name: animatebottom;
        animation-duration: 1s
    }

    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }


    @-webkit-keyframes animatebottom {
        from {
            bottom: -100px;
            opacity: 0
        }

        to {
            bottom: 0px;
            opacity: 1
        }
    }

    @keyframes animatebottom {
        from {
            bottom: -100px;
            opacity: 0
        }

        to {
            bottom: 0;
            opacity: 1
        }
    }
</style>
<section>
    <footer id="foot"
        style="background: url('../assets/images/points.svg') no-repeat center center fixed , linear-gradient(0deg, rgba(161,42,33,1) 0%, rgba(225,68,72,1) 100%);background-size:cover;padding:40px;background-color:rgb(161,42,33);">
        <div class="footer-main">
            <a href="https://maroof.sa/" target="_blank">
                <img src="{{ url('assets/images/maroof.svg') }}"
                    style="    margin-top: -110px;
            width: 100px;
            height: 100px;
            background: white;
            border-radius: 0px 0px 30px 30px;">
            </a>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 pagesKafa text-right">
                        <h6 style="color:#fff;font-family:ar" class="ContactUsForm1">الشروط و الأحكام</h6>
                        <hr class="accent-2 mb-4 mt-0 d-inline-block mx-auto">
                        <ul>
                            @if (session()->get('pages'))
                                @foreach (session()->get('pages') as $page)
                                    <li class="privacies"><a
                                            href="{{ url('/page/policy_privacy/ABCLOBBY2021/P_0' . $page->id) }}"
                                            style="font-family:ab;color:#ffffff;">{{ $page->title }}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="col-md-5 phoneUs text-right">
                        <h6 style="color:#fff;font-family:ar">اتصل بنا</h6>
                        <hr class="accent-2 mb-4 mt-0 d-inline-block mx-auto">
                        <ul>
                            @if (Session::get('sitePhone'))
                                <li class="imgParaText1">
                                    <span class="fa fa-phone"></span>
                                    <p class="pPhoneUs"
                                        style="font-family:ab;color:#ffffff;display:inline-flex;direction:ltr">
                                        {{ Session::get('sitePhone') }}</p>
                                </li>
                            @endif
                            @if (Session::get('siteEmail'))
                                <li class="imgParaText2">
                                    <span class="fa fa-envelope"></span>
                                    <p class="pEmailUs" style="font-family:ab;color:#ffffff;display:inline-flex;">
                                        <b>{{ Session::get('siteEmail') }}</b>
                                    </p>
                                </li>
                            @endif
                            @if (Session::get('location'))
                                <li class="imgParaText3">
                                    <span class="fa fa-location-dot"></span>
                                    <p class="pLocUs" style="font-family:ab;color:#ffffff;display:inline-flex;">
                                        <b>{{ Session::get('location') }}</b>
                                    </p>
                                </li>
                            @endif
                            @if (Session::get('siteAddress'))
                                {{-- <img src="{{asset('assets/images/street.svg')}}" class="imgStUs" width="20px" height="20px" alt=""> --}}
                                <li class="imgParaText4">
                                    <p class="pStUs" style="font-family:ab;color:#ffffff;display:inline-flex;">
                                        <b class="pMaps">
                                            <a style="color:#fff;font-family:ar;" target="_blank"
                                                href="https://www.google.com/maps/place/معهد+كفاءات+الأعمال+للتدريب%E2%80%AD/@18.2985075,42.7614666,17z/data=!3m1!4b1!4m5!3m4!1s0x15e35378d10ee28b:0x529d919dc32dd7f8!8m2!3d18.2985075!4d42.7592779?shorturl=1">{{ Session::get('siteAddress') }}</a>
                                        </b>
                                    </p>
                                </li>
                            @endif
                        </ul>
                        <div class="links-font">
                            @if (Session::get('twitter_linkHeader'))
                                <a href="{{ Session::get('twitter_linkHeader') }}" target="_blank">
                                    <span class="fa fa-twitter"></span>
                                </a>
                            @endif
                            @if (Session::get('instagram_linkHeader'))
                                <a href="{{ Session::get('instagram_linkHeader') }}" target="_blank">
                                    <span class="fa fa-instagram"></span>
                                </a>
                            @endif
                            @if (Session::get('whatsapp_linkHeader'))
                                <a href="https://wa.me/{{ Session::get('whatsapp_linkHeader') }}" target="_blank">
                                    <span class="fa fa-whatsapp"></span>
                                </a>
                            @endif
                            @if (Session::get('snapchat_linkHeader'))
                                <a href="{{ Session::get('snapchat_linkHeader') }}" target="_blank">
                                    <span class="fa fa-snapchat"></span>
                                </a>
                            @endif
                            @if (Session::get('telegram_linkHeader'))
                                <a href="{{ Session::get('telegram_linkHeader') }}" target="_blank">
                                    <span class="fa fa-telegram"></span>
                                </a>
                            @endif
                            @if (Session::get('linkedin_linkHeader'))
                                <a href="{{ Session::get('linkedin_linkHeader') }}" target="_blank">
                                    <span class="fa fa-linkedin"></span>
                                </a>
                            @endif
                            @if (Session::get('youtube_linkHeader'))
                                <a href="{{ Session::get('youtube_linkHeader') }}" target="_blank">
                                    <span class="fa fa-youtube"></span>
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3 thirdCol">
                        <h6 style="color:#fff;font-family:ar">الإشتراك</h6>
                        <hr class="accent-2 mb-4 mt-0 d-inline-block mx-auto">
                        <form id="subscribeFromFooter" class="form-inline">
                            @csrf
                            <input type="text" name="phone" id="emailSub" placeholder="ادخل رقم الجوال"
                                class="form-control ContactUsEmailSub" style="font-size:14px;">
                            <button type="submit" onclick="storeSubscribtions()" class="btn btn-danger"
                                style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);font-family:ar">الإشتراك</button>
                        </form>
                        <br>
                        <h6 style="color:#fff;font-family:ar">الدفع</h6>
                        <hr class="accent-2 mb-4 mt-0 d-inline-block mx-auto">
                        <br>
                        @if (Session::get('payment_1'))
                            <img src="{{ Session::get('payment_1') }} " class="imageContactUsForm1" alt="">
                        @endif
                        @if (Session::get('payment_2'))
                            <img src="{{ Session::get('payment_2') }}" class="imageContactUsForm2" alt="">
                        @endif
                        @if (Session::get('payment_3'))
                            <img src="{{ Session::get('payment_3') }}" class="imageContactUsForm3" alt="">
                        @endif
                        <img src="{{ url('uploads/settings/images/stc_pay.png') }}" class="imageContactUsForm4"
                            alt="">
                        <span class="fab fa-cc-apple-pay imageContactUsForm5"></span>
                    </div>
                </div>
            </div>
            <div class="modal" id="variableModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-sm modal-notify modal-success" role="document" style="max-width: 400px">
                    <div class="modal-content text-center" style="background: white;">
                        <div class="modal-header d-flex justify-content-center ">
                        </div>
                        <div class="modal-body">
                            <h6 class="heading" id="modal_message" style="color: black;font-family: ar"></h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal" id="variableModal2" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm modal-notify modal-success" role="document"
                    style="max-width: 400px;background-color: wheat">

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
        <div class="container">
            <h4 class="text-center mt-4 copyrightTera">Developed By <a href="https://teraninja.com" target="_blank">TeraNinja</a></h4>
        </div>
    </footer>
</section>
<!--/Footer Section-->

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {



        $(window).on('resize', function() {

            if ($(window).width() >= 1024) {
                console.log('footer');
                $('.phoneUs').addClass('text-center');
                $('.pagesKafa').addClass('text-center');
            } else {
                $('.phoneUs').removeClass('text-center');
                $('.pagesKafa').removeClass('text-center');
            }

            if ($(window).width() <= 991) {
                console.log('footerRemove');
                $('.imgParaText1 img').removeClass('imgPhoneUs');
                $('.imgParaText1 img p').removeClass('pPhoneUs');

                $('.imgParaText2 img').removeClass('imgEmailUs');
                $('.imgParaText2 img p').removeClass('pEmailUs');

                $('.imgParaText3 img').removeClass('imgLocUs');
                $('.imgParaText3 img p').removeClass('pLocUs');

                $('.imgParaText4 img').removeClass('imgStUs');
                $('.imgParaText4 img p').removeClass('pStUs');
            } else {
                console.log('footerRemove2');
                $('.imgParaText1 img').addClass('imgPhoneUs');
                $('.imgParaText1 img p').addClass('pPhoneUs');

                $('.imgParaText2 img').addClass('imgEmailUs');
                $('.imgParaText2 img p').addClass('pEmailUs');

                $('.imgParaText3 img').addClass('imgLocUs');
                $('.imgParaText3 img p').addClass('pLocUs');

                $('.imgParaText4 img').addClass('imgStUs');
                $('.imgParaText4 img p').addClass('pStUs');
            }

        });
        setTimeout(function() {
            $('#messageErrorEngineer3').fadeOut(2000); // or fade, css display however you'd like.
        }, 2000);

        setTimeout(function() {
            $('#messageErrorEngineer35').fadeOut(2000); // or fade, css display however you'd like.
        }, 2000);

    });

    function storeSubscribtions() {
        $('#subscribeFromFooter').on('submit', function(e) {
            e.preventDefault();
        });
        var phone = $('#emailSub').val();
        if (phone != "") {
            $.ajax({
                url: "{{ route('subscribeUser') }}",
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    phone: phone
                },
                success: function(returnedMessage) {
                    if (returnedMessage == 0) {
                        $('#modal_message2').text('هذا الجوال موجود مسبقا').css('font-family', 'ar');
                        $('.modal-header2').empty().html(
                            '<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>'
                        )
                        $('#variableModal2').fadeIn().show();
                        setTimeout(function() {
                            $('#variableModal2').fadeOut("slow").hide();
                        }, 4000)
                    } else {
                        $('#modal_message2').text('لقد تم اشتراكك بنجاح').css('font-family', 'ar');
                        $('.modal-header2').empty().html(
                            '<svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg>'
                        );
                        $('#variableModal2').fadeIn(450).show();
                        setTimeout(function() {
                            $('#variableModal2').fadeOut("slow").hide();
                        }, 4000);
                    }
                    setTimeout(function() {
                        $('#variableModal').fadeOut("slow").hide();
                    }, 4000);

                },
                error: function(exception) {
                    console.log(exception);
                }
            });
        } else {
            $('#modal_message2').text('من فضلك أدخل الجوال للاشتراك').css('font-family', 'ar');
            $('.modal-header2').empty().html(
                '<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>')
            $('#variableModal2').fadeIn().show();
            setTimeout(function() {
                $('#variableModal2').fadeOut("slow").hide();
            }, 4000)
        }
    }

    function storeDataInContactUsFooter() {
        $('#formsContactUsFromFooter').on('submit', function(e) {
            e.preventDefault();
        });
        var name = $('#name').val();
        var email = $('.ContactUsForm3').val();
        var message = $('#message').val();

        if (name == "" || email == "" || message == "") {
            $('#modal_message2').text('من فضلك أدخل البيانات بصورة صحيحة').css('font-family', 'ar');
            $('.modal-header2').empty().html(
                '<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>')
            $('#variableModal2').fadeIn().show();
            setTimeout(function() {
                $('#variableModal2').fadeOut("slow").hide();
            }, 4000)
        } else {
            $.ajax({
                url: "{{ route('userContactFooter') }}",
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    name: name,
                    email: email,
                    message: message
                },
                success: function(returnedMessage) {
                    if (returnedMessage == 0) {
                        $('#modal_message2').text('البريد الإلكتروني المدخل موجود مسبقا').css('font-family',
                            'ar');
                        $('.modal-header2').empty().html(
                            '<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>'
                        )
                        $('#variableModal2').fadeIn().show();
                        setTimeout(function() {
                            $('#variableModal2').fadeOut("slow").hide();
                        }, 4000)
                    } else {
                        $('#modal_message2').text('سوف يتم الرد علي استفسارك في أقرب وقت').css(
                            'font-family', 'ar');
                        $('.modal-header2').empty().html(
                            '<svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg>'
                        );
                        $('#variableModal2').fadeIn(450).show();
                        setTimeout(function() {
                            $('#variableModal2').fadeOut("slow").hide();
                        }, 4000);
                    }
                },
                error: function(exception) {
                    console.log(exception);
                }
            });
        }
    }
</script>
