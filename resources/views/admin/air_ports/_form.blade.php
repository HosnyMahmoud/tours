<div class="form-group">
	<label class="col-md-4 control-label">أسم المطار باللغة العربية</label>
	<div class="col-md-6">
		{!! Form::text('name_ar',null,['class'=>'form-control','required' => 'required'])!!}
	</div>
</div>
<div class="form-group">
	<label class="col-md-4 control-label">أسم المطار باللغة الأنجليزية</label>
	<div class="col-md-6">
		{!! Form::text('name_en',null,['class'=>'form-control','required' => 'required'])!!}
	</div>
</div>
<br /><br />
<div class="col-md-8">
	<div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }}">
		{!! Form::label('city_id', 'المنطقة') !!}
		{!! Form::select('city_id', $cities, null, ['id' => 'city_id', 'class' => 'form-control', 'required' => 'required','required' => 'required']) !!}
		<small class="text-danger">{{ $errors->first('city_id') }}</small>
     </div>
</div>
<div class="form-group col-md-6">
	<button class="btn btn-primary" type="submit">
	{!! $btnName !!}
	</button>
</div>
