@extends('admin.layout')
@section('title')
		انواع السيارات
@endsection

@section('content')

	<div>
		<a href="{!!Url('/')!!}/admin/cars_brand/create" class="btn btn-success btn-icon-only"><i class="fa fa-plus"></i></a>
		
	</div>

	<br>
	@if(Session::has('msg'))
		<div class="alert alert-success">
			{{Session::get('msg')}}
		</div>
	@endif

	<br>
	<div class="panel panel-primary">
		<div class="panel-heading">جميع الأنواع</div>
		<div class="panel-body">
			@if($brands->total() > 0)
				<table class="table table-bordered">
					<tr>
						<th>الأسم</th>								
						<th>خيارات</th>								
					</tr>
				@foreach($brands as $brand)
					<tr>
						<td>{{ $brand->brand_name }}</td>		
						<td>	
							{!! Form::open(['method' => 'DELETE' ,'action'=>['CarsBrandCtrl@destroy',$brand->id]]) !!}
									<a href="{!!Url('/')!!}/admin/cars_brand/{{ $brand->id }}/edit" class="btn btn-info">تعديل</a>
									{!! Form::submit('حذف' , ['class'=>'btn btn-danger','onClick' =>'return confirm("سيتم حذف البراند و كل الموديلات الخاصة بة هل انت متأكد من الحذف ؟")']) !!}
							{!! Form::close() !!}
						</td>								
					</tr>
				@endforeach
				</table>
				{!!$brands->render()!!}
			@else
				<div class="alert alert-danger">No Record To Show .</div> 

			@endif
		</div>	
	</div>
	



@stop
