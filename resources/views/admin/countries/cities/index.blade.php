@extends('admin.layout')
@section('title')
		المحافظات
@endsection

@section('content')

	<div>
		<a href="{!!Url('/')!!}/admin/cities/create" class="btn btn-success btn-icon-only"><i class="fa fa-plus"></i></a>
		
	</div>

	<br>
	@if(Session::has('msg'))
		<div class="alert alert-success">
			{{Session::get('msg')}}
		</div>
	@endif

	<br>
	<div class="panel panel-primary">
		<div class="panel-heading">المحافظات</div>
		<div class="panel-body">
			@if($cities->total() > 0)
				<table class="table table-bordered">
					<tr>
						<th>الأسم باللغة العربية</th>								
						<th>الأسم باللغة الأنجليزية</th>								
							
						<th>خيارات</th>								
					</tr>
				@foreach($cities as $city)
					<tr>
						<td>{{ $city->name_ar }}</td>		
						<td>{{ $city->name_en }}</td>		
						<td>
							
							{!! Form::open(['method' => 'DELETE' ,'action'=>['CitiesCtrl@destroy',$city->id]]) !!}
									<a href="{!!Url('/')!!}/admin/cities
									/{{ $city->id }}/edit" class="btn btn-info">تعديل</a>
									{!! Form::submit('حذف' , ['class'=>'btn btn-danger','onClick' =>'return confirm(" حذف لها, هل انت متأكد من الحذف ؟")']) !!}
							{!! Form::close() !!}
						</td>								
					</tr>
				@endforeach
				</table>
				{!!$cities->render()!!}
			@else
				<div class="alert alert-danger">No Record To Show .</div> 

			@endif
		</div>	
	</div>
	



@stop
