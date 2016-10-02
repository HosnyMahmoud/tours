@extends('front.layout')
	@section('title',Lang::get('index.services'))
	@section('content')
		<section id="services" class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="sec-ttl text-center wow fadeInUp">
                            <h1>{{Lang::get('index.services')}}</h1>
                            <span><i class="fa fa-bullhorn" aria-hidden="true"></i></span>
                            <p>{{Lang::get('index.services_text')}}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="service text-center wow fadeInLeft">
                            <figure>
                                <a href="#"><img src="{{Url('/')}}/front/images/service-img-1.jpg" alt=""></a>
                            </figure>
                            <h3><a href="#">{{Lang::get('index.flights_tickets')}}</a></h3>
                        </div>
                    </div><!-- end of service -->
                    <div class="col-sm-3">
                        <div class="service text-center wow fadeInLeft" data-wow-delay="0.5s">
                            <figure>
                                <a href="#"><img src="{{Url('/')}}/front/images/service-img-2.jpg" alt=""></a>
                            </figure>
                            <h3><a href="#">{{Lang::get('index.tourism')}}</a></h3>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="service text-center wow fadeInLeft" data-wow-delay="1s">
                            <figure>
                                <a href="#"><img src="{{Url('/')}}/front/images/service-img-3.jpg" alt=""></a>
                            </figure>
                            <h3><a href="#">{{Lang::get('index.haj')}}</a></h3>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="service text-center wow fadeInLeft" data-wow-delay="1.5s">
                            <figure>
                                <a href="#"><img src="{{Url('/')}}/front/images/service-img-4.jpg" alt=""></a>
                            </figure>
                            <h3><a href="#">{{Lang::get('index.hotels_book')}}</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- #services -->
	@endsection
@stop