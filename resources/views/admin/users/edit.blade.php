@extends('admin.layout')
@section('title' , 'تعديل العضو')
		
@section('content')

	{!! Form::model($user ,['method'=>'PATCH','action'=>['UsersCtrl@update',$user->id],'files'=>true])!!}
		@include('admin.users._form',['btnName'=>'حفظ', 'alert'=>'<small class="text-warning">Leave Blank to keep it</small>','type'=>'edit'])
	{!!  Form::close() !!}

@endsection
@stop