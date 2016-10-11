@extends('front.layout')
	@section('title',Lang::get('assets.contact'))
	@section('content')
		<section class="content">
            <div class="container">
                <div class="page-ttl">
                    <h1>{{Lang::get('assets.contact')}}</h1>
                    <ol class="breadcrumb">
                        <li><a href="#">{{Lang::get('assets.index')}}</a></li>
                        <li class="active">{{Lang::get('assets.contact')}}</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
                <div class="contact-wrap">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="contact-form">
                                {!!Form::open()!!}
                                @if(Session::has('msg'))
                                    <div class="alert alert-success">{{Session::get('msg')}}</div>
                                @endif
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>{{Lang::get('contact.name')}}</label>
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>{{Lang::get('contact.email')}}</label>
                                            <input type="email" name="email" class="form-control">
                                        </div>
                                        <div class="col-sm-12">
                                            <label>{{Lang::get('contact.subject')}}</label>
                                            <input type="text" name="subject" class="form-control">
                                        </div>
                                        <div class="col-sm-12">
                                            <label>{{Lang::get('contact.msg')}}</label>
                                            <textarea name="msg" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info">{{Lang::get('contact.send')}} <i class="{{Lang::get('contact.arrow')}}" aria-hidden="true"></i></button>
                                {!!Form::close()!!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="contact-method">
                                <div class="icon"><i class="glyphicon glyphicon-headphones" aria-hidden="true"></i></div>
                                <h2>{{$phone[0]}}</h2>
                            </div>
                            
                            <div class="contact-method">
                                <div class="icon"><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i></div>
                                <h2>{{$settings->email}}</h2>
                            </div>
                            
                            <div class="contact-method">
                                <div class="icon"><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i></div>
                                <h2>{{$settings['address_'.Session::get('local')]}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
	@endsection
@stop