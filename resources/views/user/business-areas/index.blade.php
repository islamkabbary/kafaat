@component('components.app')
    <x-header />
    
    <div class="container">
			<hr>
			<h2 class="">BUSINESS AREAS</h2>
			<hr>
			<div class="row">
                @foreach($business_areas as $business)
				<div class="col-xl-3  col-md-12">
					<div class="card">
						<div class="item-card">
							<div class="item-card-desc">
								<a href="#"></a>
								<div class="item-card-img">
                                    <img src="../assets/images/media/21.jpg" alt="img" class="">
                                    <!-- <img src="{{asset('uploads/$business->image')}}" alt="img" class=""> -->
								</div>
								<div class="item-card-text">
                                    <h4 class="mb-0">{{$business->title}}</h4>
                                    <br>
                                    <p>{{$business->description}}</p>
								</div>
                            </div>
                            <div class="item-card-btn">
								<a href="#" style="position:relative;top:30px;" class="btn btn-primary">View More</a>
							</div>
						</div>
					</div>
                </div>
                @endforeach
			</div>
			<hr>
    </div>
@endcomponent
