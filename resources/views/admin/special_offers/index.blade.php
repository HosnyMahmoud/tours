<?php use Carbon\Carbon ?>
@extends('admin.layout')
@section('title','العروض الخاصة')
	
@section('content')
		
	<div>
		<a href="{!! Url('/') !!}/admin/special-offers/create" class="btn btn-success btn-icon-only"><i class="fa fa-plus"></i></a>
		<br />
		<br />
		
		{!! Form::open(['method'=>'GET','id'=>'sortForm']) !!} 
			<div class="pull-rigth">
				{!!Form::select('sort',['العروض المنتهية','العروض السارية','العروض الغير مفعلة'],@$bag->sort,['class'=>'form-control','id'=>'sort'])!!}
			</div>
		{!! Form::close() !!}
		<br />
		@if(Session::has('msg'))
			<div class="alert alert-success">
				{{ Session::get('msg') }}
			</div>
		@endif
		
	</div>
		<table class="table table-bordered">
			<tr>
				<th>#</th>
				<th>الأسم العربي</th>
				<th>الأسم الأنجلزي</th>
				<th>السعر</th>
				<th>بداية من</th>
				<th>وتنتهي في</th>
				<th>خيارات</th>
			</tr>
			@foreach($offers as $offer)
			
			<tr @if(Carbon::now() >= $offer->date_to){!!'style="background-color:#652424;font-weight: ld;color:#FFFFFF;"' !!}@endif >
				<td>{{$offer->id}}</td>
				<td>{{$offer->name_ar}}</td>
				<td>{{$offer->name_en}}</td>
				<td>{{$offer->price}}</td>
				<td>{{$offer->date_from}}</td>
				<td>{{$offer->date_to}}</td>
				<td>
					
					{!! Form::open(['method'=>'DELETE', 'action'=>['SpecialOffersCtrl@destroy', $offer->id ]]) !!}
							<a href="{!! Url('/') !!}/admin/special-offers/{{ $offer->id }}/edit" class="btn btn-info">تعديل</a>
							{!! Form::submit('حذف', [ 'class'=> 'btn btn-danger', 'onClick'=>'return confirm("سيتم حذف هذا العرض هل انت متأكد من الحذف ؟")'] ) !!}
							@if($offer->status == 0 && Carbon::now() <= $offer->date_to)
								<a href="{!! Url('/') !!}/admin/special-offers/{{ $offer->id }}/activate" class="btn btn-success">تفعيل بدء الحجز</a>
							@endif
							@if($offer->status == 1 && Carbon::now() <= $offer->date_to)
								<a href="{!! Url('/') !!}/admin/special-offers/{{ $offer->id }}/activate" class="btn btn-info">ايقاف الحجز</a>
							@endif
					{!! Form::close() !!}

				</td>
			</tr>
			
			@endforeach				
		</table>

		<div class="paginate">{!! $offers->render() !!}</div>
		
<script src="http://code.jquery.com/jquery.js"></script>
<script>
        $('#sort').on('change',function() {
            $('#sortForm').submit();
        })
</script>

@endsection
@stop
