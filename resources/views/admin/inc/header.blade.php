<html lang="en" dir="rtl">
<head>
    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="Eudica - Online Education & Learning Courses HTML CSS Responsive Template" name="description">
    <meta content="Spruko Technologies Private Limited" name="author">
    <meta name="keywords" content="html rtl, html dir rtl, rtl website template, bootstrap 4 rtl template, rtl bootstrap template, admin panel template rtl, admin panel rtl, html5 rtl, academy training course css template, classes online training website templates, courses training html5 template design, education training rwd simple template, educational learning management jquery html, elearning bootstrap education template, professional training center bootstrap html, institute coaching mobile responsive template, marketplace html template premium, learning management system jquery html, clean online course teaching directory template, online learning course management system, online course website template css html, premium lms training web template, training course responsive website"/>

    <!-- Favicon -->
    <link rel="icon" href="{{asset('assets/images/Untitled-2.png')}}" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/Untitled-2.png')}}" />

    <!-- Title -->
    <title>كفاءات االعمال</title>

    <!-- Bootstrap css -->
    <link href="{{url('assets/plugins/bootstrap-4.3.1/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{url('assets/dist/css/dropify.css')}}" rel="stylesheet" />
    <!-- Sidemenu Css -->
    <link href="{{url('assets/plugins/sidemenu/sidemenu-rtl.css')}}" rel="stylesheet" />

    <!-- Dashboard Css -->
    <link href="{{url('assets/css/style-rtl.css')}}" rel="stylesheet" />
    <link href="{{url('assets/css/admin-custom.css')}}" rel="stylesheet" />

    <!-- c3.js Charts Plugin -->
    <link href="{{url('assets/plugins/charts-c3/c3-chart.css')}}" rel="stylesheet" />

    <!-- Custom scroll bar css-->
    <link href="{{url('assets/plugins/scroll-bar/jquery.mCustomScrollbar.css')}}" rel="stylesheet" />

    <!---Font icons-->
    <link href="{{url('assets/css/icons.css')}}" rel="stylesheet"/>

    <!-- Switcher css -->
    <link  href="{{url('assets/switcher/css/switcher-rtl.css')}}" rel="stylesheet" id="switcher-css" type="text/css" media="all"/>

    <!-- Color Skin css -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{url('assets/color-skins/color6.css')}}" />
    <style>
        #loader {
            position: absolute;
            left: 50%;
            top: 50%;
            z-index: 1;
            width: 80px;
            height: 80px;
            margin: -75px 0 0 -75px;
            border: 16px solid #CECECD;
            border-radius: 50%;
            border-top: 16px solid #c82333;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
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
    </style>
</head>
<!--<body>-->
    <div class="app-header1 header py-1 d-flex" style="height:65px">
            <div class="container-fluid">
                <div class="d-flex">
                    <a class="header-brand" href="/admin">
                        <img src="{{asset('assets/images/logo kfaat.svg')}}" class="header-brand-img" alt="Lmslist logo">
                    </a>
                    <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>


                    <div class="d-flex order-lg-2 mr-auto">
                        <div class="dropdown d-none d-md-flex" >
                            <a  class="nav-link icon full-screen-link">
                                <i class="fe fe-maximize-2"  id="fullscreen-button"></i>
                            </a>
                        </div>

                        <div class="dropdown ">
                            <a href="#" class="nav-link pl-0 leading-none user-img" data-toggle="dropdown">
                                <img src="/assets/images/USERPROFILE.png" alt="profile-img" class="avatar avatar-md brround">
                            </a>
                            <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow ">
                                <a class="dropdown-item" href="/admin" style="font-family:ar;">
                                    <i class="dropdown-icon icon icon-user"></i> الصفحة الشخصية
                                </a>
                                <a class="dropdown-item" href="{{route('admin-logout')}}" style="font-family:ar;">
                                    <i class="dropdown-icon icon icon-power"></i> تسجيل خروج
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@yield('header')
