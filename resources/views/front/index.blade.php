@extends('front.layout')
 @section('title',Lang::get('index.title'))
	@section('content')



	<div class="site-intro">
            <!-- masterslider -->
            <div class="master-slider ms-skin-default" id="of-home" style="direction: ltr;">
                <!-- new slide -->
                <div class="ms-slide">
                    <!-- slide background -->
                    <img src="{{Url('/')}}/front/masterslider/blank.gif" data-src="{{Url('/')}}/front/images/slide-1.jpg" alt="lorem ipsum dolor sit"/>     
                    <!-- slide text layer 
                    <div class="ms-layer ms-caption" style="top: 180px; left: 120px; display: none;">
                        <h1>استكشف العالم مع <strong>سوا ترافيل</strong>!</h1>
                        <a href="#">
                            <i class="fa fa-camera" aria-hidden="true"></i>
                            <span>شاهد أحدث العروض</span>
                        </a>
                    </div>-->
                </div>
                <!-- end of slide -->
                 
                <!-- new slide -->
                <div class="ms-slide"> 
                    <!-- slide background -->
                    <img src="{{Url('/')}}/front/masterslider/blank.gif" data-src="{{Url('/')}}/front/images/slide-3.jpg" alt="lorem ipsum dolor sit"/>     
                    <!-- slide text layer 
                    <div class="ms-layer ms-caption" style="top: 180px; left: 120px;">
                        <h1>استكشف العالم مع <strong>سوا ترافيل</strong>!</h1>
                        <a href="#">
                            <i class="fa fa-camera" aria-hidden="true"></i>
                            <span>شاهد أحدث العروض</span>
                        </a>
                    </div>-->
                    <!-- linked slide -->
                    <a href="#">SAWA Travel</a>
                </div>
                <!-- end of slide -->
                 
                <!-- new slide -->
                <div class="ms-slide">
                    <!-- slide background -->
                    <img src="{{Url('/')}}/front/masterslider/blank.gif" data-src="{{Url('/')}}/front/images/slide-2.jpg" alt="lorem ipsum dolor sit"/>     
                    <!-- slide text layer 
                    <div class="ms-layer ms-caption" style="top: 180px; right: 120px;">
                        <h1>استكشف العالم مع <strong>سوا ترافيل</strong>!</h1>
                        <a href="#">
                            <i class="fa fa-camera" aria-hidden="true"></i>
                            <span>شاهد أحدث العروض</span>
                        </a>
                    </div>-->
                    <!-- youtube video -->
                    <a href="http://www.youtube.com/embed/YHWkro9-e9Q?hd=1&wmode=opaque&controls=1&showinfo=0" data-type="video">Youtube video</a>
                </div>
                <!-- end of slide -->
            </div>
            <!-- end of masterslider -->
            
            <div id="booking-sec">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="flight-booking">
                                {!!Form::open()!!}
                                    <h3><i class="fa fa-plane" aria-hidden="true"></i> {{Lang::get('index.reserve_tickets')}}</h3>
                                    @if(Session::get('msg'))
                                        <div class="alert alert-success">{{Session::get('msg')}}</div>  
                                    @endif
                                    <div class="row" style="margin-bottom: 20px;">
                                        <div class="col-sm-6">
                                            <label>{{Lang::get('index.leave')}}</label>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    {!!Form::select('leave_from',[Lang::get('index.from'),''=>$countries],null,['class'=>'form-control','id'=>'leave_from'])!!}
                                                </div>
                                                <div class="col-sm-6">
                                                    {!!Form::select('leave_to',[Lang::get('index.to'),''=>$countries],null,['class'=>'form-control','id'=>'leave_to'])!!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>{{Lang::get('index.takeoff')}}</label>
                                            <div class="row">
                                                <div class="col-sm-6 {{ $errors->has('airport_from') ? ' has-error' : '' }}">
                                                    <select class="form-control" name="airport_from" id="takeoff" disabled>
                                                        <option value="" disabled selected>{{Lang::get('index.from')}}</option>
                                                    </select>
                                                     <small class="text-danger">{{ $errors->first('airport_from') }}</small>
                                                </div>
                                                <div class="col-sm-6 {{ $errors->has('airport_to') ? ' has-error' : '' }}">
                                                    <select class="form-control" name="airport_to" id="landing" disabled>
                                                        <option value="" disabled selected>{{Lang::get('index.to')}}</option>
                                                    </select>
                                                    <small class="text-danger">{{ $errors->first('airport_to') }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-sm-6 {{ $errors->has('num_persons') ? ' has-error' : '' }}">
                                                    <label>{{Lang::get('index.adults')}}</label>
                                                    <input type="number" name="num_persons" class="form-control" placeholder="">
                                                     <small class="text-danger">{{ $errors->first('num_persons') }}</small>
                                                </div>
                                                <div class="col-sm-6 {{ $errors->has('num_child') ? ' has-error' : '' }}">
                                                    <label>{{Lang::get('index.kids')}}</label>
                                                    <input type="number" name="num_child" class="form-control" value="0" placeholder="">
                                                     <small class="text-danger">{{ $errors->first('num_child') }}</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>{{Lang::get('index.date')}}</label>
                                            <div class="row">
                                                <div class="col-sm-6 {{ $errors->has('date_from') ? ' has-error' : '' }}">
                                                    <div class="form-group">
                                                        <div class='input-group date'>
                                                            <input type='text' name='date_from' class="form-control" id="datepicker_go" placeholder="{{Lang::get('index.go')}}">
                                                        </div>
                                                    </div>
                                                    <small class="text-danger">{{ $errors->first('date_from') }}</small>
                                                </div>
                                                <div class="col-sm-6 {{ $errors->has('date_to') ? ' has-error' : '' }}">
                                                    <div class="form-group">
                                                        <div class='input-group date'>
                                                            <input type='text' name='date_to' class="form-control" id="datepicker_back" placeholder="{{Lang::get('index.back')}}">
                                                        </div>
                                                    </div>
                                                    <small class="text-danger">{{ $errors->first('date_to') }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        @if(Auth::client()->check() == true)
                                            <button type="submit" class="btn btn-info" onClick="return confirm('{{Lang::get('index.are_you_sure')}}');">{{Lang::get('assets.reserve_now')}}</button>
                                        @else 
                                            <a class="btn btn-info" onClick="return alert('{{Lang::get('index.you_must_be_logged')}}');">{{Lang::get('assets.reserve_now')}}</a>
                                        @endif
                                    </div>
                                {!!Form::close()!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div><!-- end of site-intro -->
        
        
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
                                <a href="{{Url('/')}}/"><img src="{{Url('/')}}/front/images/service-img-1.jpg" alt=""></a>
                            </figure>
                            <h3><a href="{{Url('/')}}/">{{Lang::get('index.flights_tickets')}}</a></h3>
                        </div>
                    </div><!-- end of service -->
                    <div class="col-sm-3">
                        <div class="service text-center wow fadeInLeft" data-wow-delay="0.5s">
                            <figure>
                                <a href="{{Url('/')}}/hotels?type=2"><img src="{{Url('/')}}/front/images/service-img-2.jpg" alt=""></a>
                            </figure>
                            <h3><a href="{{Url('/')}}/hotels?type=2">{{Lang::get('index.tourism')}}</a></h3>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="service text-center wow fadeInLeft" data-wow-delay="1s">
                            <figure>
                                <a href="{{Url('/')}}/hotels?type=1"><img src="{{Url('/')}}/front/images/service-img-3.jpg" alt=""></a>
                            </figure>
                            <h3><a href="{{Url('/')}}/hotels?type=1">{{Lang::get('index.haj')}}</a></h3>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="service text-center wow fadeInLeft" data-wow-delay="1.5s">
                            <figure>
                                <a href="{{Url('/')}}/hotels"><img src="{{Url('/')}}/front/images/service-img-4.jpg" alt=""></a>
                            </figure>
                            <h3><a href="{{Url('/')}}/hotels">{{Lang::get('index.hotels_book')}}</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- #services -->
        
        <section id="home-offers" class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="sec-ttl text-center wow fadeInUp">
                            <h1>{{Lang::get('index.offers')}}</h1>
                            <span><i class="fa fa-plane" aria-hidden="true"></i></span>
                            <p>{{Lang::get('index.offers_text')}}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($travels as $travel)
                    <div class="col-md-3 col-sm-6">
                        <div class="offer wow fadeInUp">
                            <figure class="offer-img">
                                <?php $image = explode('|',$travel->images)?>
                                <a href="{{Url('/')}}/uploads/travels/{{$image[0]}}" rel="prettyPhoto"><img src="{{Url('/')}}/uploads/travels/{{$image[0]}}" alt=""></a>
                            </figure>
                            <div class="offer-info">
                                <h3>
                                    <a href="{{Url('/')}}/travels/{{$travel->id}}-{{$travel['slug_'.Session::get('local')]}}">{{$travel['name_'.Session::get('local')]}}</a>
                                    <span>{{round($travel['price'])}} {{Lang::get('assets.le')}}</span>
                                </h3>
                                <p>{{str_limit($travel['desc_'.Session::get('local')],50)}}</p>
                                <a href="{{Url('/')}}/travels/{{$travel->id}}-{{$travel['slug_'.Session::get('local')]}}" class="view-more">{{Lang::get('assets.view_details')}}</a>
                            </div>
                        </div>
                    </div><!-- end of offer -->
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <a href="{{Url('/')}}/travels"  class="view-all wow zoomIn" data-wow-delay="2s">{{Lang::get('assets.view_all_offers')}}</a>
                    </div>
                </div>
            </div>
        </section><!-- #home-offers -->
        @if($testimonials->count() > 0)
        <section id="testimonials" class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="sec-ttl text-center wow fadeInUp">
                            <h1>{{Lang::get('index.testmonials')}}</h1>
                            <span><i class="fa fa-quote-right" aria-hidden="true"></i></span>
                            <p>{{Lang::get('index.testmonials_text')}}</p>
                        </div>
                    </div>
                </div>
                <div class="row wow fadeInUp" data-wow-delay="1s">
                    <div class="col-md-8 col-md-offset-2">
                        <div id="owl-demo" class="owl-carousel owl-theme" style="direction: ltr;">
                            @foreach($testimonials as $test)
                            <div class="item">
                                <div class="testimonial-container">
                                    <blockquote>
                                        <p>{{$test->text}}</p>
                                    </blockquote>
                                </div>
                                <div class="client-info">
                                    <span><strong>{{@$users->find($test->user_id)->name}}</strong></span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- #testimonials -->
        @endif
        
        @section('inlineJS')
        <script type="text/javascript">
            $('#leave_from').on('change',function(){
                if($('#leave_from').val() == 0){
                     $('#takeoff').find('option').remove();
                    $('#takeoff').append("<option>{{Lang::get('index.from')}}</option>")
                    $('#takeoff').attr('disabled',true);
                }else{
                    $.get('{{Url("/")}}/get_airports/'+$('#leave_from').val(),function(data){
                        $('#takeoff').find('option').remove();
                            $.each(data.airports,function(key,val){
                                $('#takeoff').append('<option value="'+val.id+'">'+val.name+'</option>')
                            })
                            $('#takeoff').attr('disabled',false);
                    });
                }
            });

             $('#leave_to').on('change',function(){
                if($('#leave_to').val() == 0){
                     $('#landing').find('option').remove();
                    $('#landing').append("<option>{{Lang::get('index.from')}}</option>")
                    $('#landing').attr('disabled',true);
                }else{
                    $.get('{{Url("/")}}/get_airports/'+$('#leave_to').val(),function(data){
                        $('#landing').find('option').remove();
                            $.each(data.airports,function(key,val){
                                $('#landing').append('<option value="'+val.id+'">'+val.name+'</option>')
                            })
                            $('#landing').attr('disabled',false);
                    });
                }
            });
            $(document).ready(function(){
                if($('#leave_from').val() == 0){
                     $('#takeoff').find('option').remove();
                    $('#takeoff').append("<option>{{Lang::get('index.from')}}</option>")
                    $('#takeoff').attr('disabled',true);
                }else{
                    $.get('{{Url("/")}}/get_airports/'+$('#leave_from').val(),function(data){
                        $('#takeoff').find('option').remove();
                            $.each(data.airports,function(key,val){
                                $('#takeoff').append('<option value="'+val.id+'">'+val.name+'</option>')
                            })
                            $('#takeoff').attr('disabled',false);
                    });
                }


                if($('#leave_to').val() == 0){
                     $('#landing').find('option').remove();
                    $('#landing').append("<option>{{Lang::get('index.from')}}</option>")
                    $('#landing').attr('disabled',true);
                }else{
                    $.get('{{Url("/")}}/get_airports/'+$('#leave_to').val(),function(data){
                        $('#landing').find('option').remove();
                            $.each(data.airports,function(key,val){
                                $('#landing').append('<option value="'+val.id+'">'+val.name+'</option>')
                            })
                            $('#landing').attr('disabled',false);
                    });
                }
            });

            $(document).ready(function(){
                var dateFormat = "yy-mm-dd",
                  from = $( "#datepicker_go" )
                    .datepicker({
                      defaultDate: "+1w",
                      changeMonth: true,
                      numberOfMonths: 1,
                    })
                    .on( "change", function() {
                      to.datepicker( "option", "minDate", getDate( this ) );
                    }),
                  to = $( "#datepicker_back" ).datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 1
                  })
                  .on( "change", function() {
                    from.datepicker( "option", "maxDate", getDate( this ) );
                  });
                function getDate( element ) {
                  var date;
                  try {
                    date = $.datepicker.parseDate( dateFormat, element.value );
                  } catch( error ) {
                    date = null;
                  }
                  return date;
                }

                $('button.ui-datepicker-trigger').addClass('input-group-addon glyphicon glyphicon-calendar');
            });
        </script>
	@endsection
    @endsection
@stop