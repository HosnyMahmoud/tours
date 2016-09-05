@extends('admin.layout')
@section('title','حجوزات العروض الخاصة')

@section('content')
<div class="panel panel-info">
	<div class="panel-heading text-center">حجوزات العروض الخاصة</div>
	<div class="panel-body">
		<table class="table table-bordered table-responsive table-hover table-condensed">
			<tr>
				<th>#ID</th>
				<th>اسم المستخدم</th>
				<th>اسم العرض</th>
			</tr>
			@if($allSpecialOffersReserv->total() > 0)
				@foreach ($allSpecialOffersReserv as $specialOfferReserv)
					<tr>
						<td>{{ $specialOfferReserv->id }}</td>
						<td>
							<a href="{!! Url('/') !!}/admin/users/{{ $specialOfferReserv->user_id }}" class='btn btn-info' title="عرض تفاصيل المستخدم">
								{{ $users->find($specialOfferReserv->user_id)['name'] }}
							</a>
						</td>
						<td>
						<a href="{!!Url('/')!!}/admin/special-offers/{{$specialOfferReserv->special_offer_id}}" class='btn btn-info' title="تفاصيل العرض الخاص">
							{{ $specialOffers->find($specialOfferReserv->id)['name_ar'] }}
							</a>
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