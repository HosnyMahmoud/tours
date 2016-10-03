					
@extends('front.layout')
@section('title',Lang::get('loginReg.titleLogin'))

@section('content')
 <section class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-wrap">
                    <h1 class="form-ttl"><i class="fa fa-lock" aria-hidden="true"></i><br>{{Lang::get('loginReg.titleLogin')}}</h1>
                    {!!Form::open()!!}
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            {!!Lang::get('assets.whoops')!!}
                            <br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <div class="form-group">
                            <label for="">{{Lang::get('loginReg.usernameOrEmail')}}</label>
                            <input type="text" name="email" class="form-control" id="" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">{{Lang::get('loginReg.password')}}</label>
                            <input type="password" name="password" class="form-control" id="" placeholder="">
                        </div>
                        <button type="submit" class="btn btn-info">{{Lang::get('loginReg.titleLogin')}}</button>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</section>
                          
@endsection
@stop