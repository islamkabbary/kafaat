@component('components.app')
    <x-header />


    <br><br><br>

    <div class="card overflow-hidden" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);border-radius: 10px;">
        <div class="card mb-0 "  >
            <div class="power-ribbon power-ribbon-top-right text-warning"><span class="bg-warning"><i class="fa fa-bolt"></i></span></div>
            <div class="item-card7-img">
                <a href="page-details.html"></a>
                <div class="item-card7-imgs" >
                    <div class="overlay"></div>

                    <img src="{{asset('../assets/images/ad-cover.jpg')}}" alt="img" class="cover-image" style="height:auto;" >

                    {{--                            <div class="item-tag">--}}
                    {{--                                <h4  class="mb-0">SR {{$course->price}}</h4>--}}
                    {{--                            </div>--}}
                </div>

            </div>
            <div class="item-card2-icons tropicana">
                <a href="page-details.html" class="item-card2-icons-l favItem1"> <i class="fa fa-share-alt"></i></a>
                <a href="page-details.html" class="item-card2-icons-l favItem2"> <i class="fa fa-heart text-danger"></i></a>
            </div>
            <div class="card-body courses_body" style="font-family: ar;color: #808080">

                <div class="item-card2">

                    <div class="item-card2-desc" >

                        <p class="">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد
                            هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد
                            .من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق
                            إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد
                            الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص
                            العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى
                            .كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع
                            ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر
                            ً للعميل الشكل كاملا،دور مولد النص العربى أن يوفر على المصمم عناء البحث
                            عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل
                            .لا يليق
                            هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه
                            ً نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصا ً بديلا
                            ومؤقتا </p>

                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="item-card2-footer courses_footer">


                            <a href="{{url('course-details/'.$course->id)}}" class="btn btn-danger btn-block  text-white float-right" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);border-radius: 10px;font-family:ar"> عرض الدوره</a>






                </div>
            </div>
        </div>
    </div>

@endcomponent
