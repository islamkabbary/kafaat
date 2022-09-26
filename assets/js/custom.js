(function($) {
	"use strict";

	// ______________ Cover-image
	$(".cover-image").each(function(e) {
		var attr = $(this).attr('data-image-src');
		if (typeof attr !== typeof undefined && attr !== false) {
			$(this).css('background', 'url(' + attr + ') center center');
		}
	});

	// ______________ Global Loader
	$(window).on("load", function(e) {
		$("#global-loader").fadeOut("slow");
	})

	// ______________ Color-skin
	$(document).on("click", "a[data-theme]", function(e) {
        $("head link#theme").attr("href", $(this).data("theme"));
        $(this).toggleClass('active').siblings().removeClass('active');
    });
    $(document).on("click", "a[data-effect]", function(e) {
        $("head link#effect").attr("href", $(this).data("effect"));
        $(this).toggleClass('active').siblings().removeClass('active');
    });

	// ______________ Modal
	$("#myModal").modal('show');

	// ______________Rating Stars
	var ratingOptions = {
		selectors: {
			starsSelector: '.rating-stars',
			starSelector: '.rating-star',
			starActiveClass: 'is--active',
			starHoverClass: 'is--hover',
			starNoHoverClass: 'is--no-hover',
			targetFormElementSelector: '.rating-value'
		}
	};
	$(".rating-stars").ratingStars(ratingOptions);

	// ______________mCustomScrollbar
	$(".vscroll").mCustomScrollbar();
	$(".nav-sidebar").mCustomScrollbar({
		theme: "minimal",
		autoHideScrollbar: true,
		scrollbarPosition: "outside"
	});

	// ______________Active Class
	$(".horizontalMenu-list li a").each(function(e) {
		var pageUrl = window.location.href.split(/[?#]/)[0];
		if (this.href == pageUrl) {
			$(this).addClass("active");
			$(this).parent().addClass("active"); // add active to li of the current link
			$(this).parent().parent().prev().addClass("active"); // add active class to an anchor
			$(this).parent().parent().prev().click(); // click the item to make it drop
		}
	});


	// ______________ Back to Top
	$(window).on("scroll", function(e) {
		if ($(this).scrollTop() > 0) {
			$('#back-to-top').fadeIn('slow');
		} else {
			$('#back-to-top').fadeOut('slow');
		}
	});
	$(document).on("click", "#back-to-top", function(e) {
		$("html, body").animate({
			scrollTop: 0
		}, 600);
		return false;
	});



	// ______________Quantity-right-plus
	var quantitiy = 0;
	$(document).on('click','.quantity-right-plus', function(e) {
		e.preventDefault();
		var quantity = parseInt($('#quantity').val());
		$('#quantity').val(quantity + 1);
	});
	$(document).on('click', '.quantity-left-minus', function(e) {
		e.preventDefault();
		var quantity = parseInt($('#quantity').val());
		if (quantity > 0) {
			$('#quantity').val(quantity - 1);
		}
	});



	// ______________Chart-circle
	if ($('.chart-circle').length) {
		$('.chart-circle').each(function(e) {
			let $this = $(this);
			$this.circleProgress({
				fill: {
					color: $this.attr('data-color')
				},
				size: $this.height(),
				startAngle: -Math.PI / 4 * 2,
				emptyFill: '#f9faff',
				lineCap: ''
			});
		});
	}
	const DIV_CARD = 'div.card';



	// ______________Tooltip
	$('[data-toggle="tooltip"]').tooltip();

	// ______________Popover
	$('[data-toggle="popover"]').popover({
		html: true
	});

	// ______________Card Remove
	$(document).on('click', '[data-toggle="card-remove"]', function(e) {
		let $card = $(this).closest(DIV_CARD);
		$card.remove();
		e.preventDefault();
		return false;
	});

	// ______________Card Collapse
	$(document).on('click', '[data-toggle="card-collapse"]', function(e) {
		let $card = $(this).closest(DIV_CARD);
		$card.toggleClass('card-collapsed');
		e.preventDefault();
		return false;
	});

	// ______________Card Full Screen
	$(document).on('click', '[data-toggle="card-fullscreen"]', function(e) {
		let $card = $(this).closest(DIV_CARD);
		$card.toggleClass('card-fullscreen').removeClass('card-collapsed');
		e.preventDefault();
		return false;
	});

	/*//////////////////// Header and Horizontal skins  //////////////////////*/

	//$('body').addClass("default-header"); //

	 //$('body').addClass("headerstyle1");   //

	// $('body').addClass("headerstyle2"); //

	// $('body').addClass("default-menu"); //

	// $('body').addClass("menu-style1"); //

	// $('body').addClass("menu-style2"); //

})(jQuery);

function getCoursesBySpecialistId(id){
    var checkInput = $('#spec_id_input-'+id);

       if (checkInput.is(':checked')){
           ajaxRequestWizard(id,1);
       }else{
           ajaxRequestWizard(id,0);
       }



}

function ajaxRequestWizard(id,request_type){
    $.ajax({
        url: '/specialist-id/courses/'+id+'/'+request_type,
        type:'GET',
        success:function (courses){

            $('.fetchDataHere').empty();
            if(courses != 0){
                for(var i = 0 ; i < courses.length ; i++){
                    var  course_type = null;
                    if(courses[i].type === 1){

                        course_type = "Online";
                    }else if(courses[i].type === 2){
                        course_type = "Registered";
                    }else{
                        course_type = "Headquarter";
                    }

                    $('.fetchDataHere').append(`
        						<div class="card overflow-hidden">
        							<div class="d-md-flex">
        								<div class="item-card9-img">
        									<div class="item-card9-imgs">
        										<a href="/course-details/`+courses[i].id+`"></a>
        										<img src="../assets/images/media/11.jpg" alt="img" class="cover-image">
        									</div>
        									<div class="item-overly-trans">

        											<a href="/course-details/`+courses[i].id+`" class="bg-primary">'+course_type+'</a>

        									</div>
        								</div>
        								<div class="card border-0 mb-0">
        									<div class="card-body ">
        										<div class="item-card9">
        											<a href="/course-details/`+courses[i].id+`" class="text-dark"><h3 class="font-weight-semibold mt-1">`+courses[i].title+`</h3></a>
        												<div class="mt-2 mb-2">
        												<a href="#" class="mr-4"><span class="text-muted fs-13"><i class="fa fa-clock-o text-muted mr-1"></i>`+courses[i].date+`</span></a>
        											</div>
        											<p class="mb-0 leading-tight">`+courses[i].description+`</p>
        										</div>
        									</div>
        									<div class="card-footer pt-4 pb-4">
        										<div class="item-card9-footer d-flex">
        											<div class="item-card9-cost">
        												<h4 class="text-dark font-weight-semibold mb-0 mt-0">`+courses[i].price+`</h4>
        											</div>
        										</div>
        									</div>
        								</div>
        							</div>
        						</div>
        					`);
                }
            }else{
               getAllCourses();
            }
        },
        error:function (exception){
            alert('error');
        }
    })
}

function getAllCourses(){
    $.ajax({
        url:'/getAllCourseAjax',
        method:'GET',
        success:function(response){
            console.log(response.data);
            if(response.data != ""){
                var courseType="";
                $('.fetchDataHere').empty();
                for(var i = 0 ; i < response.data.length ; i++){
                    if(response.data[i].type == 1){
                        courseType = 'Online'
                    }else if(response.data[i].type == 2){
                        courseType = 'Registered'
                    }else{
                        courseType = 'Headquarter'
                    }
                    $('.fetchDataHere').append(`
							<div class="card overflow-hidden">
								<div class="d-md-flex">
									<div class="item-card9-img">
										<div class="item-card9-imgs">
											<a href="/course-details/`+response.data[i].id+`"></a>
											<img src="../assets/images/media/11.jpg" alt="img" class="cover-image">
										</div>
										<div class="item-overly-trans">
											<a href="/course-details/`+response.data[i].id+`" class="bg-primary">`+courseType+`</a>
										</div>
									</div>
									<div class="card border-0 mb-0">
										<div class="card-body ">
											<div class="item-card9">
												<a href="/course-details/`+response.data[i].id+`" class="text-dark"><h3 class="font-weight-semibold mt-1">`+response.data[i].title+`</h3></a>
													<div class="mt-2 mb-2">
													<a href="#" class="mr-4"><span class="text-muted fs-13"><i class="fa fa-clock-o text-muted mr-1"></i>`+response.data[i].date+`</span></a>
												</div>
												<p class="mb-0 leading-tight">`+response.data[i].description+`</p>
											</div>
										</div>
										<div class="card-footer pt-4 pb-4">
											<div class="item-card9-footer d-flex">
												<div class="item-card9-cost">
													<h4 class="text-dark font-weight-semibold mb-0 mt-0">`+response.data[i].price+`</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						`);
                }
            }else{
                $('.fetchDataHere').append(`
    		            <div class="text-center text-danger">لا توجد بيانات</div>
    		        `);
            }
        }
    });
}

setTimeout(function() {
    $('.toaster-div').fadeOut('fast');
}, 2000);

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#image_render').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

$(".custom-file-input").change(function() {
    $('.image_render_div').css('display' , 'block');
    readURL(this);
});

    $(document).ready(function() {
    var url      = window.location.href;
    $('.nav-link').on('click', function() {
    // if (!$('#collapseB').hasClass('show')) {
    // $('#collapseB').collapse('toggle')
// }
})

    $('.arrow').on("click", function (event) {

    $('#headingOne').toggleClass('background_color background_color1');
    $('#headingTwo').removeClass('background_color1').addClass('background_color');
    $('#headingThree').removeClass('background_color1').addClass('background_color');
    $('#headingFour').removeClass('background_color1').addClass('background_color');
    $('#headingFive').removeClass('background_color1').addClass('background_color');

    $('#btn-1').toggleClass('front_color front_color1');
    $('#btn-2').removeClass('front_color1').addClass('front_color');
    $('#btn-3').removeClass('front_color1').addClass('front_color');
    $('#btn-4').removeClass('front_color1').addClass('front_color');
    $('#btn-5').removeClass('front_color1').addClass('front_color');

    $('.arrow-img').toggleClass('rotate2 rotate');
    $('.arrow-img2').removeClass('rotate').addClass('rotate2');
    $('.arrow-img3').removeClass('rotate').addClass('rotate2');
    $('.arrow-img4').removeClass('rotate').addClass('rotate2');
    $('.arrow-img5').removeClass('rotate').addClass('rotate2');
});

    $('.arrow2').on("click", function (event) {
    $('#headingTwo').toggleClass('background_color background_color1');
    $('#headingOne').removeClass('background_color1').addClass('background_color');
    $('#headingThree').removeClass('background_color1').addClass('background_color');
    $('#headingFour').removeClass('background_color1').addClass('background_color');
    $('#headingFive').removeClass('background_color1').addClass('background_color');

    $('#btn-2').toggleClass('front_color front_color1');
    $('#btn-1').removeClass('front_color1').addClass('front_color');
    $('#btn-3').removeClass('front_color1').addClass('front_color');
    $('#btn-4').removeClass('front_color1').addClass('front_color');
    $('#btn-5').removeClass('front_color1').addClass('front_color');

    $('.arrow-img2').toggleClass('rotate2 rotate');
    $('.arrow-img').removeClass('rotate').addClass('rotate2');
    $('.arrow-img3').removeClass('rotate').addClass('rotate2');
    $('.arrow-img4').removeClass('rotate').addClass('rotate2');
    $('.arrow-img5').removeClass('rotate').addClass('rotate2');
});

    $('.arrow3').on("click", function (event) {
    $('#headingThree').toggleClass('background_color background_color1');
    $('#headingTwo').removeClass('background_color1').addClass('background_color');
    $('#headingOne').removeClass('background_color1').addClass('background_color');
    $('#headingFour').removeClass('background_color1').addClass('background_color');
    $('#headingFive').removeClass('background_color1').addClass('background_color');

    $('#btn-3').toggleClass('front_color front_color1');
    $('#btn-2').removeClass('front_color1').addClass('front_color');
    $('#btn-1').removeClass('front_color1').addClass('front_color');
    $('#btn-4').removeClass('front_color1').addClass('front_color');
    $('#btn-5').removeClass('front_color1').addClass('front_color');

    $('.arrow-img3').toggleClass('rotate2 rotate');
    $('.arrow-img2').removeClass('rotate').addClass('rotate2');
    $('.arrow-img').removeClass('rotate').addClass('rotate2');
    $('.arrow-img4').removeClass('rotate').addClass('rotate2');
    $('.arrow-img5').removeClass('rotate').addClass('rotate2');
});

    $('.arrow4').on("click", function (event) {
    $('#headingFour').toggleClass('background_color background_color1');
    $('#headingTwo').removeClass('background_color1').addClass('background_color');
    $('#headingThree').removeClass('background_color1').addClass('background_color');
    $('#headingOne').removeClass('background_color1').addClass('background_color');
    $('#headingFive').removeClass('background_color1').addClass('background_color');

    $('#btn-4').toggleClass('front_color front_color1');
    $('#btn-2').removeClass('front_color1').addClass('front_color');
    $('#btn-3').removeClass('front_color1').addClass('front_color');
    $('#btn-1').removeClass('front_color1').addClass('front_color');
    $('#btn-5').removeClass('front_color1').addClass('front_color');

    $('.arrow-img4').toggleClass('rotate2 rotate');
    $('.arrow-img2').removeClass('rotate').addClass('rotate2');
    $('.arrow-img3').removeClass('rotate').addClass('rotate2');
    $('.arrow-img').removeClass('rotate').addClass('rotate2');
    $('.arrow-img5').removeClass('rotate').addClass('rotate2');
});

    $('.arrow5').on("click", function (event) {
    $('#headingFive').toggleClass('background_color background_color1');
    $('#headingTwo').removeClass('background_color1').addClass('background_color');
    $('#headingThree').removeClass('background_color1').addClass('background_color');
    $('#headingFour').removeClass('background_color1').addClass('background_color');
    $('#headingOne').removeClass('background_color1').addClass('background_color');

    $('#btn-5').toggleClass('front_color front_color1');
    $('#btn-2').removeClass('front_color1').addClass('front_color');
    $('#btn-3').removeClass('front_color1').addClass('front_color');
    $('#btn-4').removeClass('front_color1').addClass('front_color');
    $('#btn-1').removeClass('front_color1').addClass('front_color');

    $('.arrow-img5').toggleClass('rotate2 rotate');
    $('.arrow-img2').removeClass('rotate').addClass('rotate2');
    $('.arrow-img3').removeClass('rotate').addClass('rotate2');
    $('.arrow-img4').removeClass('rotate').addClass('rotate2');
    $('.arrow-img').removeClass('rotate').addClass('rotate2');
});




});

