@extends('admin.layout')
@section('title')
		الموديلات
@endsection

@section('content')

	<div>
		<a href="{!!Url('/')!!}/admin/cars_models/create" class="btn btn-success btn-icon-only"><i class="fa fa-plus"></i></a>
		
	</div>

	<br>
	@if(Session::has('msg'))
		<div class="alert alert-success">
			{{Session::get('msg')}}
		</div>
	@endif
	<div class="panel panel-primary">
		<div class="panel-heading">جميع الموديلات</div>
		<div class="panel-body">
			@if($models->total() > 0)
				<table class="table table-bordered">
					<tr>
						<th>اسم الموديل</th>								
						<th>الدولة</th>								
						<th>المحافظة</th>								
						<th>السعر</th>								
						<th>خيارات</th>								
					</tr>
				@foreach($models as $model)
					<tr>
						<td>{{ $model->model_name }}</td>								
						<td>{{ $countries->find($model->country_id)->name_ar }}</td>			
						<td>{{ $cities->find($model->city_id)->name_ar }}</td>	
						<td>{{ $model->price }}</td>								
						<td>
							{!! Form::open(['method' => 'DELETE' ,'action'=>['CarsModelsCtrl@destroy',$model->id]]) !!}
								<a href="{!!Url('/')!!}/admin/cars_models/{{ $model->id }}/edit" class="btn btn-info">تعديل</a>
									
									{!! Form::submit('حذف' , ['class'=>'btn btn-danger','onClick' =>'return confirm("سيتم حذف الموديل هل انت متأكد من الحذف ؟")']) !!}
							{!! Form::close() !!}
						</td>								
					</tr>
				@endforeach
				</table>
				{!!$models->render()!!}
			@else
				<div class="alert alert-danger">No Record To Show .</div> 

			@endif
		</div>	
	</div>
	



@stop
