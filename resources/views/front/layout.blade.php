<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>سوا ترافيل | الصفحة غير موجودة</title>
        
        <!-- CSS -->
        {!!Html::style('front/css/bootstrap.min.css') !!}
        {!!Html::style('front/css/bootstrap-rtl.min.css') !!}
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
                                <li><i class="fa fa-envelope-square" aria-hidden="true"></i><span>info@sawatravel.com</span></li>
                                <li><i class="fa fa-phone-square" aria-hidden="true"></i><span>0100 008 5567 - 0109 270 2914</span></li>
                                <li class="social">
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-4 text-left">
                            <a href="#" class="btn-login">تسجيل دخول</a>
                            <a href="#" class="btn-register">عضوية جديدة</a>
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
                            <li class="active"><a href="#">الرئيسية</a></li>
                            <li><a href="#">عن الشركة</a></li>
                            <li><a href="#">الخدمات</a></li>
                            <li><a href="#">آخر العروض</a></li>
                            <li><a href="#">حجز فنادق</a></li>
                            <li><a href="#">اتصل بنا</a></li>
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
                            <h3 class="widget-ttl">أخبار الشركة</h3>
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
                            <h3 class="widget-ttl">روابط</h3>
                            <ul class="links">
                                <li><a href="#">الرئيسية</a></li>
                                <li><a href="#">عن الشركة</a></li>
                                <li><a href="#">آخر الفنادق</a></li>
                                <li><a href="#">تذاكر طيران</a></li>
                                <li><a href="#">اتصل بنا</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="bottom-footer">
                    <div class="site-rights">
                        <p style="margin: 0;">سوا ترافيل للسياحة &copy; 2016</p>
                    </div>|
                    <div class="sawa4-rights">
                        <span>تصميم وتطوير</span>
                        <span class="sawa4">
                            <span class="sawa4-ttl">سوافور</span>
                            <div class="sawa4-info">
                                <div class="info-wrap">
                                    <span>سوافور هى مؤسسة رائدة فى مجال استضافة المواقع وحلول الويب</span>
                                    <div class="social-btns">
                                        <a href="https://www.facebook.com/Sawa4.com.eg" title="فيسبوك"><i class="fa fa-facebook-square"></i></a>
                                        <a href="https://twitter.com/_sawa4" title="تويتر"><i class="fa fa-twitter-square"></i></a>
                                        <a href="http://www.sawa4.com.eg" title="موقع سوافور"><i class="fa fa-external-link-square"></i></a>
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