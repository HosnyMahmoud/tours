@extends('admin.layout')
@section('title')
		تعديل 
@endsection

@section('content')

	{!! Form::model($row ,['method'=>'PATCH','action'=>['ContactUsCtrl@update',$row->id],'files'=>true])!!}
		@include('admin.contact_us._form',['btnName'=>'حفظ'])
	{!!  Form::close() !!}

@endsection
@stop