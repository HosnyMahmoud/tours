@extends('admin.layout')
@section('title')
		تعديل المحافظات
@endsection

@section('content')

	{!! Form::model($city ,['method'=>'PATCH','action'=>['CitiesCtrl@update',$city->id],'files'=>true])!!}
		@include('admin.countries.cities._form',['btnName'=>'حفظ'])
	{!!  Form::close() !!}

@endsection
@stop