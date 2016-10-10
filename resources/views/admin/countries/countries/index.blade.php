@extends('admin.layout')
@section('title' , 'ألدول و المحافظات')
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
		<div class="panel-heading">الدول / المحافظات</div>
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
						<td>
							<a href="{!!Url('/')!!}/admin/countries/{{$country->id}}" class="btn btn-info">
								{{ $country->name_ar }}
							</a>
						</td>		
						<td>
							<a href="{!!Url('/')!!}/admin/countries/{{$country->id}}" class="btn btn-info">
								{{ $country->name_en }}
							</a>
						</td>		
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
				<div class="alert alert-info">لا توجد بيانات للعرض</div> 
			@endif
		</div>	
	</div>
@stop
