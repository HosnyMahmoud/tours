@extends('front.layout')
@section('title',Lang::get('hotels.breadcrumbs'))
@section('content')        
        <section class="content">
            <div class="container">
                <div class="page-ttl">
                    <h1>{{Lang::get('hotels.breadcrumbs')}}</h1>
                    <ol class="breadcrumb">
                        <li><a href="#">{{Lang::get('assets.index')}}</a></li>
                        <li class="active">{{Lang::get('hotels.breadcrumbs')}}</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
                
                <div class="row search-box">
                    <form>
                        <div class="col-sm-3">
                            <label>{{Lang::get('hotels.hotel_name')}}</label>
                            <input type="text" class="form-control" name="hotel_name" placeholder="" value="{{$request->hotel_name}}">
                        </div>
                        <div class="col-sm-3">
                            <label>{{Lang::get('hotels.city')}}</label>
                        	{!! Form::select('city',$regions,$request->city,['class'=>'form-control'])!!}
                        </div>
                        <div class="col-sm-2">
                            <label>{{Lang::get('hotels.night_price_from')}}</label>
                            <input type="text" class="form-control" name="price_from" placeholder="" value="{{$request->price_from}}">
                        </div>
                         <div class="col-sm-2">
                            <label>{{Lang::get('hotels.night_price_to')}}</label>
                            <input type="text" class="form-control" name="price_to" placeholder="" value="{{$request->price_to}}">
                        </div>
                        <div class="col-sm-2">
                            <button type="submit">{{Lang::get('hotels.view_results')}}</button>
                        </div>
                    </form>
                </div>
                @if($hotels->total()>0)
                <?php $i = 1;?>
                @foreach($hotels as $hotel)
                <?php $images = explode('|',  $hotel->images); ?>
                @if($i % 2 == 0)
                <div class="row hotel">
                    <div class="col-sm-6 hotel-img">
                        <a href="{{Url('/')}}/hotels/{{$hotel->id}}-{{$hotel['slug_'.Session::get('local')]}}"><img src="{{Url('/')}}/uploads/hotels/{{$images[0]}}" alt="" class="img-responsive"></a>
                    </div>
                    <div class="col-sm-6 hotel-content">
                        <div class="content-holder">
                            <div class="content-holder-inner">
                                <h2 class="hotel-name"><a href="{{Url('/')}}/hotels/{{$hotel->id}}-{{$hotel['slug_'.Session::get('local')]}}">{{$hotel['name_'.Session::get('local')]}}</a></h2>
                                <p>{{$hotel['desc_'.Session::get('local')]}}</p>
                                <div class="hotel-price">
                                    <span>{{$hotel->price}} {{Lang::get('assets.le')}}</span>
                                    <small>/{{Lang::get('hotels.night')}}</small>
                                </div>
                                <a href="{{Url('/')}}/hotels/{{$hotel->id}}-{{$hotel['slug_'.Session::get('local')]}}" class="show-details">{{Lang::get('hotels.details')}} <i class="{{Lang::get('hotels.arrow-left')}}"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @else
				<div class="row hotel">
                    <div class="col-sm-6 hotel-content">
                        <div class="content-holder">
                            <div class="content-holder-inner">
                                <h2 class="hotel-name"><a href="{{Url('/')}}/hotels/{{$hotel->id}}-{{$hotel['slug_'.Session::get('local')]}}">{{$hotel['name_'.Session::get('local')]}}</a></h2>
                                <p>{{$hotel['desc_'.Session::get('local')]}}</p>
                                <div class="hotel-price">
                                    <span>{{$hotel->price}} {{Lang::get('assets.le')}}</span>
                                    <small>/{{Lang::get('hotels.night')}}</small>
                                </div>
                                <a href="{{Url('/')}}/hotels/{{$hotel->id}}-{{$hotel['slug_'.Session::get('local')]}}" class="show-details"><i class="{{Lang::get('hotels.arrow-right')}}"></i> {{Lang::get('hotels.details')}} </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 hotel-img">
                        <a href="{{Url('/')}}/hotels/{{$hotel->id}}-{{$hotel['slug_'.Session::get('local')]}}"><img src="{{Url('/')}}/uploads/hotels/{{$images[0]}}" alt="" class="img-responsive"></a>
                    </div>
                </div>
                @endif
                <?php $i++; ?>
                @endforeach
        		<div class="text-center">
        			{!!$hotels->appends([
        				'hotel_name' =>$request->hotel_name,
						'city' =>$request->city,
						'price_from' =>$request->price_from,
						'price_to' =>$request->price_to
        				])->render()!!}
        		</div>	
        		@else
        			<div class="well text-center"><h3>{{Lang::get('hotels.no_search_results')}}</h3></div>
        		@endif
            </div>
        </section>
@endsection
@stop