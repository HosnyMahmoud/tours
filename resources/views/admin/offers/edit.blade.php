@extends('admin.layout')
@section('content')


	{!! Form::model($offer, ['action' => ['OffersCtrl@update', $offer->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
	
		@include('admin.offers._form',['btnName'=>'حفظ التعديلات']) 
		
	{!! Form::close() !!}

	


@endsection
@stop