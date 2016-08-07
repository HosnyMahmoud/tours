@extends('admin.layout')
@section('title')
	{{ 'الفنادق' }}	
@endsection

@section('content')
		
	<div>
		<a href="{!! Url('/') !!}/admin/hotels/create" class="btn btn-success btn-icon-only"><i class="fa fa-plus"></i></a>
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
				<th>#ID</th>
				<th>الاسم باللغة باللغة العربية</th>
				<th>الاسم باللغة باللغة الأنجليزية</th>
				<th>الوصف باللغة العربية</th>
				<th>الوصف باللغة الأنجليية</th>
				<th>النجوم</th>
				<th>السعر</th>
				<th>خيارات</th>
			</tr>
			@foreach($hotels as $hotel)
			
			<tr>
				<td>{{$hotel->id}}</td>
				<td>{{$hotel->name_ar}}</td>
				<td>{{$hotel->name_en}}</td>
				<td>{{$hotel->desc_ar}}</td>
				<td>{{$hotel->desc_en}}</td>
				<td>{{$hotel->stars}}</td>
				<td>{{$hotel->price}}</td>
				<td>
					
					{!! Form::open(['method'=>'DELETE', 'action'=>['HotelsController@destroy', $hotel->id ]]) !!}
							<a href="{!! Url('/') !!}/admin/hotels/{{ $hotel->id }}/edit" class="btn btn-info">تعديل</a>
							{!! Form::submit('حذف', [ 'class'=> 'btn btn-danger', 'onClick'=>'return confirm("سيتم حذف هذا الفندق هل انت متأكد من الحذف ؟")'] ) !!}
					{!! Form::close() !!}

				</td>
			</tr>
			
			@endforeach				
		</table>

		<div class="paginate">{{ $hotels->render() }}</div>

@endsection
@stop
