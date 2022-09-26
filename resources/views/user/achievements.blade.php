@component('components.app')

    <x-header />
    <div class="container">
        <hr>
        <h2 class="">ACHIEVEMENTS</h2>
		<hr>
		<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div id="myCarousel" class="owl-carousel testimonial-owl-carousel">
							@foreach($achievements as $achievement)
								<div class="item text-center">
									<div class="card-body">
										<div class="row">
											<div class="col-xl-8 col-md-12 d-block mx-auto">
												<div class="testimonia">
													<div class="testimonia-img mx-auto mb-3">
														<img src="../assets/images/users/female/11.jpg" class="img-thumbnail rounded-circle alt=" alt="img">
													</div>
													<p>
														<i class="fa fa-quote-left"></i> {{$achievement->description}}
													</p>
													<div class="testimonia-data">
														<h4 class="fs-20 mb-1">{{$achievement->title}}</h4>
														
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
				@endforeach
				</div>
		</div>
				</div>
</div>
</div>
    @endcomponent
