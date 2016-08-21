@extends('admin.layout')
@section('title')
		المديرين 
@endsection
	@section('content')
	<a href="{!!Url('/')!!}/admin/admins/create" class="btn btn-success"><i class="fa fa-plus"></i></a>
	<br>
		<table class="table table-responsive table-striped">
			<thead>
				<th>#</th>
				<th>الاسم</th>
				<th>البريد الالكترونى</th>
				<th colspan="2">خيارات</th>
			</thead>
			<tbody>
				@foreach($admins as $admin)
				<tr>
					<td>{{ $admin->id }}</td>
					<td>{{ $admin->name }}</td>
					<td>{{ $admin->email }}</td>
					<td>
						 <a href="{{ Url('/') }}/admin/admins/{{ $admin->id }}/edit" class="btn btn-warning">تعديل</a> 
					</td>
					<td>

						{!! Form::open(['method'=>'DELETE' , 'action' => ['AdminsCtrl@destroy' , $admin->id] ]) !!}
						@if(Auth::admin()->get()->id == $admin->id)
							{!! Form::submit('حذف', ['class'=>'btn btn-danger disabled'] ) !!}
							@else
							{!! Form::submit('حذف', ['class'=>'btn btn-danger','onClick' =>'return confirm("سيتم حذف كل بيانات هذا العضو هل انت متأكد من الحذف ؟")'] ) !!}
						@endif
						{!! Form::close() !!}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	@endsection
@stop