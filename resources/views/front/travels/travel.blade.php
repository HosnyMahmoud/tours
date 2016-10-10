@extends('front.layout')
	@section('title',$travel['name_'.Session::get('local')])
	@section('content')
		<section class="content">
            <div class="container">
                <div class="page-ttl">
                    <h1>{{$travel['name_'.Session::get('local')]}}</h1>
                    <ol class="breadcrumb">
                        <li><a href="{{Url('/')}}/">{{Lang::get('assets.index')}}</a></li>
                        <li><a href="{{Url('/')}}/travels">{{Lang::get('travels.breadcamp')}}</a></li>
                        <li class="active">{{$travel['name_'.Session::get('local')]}}</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
                
                <div class="row">
                    <div class="col-sm-8 item-slides">
                        <!-- masterslider -->
                        <div class="master-slider ms-skin-metro" id="of-item">
                           @foreach($images as $img) 
                            <div class="ms-slide">
                                <img src="{{Url('/')}}/front/masterslider/blank.gif" data-src="{{Url('/')}}/uploads/travels/{{$img}}" alt="lorem ipsum dolor sit"/>     
                                <div class="ms-thumb">
                                    <img src="{{Url('/')}}/uploads/travels/{{$img}}" />
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!-- end of masterslider -->
                    </div>
                    
                    <div class="col-sm-4">
                        <div class="hotel-booking">
                            <h4>{{Lang::get('travels.travel_price')}}</h4>
                            <div class="hotel-price">
                                <span>{{$travel->price}} {{Lang::get('hotels.le')}}</span>
                            </div>
                             @if($isWishlist === true )
                                <a id="wishlist" href="{{Url('/')}}/dashboard/wishlist/travels/add/{{$travel->id}}" title="Remove From wishlist" class="fa fa-heart fa-3x" style="text-decoration:none;color:#eb0000"></a>
                            @else
                                <a id="wishlist" href="{{Url('/')}}/dashboard/wishlist/travels/add/{{$travel->id}}" title="Add To wishlist" class="fa fa-heart-o fa-3x" style="text-decoration:none;color:#eb0000"></a>
                            @endif
                            <br>
                            <br>
                            <a href="{{Url('/')}}/dashboard/travels/{{$travel->id}}/reserve" class="btn btn-block btn-lg btn-success">{{Lang::get('travels.reserve_now')}}</a>
                        </div>
                        
                        <div class="hotel-info">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#overview" aria-controls="overview" role="tab" data-toggle="tab"><i class="fa fa-file-text-o" aria-hidden="true"></i> {{Lang::get('travels.about')}}</a></li>
                            </ul>
                            
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="overview">
                                    <p>{{$travel['desc_'.Session::get('local')]}} </p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </section>
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
	@endsection
@stop