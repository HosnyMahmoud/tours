@extends('admin.layout')
@section('tilte')
	{{'تعديل الفندق'}}
@endsection

@section('content')
		
	{!! Form::model($hotel,[ 'action'=>['HotelsController@update', $hotel->id],'method' => 'PUT', 'class' => 'form-horizontal', 'files'=>true]) !!}
		@include('admin.hotels._form',['btnName' => 'حفظ التعديلات', 'type'=> 'edit'])

	{!! Form::close() !!}		

@endsection
@stop