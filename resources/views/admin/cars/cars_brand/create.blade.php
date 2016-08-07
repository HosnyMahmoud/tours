@extends('admin.layout')
@section('title')
	اضافة نوع جديد
@stop

@section('content')
	
	{!! Form::open(['action'=>'CarsBrandCtrl@store','class'=>'form-horizontal']) !!}
		@include('admin.cars.cars_brand._form',['btnName'=>'إضافه'])
	{!! Form::close() !!}
	
@endsection
@stop