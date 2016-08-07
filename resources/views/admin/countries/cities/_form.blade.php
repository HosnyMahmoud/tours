<div class="form-group">
	<label class="col-md-4 control-label">أسم المحافظة باللغة العربية</label>
	<div class="col-md-6">
		{!! Form::text('name_ar',null,['class'=>'form-control'])!!}
	</div>
</div>
<div class="form-group">
	<label class="col-md-4 control-label">أسم المحافظة باللغة الأنجليزية</label>
	<div class="col-md-6">
		{!! Form::text('name_en',null,['class'=>'form-control'])!!}
	</div>
</div>
<br /><br />
<div class="form-group{{ $errors->has('country_id') ? ' has-error' : '' }}">
	{!! Form::label('country_id', 'الدولة ') !!}
	{!! Form::select('country_id', $countries, null, ['id' => 'country_id', 'class' => 'form-control', 'required' => 'required']) !!}
	<small class="text-danger">{{ $errors->first('country_id') }}</small>
</div>
<div class="form-group col-md-6">
	<button class="btn btn-primary" type="submit">
	{!! $btnName !!}
	</button>
</div>
