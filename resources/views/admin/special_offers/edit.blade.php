@extends('admin.layout')
@section('content')
	
<div class="col-md-12">
	<div class="panel panel-primary">
		<div class="text-center panel-heading">تعديل عرض : {{ $offer->name_ar }}</div>
		<div class="panel-body col-md-10">
			{!! Form::model($offer, ['action' => ['SpecialOffersCtrl@update', $offer->id], 'method' => 'PUT', 'class' => 'form-horizontal','files'=>true]) !!}
				@include('admin.special_offers._form',['btnName'=>'حفظ التعديلات' , 'type'=>'edit']) 
			{!! Form::close() !!}
		</div>
	</div>
</div>

@endsection
@stop