@extends('admin.index')
@section('main')

<!--<body class="app sidebar-mini">-->
<!--Loader-->
<!--<div id="global-loader">-->
<!--    <img src="../assets/images/loader.svg" class="loader-img" alt="">-->
<!--</div>-->
<style>
    .srr{
        position:relative;
        right:-5px;
        color:#E64448;
        font-size:15px;
        font-family:ar;
    }
    @media screen and (min-width:1025px) and (max-width:1299px) {
        .textEng{
            position:relative;
            right:70px;
            font-family:ar;
            color:#808080;
        }
        .textEng1{
            position:relative;
            right:20px;
            font-family:ar;
            color:#808080;
        }
        .textEng2{
            position:relative;
            right:60px;
            font-family:ar;
            color:#808080;
        }
    }
</style>

<div class="page">
    <div class="page-main h-100">
        <div class="app-content my-3 my-md-5">
            <div class="side-app">
                <div class="page-header" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
                    <h4 class="page-title" style="font-family:ar;color:#808080;">كفاءات الأعمال</h4>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 ">
                        <div class="card overflow-hidden" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
                            <div class="card-header">
                                <h3 class="card-title textEng">عدد الطلاب</h3>
                            </div>
                            <div class="card-body ">
                                <h2 class="text-dark text-center  mt-0 font-weight-bold" style="font-family:ar;color:#808080;">{{getCountStudents()}}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 ">
                        <div class="card overflow-hidden" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
                            <div class="card-header">
                                <h3 class="card-title textEng">عدد الدورات</h3>
                            </div>
                            <div class="card-body ">
                                <h2 class="text-dark text-center  mt-0  font-weight-bold" style="font-family:ar;color:#808080;">{{getCountCourses()}}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 ">
                        <div class="card overflow-hidden" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
                            <div class="card-header">
                                <h3 class="card-title textEng1">عدد الدورات في المفضلة</h3>
                            </div>
                            <div class="card-body ">
                                <h2 class="text-dark text-center  mt-0 font-weight-bold" style="font-family:ar;color:#808080;">{{getCountCoursesFromFavourites()}}</h2>
                            </div>
                        </div>
                    </div>
                    <div class=" col-sm-12 col-md-6 col-lg-6 col-xl-4">
                        <div class="card overflow-hidden" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
                            <div class="card-header">
                                <h3 class="card-title textEng1" style="font-family:ar;color:#808080;">عدد الدورات  في السلة</h3>
                            </div>
                            <div class="card-body ">
                                <h2 class="text-dark text-center  mt-0 font-weight-bold" style="font-family:ar;color:#808080;">{{getCountCoursesFromCarts()}}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 ">
                        <div class="card overflow-hidden" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
                            <div class="card-header">
                                <h3 class="card-title textEng1" style="font-family:ar;color:#808080;">عدد الدورات المشتراة</h3>
                            </div>
                            <div class="card-body ">
                                <h2 class="text-dark text-center  mt-0  font-weight-bold" style="font-family:ar;color:#808080;">{{getCountCoursesFinished()}}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 ">
                        <div class="card overflow-hidden" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
                            <div class="card-header">
                                <h3 class="card-title textEng2">المبالغ المكتسبة</h3>
                            </div>
                            <div class="card-body ">
                                <h2 class="text-dark text-center  mt-0  font-weight-bold" style="font-family:ar;color:#808080;">{{getPricesOfFinishedCourses()}}<span class="srr">SR</span></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    @endsection
