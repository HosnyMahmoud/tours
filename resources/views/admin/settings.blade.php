@extends('admin.layout')
@section('content')


{!! Form::model($settings,['method'=>'PATCH' , 'action' => ['SettingsCtrl@update' , $settings->id ] ]) !!}
	
	<div class="form-group{{ $errors->has('site_name_ar') ? ' has-error' : '' }}">
	    {!! Form::label('site_name_ar', 'اسم الموقع باللغة العربية') !!}
	    {!! Form::text('site_name_ar', null, ['class' => 'form-control', 'required' => 'required']) !!}
	    <small class="text-danger">{{ $errors->first('site_name_ar') }}</small>
	</div>
	
	<div class="form-group{{ $errors->has('site_name_en') ? ' has-error' : '' }}">
		    {!! Form::label('site_name_en', 'اسم الموقع باللغة الأنجليزية') !!}
		    {!! Form::text('site_name_en', null, ['class' => 'form-control', 'required' => 'required']) !!}
		    <small class="text-danger">{{ $errors->first('site_name_en') }}</small>
	</div>	

	<div class="form-group{{ $errors->has('site_desc_ar') ? ' has-error' : '' }}">
	    {!! Form::label('site_desc_ar', 'وصف الموقع باللغة العربية') !!}
	    {!! Form::textarea('site_desc_ar', null, ['class' => 'form-control', 'required' => 'required']) !!}
	    <small class="text-danger">{{ $errors->first('site_desc_ar') }}</small>
	</div>
	
	<div class="form-group{{ $errors->has('site_desc_en') ? ' has-error' : 'site_desc_en' }}">
	    {!! Form::label('site_desc_en', 'وصف الموقع باللغة الأنجليزية') !!}
	    {!! Form::textarea('site_desc_en', null, ['class' => 'form-control', 'required' => 'required']) !!}
	    <small class="text-danger">{{ $errors->first('site_desc_en') }}</small>
	</div>
	
	<div class="form-group{{ $errors->has('site_tags_ar') ? ' has-error' : '' }}">
		    {!! Form::label('site_tags_ar', 'الكلمات الدلالية باللغة العربية') !!}
		    {!! Form::textarea('site_tags_ar', null, ['class' => 'form-control', 'required' => 'required']) !!}
		    <small class="text-danger">{{ $errors->first('site_tags_ar') }}</small>
		</div>	

	<div class="form-group{{ $errors->has('site_tags_en') ? ' has-error' : '' }}">
	    {!! Form::label('site_tags_en', 'الكلمات الدلالية باللغة الأنجليزية') !!}
	    {!! Form::textarea('site_tags_en', null, ['class' => 'form-control', 'required' => 'required']) !!}
	    <small class="text-danger">{{ $errors->first('site_tags_en') }}</small>
	</div>

	<div class="form-group{{ $errors->has('site_status') ? ' has-error' : '' }}">
	    {!! Form::label('site_status', 'حالة الموقع') !!}
	    {!! Form::select('site_status', ['0'=>'مغلق','1'=>'مفتوح'], null, ['id' => 'site_status', 'class' => 'form-control', 'required' => 'required']) !!}
	    <small class="text-danger">{{ $errors->first('site_status') }}</small>
	</div>

	<div class="form-group{{ $errors->has('facebook') ? ' has-error' : 'facebook' }}">
		    {!! Form::label('facebook', 'فيس بوك') !!}
		    {!! Form::text('facebook', null, ['class' => 'form-control', 'required' => 'required']) !!}
		    <small class="text-danger">{{ $errors->first('') }}</small>
	</div>	
		
	<div class="form-group{{ $errors->has('twitter') ? ' has-error' : '' }}">
	    {!! Form::label('twitter', 'تويتر') !!}
	    {!! Form::text('twitter', null, ['class' => 'form-control', 'required' => 'required']) !!}
	    <small class="text-danger">{{ $errors->first('twitter') }}</small>
	</div>

	<div class="form-group{{ $errors->has('google_Plus') ? ' has-error' : '' }}">
		    {!! Form::label('google_Plus', 'جوجل بلس') !!}
		    {!! Form::text('google_Plus', null, ['class' => 'form-control', 'required' => 'required']) !!}
		    <small class="text-danger">{{ $errors->first('google_Plus') }}</small>
		</div>	

	<div class="form-group{{ $errors->has('youtube') ? ' has-error' : '' }}">
	    {!! Form::label('youtube', 'يوتيوب') !!}
	    {!! Form::text('youtube', null, ['class' => 'form-control', 'required' => 'required']) !!}
	    <small class="text-danger">{{ $errors->first('youtube') }}</small>
	</div>
	
	<div class="form-group{{ $errors->has('linkedIn') ? ' has-error' : '' }}">
		    {!! Form::label('linkedIn', 'لينكيد أن') !!}
		    {!! Form::text('linkedIn', null, ['class' => 'form-control', 'required' => 'required']) !!}
		    <small class="text-danger">{{ $errors->first('linkedIn') }}</small>
		</div>	

	{!! Form::submit('Update', array('required', 'class'=>'btn btn-primary')) !!}


{!! Form::close() !!}



@stop