
<div class="form-group{{ $errors->has('name_ar') ? ' has-error' : '' }}">
    {!! Form::label('name_ar', 'أسم الدولة باللغة العربية') !!}
    {!! Form::text('name_ar', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('name_ar') }}</small>
</div>

<div class="form-group{{ $errors->has('name_en') ? ' has-error' : '' }}">
    {!! Form::label('name_en', 'أسم الدولة باللغة الأنجليزية') !!}
    {!! Form::text('name_en', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('name_en') }}</small>
</div>
	
<div class="form-group col-md-6">
	<button class="btn btn-primary" type="submit">
	{!! $btnName !!}
	</button>
</div>
<!-- Latest compiled and minified CSS & JS -->