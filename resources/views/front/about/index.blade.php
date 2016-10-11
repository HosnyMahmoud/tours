@extends('front.layout')
@section('title',Lang::get('about.title'))
@section('content')

     <section class="content">
            <div class="container">
                <div class="page-ttl">
                    <h1>{!!Lang::get('about.title')!!}</h1>
                    <ol class="breadcrumb">
                        <li><a href="{{Url('/')}}">{!!Lang::get('index.title')!!}</a></li>
                        <li class="active">{!!Lang::get('about.title')!!}</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
                
                <div class="about-wrap">
                    <p>{{$settings['site_desc_'.Session::get('local')]}}</p>
                    <br><br>
                    <div class="row">
                        @foreach($abouts as $about)
                        <div class="col-sm-4">
                            <i class="fa fa-info" aria-hidden="true"></i>
                            <h3>{{$about['title_'.Session::get('local')]}}</h3>
                            <p>{{$about['content_'.Session::get('local')]}}</p>
                        </div>
                        @endforeach
                    </div>
                    
                    
                </div>
                
            </div>
        </section>
        

@endsection
@stop