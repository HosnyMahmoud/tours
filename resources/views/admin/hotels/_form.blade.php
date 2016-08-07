<div class="form-group{{ $errors->has('name_ar') ? ' has-error' : '' }}">
	{!! Form::label('name_ar', 'الأسم باللغة العربية') !!}
	{!! Form::text('name_ar', null, ['class' => 'form-control', 'required' => 'required']) !!}
	<small class="text-danger">{{ $errors->first('name_ar') }}</small>
</div>
<div class="form-group{{ $errors->has('name_en') ? ' has-error' : '' }}">
	{!! Form::label('name_en', 'الأسم باللغة الأنجليزية') !!}
	{!! Form::text('name_en', null, ['class' => 'form-control', 'required' => 'required']) !!}
	<small class="text-danger">{{ $errors->first('name_en') }}</small>
</div>
<div class="form-group{{ $errors->has('log') ? ' has-error' : '' }}">
	{!! Form::label('log', 'اضافة لوجو') !!}
	@if(@$type == 'edit')
	{!! Form::file('log') !!}
	@else
	{!! Form::file('log',['required' => 'required']) !!}
	<small class="text-danger">{{ $errors->first('log') }}</small>
	@endif
</div>
<div class="form-group{{ $errors->has('country_id') ? ' has-error' : '' }}">
	{!! Form::label('country_id', 'الدولة') !!}
	{!! Form::select('country_id', $countries, null, ['id' => 'country_id', 'class' => 'form-control', 'required' => 'required']) !!}
	<small class="text-danger">{{ $errors->first('country_id') }}</small>
</div>
<div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }}">
	{!! Form::label('city_id', 'المحافظة') !!}
	{!! Form::select('city_id', $cities, null, ['id' => 'city_id', 'class' => 'form-control', 'required' => 'required']) !!}
	<small class="text-danger">{{ $errors->first('city_id') }}</small>
</div>
<div class="form-group{{ $errors->has('num_of_per') ? ' has-error' : '' }}">
	{!! Form::label('num_of_per', 'عدد الأشخاص ') !!}
	{!! Form::text('num_of_per', null, ['class' => 'form-control', 'required' => 'required']) !!}
	<small class="text-danger">{{ $errors->first('num_of_per') }}</small>
</div>
<div class="form-group{{ $errors->has('desc_ar') ? ' has-error' : '' }}">
	{!! Form::label('desc_ar', 'الوصف باللغة العربية') !!}
	{!! Form::textarea('desc_ar', null, ['class' => 'form-control', 'required' => 'required']) !!}
	<small class="text-danger">{{ $errors->first('desc_ar') }}</small>
</div>
<div class="form-group{{ $errors->has('desc_en') ? ' has-error' : '' }}">
	{!! Form::label('desc_en', 'الوصف باللغة الأنجليزية') !!}
	{!! Form::textarea('desc_en', null, ['class' => 'form-control', 'required' => 'required']) !!}
	<small class="text-danger">{{ $errors->first('desc_en') }}</small>
</div>
<table class="table">
	@if($type == "edit")
	<?php $images = explode('|',$hotel->images);?>
	@if($hotel->images !== '')
	@foreach($images as $img)
	<div class="col-lg-2 col-md-3 col-sm-3 col-xs-4">
		<div class="thumbnail">
			<a href="{{Url('uploads/hotels/'.$img)}}" target="_blank">
				<img src="{{Url('uploads/hotels/'.$img)}}" style="height:100px;">
			</a>
			<a href="{{Url('admin/hotels/')}}/delete_img/{{$hotel->id}}/{{$img}}">حذف</a>
		</div>
	</div>
	@endforeach
	@endif
	@endif
	<tr>
		<td>
			<label class="control-label"  style="text-align:right">صوره الفندق</label>
		</td>
		<td><div  class="col-md-10">
			<input name="image[]" type="file">
			<small class="text-danger"></small>
		</div></td>
	</tr>
	<tbody class="input_fields_wrap">
		
	</tbody>
	<tr>
		<td>
			<a class="btn btn-primary" id="addmore">إضافه المزيد</i></a>
		</td>
	</tr>
</table>

<div class="form-group{{ $errors->has('stars') ? ' has-error' : '' }}">
	{!! Form::label('stars', 'عدد النجوم') !!}
	{!! Form::select('stars', ['1','2','3','4','5','6','7'], null, ['id' => 'stars', 'class' => 'form-control', 'required' => 'required']) !!}
	<small class="text-danger">{{ $errors->first('stars') }}</small>
</div>
<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
	{!! Form::label('price', 'السعر') !!}
	{!! Form::text('price', null, ['class' => 'form-control', 'required' => 'required']) !!}
	<small class="text-danger">{{ $errors->first('price') }}</small>
</div>
<div class="form-group{{ $errors->has('meta_desc_ar') ? ' has-error' : '' }}">
	{!! Form::label('meta_desc_en', 'Meta descriptions english') !!}
	{!! Form::textarea('meta_desc_en', null, ['class' => 'form-control', 'required' => 'required']) !!}
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

<button class="btn btn-info">
@if(@$btnName)
{{ $btnName }}
@endif
</button>
<script src="http://code.jquery.com/jquery.js"></script>
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
</script>