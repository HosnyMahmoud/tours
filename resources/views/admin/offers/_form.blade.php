
<div class="form-group{{ $errors->has('hotel_id') ? ' has-error' : '' }}">
    {!! Form::label('hotel_id', 'تحديد فندق') !!}
    {!! Form::select('hotel_id', $hotels, null, ['id' => 'hotel_id', 'class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('hotel_id') }}</small>
</div>

<!-- End Section Countries ANd Cities -->

<div class="form-group{{ $errors->has('country_id') ? ' has-error' : '' }}">
    {!! Form::label('country_id', 'تحديد دولة') !!}
    {!! Form::select('country_id', $countries, null, ['id' => 'country_id', 'class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('country_id') }}</small>
</div>

<div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }}">
    {!! Form::label('city_id', 'تحديد منطقة') !!}
    {!! Form::select('city_id', $cities, null, ['id' => 'city_id', 'class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('city_id') }}</small>
</div>

<!-- End Section Countries ANd Cities -->

<div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
    {!! Form::label('type', 'نوع العرض') !!}
    {!! Form::select('type',['0'=>'عرض شهر عسل', '1'=>'رحلات حج وعمرة'], null, ['id' => 'type', 'class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('type') }}</small>
</div>

<div class="form-group{{ $errors->has('nights') ? ' has-error' : '' }}">
    {!! Form::label('nights', 'عدد الليالي ') !!}
    {!! Form::text('nights', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('nights') }}</small>
</div>


<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
    {!! Form::label('price', 'سعر العرض') !!}
    {!! Form::text('price', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('price') }}</small>
</div>

<div class="form-group{{ $errors->has('desc') ? ' has-error' : '' }}">
    {!! Form::label('desc', 'أضافة وصف العرض') !!}
    {!! Form::textarea('desc', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('desc') }}</small>
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
	{{ $btnName }}
</button>
