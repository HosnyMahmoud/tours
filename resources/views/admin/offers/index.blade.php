@extends('admin.layout')
@section('title')
	{{ 'العروض' }}	
@endsection

@section('content')
		
	<div>
		<a href="{!! Url('/') !!}/admin/offers/create" class="btn btn-success btn-icon-only"><i class="fa fa-plus"></i></a>
		<br />
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
				<th>عدد الليالي</th>
				<th>نوع العرض</th>
				<th>خيارات</th>
			</tr>
			@foreach($offers as $offer)
			
			<tr>
				<td>{{$offer->id}}</td>
				<td>{{$offer->nights}}</td>
				<td>{{$offer->type}}</td>
				<td>
					
					{!! Form::open(['method'=>'DELETE', 'action'=>['OffersCtrl@destroy', $offer->id ]]) !!}
							<a href="{!! Url('/') !!}/admin/offers/{{ $offer->id }}/edit" class="btn btn-info">تعديل</a>
							{!! Form::submit('حذف', [ 'class'=> 'btn btn-danger', 'onClick'=>'return confirm("سيتم حذف هذا العرض هل انت متأكد من الحذف ؟")'] ) !!}
					{!! Form::close() !!}

				</td>
			</tr>
			
			@endforeach				
		</table>

		<div class="paginate">{{ $offers->render() }}</div>

@endsection
@stop
