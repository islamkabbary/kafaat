@component('components.app')
    <x-header />


    <br><br><br> <br><br><br>
<div class="container" style="max-width: 950px">
    <div class="section-title center-block text-center pocophone">
        <h2 style="color:#808080;font-family:ar">الإعلانات</h2>
        <img src="{{asset('/assets/images/sub.png')}}" style="width: 150px;height: 20px">

    </div>
    <br><br>
    <div class="card overflow-hidden" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);border-radius: 10px;">
        <div class="card mb-0 "  >
            <div class="item-card7-img">
                <a href="page-details.html"></a>
                <div class="item-card7-imgs" >
                    <div class="overlay"></div>

                    <img src="{{$adsDetails->image}}" width="922px" height="427px" alt="img" class="cover-image" >


                </div>

            </div>

            <div class="card-body courses_body" style="font-family: ar;color: #808080">

                <div class="item-card2">

                    <div class="item-card2-desc" >
                        <div class="item-card2-text mb-3">
                            <h4 class="" style="color: #808080;font-family:ar;">{{$adsDetails->title}}</h4>
                        </div>
                        <p class="" style="text-align: justify;font-family:ar;color:#808080;">{!!$adsDetails->description!!}</p>

                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="item-card2-footer courses_footer">
                    @if($adsDetails->ads_link != null)
                        <a href="{{$adsDetails->ads_link}}" target="_blank" class="btn btn-danger btn-block  text-white float-right" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);font-family:ar">عرض </a>
                    @else
                    
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>

    <br><br>

@endcomponent
