@extends('admin.layout')
@section('title')
	{{ 'اضافة فندق جديد' }}
@endsection


@section('content')

	{!! Form::open(['method' => 'POST', 'action'=>'HotelsController@store' , 'class' => 'form-horizontal','files'=>true]) !!}
			
			@include('admin.hotels._form' ,[ 'btnName'=>'أضافة','type'=>'add'])
		
	{!! Form::close() !!}

@endsection
@stop