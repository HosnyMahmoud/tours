
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'الأسم') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('name') }}</small>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    {!! Form::label('email', 'البريد الألكتروني') !!}
    {!! Form::text('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('email') }}</small>
</div>

<div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
    {!! Form::label('mobile', 'رقم الموبايل') !!}
    {!! Form::text('mobile', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('mobile') }}</small>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    {!! Form::label('password', 'كلمة السر') !!}
    @if(@$type == 'edit')
        {!! Form::password('password', ['class' => 'form-control']) !!}
        @if(@$alert)
        {!!$alert!!}
        @endif
    @else
        {!! Form::password('password', ['class' => 'form-control', 'required'=>'required']) !!}   
    @endif
	
    <small class="text-danger">{{ $errors->first('password') }}</small>
</div>


<div class="form-group col-md-6">
	<button class="btn btn-primary" type="submit">
		{!! $btnName !!}
	</button>
</div>