@extends('front.layout')
@section('title',$hotels['name_'.Session::get('local')])
@section('content')
	<section class="content">
        <div class="container">
            <div class="page-ttl">
                <h1>{!!$hotels['name_'.Session::get('local')]!!}</h1>
                <ol class="breadcrumb">
                    <li><a href="{{Url('/')}}">{{Lang::get('assets.index')}}</a></li>
                    <li><a href="{{Url('/')}}/hotels">{{Lang::get('hotels.breadcrumbs')}}</a></li>
                    <li class="active">{!!$hotels['name_'.Session::get('local')]!!}</li>
                </ol>
                <div class="clearfix"></div>
            </div>
            
            <div class="row">
                <div class="col-sm-8 item-slides">
                    <!-- masterslider -->
                    <div class="master-slider ms-skin-metro" id="of-item">
                        @foreach($images as $img)
                            <div class="ms-slide">
                                <img src="masterslider/blank.gif" data-src="{{Url()}}/uploads/hotels/thumb/{{$img}}" alt="{!!$hotels['name_'.Session::get('local')]!!}"/>     
                                <div class="ms-thumb">
                                    <img src="{{Url()}}/uploads/hotels/thumb/{{$img}}" />
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- end of masterslider -->
                </div>
                
                <div class="col-sm-4">
                    <div class="hotel-booking">
                        <h4>{{Lang::get('hotels.night_price')}}</h4>
                        <div class="hotel-price">
                            <span>{{$hotels->price}} {{Lang::get('hotels.le')}}</span>
                        </div>
                        @if($isWishlist === true )
                            <a id="wishlist" href="{{Url('/')}}/dashboard/wishlist/hotels/add/{{$hotels->id}}" title="Remove From wishlist" class="fa fa-heart fa-3x" style="text-decoration:none;color:#eb0000"></a>
                        @else
                            <a id="wishlist" href="{{Url('/')}}/dashboard/wishlist/hotels/add/{{$hotels->id}}" title="Add To wishlist" class="fa fa-heart-o fa-3x" style="text-decoration:none;color:#eb0000"></a>
                        @endif
                        <br>
                        <br>
                            <div class="form-group col-md-12">
                                <label>{{Lang::get('index.adults')}}</label>
                                <input type="number" name='persons' class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{Lang::get('index.from')}}</label>
                                <input type='text' name='date_from' class="form-control" id="datepicker_go" placeholder="{{Lang::get('index.from')}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{Lang::get('index.to')}}</label>
                                <input type='text' name='date_from' class="form-control" id="datepicker_go" placeholder="{{Lang::get('index.to')}}">
                            </div>
                        <button href="{{Url('/')}}/dashboard/hotels/{{$hotels->id}}/reserve" class="btn btn-block btn-lg btn-success ">{{Lang::get('hotels.reseve_now')}}</button>
                        

                    </div>
                    
                    <div class="hotel-info">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#overview" aria-controls="overview" role="tab" data-toggle="tab"><i class="fa fa-file-text-o" aria-hidden="true"></i> {{Lang::get('hotels.about')}}</a></li>
                        </ul>
                        
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="overview">
                                <p>{!!$hotels['desc_'.Session::get('local')]!!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            @if(count($hotels)>0)
                
                <div class="page-ttl" style="margin-top: 50px;">
                    <h1>{{ Lang::get('hotels.other_hotels')}}</h1>
                    <div class="clearfix"></div>
                </div>
                
                <?php $i = 1;?>
                @foreach($related as $hotel)
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
            @endif
        @section('inlineJS')
         @if($isWishlist === false )
            <script type="text/javascript">
                $('#wishlist').hover(function() {
                   $('#wishlist').addClass('fa-heart');
                   $('#wishlist').removeClass('fa-heart-o');
                  },function(){
                    $('#wishlist').removeClass('fa-heart');
                    $('#wishlist').addClass('fa-heart-o');
                  }
                );

              
            </script>
        @endif
        @endsection
                <!-- <div class="row hotel">
                    <div class="col-sm-6 hotel-content">
                        <div class="content-holder">
                            <div class="content-holder-inner">
                                <h2 class="hotel-name"><a href="#">فندق كونراد القاهرة</a></h2>
                                <p>هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص</p>
                                <div class="hotel-price">
                                    <span>750LE</span>
                                    <small>/ليلة</small>
                                </div>
                                <a href="#" class="show-details">تفاصيل الفندق <i class="fa fa-long-arrow-left"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 hotel-img">
                        <a href="#"><img src="images/hotel-img.jpg" alt="" class="img-responsive"></a>
                    </div>
                </div> -->
                
            </div>
        </section>
    @endsection
@stop
