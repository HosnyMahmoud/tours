@extends('admin.layout')
@section('title', 'الفنادق')
	
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
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="text-center panel-heading">الفنادق</div>	
			<div class="panel-body">
	
			<table class="table table-bordered table-responsive">
			<tr> 
				<th>#ID</th>
				<th>الاسم العربي</th>
				<th>الاسم الأجليزي</th>
				<th>النجوم</th>
				<th>السعر</th>
				<th>تعديل</th>
				<th>حذف</th>
			</tr>
			@foreach($hotels as $hotel)
			
			<tr>
				<td>{{$hotel->id}}</td>
				<td>{{$hotel->name_ar}}</td>
				<td>{{$hotel->name_en}}</td>
				<td>{{$hotel->stars}}</td>
				<td>{{$hotel->price}}</td>
				<td>
					<a href="{!! Url('/') !!}/admin/hotels/{{ $hotel->id }}/edit" class="btn btn-info">تعديل</a>
				</td>
				<td>	
					{!! Form::open(['method'=>'DELETE', 'action'=>['HotelsController@destroy', $hotel->id ]]) !!}
						{!! Form::submit('حذف', [ 'class'=> 'btn btn-danger', 'onClick'=>'return confirm("سيتم حذف هذا الفندق هل انت متأكد من الحذف ؟")'] ) !!}
					{!! Form::close() !!}
				</td>
			</tr>
			
			@endforeach				
		</table>
	
			</div>	
		</div>
	</div>
		

		<div class="paginate">{!! $hotels->render() !!}</div>

@endsection
@stop
