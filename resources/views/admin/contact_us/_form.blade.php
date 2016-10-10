@extends('admin.layout')
	@section('title','عن الشركة')
	@section('content')
		
		@if (Session::has('msg'))
			<div class="alert alert-success">
				{{ Session::get('msg') }}
			</div>				
		@endif

		<div class="col-md-12">
			
			<div class="form-group{{ $errors->has('title_ar') ? ' has-error' : '' }}">

			    {!! Form::label('title_ar', 'العنوان باللغة العربية') !!}
			    {!! Form::text('title_ar', null, ['class' => 'form-control']) !!}
			    <small class="text-danger">{{ $errors->first('title_ar') }}</small>
			</div>

			<div class="form-group{{ $errors->has('title_en') ? ' has-error' : '' }}">
			    {!! Form::label('title_en', 'العنوان باللغة الأنجليزية') !!}
			    {!! Form::text('title_en', null, ['class' => 'form-control']) !!}
			    <small class="text-danger">{{ $errors->first('title_en') }}</small>
			</div>

			<div class="form-group{{ $errors->has('content_ar') ? ' has-error' : '' }}">
			    {!! Form::label('content_ar', 'المحتوي باللغة العربية') !!}
			    {!! Form::textarea('content_ar', null, ['class' => ' form-control']) !!}
			    <small class="text-danger">{{ $errors->first('content_ar') }}</small>
			</div>

			<div class="form-group{{ $errors->has('content_en') ? ' has-error' : '' }}">
			    {!! Form::label('content_en', 'المحتوي باللغة الأنجليزية') !!}
			    {!! Form::textarea('content_en', null, ['class' => ' form-control']) !!}
			    <small class="text-danger">{{ $errors->first('content_en') }}</small>
			</div>

			<button type="submit" class="btn btn-primary"> {{$btnName}} </button>
			
		

		</div>

		
	@endsection
@stop

