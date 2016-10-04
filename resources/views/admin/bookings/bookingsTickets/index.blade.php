@extends('admin.layout')
@section('title','حجوزات تذاكر الطيران')
@section('content')
<div class="panel panel-info">
	<div class="panel-heading text-center">حجوزات تذاكر الطيران</div>
	<div class="panel-body">
		<table class="table table-bordered table-responsive table-hover table-condensed">
			<tr>
				<th>#ID</th>
				<th>اسم المستخدم</th>
				<th>الأقلاع من </th>
				<th>الهبوط في </th>
				<th>عدد الأفراد</th>
				<th>عدد الأطفال</th>
				<th>النوع</th>
				<th>تاريخ السفر </th>
				<th>تاريخ العودة</th>
				<th>خيارات</th>
			</tr>
			@if($allTicketsReserv->count() > 0)
			@foreach ($allTicketsReserv as $ticketsReserv)
			<tr>
				<td>{{ $ticketsReserv->id }}</td>
				<td>
					<a href="{!! Url('/') !!}/admin/users/{{ $ticketsReserv->user_id }}" class='btn btn-info' title="عرض تفاصيل المستخدم">
						{{ $users->find($ticketsReserv->user_id)['name'] }}
					</a>
				</td>
				<td>
					<a href="{!! Url('/') !!}/admin/air_ports/{{ $ticketsReserv->airport_from }}" class='btn btn-info' title="عرض تفاصيل المطار">
						{{ $airPorts->find($ticketsReserv->airport_from)['name_ar'] }}
					</a>
				</td>
				<td>
					<a href="{!! Url('/') !!}/admin/air_ports/{{ $ticketsReserv->airport_to }}" class='btn btn-info' title="عرض تفاصيل المطار">
						{{ $airPorts->find($ticketsReserv->airport_to)['name_ar'] }}
					</a>
				</td>
				<td>{{ $ticketsReserv->num_persons }}</td>
				<td>{{ $ticketsReserv->num_child }}</td>
				<td> @if($ticketsReserv->type == 0) {{ 'ذهاب فقط' }}@else{{ 'ذهاب وعودة' }} @endif</td>
				<td>{{ $ticketsReserv->date_from }}</td>
				<td class="text-center">@if($ticketsReserv->type == 0) {{ '_' }}@else{{ $ticketsReserv->date_to }} @endif</td>
				<td>
					@if($ticketsReserv->status !== 2)
					<a href="{{Url('/')}}/admin/bookings/Airline_tickets_reserv/{{$ticketsReserv->id}}" class="btn btn-{{($ticketsReserv->status == 0)?'success':'danger'}}">
						{{($ticketsReserv->status == 0)?'تأكيد الحجز':'إلغاء الحجز'}}
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