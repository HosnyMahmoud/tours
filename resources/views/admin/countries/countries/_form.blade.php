<div class="form-group">
	<label class="col-md-4 control-label">أسم الدولة باللغة العربية</label>
	<div class="col-md-6">
		{!! Form::text('name_ar',null,['class'=>'form-control'])!!}
	</div>
</div>
<div class="form-group">
	<label class="col-md-4 control-label">أسم الدولة باللغة الأنجليزية</label>
	<div class="col-md-6">
		{!! Form::text('name_en',null,['class'=>'form-control'])!!}
	</div>
</div>

<br / >

<div class="form-group col-md-6">
	<button class="btn btn-primary" type="submit">
	{!! $btnName !!}
	</button>
</div>
<!-- Latest compiled and minified CSS & JS -->