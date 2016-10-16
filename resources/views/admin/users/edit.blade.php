@extends('admin.layout')
@section('title' , 'تعديل العضو')
		
@section('content')
	@if (Session::get('errors'))
     <div class="alert alert-dismissable alert-warning">
          <h4>Uwaga!</h4>
          <ul>
               @foreach (Session::get('errors')->all() as $error)
               <li>{!! $error !!}</li>
               @endforeach
          </ul>
     </div>
     @endif

	{!! Form::model($user ,['method'=>'PATCH','action'=>['UsersCtrl@update',$user->id],'files'=>true])!!}
		@include('admin.users._form',['btnName'=>'حفظ', 'alert'=>'<small class="text-warning">Leave Blank to keep it</small>','type'=>'edit'])
	{!!  Form::close() !!}

@endsection
@stop