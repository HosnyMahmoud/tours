@extends('admin.layout')
@section('title','حجوزات الفنادق')

@section('content')
<div class="panel panel-info">
	<div class="panel-heading text-center">حجوزات الرحلات</div>
	<div class="panel-body">
		<table class="table table-bordered table-responsive table-hover table-condensed">
			<tr>
				<th>#ID</th>
				<th>اسم المستخدم</th>
				<th>اسم الرحلة</th>
				<th>خيارات</th>
			</tr>
			@if(count($AllTravelsReserv) > 0)
				@foreach ($AllTravelsReserv as $travelReserv)
					<tr>
						<td>{{ $travelReserv->id }}</td>
						<td>
							<a href="{!! Url('/') !!}/admin/users/{{ $travelReserv->user_id }}" class='btn btn-info' title="عرض تفاصيل المستخدم">
								{{ $users->find($travelReserv->user_id)['name'] }}
							</a>
						</td>
						<td>
							<a href="{!! Url('/') !!}/admin/travels/{{ $travelReserv->travel_id }}" class='btn btn-info' title="عرض تفاصيل الرحلة">
							{{ $travels->find($travelReserv->travel_id)['name_ar'] }}
							</a>
						</td>
						<td>
							@if($travelReserv->status !== 2)
							<a href="{{Url('/')}}/admin/bookings/ReservTravel/{{$travelReserv->id}}" class="btn btn-{{($travelReserv->status == 0)?'success':'danger'}}">
								{{($travelReserv->status == 0)?'تأكيد الحجز':'إلغاء الحجز'}}
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