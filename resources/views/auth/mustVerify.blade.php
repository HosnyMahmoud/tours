@extends('front.layout')
  @section('title',Lang::get('loginReg.titleReg'))
  @section('content')
    <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="alert alert-danger text-center">
                            <h2>
                            <i class="fa fa-times-circle"></i>
                              {{Lang::get('assets.mustVerify')}}
                            </h2>
                            <p>
                              {{Lang::get('assets.mustVerifyMsg')}}<br>
                              
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
  @endsection
@stop