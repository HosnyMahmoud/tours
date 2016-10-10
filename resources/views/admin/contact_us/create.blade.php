@extends('admin.layout')
@section('title' , 'عن الشركة')
	
@section('content')
	
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="text-center panel-heading">أضافة</div>	
			<div class="panel-body col-md-10">
				{!! Form::open(['method' => 'POST', 'action'=>'ContactUsCtrl@store','class' => 'form-horizontal','files'=>true]) !!}
					@include('admin.contact_us._form' ,[ 'btnName'=>'أضافة','type'=>'add'])
					
				{!! Form::close() !!}
			</div>	
		</div>
	</div>

@endsection
@stop
