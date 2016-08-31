@extends('admin.layout')
@section('title','حجوزات السيارات')
@section('content')

<div class="panel panel-info">
	<div class="panel-heading text-center">حجوزات السيارات</div>
	<div class="panel-body">
		{{--<table class="table table-bordered table-responsive table-hover table-condensed">
		
			<tr>
				<th>اسم المستخدم</th>
				<th>اسم المنطقة</th>
				<th>اسم الموديل</th>
				<th>من</th>
				<th>الي</th>
				<th>العرض</th>
				<th>السعر</th>
			</tr>
			
			@if(count($allCarsReserv) > 0)
				@foreach ($allCarsReserv as $carsReserv)
					<tr>
						<td><a href="">{{ $users->find($carsReserv->user_id)['name'] }}</a></td>
						<td>{{ $citis->find($carsReserv->city_id)['name_ar'] }}</td>
						<td>{{ $carsModels->find($carsReserv->model_id)['model_name'] }}</td>
						<td>{{ $carsReserv->date_from }}</td>
						<td>{{ $carsReserv->date_to }}</td>
						<td>{{ $carsOffers->find($carsReserv->offer_id)['offer_name_ar'] }}</td>
						<td>{{ $carsOffers->find($carsReserv->offer_id)['price'] }}</td>
					</tr>
				@endforeach
				@else
					<div class="alert alert-info">عفوآ , لا توجد بيانات .</div>
			@endif
			
		</table>--}} 
	</div>
</div>
@endsection
@stop