@extends('admin.layout')
@section('title')
		الدول
@endsection

@section('content')

	<div>
		<a href="{!!Url('/')!!}/admin/countries/create" class="btn btn-success btn-icon-only"><i class="fa fa-plus"></i></a>
		
	</div>

	<br>
	@if(Session::has('msg'))
		<div class="alert alert-success">
			{{Session::get('msg')}}
		</div>
	@endif

	<br>
	<div class="panel panel-primary">
		<div class="panel-heading">الدول</div>
		<div class="panel-body">
			@if($countries->total() > 0)
				<table class="table table-bordered">
					<tr>
						<th>الأسم باللغة العربية</th>								
						<th>الأسم باللغة الأنجليزية</th>								
						<th>خيارات</th>								
					</tr>
				@foreach($countries as $country)
					<tr>
						<td>{{ $country->name_ar }}</td>		
						<td>{{ $country->name_en }}</td>		
						<td>
							
							{!! Form::open(['method' => 'DELETE' ,'action'=>['CountriesCtrl@destroy',$country->id]]) !!}
									<a href="{!!Url('/')!!}/admin/countries
									/{{ $country->id }}/edit" class="btn btn-info">تعديل</a>
									{!! Form::submit('حذف' , ['class'=>'btn btn-danger','onClick' =>'return confirm("سيتم حذف البلد و كل المحافظات التابعة لها, هل انت متأكد من الحذف ؟")']) !!}
							{!! Form::close() !!}
						</td>								
					</tr>
				@endforeach
				</table>
				{!!$countries->render()!!}
			@else
				<div class="alert alert-danger">No Record To Show .</div> 

			@endif
		</div>	
	</div>
	



@stop
