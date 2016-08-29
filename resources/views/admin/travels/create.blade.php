@extends('admin.layout')
@section('title' , 'اضافة رحلة جديدة')
	
@section('content')
	
	@if(count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="text-center panel-heading">أضافة رحلة جديدة</div>	
			<div class="panel-body col-md-10">
				{!! Form::open(['method' => 'POST', 'action'=>'TravelsCtrl@store' , 'class' => 'form-horizontal','files'=>true]) !!}
					@include('admin.travels._form' ,[ 'btnName'=>'أضافة','type'=>'add'])
				{!! Form::close() !!}
			</div>	
		</div>
	</div>

@endsection
@stop
