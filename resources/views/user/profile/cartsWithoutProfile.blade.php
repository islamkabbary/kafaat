@component('components.app')

    <x-header />
    <style>
        .table-hover tbody tr:hover{
            color:#E64448;
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
            <h2 style="color:#808080;font-family:ar">السلة</h2>
            <img src="{{asset('/assets/images/sub.png')}}" style="width: 150px;height: 20px">
        </div>
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger" id="hideAfterShow">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li style="font-family:ar;">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card mb-0" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
                    <div class="card-body">
                        <div class="my-favadd table-responsive border-top userprof-tab">
                            <table class="table table-bordered table-hover mb-0 text-nowrap" style="font-family:ar;color:#808080">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th width="60%">الدورات</th>
                                    <th width="40%">السعر</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <form action="{{route('addToPayments')}}" method="POST">
                                        @csrf
                                    <?php $array = array(); ?>
                                @if($cartsWithoutProfile->count())
                                    @foreach($cartsWithoutProfile as $course)
                                <tr>
                                    <td>
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input carts{{$course->cart_courses->id}}" onchange="onChangeInput(event)" name="course_id[]" value="{{$course->cart_courses->id}}">
                                            <span class="custom-control-label"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <div class="media mt-0 mb-0">
                                            <div class="card-aside-img">
                                                <a href="#"></a>
                                                <img src="{{$course->cart_courses->image_cover}}" alt="img">
                                            </div>
                                            &nbsp;&nbsp;&nbsp;
                                            <div class="media-body">
                                                <div class="card-item-desc ml-4 p-0 mt-2">
                                                    <a href="#" class="" style="font-family:ar;color:#808080;"><h4 class="font-weight-semibold">
                                                        {{$course->cart_courses->title}}</h4></a><br>
                                                    <a href="#" style="font-family:ar;color:#808080;"><img src="{{asset('assets/images/clock-01.svg')}}"> {{$course->cart_courses->date}}</a>
                                                    <a href="#" style="font-family:ar;color:#808080;float:left;"><img src="{{asset('assets/images/offline-01.svg')}}">{{$course->cart_courses->type}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center" style="font-family:ar;color:#808080;font-size:30px">@if($course->cart_courses->offer){{$course->cart_courses->price_after_discount}} @else {{$course->cart_courses->price}} @endif<span style="font-family:ar;color:red;font-size:15px">SR</span></td>
                                </tr>

                                    <?php
                                                if($course->cart_courses->offer)
                                                array_push($array , $course->cart_courses->price_after_discount);
                                                else
                                                    array_push($array , $course->cart_courses->price);
                                    ?>


                                    @endforeach
                                @endif
                                <tr>
                                    <td></td>
                                    <td class="text-center" style="font-family:ab;background-color:#f2f2f2;color:#808080;">الإجمالي</td>
                                    <td class="text-center"><?php $total=0;
                                        for($i = 0 ; $i < count($array) ; $i++){
                                            $total = $total + $array[$i];
                                        }
                                        echo "<span style='font-family:ar;color:#808080;font-size:30px'>" .$total . "</span>" . "<span style='font-family:ar;color:red;font-size:15px'>SR</span>";
                                    ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <button type="submit" class="btn form-control text-white" style="font-family:ar;background-color:#E64448;color:#ffffff" data-original-title="شراء الآن" data-toggle="tooltip" >شراء الآن</button>
                                    </td>
                                </tr>
                                </form>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <br>
    <br>
    <br>
    <br>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
           $(window).on('load' , function(){
                if ($(window).width() < 991) {
                   $('.spaceHeader').css('display' , 'none');
                }
                else {
                   $('.spaceHeader').css('display' , 'block');
                }

                $('input:checkbox').attr('checked', 'checked');
            });
            $(window).on('resize' , function(){
                if ($(window).width() < 991) {
                   $('.spaceHeader').css('display' , 'none');
                }
                else {
                   $('.spaceHeader').css('display' , 'block');
                }
            });
            setTimeout(function(){
               $('#hideAfterShow').fadeOut('3000');
            }, 5000);
        });

        function onChangeInput(e){

            var idOfCourseChecked = e.target.value;

            var ifChecked = e.target.getAttribute('checked');

            if(ifChecked == 'checked'){
                $('.carts'+idOfCourseChecked).attr('checked' , false);
                $.ajax({
                   url:'/checkIfCourseInThere/'+idOfCourseChecked,
                   method:'GET',
                   success:function(response){
                       if(response == 0){
                           console.log('success Removed FromPayment');
                       }else{
                           console.log('it,s not Exist ever');
                       }
                   },
                });
            }else{
                $('.carts'+idOfCourseChecked).attr('checked' , true);
            }

        }
    </script>
@endcomponent
