@extends('admin.layout')
@section('title','بيانات الرحلة')
	
@section('content')

<div class="panel panel-info">
	<div class="panel panel-heading text-center">
		تفاصيل الرحلة
	</div>
	<div class="panel panel-body">
		<table class="table table-hover">
		    <thead>
		        <tr>
			        <th>ID # </th>
			        <th>{{ $travel->id }}</th>
		    	</tr>
		        <tr>
			        <th>أسم الرحلة</th>
			        <th>{{ $travel->name_ar }}</th>
		    	</tr>
		    	<tr>
			         <th>الوصف</th>
			        <th>{{ $travel->desc_ar }}</th>

		    	</tr>
		    	<tr>
			         <th>الفندق</th>
			        <th>{{ $hotel->find($travel->hotel_id)['name_ar'] }}</th>

		    	</tr>
		    	<tr>
			         <th>عدد الليالي</th>
			        <th>{{ $travel->nights }}</th>

		    	</tr>
		    	<tr>
		         	<th>نوع الرحلة</th>
			        <th>
			        	@if($travel->type == 0)
			        		{{ 'عروض خاصة'   }}
		        		@elseif($travel->type == 1)
		        			{{ 'رحلة حج وعمرة'  }}
	        			@else
	        				{{ 'رحلة شهر عسل' }}	
        				@endif
			        </th>

		    	</tr>
		    	<tr>
			         <th>الدولة</th>
			        <th>{{ $countries->find($travel->country_id)['name_ar'] }}</th>

		    	</tr>
		    	<tr>
			         <th>المنطقة</th>
			        <th>{{ $cities->find($travel->country_id)['name_ar'] }}</th>

		    	</tr>
		    	<tr>
			         <th>السعر</th>
			         <th>{{ $travel->price }}</th>
		    	</tr>
		    	<tr>
			         <th>تمت الأضافة في :</th>
			         <th>{{ $travel->created_at }}</th>
		    	</tr>
		    	<tr>
			         <th> أخر تعديل في :</th>
			         <th>{{ $travel->updated_at }}</th>
		    	</tr>
		    </thead>
		</table>
	</div>
</div>

@endsection
@stop

