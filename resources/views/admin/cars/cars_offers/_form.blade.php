<div class="form-group{{ $errors->has('offer_name_ar') ? ' has-error' : '' }}">
	{!! Form::label('offer_name_ar', 'الأسم باللغة العربية') !!}
	{!! Form::text('offer_name_ar', null, ['class' => 'form-control','required' => 'required']) !!}
	<small class="text-danger">{{ $errors->first('offer_name_ar') }}</small>
</div>

<div class="form-group{{ $errors->has('offer_name_en') ? ' has-error' : '' }}">
	{!! Form::label('offer_name_en', 'الأسم باللغة الأنجليزية') !!}
	{!! Form::text('offer_name_en', null, ['class' => 'form-control','required' => 'required']) !!}
	<small class="text-danger">{{ $errors->first('offer_name_en') }}</small>
</div>

<div class="form-group{{ $errors->has('brand_id') ? ' has-error' : '' }}">
	{!! Form::label('brand_id', 'نوع السيارة') !!}
	{!! Form::select('brand_id', $brands, null, ['id' => 'brand_id', 'class' => 'form-control','required' => 'required']) !!}
	<small class="text-danger">{{ $errors->first('brand_id') }}</small>
</div>

<div class="form-group{{ $errors->has('model_id') ? ' has-error' : '' }}">
	{!! Form::label('model_id', 'الموديل') !!}
	{!! Form::select('model_id', $models, null, ['id' => 'model_id', 'class' => 'form-control','required' => 'required']) !!}
	<small class="text-danger">{{ $errors->first('model_id') }}</small>
</div>

<div class="form-group{{ $errors->has('country_id') ? ' has-error' : '' }}">
	{!! Form::label('country_id', 'الدولة') !!}
	{!! Form::select('country_id', $countries, null, ['id' => 'country_id', 'class' => 'form-control','required' => 'required']) !!}
	<small class="text-danger">{{ $errors->first('country_id') }}</small>
</div>

<div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }}">
	{!! Form::label('city_id', 'المحافظة') !!}
	{!! Form::select('city_id', $cities, null, ['id' => 'city_id', 'class' => 'form-control','required' => 'required']) !!}
	<small class="text-danger">{{ $errors->first('city_id') }}</small>
</div>



<div class="form-group{{ $errors->has('img') ? ' has-error' : '' }}">
    {!! Form::label('img', 'الصورة') !!}
    {!! Form::file('img') !!}
    <p class="help-block">أختر صورة مناسبة للعرض</p>
    <small class="text-danger">{{ $errors->first('img') }}</small>
</div>

<div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
    {!! Form::label('color', 'لون السيارة') !!}
    {!! Form::text('color', null, ['class' => 'form-control','required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('color') }}</small>
</div>

<div class="form-group{{ $errors->has('offer_desc_ar') ? ' has-error' : '' }}">
	{!! Form::label('offer_desc_ar', 'الوصف باللغة العربية') !!}
	{!! Form::textarea('offer_desc_ar', null, ['class' => 'form-control','required' => 'required']) !!}
	<small class="text-danger">{{ $errors->first('offer_desc_ar') }}</small>
</div>
<div class="form-group{{ $errors->has('offer_desc_en') ? ' has-error' : '' }}">
	{!! Form::label('offer_desc_en', 'الوصف باللغة الأنجليزية') !!}
	{!! Form::textarea('offer_desc_en', null, ['class' => 'form-control','required' => 'required']) !!}
	<small class="text-danger">{{ $errors->first('offer_desc_en') }}</small>
</div>

<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
	{!! Form::label('price', 'السعر') !!}
	{!! Form::text('price', null, ['class' => 'form-control','required' => 'required']) !!}
	<small class="text-danger">{{ $errors->first('price') }}</small>
</div>


<button class="btn btn-info">
	@if(@$btnName)
		{{ $btnName }}
	@endif
</button>


<!-- <script src="http://code.jquery.com/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
	var max_fields      = 15; //maximum input boxes allowed
	var wrapper         = $(".input_fields_wrap"); //Fields wrapper
	var add_button      = $("#addmore"); //Add button ID
	
	var x = 1; //initlal text box count
	$(add_button).click(function(e){ //on add input button click
	e.preventDefault();
	if(x < max_fields){ //max input box allowed
	x++; //text box increment
	$(wrapper).append('<tr> <td> <label class="control-label" style="text-align:right">صوره الفندق '+ x +'  (<a class="remove_field">x</a>) </label></td> <td><div  class="col-md-11"> <input name="image[]" type="file"> <small class="text-danger"></small> </div></td> </tr>');//add input box
	}
	});
	
	$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
	
	var remo = $(this).parent().parent().parent().hide('slow').remove();
	x--;
	})
	});
</script> -->