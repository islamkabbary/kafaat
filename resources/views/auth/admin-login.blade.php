@component('components.app')


    <style>
        input {
            box-shadow: 0px -1px 3px 0px rgba(0, 0, 0, 0.2)
        }

        ::placeholder {
            /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: #AAAAA9;
            opacity: 1;
            /* Firefox */
        }

        /*#variableModal{*/
        /*    position: absolute;left: 50%;top: 100%;transform: translate(-50%, -50%);*/

        /*}*/

        #num1Ver {
            position: relative;
            right: 0px;
            top: 0px;
            width: 50px;
        }

        #num2Ver {
            position: relative;
            right: 0px;
            top: 0px;
            width: 50px;
        }

        #num3Ver {
            position: relative;
            right: 0px;
            top: 0px;
            width: 50px;
        }

        #num4Ver {
            position: relative;
            right: 0px;
            top: 0px;
            width: 50px;
        }

        .formsInline {
            display: flex;
            position: relative;

        }
    </style>

    <div class="top-bar visita"
        style="background: url('../assets/images/POINTS.png') no-repeat center center fixed , linear-gradient(-90deg, rgba(161,42,33,1) 0%, rgba(225,68,72,1) 100%) ; background-size:cover; background-color:rgb(161,42,33);">

        <section>
            <div class="sptb-2 sptb-tab" style="padding-top: 145px">
                <h3 class="text-center text-white" style="font-family: 'ab'">تسجيل دخول مدير النظام</h3>
            </div>
        </section>
    </div>

    <br> <br> <br>


    <section class="sptb">
        <div class="container ">
            <div class="row">
                <div class="single-page">
                    <div class="col-lg-5 col-xl-4 col-md-6 d-block mx-auto">
                        <div class="wrapper wrapper2" style="box-shadow:0px 5px 10px 2px rgba(0,0,0,0.2)">
                            <form id="login" class="card-body" tabindex="500" action="{{ route('login') }}">
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

                                <input type="hidden" value="0" name="login_scope">
                                <div class="email">
                                    <input type="email" name="email" placeholder="البريد الإلكترونى"
                                        style="font-family: 'ar'">

                                </div>

                                <div class="passwd">
                                    <input type="password" name="password" placeholder="كلمه المرور"
                                        style="font-family: 'ar';">

                                </div>
                                <div class="submit">
                                    <button class="btn btn-block" onclick="loginMuthes()"
                                        style="font-family:ar;background-color:#E64448;color:#fff; box-shadow: 1px 4px 14px 0px rgba(0,0,0,0.2)"><span
                                            id="text_login"> تسجيل دخول </span><span class="loader_area"></span></button>
                                </div>
                                <br>
                                {{-- <a href="{{ route('password.request') }}" class="ml-1" style="font-family: 'ar';text-decoration: underline;color: #AAAAA9" target="_blank"> &nbsp; هل نسيت كلمه المرور</a> --}}
                                {{-- <br><br> --}}
                                {{-- <p class=" mb-0" style="font-family:'ar';color: #AAAAA9">ليس لديك حساب ؟<a href="{{route('register')}}" class="ml-1" style="color:#E64448;font-family: 'ar'"> &nbsp; التسجيل </a></p> --}}
                            </form>
                            {{-- <hr class="divider2"> --}}
                            {{-- <div class="card-body"> --}}
                            {{-- <div class="text-center"> --}}
                            {{-- <div class="btn-group" style="background-color:#808080;border-radius:50%"> --}}
                            {{-- <a href="https://www.google.com/"> --}}
                            {{-- <img src="{{asset('assets/images/mail.svg')}}" height="40px" alt=""> --}}
                            {{-- </a> --}}
                            {{-- </div> --}}

                            {{-- <div class="btn-group" style="background-color:#808080;border-radius:50%;    margin-left: 20px; --}}
                            {{-- margin-right: 20px; --}}
                            {{-- }"> --}}
                            {{-- <a href="https://www.instagram.com/" > --}}
                            {{-- <img src="{{asset('assets/images/instagramAchieve.svg')}}" height="40px" alt=""> --}}
                            {{-- </a> --}}
                            {{-- </div> --}}

                            {{-- <div class="btn-group" style="background-color:#808080;border-radius:50%"> --}}
                            {{-- <a href="https://twitter.com/"> --}}
                            {{-- <img src="{{asset('assets/images/twitterAchieve.svg')}}" height="40px" alt=""> --}}
                            {{-- </a> --}}
                            {{-- </div> --}}
                            {{-- </div> --}}
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal" id="variableModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-sm modal-notify modal-success" role="document"
                    style="max-width: 400px;background-color: wheat">

                    <div class="modal-content text-center">

                        <div class="modal-header d-flex justify-content-center text-center ">


                        </div>

                        <div class="modal-body">
                            <h6 class="heading" id="modal_message" style="color: black;font-family: ar"></h6>

                        </div>


                    </div>

                </div>
            </div>
        </div>



    </section>

    <br><br>



    <script>
        function loginMuthes() {

            $("#login").submit(function(e) {

                //prevent Default functionality
                e.preventDefault();

                //get the action-url of the form
                var actionurl = e.currentTarget.action;
                //do your own request an handle the results


                $.ajax({
                    url: actionurl,
                    type: 'POST',
                    data: $('form#login').serialize(),
                    success: function(response) {
                        if (response == 1) {
                            $('.loader_area').html(
                                '<i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i><span class="sr-only">Loading...</span>'
                                );
                            $('#text_login').html(' جارى تسجيل الدخول ');
                            window.location.replace('{{ url('/admin') }}');

                        } else {
                            $('#modal_message').text(
                                'عذرا البريد الإلكترونى او كلمة المرور خاطئة  ...يرجى المحاولة  مرة أخرى  '
                                );
                            $('.modal-header').empty().html(
                                '<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>'
                                )
                            $('#variableModal').fadeIn(450).show();


                        }
                    },
                    error: function(jqXHR, exception) {
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
                        $('#modal_message').text(
                            'رجاء إدخال  البريد الإلكترونى او كلمه السر بصوره صحيحه');
                        $('.modal-header').empty().html(
                            '<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>'
                            )
                        $('#variableModal').fadeIn(450).show();

                    },
                });


                setTimeout(function() {
                    $('#variableModal').fadeOut("slow").hide();
                }, 5000)

            });


        }
    </script>

@endcomponent
