@extends('admin.layout')
@section('title')
		تعديل الدولة
@endsection

@section('content')

	{!! Form::model($country ,['method'=>'PATCH','action'=>['CountriesCtrl@update',$country->id],'files'=>true])!!}
		@include('admin.countries.countries._form',['btnName'=>'حفظ'])
	{!!  Form::close() !!}

@endsection
@stop