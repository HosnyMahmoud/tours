<div class="form-group{{ $errors->has('name_ar') ? ' has-error' : '' }}">
	{!! Form::label('name_ar', 'الأسم باللغة العربية') !!}
	{!! Form::text('name_ar', null, ['class' => 'form-control']) !!}
	<small class="text-danger">{{ $errors->first('name_ar') }}</small>
</div>

<div class="form-group{{ $errors->has('name_en') ? ' has-error' : '' }}">
	{!! Form::label('name_en', 'الأسم باللغة الأنجليزية') !!}
	{!! Form::text('name_en', null, ['class' => 'form-control']) !!}
	<small class="text-danger">{{ $errors->first('name_en') }}</small>
</div>

<div class="form-group{{ $errors->has('hotel_id') ? ' has-error' : '' }}">
    {!! Form::label('hotel_id', 'يرجي تحديد الفندق') !!}
    {!! Form::select('hotel_id', $hotels, null, ['id' => 'hotel_id', 'class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('hotel_id') }}</small>
</div>

<div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }}">
    {!! Form::label('city_id', 'يرجي تحديد المنطقة') !!}
    {!! Form::select('city_id', $data, null, ['id' => 'city_id', 'class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('hotel_id') }}</small>
</div>

<div class="form-group{{ $errors->has('nights') ? ' has-error' : '' }}">
    {!! Form::label('nights', 'عدد الليالي') !!}
    {!! Form::text('nights', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('nights') }}</small>
</div>

<div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
    {!! Form::label('type', 'نوع الرحلة') !!}
    {!! Form::select('type', ['0'=>'عروض خاصة' ,'1'=>'حج وعمرة' , '2'=>'شهر عسل'], null, ['id' => 'type', 'class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('type') }}</small>
</div>



<!-- View Images -->
<div class="row">
@if(@$type == 'edit')
    @if($travel->images !== '')
        @foreach ($exp as $img) 
          <div class="col-md-3">
              <img src="{!!Url('/')!!}/uploads/travels/{{ $img }}" class="img-thumbnail" width="150" height="150">
              <span>
                <a href="{{Url('admin/travels/')}}/delete_img/{{$travel->id}}/{{$img}}"><i class="fa fa-close" style="position: absolute;right:7px;font-size: 33px;" title='حذف الصورة'></i></a>
              </span>
          </div>
        @endforeach
    @else
         <div class="alert alert-info">عفواً لا توجد صور</div>
    @endif
@endif
</div> 
<!-- View Images -->

<hr>
<div class="input_fields_wrap">
	<div class="form-group{{ $errors->has('imgs[]') ? ' has-error' : '' }}">
	    {!! Form::label('imgs[]', 'أضافة صور مناسبة') !!}
	    {!! Form::file('imgs[]') !!}
	    <p class="help-block">يرجي تحديد صورة أو عدة صور .</p>
	    <small class="text-danger">{{ $errors->first('imgs[]') }}</small>
    </div>

	<button id="addmore" class="btn btn-primary">
		{{' أضافة المزيد من الصور' }}
	</button>
</div>
<br / >
<br / >
<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
    {!! Form::label('price', 'سعر الرحلة') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('price') }}</small>
</div>

<div class="form-group{{ $errors->has('date_from') ? ' has-error' : '' }}">
    {!! Form::label('date_from', 'بداية من') !!}
    {!! Form::input('date','date_from', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('date_from') }}</small>
</div>

<div class="form-group{{ $errors->has('date_to') ? ' has-error' : '' }}">
    {!! Form::label('date_to', 'وتنتهي في ') !!}
    {!! Form::input('date','date_to', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('date_to') }}</small>
</div>

<div class="form-group{{ $errors->has('desc_ar') ? ' has-error' : '' }}">
    {!! Form::label('desc_ar', 'الوصف العربي') !!}
    {!! Form::textarea('desc_ar', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('desc_ar') }}</small>
</div>

<div class="form-group{{ $errors->has('desc_en') ? ' has-error' : '' }}">
    {!! Form::label('desc_en', 'الوصف الأنجليزي') !!}
    {!! Form::textarea('desc_en', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('desc_en') }}</small>
</div>

<div class="form-group{{ $errors->has('meta_desc_ar') ? ' has-error' : '' }}">
    {!! Form::label('meta_desc_ar', 'Meta descriptions arabic') !!}
    {!! Form::textarea('meta_desc_ar', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('meta_desc_ar') }}</small>
</div>

<div class="form-group{{ $errors->has('meta_desc_en') ? ' has-error' : '' }}">
    {!! Form::label('meta_desc_en', 'Meta descriptions english') !!}
    {!! Form::textarea('meta_desc_en', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('meta_desc_en') }}</small>
</div>

<div class="form-group{{ $errors->has('tags_ar') ? ' has-error' : '' }}">
    {!! Form::label('tags_ar', 'الكلمات الدلالية باللغة العربية') !!}
    {!! Form::text('tags_ar', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('tags_ar') }}</small>
</div>

<div class="form-group{{ $errors->has('tags_en') ? ' has-error' : '' }}">
    {!! Form::label('tags_en', 'الكلمات الدلالية باللغة الأنجليزية') !!}
    {!! Form::text('tags_en', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('tags_en') }}</small>
</div>

<button type="" class="btn btn-primary">
	{{ $btnName }}
</button>


<!-- 
	** J-Query Code To add more fields img **	
-->
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
	$(wrapper).append('<tr> <td> <label class="control-label" style="text-align:right">صوره الرحلة '+ x +'  <a class="remove_field btn btn-danger">remove</a> </label></td> <td><div  class="col-md-11"> <input name="imgs[]" type="file"> <small class="text-danger"></small> </div></td> </tr>'); //add input box
	}
	});
	
	$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
	
	var remo = $(this).parent().parent().parent().hide('slow').remove();
	x--;
	})
	});
</script>