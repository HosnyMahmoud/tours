@extends('admin.layout')
@section('title' , 'اضافة فندق جديد')
	
@section('content')

	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="text-center panel-heading">أضافة فندق جديد</div>	
			<div class="panel-body col-md-10">
				{!! Form::open(['method' => 'POST', 'action'=>'HotelsController@store' , 'class' => 'form-horizontal','files'=>true]) !!}
					@include('admin.hotels._form' ,[ 'btnName'=>'أضافة','type'=>'add'])
				{!! Form::close() !!}
			</div>	
		</div>
	</div>

@endsection
@stop
