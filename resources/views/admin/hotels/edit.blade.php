@extends('admin.layout')
@section('tilte' ,'تعديل الفندق')

@section('content')

	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="text-center panel-heading">تعديل فندق : {{ $hotel->name_ar }}</div>
			<div class="panel-body col-md-10">
				{!! Form::model($hotel,[ 'action'=>['HotelsController@update', $hotel->id],'method' => 'PUT', 'class' => 'form-horizontal', 'files'=>true]) !!}
				@include('admin.hotels._form',['btnName' => 'حفظ التعديلات', 'type'=> 'edit'])
				{!! Form::close() !!}
			</div>
		</div>
	</div>

@endsection
@stop