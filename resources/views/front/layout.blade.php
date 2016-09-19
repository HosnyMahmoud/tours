<?php use App\Settings; ?>
<?php $settings = Settings::first(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>@yield('title') | {{$settings['site_name_'.Session::get('local')]}} </title>
        

        <!-- CSS -->
        {!!Html::style('front/css/bootstrap.min.css') !!}
        @if(Session::get('local') == 'ar')
            {!!Html::style('front/css/bootstrap-rtl.min.css') !!}
        @endif
        {!!Html::style('front/fonts/font-awesome-4.6.3/css/font-awesome.min.css') !!}
        {!!Html::style('front/js/masterslider/style/masterslider.css') !!}
        {!!Html::style('front/js/masterslider/skins/default/style.css') !!}
        {!!Html::style('front/css/owl.carousel.css') !!}
        {!!Html::style('front/css/prettyPhoto.css') !!}
        {!!Html::style('front/css/animate.css') !!}
        {!!Html::style('front/css/main.css') !!}
       
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="loading">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                </div>
            </div>
        </div>
        
        <header>
            <div class="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8">
                            <ul class="contact-info">
                                <li><i class="fa fa-envelope-square" aria-hidden="true"></i><span>voyageapp.travel@gmail.com</span></li>
                                <li><i class="fa fa-phone-square" aria-hidden="true"></i><span>0100 008 5567 - 0109 270 2914</span></li>
                                <li class="social">
                                    <a target="_blank" href="{{$settings['facebook']}}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a target="_blank" href="{{$settings['twitter']}}"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a target="_blank" href="{{$settings['google_Plus']}}"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                    <a target="_blank" href="{{$settings['linkedIn']}}"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                </li>
                                    <li class="social">
                                        
                                    <a href="{{Url('/')}}/lang/ar"><img src="{{Url('/')}}/back/assets/global/img/flags/eg.png" alt=""></a>

                                    <a href="{{Url('/')}}/lang/en"><img src="{{Url('/')}}/back/assets/global/img/flags/us.png" alt=""></a>
                                
                                    </li>
                            </ul>
                        </div>
                        <div class="col-sm-4 text-left">
                            <a href="#" class="btn-login">{{Lang::get('assets.login')}}</a>
                            <a href="#" class="btn-register">{{Lang::get('assets.register')}}</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <nav class="navbar navbar-default">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"><img src="{{Url('/')}}/front/images/logo.png" alt=""></a>
                    </div>
                    
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-left">
                            <li class="{{(Request::is('/'))?'active':''}}"><a href="{{Url('/')}}">{{Lang::get('assets.index')}}</a></li>
                            <li class="{{(Request::is('about*'))?'active':''}}"><a href="#">{{Lang::get('assets.about')}}</a></li>
                            <li class="{{(Request::is('services*'))?'active':''}}"><a href="#services">{{Lang::get('assets.services')}}</a></li>
                            <li class="{{(Request::is('travels*'))?'active':''}}"><a href="{{Url('/')}}/travels">{{Lang::get('assets.offers')}}</a></li>
                            <li class="{{(Request::is('hotels*'))?'active':''}}"><a href="#">{{Lang::get('assets.hotels')}}</a></li>
                            <li class="{{(Request::is('contact*'))?'active':''}}"><a href="#">{{Lang::get('assets.contact')}}</a></li>
                            <li><a href="#search"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container -->
            </nav>
        </header>
        
        <div id="search">
            <button type="button" class="close">×</button>
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <form>
                            <input type="search" placeholder="ادخل كلمة البحث" />
                            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
            @yield('content')
        
        <footer>
            <div class="container">
                <div class="top-footer">
                    <div class="row">
                        <div class="col-md-4 about">
                            <img src="{{Url('/')}}/front/images/logo.png" alt="">
                            <p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام "هنا يوجد محتوى نصي</p>
                            <div class="app-btns">
                                <a href="#" target="_blank"><img src="{{Url('/')}}/front/images/app-store.png"></a>
                                <a href="#" target="_blank"><img src="{{Url('/')}}/front/images/google-play.png"></a>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-offset-1">
                            <h3 class="widget-ttl">{{Lang::get('assets.news')}}</h3>
                            <div class="recent-posts">
                                <div class="post">
                                    <a href="#" class="post-thumb"><img src="{{Url('/')}}/front/images/post-1.jpg" alt=""></a>
                                    <h4><a href="#">هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما</a></h4>
                                </div>
                                <div class="post">
                                    <a href="#" class="post-thumb"><img src="{{Url('/')}}/front/images/post-2.jpg" alt=""></a>
                                    <h4><a href="#">هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما</a></h4>
                                </div>
                                <div class="post">
                                    <a href="#" class="post-thumb"><img src="{{Url('/')}}/front/images/post-3.jpg" alt=""></a>
                                    <h4><a href="#">هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-md-offset-1">
                            <h3 class="widget-ttl">{{Lang::get('assets.links')}}</h3>
                            <ul class="links">
                                <li><a href="#">{{Lang::get('assets.index')}}</a></li>
                                <li><a href="#">{{Lang::get('assets.about')}}</a></li>
                                <li><a href="#">{{Lang::get('assets.services')}}</a></li>
                                <li><a href="#">{{Lang::get('assets.offers')}}</a></li>
                                <li><a href="#">{{Lang::get('assets.hotels')}}</a></li>
                                <li><a href="#">{{Lang::get('assets.contact')}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="bottom-footer">
                    <div class="site-rights">
                        <p style="margin: 0;">{{Lang::get('assets.app_copyrights')}}</p>
                    </div>|
                    <div class="sawa4-rights">
                        <span>{{Lang::get('assets.copyrights')}}</span>
                        <span class="sawa4">
                            <span class="sawa4-ttl">{{Lang::get('assets.sawa4')}}</span>
                            <div class="sawa4-info">
                                <div class="info-wrap">
                                    <span>{{Lang::get('assets.about_sawa4')}}</span>
                                    <div class="social-btns">
                                        <a target="_blank" href="https://www.facebook.com/Sawa4.com.eg" title="فيسبوك"><i class="fa fa-facebook-square"></i></a>
                                        <a target="_blank" href="https://twitter.com/_sawa4" title="تويتر"><i class="fa fa-twitter-square"></i></a>
                                        <a target="_blank" href="http://www.sawa4.com.eg" title="موقع سوافور"><i class="fa fa-external-link-square"></i></a>
                                    </div>
                                </div>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
        </footer>
        
        <!-- JavaScript -->
        {!!Html::script('front/js/jquery.min.js') !!}
        {!!Html::script('front/js/masterslider/masterslider.min.js') !!}
        {!!Html::script('front/js/masterslider/jquery.easing.min.js') !!}
        {!!Html::script('front/js/owl.carousel.min.js') !!}
        {!!Html::script('front/js/jquery.prettyPhoto.js    ') !!}
        {!!Html::script('front/js/wow.min.js') !!}
        {!!Html::script('front/js/bootstrap.min.js') !!}
        {!!Html::script('front/js/main.js') !!}
      
    </body>
</html>