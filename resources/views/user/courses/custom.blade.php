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

    </style>
<br class="spaceHeader">
<br class="spaceHeader">
<br class="spaceHeader">
<br>
<br>
<br>
<section class="sptb">
    <div class="container">
        <div class="section-title center-block text-center">
            <h2 style="color:#808080;font-family:ar">صفحة الدفع</h2>
            <img src="{{asset('/assets/images/sub.png')}}" style="width: 150px;height: 20px">
        </div>

@if(session()->has('response'))

                    <div class="card mb-0" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">

                        <div class="card-body" style="padding-bottom: 0px;">

        <!-- 000.100.110 success -->
        <!-- 000.200.000 pending -->
        <!-- 100.396.101 cancelling -->
        <!-- 800.100.162 declined transaction -->
        <!-- 800.100.161 too many tries -->
        @if(session()->get("response")['result']['code'] == '000.100.110')
            <span >  حاله العمليه : عمليه دفع ناجحه</span>
        @elseif(session()->get("response")['result']['code'] == '000.200.000')
            <span >  حاله العمليه : عمليه الدفع معلقه</span>
        @elseif(session()->get("response")['result']['code'] == '100.396.101')
            <span >  حاله العمليه : عمليه الدفع ملغيه</span>
        @elseif(session()->get("response")['result']['code'] == '800.100.162')
            <span >  حاله العمليه : عمليه الدفع مرفوضه</span>
        @else
            <span >  حاله العمليه : خطا حدث بسبب كثرة المحاولات </span>
        @endif
        <br>
        <span >  كود العمليه : {{session()->get("response")['id']}}</span>
        <br>
        <span >   المبلغ الكلى : {{intval(session()->get("response")['amount'])}}  SAR</span>

    </div>
     </div>




@endif
<div class="container alert alert-warning text-center" >
                        <span style="font-family: 'ar'">
                           إضغط  <a href="{{url('/login')}}" style="text-decoration:underline ">هنا</a> لتسجيل الدخول وتفعيل حسابك للبدأ
                        </span>

</div>

    </div>
</section>

@endcomponent
