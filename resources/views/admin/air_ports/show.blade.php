@extends('admin.layout')
@section('title','تفاصيل المطار')
	
@section('content')

<div class="panel panel-info">
	<div class="panel panel-heading text-center">
		تفاصيل مطار : {{ $airPorts->name_ar }}
	</div>
	<div class="panel panel-body">
		<table class="table table-hover">
		    <thead>
		        <tr>
			        <th>ID # </th>
			        <th>{{ $airPorts->id }}</th>
		    	</tr>
		        <tr>
			        <th>أسم المطار باللغة العربية</th>
			        <th>{{ $airPorts->name_ar }}</th>
		    	</tr>
		    	<tr>
			        <th>أسم المطار بالأنجليزية</th>
			        <th>{{ $airPorts->name_en }}</th>
		    	</tr>
		    	<tr>
			         <th>المنطقة</th>
			        <th>{{ $cities->find($airPorts->city_id)['name_ar'] }}</th>

		    	</tr>
		    	<tr>
			         <th>تمت الأضافة في :</th>
			         <th>{{ $airPorts->created_at }}</th>
		    	</tr>
		    	<tr>
			         <th> أخر تعديل في :</th>
			         <th>{{ $airPorts->updated_at }}</th>
		    	</tr>
		    </thead>
		</table>
	</div>
</div>

@endsection
@stop

