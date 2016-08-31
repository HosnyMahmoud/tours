@extends('admin.layout', 'الأعضاء')

@section('content')

	<div>
		<a href="{!!Url('/')!!}/admin/users/create" class="btn btn-success btn-icon-only"><i class="fa fa-plus"></i></a>
		
	</div>

	<br>
	@if(Session::has('msg'))
		<div class="alert alert-success">
			{{Session::get('msg')}}
		</div>
	@endif

	<br>
	<div class="panel panel-primary">
		<div class="panel-heading text-center">جميع المستخدمين</div>
		<div class="panel-body">
			@if($users->total() > 0)
				<table class="table table-bordered">
					<tr>
						<th>الأسم</th>								
						<th>البريد الأليكتروني</th>								
						<th>رقم الموبايل</th>								
						<th>خيارات</th>								
					</tr>
				@foreach($users as $user)
					<tr>
						<td>{{ $user->name }}</td>		
						<td>{{ $user->email }}</td>		
						<td>{{ $user->mobile }}</td>		
						<td>					
							{!! Form::open(['method' => 'DELETE' ,'action'=>['UsersCtrl@destroy',$user->id]]) !!}
								<a href="{!!Url('/')!!}/admin/users/{{$user->id}}/edit" class="btn btn-info">تعديل</a>
									{!! Form::submit('حذف' , ['class'=>'btn btn-danger','onClick' =>'return confirm("سيتم حذف هذا العضو هل انت متأكد من الحذف ؟")']) !!}
							{!! Form::close() !!}
						</td>								
					</tr>
				@endforeach
				</table>
				{!!$users->render()!!}
			@else
				<div class="alert alert-info">لا توجد بيانات لعرضها.</div> 

			@endif
		</div>	
	</div>

@stop