@extends('admin.layout')
@section('title' , 'تعديل المطار')

@section('content')

	{!! Form::model($airPort ,['method'=>'PATCH','action'=>['AirPortsCtrl@update',$airPort->id],'files'=>true])!!}
		@include('admin.air_ports._form',['btnName'=>'حفظ'])
	{!!  Form::close() !!}

@endsection
@stop