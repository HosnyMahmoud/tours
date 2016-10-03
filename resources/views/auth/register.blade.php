@extends('front.layout')
@section('title',Lang::get('loginReg.titleReg'))

@section('content')

    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="form-wrap">
                        <h1 class="form-ttl"><i class="fa fa-user-plus" aria-hidden="true"></i><br>{{Lang::get('loginReg.titleReg')}}</h1>
                        {!!Form::open(['files'=>true])!!}
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    {!!Lang::get('assets.whoops')!!}
                                    <br>
                                </div>
                            @endif
                           
                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="">{{Lang::get('loginReg.name')}}</label>
                                {!! Form::text('name',null,['class'=>'form-control']) !!}
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            </div>
                            <div class="form-group {{ $errors->has('img') ? ' has-error' : '' }}">
                                <label for="">{{Lang::get('loginReg.image')}}</label>
                                {!!Form::file('img')!!}
                                <small class="text-danger">{{ $errors->first('img') }}</small>
                            </div>
                            <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="">{{Lang::get('loginReg.username')}}</label>
                                {!! Form::text('username',null,['class'=>'form-control']) !!}
                                <small class="text-danger">{{ $errors->first('username') }}</small>
                            </div>
                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="">{{Lang::get('loginReg.email')}}</label>
                                 {!! Form::email('email',null,['class'=>'form-control']) !!}
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                            </div>
                            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="">{{Lang::get('loginReg.password')}}</label>
                                {!! Form::password('password',['class'=>'form-control']) !!}
                                <small class="text-danger">{{ $errors->first('password') }}</small>
                            </div>
                            <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="">{{Lang::get('loginReg.passwordConf')}}</label>
                                {!! Form::password('password_confirmation',['class'=>'form-control']) !!}
                                <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                            </div>
                            <div class="form-group {{ $errors->has('city') ? ' has-error' : '' }}">
                                <label for="">{{Lang::get('loginReg.city')}}</label>
                                {!!Form::select('city',$regions,null,['class'=>'form-control'])!!}
                                <small class="text-danger">{{ $errors->first('city') }}</small>
                            </div>
                            <div class="form-group {{ $errors->has('details ') ? ' has-error' : '' }}">
                                <label for="">{{Lang::get('loginReg.details')}}</label>
                                {!! Form::textarea('details',null,['class'=>'form-control','style'=>"height: 200px;"]) !!}
                                <small class="text-danger">{{ $errors->first('details ') }}</small>
                            </div>
                            <button type="submit" class="btn btn-info">{{Lang::get('loginReg.register')}}</button>
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </section>
        
                          
@endsection
@stop
