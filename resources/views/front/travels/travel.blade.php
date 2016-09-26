@extends('front.layout')
	@section('title',$travel['name_'.Session::get('local')])
	@section('content')
		<section class="content">
            <div class="container">
                <div class="page-ttl">
                    <h1>{{$travel['name_'.Session::get('local')]}}</h1>
                    <ol class="breadcrumb">
                        <li><a href="{{Url('/')}}/">{{Lang::get('assets.index')}}</a></li>
                        <li><a href="{{Url('/')}}/travels">{{Lang::get('travels.all_travels')}}</a></li>
                        <li class="active">{{$travel['name_'.Session::get('local')]}}</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
                
                <div class="row">
                    <div class="col-sm-8 item-slides">
                        <!-- masterslider -->
                        <div class="master-slider ms-skin-metro" id="of-item">
                            <div class="ms-slide">
                                <img src="{{Url('/')}}/front/masterslider/blank.gif" data-src="{{Url('/')}}/front/images/hotel-img-1-lg.jpg" alt="lorem ipsum dolor sit"/>     
                                <div class="ms-thumb">
                                    <img src="{{Url('/')}}/front/images/hotel-img-1-lg.jpg" />
                                </div>
                            </div>
                            <div class="ms-slide">
                                <img src="{{Url('/')}}/front/masterslider/blank.gif" data-src="{{Url('/')}}/front/images/hotel-img-1-lg.jpg" alt="lorem ipsum dolor sit"/>     
                                <div class="ms-thumb">
                                    <img src="{{Url('/')}}/front/images/hotel-img-1-lg.jpg" />
                                </div>
                            </div>
                        </div>
                        <!-- end of masterslider -->
                    </div>
                    
                    <div class="col-sm-4">
                        <div class="hotel-booking">
                            <h4>سعر الرحله</h4>
                            <div class="hotel-price">
                                <span>750LE</span>
                            </div>
                            <a href="#" class="btn btn-block btn-lg btn-success">احجز الآن</a>
                        </div>
                        
                        <div class="hotel-info">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#overview" aria-controls="overview" role="tab" data-toggle="tab"><i class="fa fa-file-text-o" aria-hidden="true"></i> عن الفندق</a></li>
                            </ul>
                            
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="overview">
                                    <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام "هنا يوجد محتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء.</p>
                                    <p>هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص.</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </section>

	@endsection
@stop