
	<div class="form-group">
		<label class="col-md-4 control-label">أسم النوع</label>
		<div class="col-md-6">
			{!! Form::text('brand_name',null,['class'=>'form-control'])!!}
		</div>
	</div>
	<br / >
	
	<div class="form-group{{ $errors->has('country_id') ? ' has-error' : 'country_id' }}">
	    {!! Form::label('country_id', 'الدولة') !!}
	    {!! Form::select('country_id', $countries, null, ['id' => 'country_id', 'class' => 'form-control', 'required' => 'required']) !!}
	    <small class="text-danger">{{ $errors->first('country_id') }}</small>
	</div>
	
	<div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }}">
	    {!! Form::label('city_id', 'المحافظة') !!}
	    {!! Form::select('city_id', $cities, null, ['id' => 'city_id', 'class' => 'form-control', 'required' => 'required']) !!}
	    <small class="text-danger">{{ $errors->first('city_id') }}</small>
	</div>
	
	<div class="form-group{{ $errors->has('meta_desc_ar') ? ' has-error' : '' }}">
	    {!! Form::label('meta_desc_ar', 'Meta descriptions english') !!}
	    {!! Form::textarea('meta_desc_ar', null, ['class' => 'form-control', 'required' => 'required']) !!}
	    <small class="text-danger">{{ $errors->first('meta_desc_ar') }}</small>
	</div>

	<div class="form-group{{ $errors->has('meta_desc_ar') ? ' has-error' : '' }}">
	    {!! Form::label('meta_desc_ar', 'Meta descriptions arabic') !!}
	    {!! Form::textarea('meta_desc_ar', null, ['class' => 'form-control', 'required' => 'required']) !!}
	    <small class="text-danger">{{ $errors->first('meta_desc_ar') }}</small>
	</div>	
	
	<div class="form-group{{ $errors->has('tags_ar') ? ' has-error' : '' }}">
	    {!! Form::label('tags_ar', 'الكلمات الدلالية باللغة العربية') !!}
	    {!! Form::text('tags_ar', null, ['class' => 'form-control', 'required' => 'required']) !!}
	    <small class="text-danger">{{ $errors->first('tags_ar') }}</small>
	</div>
	
	<div class="form-group{{ $errors->has('tags_en') ? ' has-error' : '' }}">
	    {!! Form::label('tags_en', 'الكلمات الدلالية باللغة الأنجليزية') !!}
	    {!! Form::text('tags_en', null, ['class' => 'form-control', 'required' => 'required']) !!}
	    <small class="text-danger">{{ $errors->first('tags_en') }}</small>
	</div>
	
	<br / >
	<div class="form-group col-md-6">
		<button class="btn btn-primary" type="submit">
			{!! $btnName !!}
		</button>
	</div>



<!-- Latest compiled and minified CSS & JS -->
