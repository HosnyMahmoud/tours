@extends('admin.layout')
@section('title')
	{{ 'اضافة عرض جديد' }}
@endsection


@section('content')

	{!! Form::open(['method' => 'POST', 'action'=>'OffersCtrl@store' , 'class' => 'form-horizontal','files'=>true]) !!}
			
			@include('admin.offers._form' ,[ 'btnName'=>'أضافة'])
		
	{!! Form::close() !!}

@endsection
@stop