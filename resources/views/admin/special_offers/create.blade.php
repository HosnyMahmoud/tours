@extends('admin.layout')
@section('title' , 'اضافة عرض جديد')

@section('content')

	@if(count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<div class="col-md-12">
	<div class="panel panel-primary">
		<div class="text-center panel-heading">أضافة عرض خاص جديد</div>
		<div class="panel-body col-md-10">
			{!! Form::open(['method' => 'POST', 'action'=>'SpecialOffersCtrl@store' , 'class' => 'form-horizontal','files'=>true]) !!}
				@include('admin.special_offers._form' ,[ 'btnName'=>'أضافة'])
			{!! Form::close() !!}
		</div>
	</div>
</div>

@endsection
@stop