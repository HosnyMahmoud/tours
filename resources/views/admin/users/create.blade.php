@extends('admin.layout')
@section('title')
	اضافة عضو جديد
@endsection

@section('content')
	
	{!! Form::open(['action'=>'UsersCtrl@store','class'=>'form-horizontal']) !!}
		@include('admin.users._form',['btnName'=>'إضافه'])
	{!! Form::close() !!}
	
@endsection
@stop