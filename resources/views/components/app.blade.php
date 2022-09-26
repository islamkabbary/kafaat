<!doctype html>
<html lang="en">
<head>
    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="Kafaat22" name="description">
    <meta content="Kafaat22" name="author">
    <meta name="keywords" content="html rtl, html dir rtl, rtl website template, bootstrap 4 rtl template, rtl bootstrap template, admin panel template rtl, admin panel rtl, html5 rtl, academy training course css template, classes online training website templates, courses training html5 template design, education training rwd simple template, educational learning management jquery html, elearning bootstrap education template, professional training center bootstrap html, institute coaching mobile responsive template, marketplace html template premium, learning management system jquery html, clean online course teaching directory template, online learning course management system, online course website template css html, premium lms training web template, training course responsive website"/>

    <!-- Favicon -->
    <link rel="icon" href="{{asset('assets/images/Untitled-2.png')}}" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/Untitled-2.png')}}" />

    <!-- Title -->
    <title>كفاءات الاعمال</title>

    <!-- Bootstrap css -->
    <link href="{{url('/assets/plugins/bootstrap-4.3.1/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- Style css -->
    <link href="{{url('/assets/css/style-rtl.css')}}" rel="stylesheet" />
    <link href="{{url('/assets/css/skin-modes.css')}}" rel="stylesheet" />

    <!-- Font-awesome  css -->
    <link href="{{url('/assets/css/icons.css')}}" rel="stylesheet"/>

    <!--Horizontal Menu css-->
    <link href="{{url('/assets/plugins/horizontal-menu/horizontal-menu-rtl.css')}}" rel="stylesheet" />

    <!--Select2 css -->
    <link href="{{url('/assets/plugins/select2/select2.min-rtl.css')}}" rel="stylesheet" />

    <!-- Cookie css -->
    <link href="{{url('/assets/plugins/cookie/cookie.css')}}" rel="stylesheet">

    <!-- Owl Theme css-->
    <link href="{{url('/assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />

    <!-- Custom scroll bar css-->
    <link href="{{url('/assets/plugins/scroll-bar/jquery.mCustomScrollbar.css')}}" rel="stylesheet" />

    <!-- Pscroll bar css-->
    <link href="{{url('/assets/plugins/pscrollbar/pscrollbar.css')}}" rel="stylesheet" />

    <!-- Switcher css -->
    <link  href="{{url('/assets/switcher/css/switcher-rtl.css')}}" rel="stylesheet" id="switcher-css" type="text/css" media="all"/>

    <!-- Color Skin css -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{url('/assets/color-skins/color6.css')}}" />
    <style>
        .card{
            box-shadow: 2px 2px 4px #888888;
        }
        .overlay {
            background: rgb(128,16,3);
            background: linear-gradient(360deg, rgba(128,16,3,1) 0%, rgba(171,42,33,1) 100%);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 10;
            opacity:30%;
            pointer-events: none;
        }
        .loader-page{
            display: flex;
            position: fixed;
            top:0;
            right:0;
            z-index: 999;
        }
        #loader  {
            animation: rotate 1s infinite;  
            height: 50px;
            width: 50px;
        }
        #loader:before,
        #loader:after {   
            border-radius: 50%;
            content: '';
            display: block;
            height: 20px;  
            width: 20px;
        }
        #loader:before {
            animation: ball1 1s infinite;  
            background-color: #cb2025;
            box-shadow: 30px 0 0 #f8b334;
            margin-bottom: 10px;
        }
        #loader:after {
            animation: ball2 1s infinite; 
            background-color: #00a096;
            box-shadow: 30px 0 0 #97bf0d;
        }

        
@keyframes rotate {
  0% { 
    -webkit-transform: rotate(0deg) scale(0.8); 
    -moz-transform: rotate(0deg) scale(0.8);
  }
  50% { 
    -webkit-transform: rotate(360deg) scale(1.2); 
    -moz-transform: rotate(360deg) scale(1.2);
  }
  100% { 
    -webkit-transform: rotate(720deg) scale(0.8); 
    -moz-transform: rotate(720deg) scale(0.8);
  }
}

@keyframes ball1 {
  0% {
    box-shadow: 30px 0 0 #f8b334;
  }
  50% {
    box-shadow: 0 0 0 #f8b334;
    margin-bottom: 0;
    -webkit-transform: translate(15px,15px);
    -moz-transform: translate(15px, 15px);
  }
  100% {
    box-shadow: 30px 0 0 #f8b334;
    margin-bottom: 10px;
  }
}

@keyframes ball2 {
  0% {
    box-shadow: 30px 0 0 #97bf0d;
  }
  50% {
    box-shadow: 0 0 0 #97bf0d;
    margin-top: -20px;
    -webkit-transform: translate(15px,15px);
    -moz-transform: translate(15px, 15px);
  }
  100% {
    box-shadow: 30px 0 0 #97bf0d;
    margin-top: 0;
  }
}
    </style>


</head>

<body onload="myFunction()" style="background: white">
    <div class="loader-page w-100 h-100 justify-content-center align-items-center">
        <div id="loader"></div>
    </div>
<div id="myDiv" style="display: none" class="animate-bottom">
{{--Loader--}}
{{--<div id="global-loader">--}}
{{--    <img src="{{url('/assets/images/loader.svg')}}" class="loader-img" alt="img">--}}
{{--</div><!--/Loader-->--}}
{{--<!--Loader-->--}}
{{--<div id="global-loader">--}}
{{--    <img src="{{url('assets/images/loader.svg" class="loader-img" alt="img">--}}
{{--</div><!--/Loader-->--}}


    {{$slot}}




<x-footer />

<!-- Back to top -->
    <a href="#top" id="back-to-top" ><i class="fa fa-arrow-up "></i></a>

<!-- JQuery js-->
<script src="{{url('assets/js/jquery-3.2.1.min.js')}}"></script>

<!-- Bootstrap js -->
<script src="{{url('assets/plugins/bootstrap-4.3.1/js/popper.min.js')}}"></script>
<script src="{{url('assets/plugins/bootstrap-4.3.1/js/bootstrap.min.js')}}"></script>

<!--JQuery Sparkline js-->
<script src="{{url('assets/js/jquery.sparkline.min.js')}}"></script>

<!-- Circle Progress js-->
<script src="{{url('assets/js/circle-progress.min.js')}}"></script>

<!-- Star Rating js-->
<script src="{{url('assets/plugins/rating/jquery.rating-stars.js')}}"></script>

<!--Counters js-->
<script src="{{url('assets/plugins/counters/counterup.min.js')}}"></script>
<script src="{{url('assets/plugins/counters/waypoints.min.js')}}"></script>
<script src="{{url('assets/plugins/counters/numeric-counter.js')}}"></script>

<!--Owl Carousel js -->
<script src="{{url('assets/plugins/owl-carousel/owl.carousel.js')}}"></script>

<!--Horizontal Menu js-->
<script src="{{url('assets/plugins/horizontal-menu/horizontal-menu.js')}}"></script>

<!--JQuery TouchSwipe js-->
<script src="{{url('assets/js/jquery.touchSwipe.min.js')}}"></script>

<!--Select2 js -->
<script src="{{url('assets/plugins/select2/select2.full.min.js')}}"></script>
<script src="{{url('assets/js/select2.js')}}"></script>

<!-- sticky js-->
<script src="{{url('assets/js/sticky.js')}}"></script>

<!-- Pscrollbar js -->
<script src="{{url('assets/plugins/pscrollbar/pscrollbar.js')}}"></script>
<script src="{{url('assets/plugins/pscrollbar/pscroll.js')}}"></script>

<!-- Switcher js -->
<script src="{{url('assets/switcher/js/switcher-rtl.js')}}"></script>

<!-- Cookie js -->
<script src="{{url('assets/plugins/cookie/jquery.ihavecookies.js')}}"></script>
<script src="{{url('assets/plugins/cookie/cookie.js')}}"></script>

<!-- Custom scroll bar js-->
<script src="{{url('assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js')}}"></script>

<!-- Swipe js-->
<script src="{{url('assets/js/swipe.js')}}"></script>

<!-- Scripts js-->
<script src="{{url('assets/js/owl-carousel-rtl.js')}}"></script>

<!-- Custom js-->
<script src="{{url('assets/js/custom.js')}}"></script>
<script src="https://kit.fontawesome.com/80227f0e5f.js" crossorigin="anonymous"></script>
<script>
   function myFunction() {
      setTimeout(showPage, 1200);
    }

    function showPage(){
        let styles = `
            -webkit-background-size: cover;
            -moz-background-size:cover;
            -o-background-size:cover;
            background-size:cover`

        document.querySelector('body').style = styles
        document.getElementById("loader").style.display = "none";
        document.querySelector(".loader-page").style.display = "none";
        document.getElementById("myDiv").style.display = "block";
    }
</script>
</div>
</body>
</html>
