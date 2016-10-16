@extends('admin.layout')
@section('title','تفاصيل العرض')
	
@section('content')

<div class="panel panel-info">
	<div class="panel panel-heading text-center">
		تفاصيل العرض
	</div>
	<div class="panel panel-body">
		<table class="table table-hover">
		    <thead>
		        <tr>
			        <th>ID # </th>
			        <th>{{ $data->id }}</th>
		    	</tr>
		        <tr>
			        <th>أسم العرض الخاص</th>
			        <th>{{ $data->name_ar }}</th>
		    	</tr>
		    	<tr>
			        <th>سعر العرض</th>
			        <th>{{ $data->price }}</th>
		    	</tr>
		    	<tr>
			        <th>الوصف باللغة العربية</th>
			        <th>{{ $data->desc_ar }}</th>
		    	</tr>
		    	<tr>
			        <th>نوع العرض</th>
			        <th>
			        	@if($data->status == 0)
			        		{{ 'مفعل' }}
		        		@else
			        		{{ 'غير مفعل' }}
		        		@endif
			        </th>
		    	</tr>
		    	<tr>
			        <th>ابتداءا من :</th>
			        <th>
			        	{{$data->date_from}}
			        </th>
		    	</tr>
		    	<tr>
			        <th>وينتهي في :</th>
			        <th>
			        	{{$data->date_to}}
			        </th>
		    	</tr>
		    </thead>
		</table>
	</div>
</div>



@endsection
@stop

