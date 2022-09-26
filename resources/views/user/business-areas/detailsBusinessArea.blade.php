@component('components.app')
<x-header />


<br>
<br>
<br>
<br>
<br>

<section>
        <div class="container">
            <div class="section-title center-block text-center">
                <h2 style="color:#808080;font-family:ar">المجالات</h2>
                <img src="{{asset('/assets/images/sub.png')}}" style="width: 150px;height: 20px">
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card cardInBusinessAreaWidth" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
                      <div class="card-body">
                        <h1 class="card-title text-center" style="color:#808080;font-family:ab;font-size:30px">{{$businessArea->title}}</h1>
                        <h4 class="card-text pInAboutUsBig">{!!$businessArea->description!!}</h4>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="sptb bg-white">
        <div class="container">
            <div class="item-all-cat center-block text-center education-categories">
                <div class="row">
                    @if($allBusinessTog->count() > 0)
                    
                    @if($allBusinessTog->count() > 8)
                    <div class="col-md-12">
                            <div id="small-categories" class="owl-carousel client-carousel carouselPosition1" >
                                @foreach($allBusinessTog as $business_area)
                                    <div class="item">
                                        <div class="card" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
                                            <div class="card-body">
                                                <div class="card-item"  >
                                                    <a href="/business-areas/{{$business_area->id}}"></a>
                                                    <img src="{{$business_area->image}}" style="width: 40px;height: 40px"  alt="img">
                                                </div>
                                                <div class="item-all-text mt-3">
                                                    <h5 class="mb-0" style="font-family:ar;color:#808080">{{$business_area->title}}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                    </div>
                    @else
                        @foreach($allBusinessTog as $business_area)
                        <div class="col-md-3">
                            <div class="item-all-card text-dark text-center" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
                                <a href="/business-areas/{{$business_area->id}}"></a>
                                <div class="iteam-all-icon">
                                    <img src="{{$business_area->image}}" style="width: 40px;height: 40px">
                                </div>
                                <div class="item-all-text mt-3">
                                    <h5 class="mb-0" style="font-family:ar;color:#808080">{{$business_area->title}}</h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        
                    @else
                    
                    @endif
                </div>
            </div>
        </div>
    </section><!--/Section-->
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