@extends('admin.layout')
@section('title')
		تعديل النوع
@endsection

@section('content')

	{!! Form::model($brand ,['method'=>'PATCH','action'=>['CarsBrandCtrl@update',$brand->id],'files'=>true])!!}
		@include('admin.cars.cars_brand._form',['btnName'=>'حفظ'])
	{!!  Form::close() !!}

@endsection
@stop