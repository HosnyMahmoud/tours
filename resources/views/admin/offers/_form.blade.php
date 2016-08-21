
<div class="form-group{{ $errors->has('hotel_id') ? ' has-error' : 'hotel_id' }}">
    {!! Form::label('hotel_id', 'تحديد فندق') !!}
    {!! Form::select('hotel_id', $hotels, null, ['id' => 'hotel_id', 'class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('hotel_id') }}</small>
</div>

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


<button class="btn btn-info">
	{{ $btnName }}
</button>
