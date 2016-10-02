<?php
	if((Session::get('local')) == '')
		{
			Session::set('local','ar');
			App::setlocale(Session::get('local'));
			
			//Carbon::setLocale(Session::get('local'));
		}else{
			App::setlocale(Session::get('local'));	
			//Carbon::setLocale(Session::get('local'));
			//Carbon::setLocale(Session::get('local'));
		}
?>
@extends('front.layout')
	@section('title',404)
	@section('content')
		<section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="page-not-found">
                            <h1>404</h1>
                            <p>{{Lang::get('assets.message')}}</p>
                            <a href="#" class="btn btn-info">{{Lang::get('assets.backHome')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
	@endsection
@stop