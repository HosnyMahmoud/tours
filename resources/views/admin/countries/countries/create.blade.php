@extends('admin.layout')
@section('title')
	اضافة دولة جديدة
@stop

@section('content')
	
	{!! Form::open(['action'=>'CountriesCtrl@store','class'=>'form-horizontal']) !!}
		@include('admin.countries.countries._form',['btnName'=>'إضافه'])
	{!! Form::close() !!}
	
@endsection
@stop