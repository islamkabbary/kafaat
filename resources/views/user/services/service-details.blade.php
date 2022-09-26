@component('components.app')
    <x-header />


    <br><br><br> <br><br><br>
{{--    <div class="container" style="width: 750px">--}}
{{--        <div class="section-title center-block text-center">--}}
{{--            <h2 style="color:#808080;font-family:ar">الخدمات</h2>--}}
{{--            <img src="{{asset('/assets/images/sub.png')}}" style="width: 150px;height: 20px">--}}

{{--        </div>--}}
{{--        <br><br>--}}
{{--        <div class="card overflow-hidden" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);border-radius: 10px;">--}}
{{--            <div class="card mb-0 "  >--}}
{{--               <div class="card-header">--}}
{{--                   <h3>{{$service->title}}</h3>--}}
{{--               </div>--}}

{{--                <div class="card-body courses_body" style="font-family: ar;color: #808080">--}}

{{--                    <div class="item-card2">--}}

{{--                        <div class="item-card2-desc" >--}}

{{--                            <p class="">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد--}}
{{--                                هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد--}}
{{--                                .من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق--}}
{{--                                إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد--}}
{{--                                الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص--}}
{{--                                العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى--}}
{{--                                .كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع--}}
{{--                                ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر--}}
{{--                                ً للعميل الشكل كاملا،دور مولد النص العربى أن يوفر على المصمم عناء البحث--}}
{{--                                عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل--}}
{{--                                .لا يليق--}}
{{--                                هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه--}}
{{--                                ً نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصا ً بديلا--}}
{{--                                ومؤقتا </p>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="card-footer">--}}
{{--                    <div class="item-card2-footer courses_footer">--}}


{{--                        <a href="#" class="btn btn-danger btn-block  text-white float-right" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);font-family:ar"> قائمه الدورات</a>--}}






{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}


{{--        <section class="sptb bg-white" style="margin-right: 20px">--}}
{{--            <div class="container">--}}
{{--                <div class="section-title center-block text-center">--}}
{{--                    <h2 style="color:#808080;font-family:ar">الخدمات</h2>--}}
{{--                    <img src="{{asset('/assets/images/sub.png')}}" style="width: 150px;height: 20px">--}}

{{--                </div>--}}
{{--                <br><br>--}}

{{--                @if($services->count() > 0)--}}
{{--                    <div id="myCarousel" class="owl-carousel Card-owlcarousel owl-carousel-icons carouselPosition1" >--}}

{{--                        @foreach($services as $service)--}}

{{--                            <div class="card" style="-webkit-box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);--}}
{{---moz-box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);--}}
{{--box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2)--}}
{{--;border-radius: 10px;max-width: 500px">--}}
{{--                                <div class="item-card2-img " >--}}
{{--                                    <div class="item-card2-imgs" >--}}
{{--                                        <div class="overlay"></div>--}}
{{--                                        <img src="{{$service->image}}" alt="img" class="cover-image" style="height: 200px" >--}}
{{--                                    </div>--}}
{{--                                    --}}{{--                                    <div class="item-card7-overlaytext">--}}
{{--                                    --}}{{--                                        <a href="education.html" class="text-white"> SERVICE TYPE</a>--}}
{{--                                    --}}{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="card-body" style="height: 125px;font-family: ar;color: #8080">--}}
{{--                                    <div class="item-card2-desc" >--}}
{{--                                        <div class="item-card2-text">--}}
{{--                                            <a href="{{url('service/details/'.$service->id)}}" class="text-dark"><h2 class="font-weight-semibold" style="color: #808080">--}}
{{--                                                    {{Str::limit($service->title,25)}}</h2></a>--}}
{{--                                        </div>--}}
{{--                                        --}}{{--                                        <ul class="d-flex mb-2">--}}
{{--                                        --}}{{--                                            <li class=""><a href="#" class="icons text-muted"><i class="icon icon-location-pin  mr-1"></i> Saudi Arabia</a></li>--}}
{{--                                        --}}{{--                                            <li><a href="#" class="icons text-muted"><i class="icon icon-event  mr-1"></i>{{date('m' , strtotime($service->created_at))}} min ago</a></li>--}}
{{--                                        --}}{{--                                            <li class=""><a href="#" class="icons text-muted"><i class="icon icon-phone  mr-1"></i> 14 675 65</a></li>--}}
{{--                                        --}}{{--                                        </ul>--}}
{{--                                        <p class="mb-0">{{\Illuminate\Support\Str::limit($service->description , 200)}}</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="service_footer" style="font-family: ar;color: #808080">--}}

{{--                                    <a href="{{url('service/details/'.$service->id)}}" class="btn btn-danger roun " style="margin-top: 25px">المزيد</a>--}}
{{--                                    <img src="{{asset('/assets/images/downstyle.png')}}" class="float-left"   height="80px">--}}
{{--                                </div>--}}

{{--                            </div>--}}

{{--                        @endforeach--}}
{{--                        @else--}}
{{--                            <span class="text-warning text-center"> no services provided yet !</span>--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--            </div>--}}


{{--        </section><!--/Section-->--}}

{{--    </div>--}}

@endcomponent
