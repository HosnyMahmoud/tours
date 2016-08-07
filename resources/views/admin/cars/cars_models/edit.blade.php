@extends('admin.layout')
@section('title')
		تعديل الموديل
@endsection

@section('content')

	{!! Form::model($model ,['method'=>'PATCH','action'=>['CarsModelsCtrl@update',$model->id],'files'=>true])!!}
		@include('admin.cars.cars_models._form',['btnName'=>'حفظ'])
	{!!  Form::close() !!}

@endsection
@stop