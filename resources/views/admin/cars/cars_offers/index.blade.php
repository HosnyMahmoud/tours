@extends('admin.layout')
@section('title', 'عروض السيارات')
	
@section('content')
	<div>
		<a href="{!! Url('/') !!}/admin/carsOffers/create" class="btn btn-success btn-icon-only"><i class="fa fa-plus"></i></a>
		<br />
		<br />
		@if(Session::has('msg'))
			<div class="alert alert-success">
				{{ Session::get('msg') }}
			</div>
		@endif
	</div>
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="text-center panel-heading">عروض السيارات </div>	
			<div class="panel-body">
	
			<table class="table table-bordered table-responsive">
			<tr> 
				<th>#ID</th>
				<th>الاسم باللغة باللغة العربية</th>
				<th>الاسم باللغة باللغة الأنجليزية</th>
				<th>الدولة </th>
				<th>المدينة </th>
				<th>البراند </th>
				<th>الموديل </th>
				<th>السعر</th>
				<th>تعديل</th>
				<th>حذف</th>
			</tr>
			@foreach($carsOffers as $carsOffer)
			
			<tr>
				<td>{{$carsOffer->id}}</td>
				<td>{{$carsOffer->offer_name_ar}}</td>
				<td>{{$carsOffer->offer_name_en}}</td>
				<td>{{$countries->find($carsOffer->country_id)['name_ar']}}</td>
				<td>{{$cities->find($carsOffer->city_id)['name_ar']}}</td>
				<td>{{$cars_brand->find($carsOffer->brand_id)['brand_name']}}</td>
				<td>{{$cars_models->find($carsOffer->model_id)['model_name']}}</td>
				<td>{{$carsOffer->price}}</td>
				<td>
					<a href="{!! Url('/') !!}/admin/hotels/{{ $carsOffer->id }}/edit" class="btn btn-info">تعديل</a>
				</td>
				<td>	
					{!! Form::open(['method'=>'DELETE', 'action'=>['HotelsController@destroy', $carsOffer->id ]]) !!}
						{!! Form::submit('حذف', [ 'class'=> 'btn btn-danger', 'onClick'=>'return confirm("سيتم حذف هذا الفندق هل انت متأكد من الحذف ؟")'] ) !!}
					{!! Form::close() !!}
				</td>
			</tr>
			
			@endforeach				
		</table>
	
			</div>	
		</div>
	</div>
		

		<div class="paginate">{{ $carsOffers->render() }}</div>

@endsection
@stop
