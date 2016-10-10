 @extends('front.layout')
     @section('title',Lang::get('dashboard.dashboard'))
     @section('content')
         <section class="content">
            <div class="container">
                <div class="user-dashboard">
                    <div class="row">
                       <div class="col-md-3">
                            <div class="dashboard-nav">
                                <ul>
                                    <li class="{{(Request::is('dashboard'))?'active':''}}"><a href="{{Url('/')}}/dashboard"><i class="fa fa-home fa-fw"></i> {{Lang::get('dashboard.index')}}</a></li>
                                    <li class="{{(Request::is('dashboard/reservations*'))?'active':''}}"><a href="{{Url('/')}}/dashboard/reservations"><i class="fa fa-eye fa-fw"></i> {{Lang::get('dashboard.reservations')}}</a></li>
                                    <li class="{{(Request::is('dashboard/wishlist*'))?'active':''}}"><a href="{{Url('/')}}/dashboard/wishlist"><i class="fa fa-heart fa-fw"></i> {{Lang::get('dashboard.wishlist')}}</a></li>
                                    <li class="{{(Request::is('dashboard/messages*'))?'active':''}}"><a href="{{Url('/')}}/dashboard/messages"><i class="fa fa-envelope fa-fw"></i> {{Lang::get('dashboard.messages')}}</a></li>
                                    <li class="{{(Request::is('dashboard/edit_personal*'))?'active':''}}"><a href="{{Url('/')}}/dashboard/edit_personal"><i class="fa fa-gear fa-fw"></i> {{Lang::get('dashboard.edit_personal')}}</a></li>
                                    <li class="{{(Request::is('dashboard/new_testimonial*'))?'active':''}}"><a href="{{Url('/')}}/dashboard/new_testimonial"><i class="fa fa-comments fa-fw"></i> {{Lang::get('dashboard.openion')}}</a></li>
                                    <li class="{{(Request::is('dashboard/logout*'))?'active':''}}"><a href="{{Url('/')}}/dashboard/logout"><i class="fa fa-sign-out fa-fw"></i> {{Lang::get('dashboard.logout')}}</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="dashboard-content">
                                <div class="page-bar">
                    				<ul class="page-breadcrumb">
                    					<li>
                    						<a href="{{Url('/')}}">{{Lang::get('dashboard.index')}}</a>
                    						<i class="{{Lang::get('dashboard.arrow')}}"></i>
                    					</li>
                    					<li>
                                            <a href="{{Url('/')}}/dashboard">{{Lang::get('dashboard.dashboard')}}</a>
                                        </li>
                                        <li>
                                            <span>@yield('breadcrumbs')</span>
                                        </li>
                    				</ul>	
                    			</div>
                                @yield('dashboard')
                            </div>
                        </div>
                    </div>
                </div>
                    
            </div>
        </section>
    @endsection
@stop