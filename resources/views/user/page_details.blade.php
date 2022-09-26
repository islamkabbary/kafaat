@component('components.app')
    <x-header />


    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card cardInBusinessAreaWidth" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
                        <div class="card-body">
                            <div class="section-title center-block text-center">
                                <h2 style="color:#808080;font-family:ar">{{$page->title}}</h2>
                                <img src="{{asset('/assets/images/sub.png')}}" style="width: 150px;height: 20px">
                            </div>

                            <h4 class="card-text pInAboutUsBig">{{$page->description}}</h4>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>

@endcomponent



