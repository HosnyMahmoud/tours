@extends('admin.layout')
@section('title')
	اضافة محافظة جديدة
@stop

@section('content')
	
	{!! Form::open(['action'=>'CitiesCtrl@store','class'=>'form-horizontal']) !!}
		@include('admin.countries.cities._form',['btnName'=>'إضافه'])
	{!! Form::close() !!}
	
@endsection
@stop