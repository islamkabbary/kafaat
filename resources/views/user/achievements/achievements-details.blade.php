@component('components.app')
<x-header />

<style>
    .overlayHeader{
        background: rgb(128,16,3);
        background: linear-gradient(360deg, rgba(128,16,3,1) 0%, rgba(171,42,33,1) 100%);
        overflow: hidden;
    }
    .imgHeaderAchievement{
        opacity: 0.4;
        object-fit:cover;
    }
    .classForChangePlace{
        width:900px;
        position:relative;
        right:140px;
    }
    @media screen and (min-width:1025px) and (max-width:1200px) {
        .classForChangePlace{
            right:20px;
        }
    }
    @media only screen and (width: 1024px){
        .classForChangePlace{
            right:20px;
        }
    }
    @media screen and (min-width:600px) and (max-width:991px) {
        .classForChangePlace{
            right:10px;
            width:700px;
        }
        .helloFromIPad{
            font-size:9px;
        }
    }
    @media (max-width: 500px){
        .classForChangePlace{
            right:5px;
            width:400px;
        }
    }
    @media only screen and (width: 414px){
        .classForChangePlace{
            right:10px;
        }
    }
    @media only screen and (width: 412px){
        .classForChangePlace{
            right:5px;
        }
    }
    @media only screen and (width: 411px){
        .classForChangePlace{
            right:5px;
            width:400px;
        }
    }
    @media only screen and (width: 393px){
        .classForChangePlace{
            right:5px;
            width:390px;
        }
    }
    @media only screen and (width: 375px){
        .classForChangePlace{
            right:5px;
            width:370px;
        }
    }
    @media only screen and (width: 360px){
        .classForChangePlace{
            right:5px;
            width:350px;
        }
    }
    @media only screen and (width: 320px){
        .classForChangePlace{
            right:0px;
            width:325px;
        }
    }
</style>

<div class="overlayHeader">
    <img src="{{asset('assets/images/full-image.jpg')}}" class="cover-image imgHeaderAchievement" height="400px">
</div>

<h1 class="text-center achieveH1InDetails">قائمة الإنجازات</h1>


<br>

<section class="sptb">
			<div class="container">
				<div class="row classForChangePlace">
				    	<div class="col-md-12">
						<div class="card overflow-hidden" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
							<div class="card-body">
								<div class="product-slider">
									<ul class="list-unstyled video-list-thumbs">
										<li class="mb-0">
											<img src="{{$achievement->media}}" alt="img" class="img-responsive br-3" style="border:1px solid #dcdcd2;">
										</li>
									</ul>
								</div>
								<hr style="color:#AAAAA9" id="forManagerOnly" class="hrForManager">
								<div class="mb-5">
        							<div class="tab-content p-5 bg-white details-tab-content">
        							    <div class="dateTimesInAchieve"> <img src="{{asset('assets/images/UntitleSKd-1.png')}}" width="25px" height="25px" >&nbsp; &nbsp; <span style="color:#808080;font-family:ar;font-size:20px;position:relative;top:5px">15/12/2020</span></div>
        								<div class="tab-pane active" id="tab-1">
        									<h1 class="card-title mb-3" style="font-family:ab;color:#808080;font-size:30px">{{$achievement->name}}</h1>
        									<div class="mb-0">
        										<h4 style="color:#808080;font-family:ar;font-size:19px;text-align:justify;line-height:1.6">{!!$achievement->description!!}</h4>
        									</div>
        								</div>
        							</div>
        						</div>
        						<div class="card-header border-top">
    								<h3 class="card-title" style="color:#AAAAA9;font-family:ar">شارك إنجازاتنا</h3>
    							</div>
    							<div class="card-body product-filter-desc">
    								<div class="product-filter-icons text-center">
    									<a href="https://twitter.com/intent/tweet?text={{$achievement->name}}&amp;url={{Request::url()}}" target="_blank" class=""><img src="{{asset('assets/images/twitter.svg')}}"></a>&nbsp;&nbsp;
    									<a href="https://wa.me/{{Session::get('whatsapp_linkHeader')}}" target="_blank" class=""><img src="{{asset('assets/images/whatsappFooter.svg')}}"></a>&nbsp;&nbsp;
                                        <a href="{{Session::get('instagram_linkHeader')}}" target="_blank" class=""><img src="{{asset('assets/images/instagram.svg')}}"></a>&nbsp;&nbsp;
                                        <a href="#" target="_blank" class="" style="width: 25px"><img src="{{asset('assets/images/telegram.svg')}}"></a>&nbsp;&nbsp;

                                    </div>
    							</div>
							</div>
						</div>

					</div>
					<!--Right Side Content-->

					<!--Right Side Content-->
				</div>
			</div>

			<br class="spaceBR">
			<br class="spaceBR">
			<br class="spaceBR">

            <div class="container">
                <div class="row">
                    <div id="myCarousel" class="owl-carousel Card-owlcarousel owl-carousel-icons carouselPosition1" >
                        @if($achievementAll->count() > 0)
                            @foreach($achievementAll as $achieve)
                                <div class="card overflow-hidden " style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
                                        <div class="item-card7-img" style="height: 250px">
                                            <a href="/achievementDetails/{{$achieve->id}}"></a>
                                            <div class="item-card7-imgs" >
                                                <img src="{{$achieve->media}}" alt="img" class="cover-image" style="height: 250px">
                                            </div>
                                        </div>

                                        <div class="card-body" style="height: 220px;font-family: ar;color: #808080">
                                            <div class="item-card2">
                                                <div class="item-card2-desc" >
                                                    <div class="item-card2-text mb-3">
                                                        <a href="/achievementDetails/{{$achieve->id}}" class="text-dark"><h4 class="mb-2" style="color: #808080">{{$achieve->name}}</h4></a>
                                                    </div><br>
                                                    <p class="helloFromIPad">{{Str::limit($achieve->description,100)}} </p>

                                                </div>
                                            </div>
                                        </div>


                                </div>

                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
		</section><!--/Section-->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script>
            var url = window.location.href;
            var res = url.match(/achievementDetails/g);
            if(res.length > 0){
                $('.achieve').addClass('active');
            }else{
                $('.achieve').removeClass('active');
            }
            $(window).on('load' , function(){
               if ($(window).width() < 991) {
                   $('.horizontalMenu-list li a').css('color' , '#808080');
                   $('#forManagerOnly').removeClass('hrForManager');
                      $('.classForChangePlace').insertAfter($('.changePlaceForAchieve33'));
                      $('.changePlaceForAchieve33').insertAfter($('.changePlaceForSearch22'));
                      $('.changePlaceForShared44').insertAfter($('.classForChangePlace'));
                }
                else {
                   $('.horizontalMenu-list li a').css('color' , '#ffffff');
                   $('.horizontalMenu-list li ul.sub-menu li a').css('color' , '#808080');
                   $('#forManagerOnly').addClass('hrForManager');
                  $('.classForChangePlace').insertBefore($('.classForChangePlace2'));
                }
            });
            $(window).on('resize' , function(){

                if ($(window).width() < 991) {
                   $('.horizontalMenu-list li a').css('color' , '#808080');
                   $('#forManagerOnly').removeClass('hrForManager');
                  $('.classForChangePlace').insertAfter($('.changePlaceForAchieve33'));
                  $('.changePlaceForAchieve33').insertAfter($('.changePlaceForSearch22'));
                  $('.changePlaceForShared44').insertAfter($('.classForChangePlace'));
                }
                else {
                    $('.spaceBR').remove();
                   $('.horizontalMenu-list li a').css('color' , '#ffffff');
                   $('.horizontalMenu-list li ul.sub-menu li a').css('color' , '#808080');
                   $('#forManagerOnly').addClass('hrForManager');
                  $('.classForChangePlace').insertBefore($('.classForChangePlace2'));
                  $('<br class="spaceBR"><br class="spaceBR"><br class="spaceBR>').insertBefore($('.changePlaceForShared44'));
                }
            });

            var popupSize = {
            width: 780,
            height: 550
        };

        $(document).on('click', '.social-button', function (e) {
            var verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
                horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

            var popup = window.open($(this).prop('href'), 'social',
                'width=' + popupSize.width + ',height=' + popupSize.height +
                ',left=' + verticalPos + ',top=' + horisontalPos +
                ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

            if (popup) {
                popup.focus();
                e.preventDefault();
            }

        });



        </script>
@endcomponent
