@extends('front.layout')
    @section('title',Lang::get('travels.breadcamp'))
	@section('content')
		<section class="content">
            <div class="container">
                <div class="page-ttl">
                    <h1>{{Lang::get('travels.breadcamp')}}</h1>
                    <ol class="breadcrumb">
                        <li><a href="{{Url('/')}}/">{{Lang::get('assets.index')}}</a></li>
                        <li class="active">{{Lang::get('travels.breadcamp')}}</li>
                    </ol>
                    <div class="clearfix"></div>
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
                                    <a href="{{Url('/')}}/travels/{{$travel->id}}-{{$travel['slug_'.Session::get('local')]}}" title="{{$travel['name_'.Session::get('local')]}}">{{str_limit($travel['name_'.Session::get('local')],10)}}</a>
                                    <span>{{round($travel['price'])}} جنيه</span>
                                </h3>
                                <p>{{str_limit($travel['desc_'.Session::get('local')],50)}}</p>
                                <a href="{{Url('/')}}/travels/{{$travel->id}}-{{$travel['slug_'.Session::get('local')]}}" class="view-more">عرض التفاصيل</a>
                            </div>
                        </div>
                    </div><!-- end of offer -->
                    @endforeach
                </div>
                {!!$travels->render()!!}
            </div>
        </section>
	@endsection
@stop