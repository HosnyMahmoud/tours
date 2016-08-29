@extends('admin.layout')
@section('tilte' ,'تعديل الرحلة')

@section('content')
	<!-- Start Check For Errors  -->
	@if(count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<!-- Start Check For Errors  -->

	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="text-center panel-heading">تعديل الرحلة: {{ $travel->name_ar }}</div>
			<div class="panel-body col-md-10">
				{!! Form::model($travel,[ 'action'=>['TravelsCtrl@update', $travel->id],'method' => 'PUT', 'class' => 'form-horizontal', 'files'=>true]) !!}
				@include('admin.travels._form',['btnName' => 'حفظ التعديلات', 'type'=> 'edit'])
				{!! Form::close() !!}
			</div>
		</div>
	</div>

@endsection
@stop