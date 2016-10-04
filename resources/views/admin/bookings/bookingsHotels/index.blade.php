@extends('admin.layout')
@section('title','حجوزات الفنادق')

@section('content')
<div class="panel panel-info">
	<div class="panel-heading text-center">حجوزات الفنادق</div>
	<div class="panel-body">
		<table class="table table-bordered table-responsive table-hover table-condensed">
			<tr>
				<th>#ID</th>
				<th>اسم المستخدم</th>
				<th>اسم الفندق</th>
				<th>عدد الأشخاص</th>
				<th>من</th>
				<th>الي</th>
				<th>خيارات</th>
			</tr>
			@if(count($AllHotelsReserv) > 0)
				@foreach ($AllHotelsReserv as $hotelReserv)
					<tr>
						<td>{{ $hotelReserv->id }}</td>
						<td>
							<a href="{!! Url('/') !!}/admin/users/{{ $hotelReserv->user_id }}" class='btn btn-info' title="عرض تفاصيل المستخدم">
								{{ $users->find($hotelReserv->user_id)['name'] }}
							</a>
						</td>
						<td>
							<a href="{!! Url('/') !!}/admin/hotels/{{ $hotelReserv->hotel_id }}" class='btn btn-info' title="عرض تفاصيل الفندق">
							{{ $hotels->find($hotelReserv->hotel_id)['name_ar'] }}
							</a>
						</td>
						<td>{{ $hotelReserv->persons }}</td>
						<td>{{ $hotelReserv->date_from }}</td>
						<td>{{ $hotelReserv->date_to }}</td>

						<td>
							@if($hotelReserv->status !== 2)
							<a href="{{Url('/')}}/admin/bookings/HotelsReservations/{{$hotelReserv->id}}" class="btn btn-{{($hotelReserv->status == 0)?'success':'danger'}}">
								{{($hotelReserv->status == 0)?'تأكيد الحجز':'إلغاء الحجز'}}
							</a>
							@endif
						</td>
					</tr>
				@endforeach
				@else
					<div class="alert alert-info">عفوآ , لا توجد بيانات .</div>
			@endif
			
		</table>
	</div>
</div>
@endsection
@stop