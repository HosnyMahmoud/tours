@extends('admin.layout')
@section('title' ,'المطارات')

@section('content')

	<div>
		<a href="{!!Url('/')!!}/admin/air_ports/create" class="btn btn-success btn-icon-only"><i class="fa fa-plus"></i></a>
	</div>
	<br>
	@if(Session::has('msg'))
		<div class="alert alert-success">
			{{Session::get('msg')}}
		</div>
	@endif

	<br>
	<div class="panel panel-primary">
		<div class="panel-heading">جميع المطارات</div>
		<div class="panel-body">
			@if($airPorts->total() > 0)
				<table class="table table-bordered">
					<tr>
						<th>#</th>								
						<th>الأسم باللغة العربية</th>								
						<th>الأسم باللغة الأنجليزية</th>								
							
						<th>خيارات</th>								
					</tr>
				@foreach($airPorts as $airPort)
					<tr>
						<td>{{ $airPort->id }}</td>		
						<td>{{ $airPort->name_ar }}</td>		
						<td>{{ $airPort->name_en }}</td>		
						<td>
							
							{!! Form::open(['method' => 'DELETE' ,'action'=>['AirPortsCtrl@destroy',$airPort->id]]) !!}
									<a href="{!!Url('/')!!}/admin/air_ports
									/{{ $airPort->id }}/edit" class="btn btn-info">تعديل</a>
									{!! Form::submit('حذف' , ['class'=>'btn btn-danger','onClick' =>'return confirm(" هل انت متأكد من الحذف ؟")']) !!}
							{!! Form::close() !!}
						</td>								
					</tr>
				@endforeach
				</table>
				{!! $airPorts->render() !!}
			@else
				<div class="alert alert-info">No Record To Show .</div> 

			@endif
		</div>	
	</div>
	



@stop
