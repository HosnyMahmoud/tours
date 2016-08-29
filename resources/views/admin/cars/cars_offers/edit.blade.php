@extends('admin.layout')
@section('title' , 'تعديل العرض')

@section('content')
	
		<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="text-center panel-heading">تعديل عرض : {{ $offerCar->name_offer_ar }}</div>
			<div class="panel-body col-md-10">
				{!! Form::model($offerCar,[ 'action'=>['CarsOffersCtrl@update', $offerCar->id],'method' => 'PUT', 'class' => 'form-horizontal', 'files'=>true]) !!}
				@include('admin.cars.cars_offers._form',['btnName' => 'حفظ التعديلات', 'type'=> 'edit'])
				{!! Form::close() !!}
			</div>
		</div>
	</div>

@endsection

@stop