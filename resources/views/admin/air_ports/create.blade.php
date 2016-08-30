@extends('admin.layout')
@section('title' , 'أضافة مطار جديد')

@section('content')

	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="text-center panel-heading">أضافة مطار جديد</div>	
			<div class="col-md-10 panel-body">
				{!! Form::open(['action'=>'AirPortsCtrl@store','class'=>'form-horizontal']) !!}
					@include('admin.air_ports._form',['btnName'=>'إضافه'])
				{!! Form::close() !!}
			</div>	
		</div>
	</div>
	
@endsection
@stop