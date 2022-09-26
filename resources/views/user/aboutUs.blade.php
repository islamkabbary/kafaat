@component('components.app')
<x-header />


<br>
<br>
<br>

<section class="sptb bg-white" id="about-us">
        <div class="container">
            <div class="section-title center-block text-center">
                <h2 style="color:#808080;font-family:ar">من نحن</h2>
                <img src="{{asset('/assets/images/sub.png')}}" style="width: 150px;height: 20px">
            </div>
            <br>
            <br>
            <div class="row" id="aboutUsSpecific">
                <div class="col-md-4">
                    <div class="card" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
                        <img src="{{asset('assets/images/Untitled-2.png')}}" width="100px" height="370px" class="card-img-top rounded imgHeaderBy" alt="">
                        <div class="card-body" style="position:relative;top:-50px">
                            <h2 class="card-title text-center aboutUsHead1"><b style="font-size:25px">كفاءات الأعمال</b> للتدريب </h2>
                            <h5 class="card-text aboutUsHead2">تحت إشراف المؤسسة <br>  العامة للتدريب التقني والمهني <br>  <br><b style="direction:rtl">ترخيص رقم 8/1/47278</b></h5>
                        </div>
                        <img src="{{asset('assets/images/بانر من نحن.png')}}" class="card-img-top" alt="">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
                        <div class="card-body" style="height: 65px" >
                            <h3 class="card-text ABOUT text-center">الإبداع, <b>والاحترافية</b>, والدقة, <b>والإنجاز</b> , والتعاون , <b>والاستمرارية</b></h3>
                        </div>
                        <div class="top-right">  <img src="{{asset('/assets/images/upstyle.png')}}" width="80px" height="80px"></div>
                        <img src="{{asset('assets/images/video face.jpg')}}" class="card-img-top cardAbout" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                @foreach($sections as $section)
                <div class="col-md-12">
                    <div class="card cardInBusinessAreaWidth" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
                      <div class="card-body">
                        <h1 class="card-title text-center" style="color:#808080;font-family:ab;font-size:30px">{{$section->title}}</h1>
                        <h4 class="card-text pInAboutUsBig">{!!$section->description!!}</h4>
                      </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <br>
    <br>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(window).on('resize' , function(){

            if ($(window).width() < 991) {
               $('.horizontalMenu-list li a').css('color' , '#808080');
            }
            else {
               $('.horizontalMenu-list li a').css('color' , '#ffffff')
            }
        });
    </script>
@endcomponent
