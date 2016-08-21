@extends('admin.layout')
@section('title')
	اضافة موديل جديد
@stop

@section('content')
	
	{!! Form::open(['action'=>'CarsModelsCtrl@store','class'=>'form-horizontal']) !!}
		@include('admin.cars.cars_models._form',['btnName'=>'إضافه'])
	{!! Form::close() !!}
	
@endsection
@stop