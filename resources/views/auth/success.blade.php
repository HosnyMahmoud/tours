@extends('front.layout')
	@section('title',Lang::get('loginReg.titleLogin'))
	@section('content')
		<section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="alert alert-success text-center">
                            <h2>
                        		<i class="fa fa-check"></i>
                            	{{Lang::get('assets.success_title')}}
                            </h2>
                           	<p>
                           		{{Lang::get('assets.regSuccessMsg')}}<br>
                           		{{Session::get('email')}}<br>
                           		{!!Lang::get('assets.clickHereToHome')!!}
                           	</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
	@endsection
@stop