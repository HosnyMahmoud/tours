 @extends('front.dashboard.layout')
 	@section('breadcrumbs')
 		<i class="{{Lang::get('dashboard.arrow')}}"></i>
 		{{Lang::get('dashboard.reservations')}}
 	@endsection

 	@section('title',Lang::get('dashboard.reservations'))
    @section('dashboard')
    @if(Session::has('error'))
		<div class="alert alert-danger booking-status" role="alert">
	        <i class="fa fa-times-circle-o" aria-hidden="true"></i>
	        	{{Session::get('error')}}
	    </div>  
    @endif

  	@if(Session::has('status'))
  		@if(Session::get('status') == 0)
		    <div class="alert alert-warning booking-status" role="alert">
			    <i class="fa fa-frown-o" aria-hidden="true"></i>
			    {{lang::get('dashboard.reserv_notConfirmed')}}
			</div>  
		@elseif(Session::get('status') == 1)
			<div class="alert alert-success booking-status" role="alert">
			    <i class="fa fa-check-circle-o" aria-hidden="true"></i>
			    {{lang::get('dashboard.reserv_success')}}
			</div>
		@else
			<div class="alert alert-danger booking-status" role="alert">
			    <i class="fa fa-check-circle-o" aria-hidden="true"></i>
			    {{lang::get('dashboard.reserv_canceled')}}
			</div>
		@endif
	@endif


    	<div class="status-request">
           	{!!Form::open()!!}
                <input type="text" name="reserv_code" class="form-control input-lg" dir="{{Lang::get('dashboard.dir')}}" placeholder="{{Lang::get('dashboard.insert_code')}}">
                <button type="submit" class="btn btn-lg btn-success btn-block">{{Lang::get('dashboard.check_code')}}</button>
           	{!!Form::close()!!}
        </div>
    @endsection
@stop