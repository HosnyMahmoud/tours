@extends('admin.layout')
@section('title','بيانات الفندق')
	
@section('content')

<div class="panel panel-info">
	<div class="panel panel-heading text-center">
		تفاصيل الفندق
	</div>
	<div class="panel panel-body">
		<table class="table table-hover">
		    <thead>
		        <tr>
			        <th>ID # </th>
			        <th>{{ $hotel->id }}</th>
		    	</tr>
		        <tr>
			        <th>أسم الفندق</th>
			        <th>{{ $hotel->name_ar }}</th>
		    	</tr>
		    	<tr>
			         <th>الدولة</th>
			        <th>{{ $countries->find($hotel->country_id)['name_ar'] }}</th>

		    	</tr>
		    	<tr>
			         <th>السعر</th>
			         <th>{{ $hotel->price }}</th>
		    	</tr>
		    	<tr>
			         <th>عدد النجوم</th>
			         <th>{{ $hotel->stars }}</th>
		    	</tr>
		    	<tr>
			         <th>تمت الأضافة في :</th>
			         <th>{{ $hotel->created_at }}</th>
		    	</tr>
		    	<tr>
			         <th> أخر تعديل في :</th>
			         <th>{{ $hotel->updated_at }}</th>
		    	</tr>
		    </thead>
		</table>
	</div>
</div>

@endsection
@stop

