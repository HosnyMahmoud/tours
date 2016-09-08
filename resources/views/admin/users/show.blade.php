@extends('admin.layout')
@section('title','بيانات المستخدم')
	
@section('content')

<div class="panel panel-default">
	<div class="panel panel-heading text-center">
		تفاصيل المستخدم
	</div>
	<div class="panel panel-body">
		<table class="table table-hover">
		    <thead>
		        <tr>
			        <th>ID # </th>
			        <th>{{ $user->id }}</th>
		    	</tr>
		        <tr>
			        <th>الأسم</th>
			        <th>{{ $user->name }}</th>
		    	</tr>
		    	<tr>
			         <th>البريد الألكتروني</th>
			         <th>{{ $user->email }}</th>
		    	</tr>
		    	<tr>
			         <th>رقم التلفون</th>
			         <th>{{ $user->mobile }}</th>
		    	</tr>
		    	<tr>
			         <th>تمت الأضافة في :</th>
			         <th>{{ $user->created_at }}</th>
		    	</tr>
		    	<tr>
			         <th> أخر تعديل في :</th>
			         <th>{{ $user->updated_at }}</th>
		    	</tr>
		    </thead>
		</table>
	</div>
</div>

@endsection
@stop
