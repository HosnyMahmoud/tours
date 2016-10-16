@extends('admin.layout')
@section('title')
	اضافة عضو جديد
@endsection

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

	{!! Form::open(['action'=>'UsersCtrl@store','class'=>'form-horizontal']) !!}
		@include('admin.users._form',['btnName'=>'إضافه'])
	{!! Form::close() !!}
	
@endsection
@stop