@extends('admin.layout')
@section('title', 'عن الشركة')

@section('content')
<div>
	<a href="{!! Url('/') !!}/admin/about/create" class="btn btn-success btn-icon-only"><i class="fa fa-plus"></i></a>
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
		<table class="table table-bordered table-responsive">
			<tr>
				<th>#ID</th>
				<th>الاسم باللغة باللغة العربية</th>
				<th>الاسم باللغة باللغة الأنجليزية</th>
			</tr>
			@foreach($rows as $row)
			
			<tr>
				<td>{{$row->id}}</td>
				<td>
					<a href="{!! Url('/') !!}/admin/about/{{ $row->id }}/edit" class="btn btn-info">تعديل</a>
				</td>
				<td>
					{!! Form::open(['method'=>'DELETE', 'action'=>['ContactUsCtrl@destroy', $row->id ]]) !!}
					{!! Form::submit('حذف', [ 'class'=> 'btn btn-danger', 'onClick'=>'return confirm("سيتم الحذف هل انت متأكد من الحذف ؟")'] ) !!}
					{!! Form::close() !!}
				</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>

<div class="paginate">{!! $rows->render() !!}</div>
@endsection
@stop