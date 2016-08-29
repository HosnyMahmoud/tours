@extends('admin.layout')
@section('title', 'الرحلات')

@section('content')
<div>
	<a href="{!! Url('/') !!}/admin/travels/create" class="btn btn-success btn-icon-only"><i class="fa fa-plus"></i></a>
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
		<div class="text-center panel-heading">الرحلات</div>
		<div class="panel-body">
			
			<table class="table table-bordered table-responsive">
				<tr>
					<th>#ID</th>
					<th>الاسم العربية</th>
					<th>الاسم الأنجليزي</th>
					<th>الدولة </th>
					<th>المدينة </th>
					<th>الفندق </th>
					<th>السعر</th>
					<th>تعديل</th>
					<th>حذف</th>
				</tr>
				@foreach($travels as $travel)
				
				<tr>
					<td>{{$travel->id}}</td>
					<td>{{$travel->name_ar}}</td>
					<td>{{$travel->name_en}}</td>
					<td>{{$countries->find($travel->country_id)['name_ar']}}</td>
					<td>{{$cities->find($travel->city_id)['name_ar']}}</td>
					<td>{{$hotels->find($travel->hotel_id)['name_ar']}}</td>
					<td>{{$travel->price}}</td>
					<td>
						<a href="{!! Url('/') !!}/admin/travels/{{ $travel->id }}/edit" class="btn btn-info">تعديل</a>
					</td>
					<td>
						{!! Form::open(['method'=>'DELETE', 'action'=>['TravelsCtrl@destroy', $travel->id ]]) !!}
						{!! Form::submit('حذف', [ 'class'=> 'btn btn-danger', 'onClick'=>'return confirm(" هل انت متأكد من الحذف ؟")'] ) !!}
						{!! Form::close() !!}
					</td>
				</tr>
				
				@endforeach
			</table>
			
		</div>
	</div>
</div>

<div class="paginate">{!! $travels->render() !!}</div>
@endsection
@stop