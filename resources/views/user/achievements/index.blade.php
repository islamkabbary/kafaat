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
</style>

<div class="overlayHeader">
    <img src="{{asset('assets/images/full-image.jpg')}}" class="cover-image imgHeaderAchievement" height="400px">
</div>

<h1 class="text-center "style="    position: relative;
    color: #fff;
    font-family: ar;
    top: -250px;">قائمة الإنجازات</h1>

<br>


<section class="sptb">
			<div class="container">
				<div class="row">
				    <div class="col-xl-9 col-lg-8 col-md-12 classForUpInch">
						<!--Coursed lists-->
						<div class=" mb-lg-0">
							<div class="">
								<div class="item2-gl ">
									<div class="tab-content">
										<div class="row getData">
										    @if($achievements->count() > 0)
										    @foreach($achievements as $achievement)
										    <div class="col-lg-6 col-md-12 col-xl-4">
                                            <div class="card overflow-hidden" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
                                            <div class="item-card9-img" style="height: 250px">
                                            <a href="/achievementDetails/{{$achievement->id}}"></a>
                                            <img src="{{$achievement->media}}" alt="img" style="height: 250px" class="cover-image">
                                            </div>
                                            <div class="card-body" style="height: 220px;font-family: ar;color: #808080">
                                            <a href="/achievemnetDetails/{{$achievement->id}}"></a>
                                            <div class="item-card2">
                                            <div class="item-card2-desc" >
                                            <div class="item-card2-text mb-3">
                                            <a href="/achievementDetails/{{$achievement->id}}" class="text-dark"><h4 class="mb-2" style="color: #808080">{{$achievement->name}}</h4></a>
                                            </div><br>
                                            <p class="">{{Str::limit($achievement->description , 100)}}</p>

                                            </div>
                                            </div>
                                            </div>
                                            </div>
                                            </div>
                                            @endforeach
                                            @else
                                            <span class="text-warning text-center"> no achievements provided yet !</span>
                                            @endif
									</div>
							</div>
						</div>
						<!--/Coursed lists-->
					</div>
					<!--/Coursed Lists-->
				</div>
				<nav class="text-right pagii">
					<ul class="pagination mb-0">
                        {!! $achievements->withQueryString()->links('pagination::bootstrap-5') !!}
                        <!-- <li class="page-item"><a class="page-link" href="#">1</a></li> -->
					</ul>
                </nav>
			</div>
					<!--Left Side Content-->
					<div class="col-xl-3 col-lg-4 col-md-12 classAllForShare_Achieve">
						<div class="card mb-lg-0 classForUpInch2" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
							<div class="card-header">
								<h3 class="card-title" style="color:#AAAAA9;font-family:ar">قسم الإنجازات</h3>
							</div>
							<div class="card-body">
								<div class="" id="container">
									<div class="filter-product-checkboxs">
									    
										<label class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input type1" name="type" value="1">
											<span class="custom-control-label">
												<a href="#"  style="font-family:ab;color:#AAAAA9">تنظيم المعارض<span  style="background-color:#F2F2F2" class="label label-secondary float-left"><span style="color:#AAAAA9">{{getCountAchievement(1)}}</span></span></a>
											</span>
										</label>
										
										<label class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input type2" name="type" value="2">
											<span class="custom-control-label">
												<a href="#"  style="font-family:ab;color:#AAAAA9">دورات تأهيلية<span  style="background-color:#F2F2F2" class="label label-secondary float-left"><span style="color:#AAAAA9">{{getCountAchievement(2)}}</span></span></a>
											</span>
										</label>
										
										<label class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input type3" name="type" value="3">
											<span class="custom-control-label">
												<a href="#" style="font-family:ab;color:#AAAAA9">حملات إعلامية<span style="background-color:#F2F2F2"  class="label label-secondary float-left"><span style="color:#AAAAA9">{{getCountAchievement(3)}}</span></span></a>
											</span>
										</label>
									
										<label class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input type4" name="type" value="4">
											<span class="custom-control-label">
												<a href="#" style="font-family:ab;color:#AAAAA9">تقديم إستشارات<span  style="background-color:#F2F2F2" class="label label-secondary float-left"><span style="color:#AAAAA9">{{getCountAchievement(4)}}</span><span></a>
											</span>
										</label>
										
										<label class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input type5" name="type" value="5">
											<span class="custom-control-label">
												<a href="#" style="font-family:ab;color:#AAAAA9">حقائب تدريبية<span   style="background-color:#F2F2F2" class="label label-secondary float-left"><span style="color:#AAAAA9">{{getCountAchievement(5)}}</span><span></a>
											</span>
										</label>
										
										<label class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input type6" name="type" value="6">
											<span class="custom-control-label">
												<a href="#" style="font-family:ab;color:#AAAAA9">برنامج التعاقد<span  style="background-color:#F2F2F2" class="label label-secondary float-left"><span style="color:#AAAAA9">{{getCountAchievement(6)}}</span><span></a>
											</span>
										</label>
										
									</div>
								</div>
							</div>
						</div>

						<br>
						<br>
						<br>

						<div class="card classForUpInch3" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
						    <div class="card-header border-top">
								<h3 class="card-title" style="color:#AAAAA9;font-family:ar">شارك إنجازاتنا</h3>
							</div>
							<div class="card-body product-filter-desc">
								<div class="product-filter-icons text-center">
									<a href="https://twitter.com/intent/tweet?text=Achievements_Kafaat22&amp;url={{Request::url()}}" target="_blank" class="twitter-bg social-button"><img src="{{asset('assets/images/twitterAchieve.svg')}}"></a>&nbsp;&nbsp;
									<a href="https://www.facebook.com/sharer/sharer.php?u={{Request::url()}}" target="_blank" class="social-button"><img src="{{asset('assets/images/UntitledFD-1.png')}}"></a>&nbsp;&nbsp;
								</div>
							</div>
					    </div>
					</div>
					<!--/Left Side Content-->
					<!--Coursed Lists-->
		</section>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>

        $(window).on('load' , function(){
            if ($(window).width() < 991) {
               $('.horizontalMenu-list li a').css('color' , '#808080');
                $('.classForUpInch').insertAfter($('.classForUpInch2'));
            }
            else {
                $('.horizontalMenu-list li a').css('color' , '#ffffff');
                $('.horizontalMenu-list li ul.sub-menu li a').css('color' , '#808080');
                $('.classForUpInch').insertBefore($('.classAllForShare_Achieve'));
                $('.classForUpInch3').insertAfter($('.classForUpInch2'));
                $('<br><br><br>').insertBefore($('.classForUpInch3'));
            }
        });
        $(window).on('resize' , function(){

            if ($(window).width() < 991) {
               $('.horizontalMenu-list li a').css('color' , '#808080');
              $('.classForUpInch').insertAfter($('.classForUpInch2'));
            }
            else {
                $('.horizontalMenu-list li a').css('color' , '#ffffff');
                $('.horizontalMenu-list li ul.sub-menu li a').css('color' , '#808080');
                $('.classForUpInch').insertBefore($('.classAllForShare_Achieve'));
                $('.classForUpInch3').insertAfter($('.classForUpInch2'));
                $('<br><br><br>').insertBefore($('.classForUpInch3'));
            }
        });

        $('input:checkbox').click(function() {
            $('input:checkbox').not(this).prop('checked', false);
        });

        $('.type1').on('click' , function(e){
            if($('.type1:checkbox:checked').length > 0){
                $('.getData').empty();
                $('.pagii').css('display' , 'none');
                $.ajax({
                   url:'/getTypeOfAchievements/1',
                   method:'GET',
                   success:function(data){
                      console.log(data);
                    for(var i=0;i<data.length;i++){
                        $('.getData').append(`
                            <div class="col-lg-6 col-md-12 col-xl-4">
                            <div class="card overflow-hidden" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
                            <div class="item-card9-img" style="height: 250px">
                            <a href="/achievementDetails/`+data[i].id+`"></a>
                            <img src="`+data[i].media+`" alt="img" style="height: 250px" class="cover-image">
                            </div>
                            <div class="card-body" style="height: 220px;font-family: ar;color: #808080">
                            <a href="/achievemnetDetails/`+data[i].id+`"></a>
                            <div class="item-card2">
                            <div class="item-card2-desc" >
                            <div class="item-card2-text mb-3">
                            <a href="/achievementDetails/`+data[i].id+`" class="text-dark"><h4 class="mb-2" style="color: #808080">`+data[i].name+`</h4></a>
                            </div><br>
                            <p class="">`+data[i].description.substring(0, 100)+`</p>

                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                        `);
                    }
                   },
                });
            }else{
                $('.getData').empty();
                getAllAchieve();
                $('.pagii').css('display' , 'block');
            }
        });

        $('.type2').on('click' , function(e){
            if($('.type2:checkbox:checked').length > 0){
                $('.getData').empty();
                $('.pagii').css('display' , 'none');
                $.ajax({
                   url:'/getTypeOfAchievements/2',
                   method:'GET',
                   success:function(data){
                      console.log(data);
                    for(var i=0;i<data.length;i++){
                        $('.getData').append(`
                            <div class="col-lg-6 col-md-12 col-xl-4">
                            <div class="card overflow-hidden" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
                            <div class="item-card9-img" style="height: 250px">
                            <a href="/achievementDetails/`+data[i].id+`"></a>
                            <img src="`+data[i].media+`" alt="img" class="cover-image" style="height: 250px">
                            </div>
                            <div class="card-body" style="height: 220px;font-family: ar;color: #808080">
                            <a href="/achievemnetDetails/`+data[i].id+`"></a>
                            <div class="item-card2">
                            <div class="item-card2-desc" >
                            <div class="item-card2-text mb-3">
                            <a href="/achievementDetails/`+data[i].id+`" class="text-dark"><h4 class="mb-2" style="color: #808080">`+data[i].name+`</h4></a>
                            </div><br>
                            <p class="">`+data[i].description.substring(0, 100)+`</p>

                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                        `);
                    }
                   },
                });
            }else{
                $('.getData').empty();
                getAllAchieve();
                $('.pagii').css('display' , 'block');
            }
        });

        $('.type3').on('click' , function(e){
            if($('.type3:checkbox:checked').length > 0){
                $('.getData').empty();
                $('.pagii').css('display' , 'none');
                $.ajax({
                   url:'/getTypeOfAchievements/3',
                   method:'GET',
                   success:function(data){
                      console.log(data);
                    for(var i=0;i<data.length;i++){
                        $('.getData').append(`
                            <div class="col-lg-6 col-md-12 col-xl-4">
                            <div class="card overflow-hidden" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
                            <div class="item-card9-img" style="height: 250px">
                            <a href="/achievementDetails/`+data[i].id+`"></a>
                            <img src="`+data[i].media+`" alt="img" class="cover-image" style="height: 250px">
                            </div>
                            <div class="card-body" style="height: 220px;font-family: ar;color: #808080">
                            <a href="/achievemnetDetails/`+data[i].id+`"></a>
                            <div class="item-card2">
                            <div class="item-card2-desc" >
                            <div class="item-card2-text mb-3">
                            <a href="/achievementDetails/`+data[i].id+`" class="text-dark"><h4 class="mb-2" style="color: #808080">`+data[i].name+`</h4></a>
                            </div><br>
                            <p class="">`+data[i].description.substring(0, 100)+`</p>

                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                        `);
                    }
                   },
                });
            }else{
                $('.getData').empty();
                getAllAchieve();
                $('.pagii').css('display' , 'block');
            }
        });

        $('.type4').on('click' , function(e){
            if($('.type4:checkbox:checked').length > 0){
                $('.getData').empty();
                $('.pagii').css('display' , 'none');
                $.ajax({
                   url:'/getTypeOfAchievements/4',
                   method:'GET',
                   success:function(data){
                      console.log(data);
                    for(var i=0;i<data.length;i++){
                        $('.getData').append(`
                            <div class="col-lg-6 col-md-12 col-xl-4">
                            <div class="card overflow-hidden" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
                            <div class="item-card9-img" style="height: 250px">
                            <a href="/achievementDetails/`+data[i].id+`"></a>
                            <img src="`+data[i].media+`" alt="img" class="cover-image" style="height: 250px">
                            </div>
                            <div class="card-body" style="height: 220px;font-family: ar;color: #808080">
                            <a href="/achievemnetDetails/`+data[i].id+`"></a>
                            <div class="item-card2">
                            <div class="item-card2-desc" >
                            <div class="item-card2-text mb-3">
                            <a href="/achievementDetails/`+data[i].id+`" class="text-dark"><h4 class="mb-2" style="color: #808080">`+data[i].name+`</h4></a>
                            </div><br>
                            <p class="">`+data[i].description.substring(0, 100)+`</p>

                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                        `);
                    }
                   },
                });
            }else{
                $('.getData').empty();
                getAllAchieve();
                $('.pagii').css('display' , 'block');
            }
        });

        $('.type5').on('click' , function(e){
            if($('.type5:checkbox:checked').length > 0){
                $('.getData').empty();
                $('.pagii').css('display' , 'none');
                $.ajax({
                   url:'/getTypeOfAchievements/5',
                   method:'GET',
                   success:function(data){
                      console.log(data);
                    for(var i=0;i<data.length;i++){
                        $('.getData').append(`
                            <div class="col-lg-6 col-md-12 col-xl-4">
                            <div class="card overflow-hidden" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
                            <div class="item-card9-img" style="height: 250px">
                            <a href="/achievementDetails/`+data[i].id+`"></a>
                            <img src="`+data[i].media+`" alt="img" class="cover-image" style="height: 250px">
                            </div>
                            <div class="card-body" style="height: 220px;font-family: ar;color: #808080">
                            <a href="/achievemnetDetails/`+data[i].id+`"></a>
                            <div class="item-card2">
                            <div class="item-card2-desc" >
                            <div class="item-card2-text mb-3">
                            <a href="/achievementDetails/`+data[i].id+`" class="text-dark"><h4 class="mb-2" style="color: #808080">`+data[i].name+`</h4></a>
                            </div><br>
                            <p class="">`+data[i].description.substring(0, 100)+`</p>

                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                        `);
                    }
                   },
                });
            }else{
                $('.getData').empty();
                getAllAchieve();
                $('.pagii').css('display' , 'block');
            }
        });

        $('.type6').on('click' , function(e){
            if($('.type6:checkbox:checked').length > 0){
                $('.getData').empty();
                $('.pagii').css('display' , 'none');
                $.ajax({
                   url:'/getTypeOfAchievements/6',
                   method:'GET',
                   success:function(data){
                      console.log(data);
                    for(var i=0;i<data.length;i++){
                        $('.getData').append(`
                            <div class="col-lg-6 col-md-12 col-xl-4">
                            <div class="card overflow-hidden" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
                            <div class="item-card9-img" style="height: 250px">
                            <a href="/achievementDetails/`+data[i].id+`"></a>
                            <img src="`+data[i].media+`" alt="img" class="cover-image" style="height: 250px">
                            </div>
                            <div class="card-body" style="height: 220px;font-family: ar;color: #808080">
                            <a href="/achievemnetDetails/`+data[i].id+`"></a>
                            <div class="item-card2">
                            <div class="item-card2-desc" >
                            <div class="item-card2-text mb-3">
                            <a href="/achievementDetails/`+data[i].id+`" class="text-dark"><h4 class="mb-2" style="color: #808080">`+data[i].name+`</h4></a>
                            </div><br>
                            <p class="">`+data[i].description.substring(0, 100)+`</p>

                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                        `);
                    }
                   },
                });
            }else{
                $('.getData').empty();
                getAllAchieve();
                $('.pagii').css('display' , 'block');
            }
        });

        function getAllAchieve(){
            $.ajax({
                url:'/getAllAchievementsAjax',
                method:'GET',
                success:function(data){
                    for(var i=0;i<data.length;i++){
                        $('.getData').append(`
                            <div class="col-lg-6 col-md-12 col-xl-4">
                            <div class="card overflow-hidden" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
                            <div class="item-card9-img" style="height: 250px">
                            <a href="/achievementDetails/`+data[i].id+`"></a>
                            <img src="`+data[i].media+`" alt="img" class="cover-image" style="height: 250px">
                            </div>
                            <div class="card-body" style="height: 220px;font-family: ar;color: #808080">
                            <a href="/achievemnetDetails/`+data[i].id+`"></a>
                            <div class="item-card2">
                            <div class="item-card2-desc" >
                            <div class="item-card2-text mb-3">
                            <a href="/achievementDetails/`+data[i].id+`" class="text-dark"><h4 class="mb-2" style="color: #808080">`+data[i].name+`</h4></a>
                            </div><br>
                            <p class="">`+data[i].description.substring(0, 100)+`</p>

                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                        `);
                    }
                },
            });
        }

    </script>
@endcomponent

