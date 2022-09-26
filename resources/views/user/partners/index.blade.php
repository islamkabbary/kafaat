@component('components.app')
    <x-header />


    <br><br><br> <br><br><br>
    <div class="container" style="max-width: 950px">
        <div class="section-title center-block text-center pocophone">
            <h2 style="color:#808080;font-family:ar">الشركاء</h2>
            <img src="{{asset('/assets/images/sub.png')}}" style="width: 150px;height: 20px">

        </div>
        <br><br>




    </div>

    @if($partners->count() > 0)
        <section class="sptb partners">
            <div class="container">
<div class="row container">


                        @foreach($partners as $partner)
        <div class="col-md-6 ">
                            <div class="item mx-auto" style="width: 80%">
                                <div class="card " style="-webkit-box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);
-moz-box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);
box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);border-radius: 10px;">
                                    <div class="card-body mx-auto" style="padding: 35px">
                                        <div class="card-item"  >
                                            <a href="#"></a>

                                            {{--                                            <div class="center-block" >--}}
                                            <img src="{{$partner->logo}}"    alt="img">



                                            {{--                                            </div>--}}
                                        </div>
<br>
                                            <p style="font-family: 'ar';color: #808080;font-size: 25px" class="text-center">{{$partner->company_name}}</p>


                                    </div>
                                </div>
                            </div>
        </div>
                        @endforeach


            </div>
            </div>
        </section>

    @endif

    <br><br>

@endcomponent
