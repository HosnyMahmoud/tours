
<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.2
Version: 3.7.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" dir="rtl">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title> @yield('title')</title>

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
{!! Html::style('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all') !!}
{!! Html::style('back/assets/global/plugins/font-awesome/css/font-awesome.min.css') !!}
{!! Html::style('back/assets/global/plugins/simple-line-icons/simple-line-icons.min.css') !!}
{!! Html::style('back/assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css') !!}
{!! Html::style('back/assets/global/plugins/uniform/css/uniform.default.css') !!}
{!! Html::style('back/assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css') !!}
<!-- END GLOBAL MANDATORY STYLES -->
{!! Html::style('back/assets/global/plugins/dropzone/css/dropzone-rtl.css') !!}

{!! Html::style('back/assets/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css') !!}
{!! Html::style('back/assets/global/plugins/jquery-file-upload/css/jquery.fileupload.css') !!}
{!! Html::style('back/assets/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css') !!}
{!! Html::style('back/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') !!}
{!! Html::style('back/assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css') !!}
{!! Html::style('back/assets/global/plugins/jquery-tags-input/jquery.tagsinput-rtl.css') !!}
{!! Html::style('back/assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css') !!}
{!! Html::style('back/assets/global/plugins/typeahead/typeahead.css') !!}
{!! Html::style('back/assets/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css') !!}

<!-- BEGIN THEME STYLES -->
{!! Html::style('back/assets/global/css/components-md-rtl.css') !!}
{!! Html::style('back/assets/global/css/plugins-md-rtl.css') !!}
{!! Html::style('back/assets/admin/layout2/css/layout-rtl.css') !!}
{!! Html::style('back/assets/admin/layout2/css/themes/grey.css') !!}
{!! Html::style('back/assets/admin/layout2/css/custom-rtl.css') !!}
<!-- END THEME STYLES -->


<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-boxed page-header-fixed page-container-bg-solid page-sidebar-closed-hide-logo">
<!-- BEGIN HEADER -->
<div class="page-header md-shadow-z-1-i navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner container">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="index.html">
			{!! Html::image('back/assets/admin/layout2/img/logo-default.png',null,['class'=>'logo-default']) !!}
			</a>
			<div class="menu-toggler sidebar-toggler">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN PAGE ACTIONS -->
		<!-- DOC: Remove "hide" class to enable the page header actions -->
		<div class="page-actions">
			<div class="btn-group hide">
				<button type="button" class="btn btn-circle red-pink dropdown-toggle" data-toggle="dropdown">
				<i class="icon-bar-chart"></i>&nbsp;<span class="hidden-sm hidden-xs">New&nbsp;</span>&nbsp;<i class="fa fa-angle-down"></i>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li>
						<a href="javascript:;">
						<i class="icon-user"></i> New User </a>
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-present"></i> New Event <span class="badge badge-success">4</span>
						</a>
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-basket"></i> New order </a>
					</li>
					<li class="divider">
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-flag"></i> Pending Orders <span class="badge badge-danger">4</span>
						</a>
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-users"></i> Pending Users <span class="badge badge-warning">12</span>
						</a>
					</li>
				</ul>
			</div>
			<div class="btn-group">
				<button type="button" class="hidden btn btn-circle green-haze dropdown-toggle" data-toggle="dropdown">
				<i class="fa fa-plus"></i>&nbsp;<span class="hidden-sm hidden-xs">New&nbsp;</span>&nbsp;<i class="fa fa-angle-down"></i>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li>
						<a href="javascript:;">
						<i class="icon-docs"></i> New Post </a>
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-tag"></i> New Comment </a>
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-share"></i> Share </a>
					</li>
					<li class="divider">
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-flag"></i> Comments <span class="badge badge-success">4</span>
						</a>
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-users"></i> Feedbacks <span class="badge badge-danger">2</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<!-- END PAGE ACTIONS -->
		<!-- BEGIN PAGE TOP -->
		<div class="page-top">
			<!-- BEGIN HEADER SEARCH BOX -->
			<!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
			
			<!-- END HEADER SEARCH BOX -->
			<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
					
					<li class="dropdown dropdown-user">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<span class="username username-hide-on-mobile">
						{{Auth::admin()->get()->name}} </span>
						<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu dropdown-menu-default">
							<li>
								<a href="{!!Url('/')!!}/admin/logout">
								<i class="icon-key"></i> Log Out </a>
							</li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
			</div>
			<!-- END TOP NAVIGATION MENU -->
		</div>
		<!-- END PAGE TOP -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>


<div class="container">
	<!-- BEGIN CONTAINER -->
				
	<div class="page-container">
		<!-- BEGIN SIDEBAR -->
		<div class="page-sidebar-wrapper">
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<div class="page-sidebar navbar-collapse collapse">
				<!-- BEGIN SIDEBAR MENU -->
				<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
				<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
				<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
				<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
				<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
				<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->

				<!-- ********************************************* -->
				<?php 
					$pre     = Auth::admin()->get()->pre ;
					$explode = explode('|', $pre)  ;
				?>

				<ul class="page-sidebar-menu  page-sidebar-menu-compact" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				
					<!-- Home Page  -->
					<li class="start {{Request::is('admin') ? 'active' : ''}}">
						<a href="{!!Url('/')!!}/admin">
						<i class="icon-home"></i>
						<span class="title">الرئيسيه</span>
						</a>
					</li>

					@if(in_array('settings',$explode))
						<!-- Settings -->
						 <li class="start {{Request::is('admin/settings*') ? 'active' : ''}}">
							<a href="{!!Url('/')!!}/admin/settings">
							<i class="fa fa-server"></i>
							<span class="title">الإعدادات</span>
							</a>
						</li> 
					@endif
					
					<!-- Start Members -->
					<li class="{{Request::is('admin/users*') ? 'active' : ''}}">
						<a href="{!!Url('/')!!}/admin/users">
						<i class="fa fa-users" aria-hidden="true"></i>
						<span class="title">الإعضاء</span>
						</a>
					</li>
					<!-- End Members -->

					@if(in_array('admins',$explode))
						<!-- Admin -->
						<li class="{{Request::is('admin/admins*') ? 'active' : ''}}">
							<a href="{!!Url('/')!!}/admin/admins">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<span class="title">المديرين</span>
							</a>
						</li>
					@endif

					<!-- Countries and Cities -->	
					<li class="{{Request::is('admin/countries*') ? 'active' : ''}}">
						<a href="{!!Url('/')!!}/admin/countries">
						<i class="fa fa-globe" aria-hidden="true"></i>
						<span class="title">الدول والمحافظات</span>
						</a>
					</li>
					
					<li class="{{Request::is('admin/cars_brand*') ? 'active' : ''}}">
						<a href="{!!Url('/')!!}/admin/cars_brand">
						<i class="fa fa-car" aria-hidden="true"></i>
						<span class="title">السيارات</span>
						</a>
					</li> 
					
					<!--  bookings	 -->
					<li class="">
						<a href="javascript:;">
						<i class="fa fa-credit-card" aria-hidden="true"></i>
						<span class="title">الحجوزات</span>
						<span class="arrow "></span>
						</a>
						<ul class="sub-menu">
							<li>
								<a href="{!!Url('/')!!}/admin/bookings/cars">
									حجوزات السيارات
								</a>
							</li>
							<li>
								<a href="{!! Url('/') !!}/admin/bookings/hotels">
									حجوزات الفنادق
								</a>
							</li>
							<li>
								<a href="{!! Url('/') !!}/admin/bookings/travels">
									حجوزات الرحلات
								</a>
							</li>
							<li>
								<a href="{!! Url('/') !!}/admin/bookings/special-offers">
									حجوزات العروض الخاصة
								</a>
							</li>
							<li>
								<a href="{!! Url('/') !!}/admin/bookings/tickets">
									حجوزات تذاكر الطيران
								</a>
							</li>
						</ul>
					</li>
					<!--  bookings	 -->

					<li class="{{Request::is('admin/carsOffers*') ? 'active' : ''}}">
						<a href="{!!Url('/')!!}/admin/carsOffers">
						<i class="fa fa-car" aria-hidden="true"></i>
						<span class="title">عروض السيارات</span>
						</a>
					</li>

					<li class="{{Request::is('admin/hotels*') ? 'active' : ''}}">
						<a href="{!!Url('/')!!}/admin/hotels">
						<i class="fa fa-h-square" aria-hidden="true"></i>
						<span class="title">الفنادق</span>
						</a>
					</li>

					<li class="{{Request::is('admin/travels*') ? 'active' : ''}}">
						<a href="{!!Url('/')!!}/admin/travels">
						<i class="fa fa-suitcase" aria-hidden="true"></i>
						<span class="title">الرحلات</span>
						</a>
					</li>
					
					<li class="{{Request::is('admin/air_ports*') ? 'active' : ''}}">
						<a href="{!!Url('/')!!}/admin/air_ports">
						<i class="fa fa-plane" aria-hidden="true"></i>
						<span class="title">المطارات</span>
						</a>
					</li>
					
					<!-- Special Offers -->
					<li class="{{Request::is('admin/special-offers*') ? 'active' : ''}}">
						<a href="{!!Url('/')!!}/admin/special-offers">
						<i class="fa fa-table" aria-hidden="true"></i>
						<span class="title">العروض الخاصة</span>
						</a>
					</li>
				
					<li class="{{Request::is('admin/contactUs*') ? 'active' : ''}}">
						<a href="{!!Url('/')!!}/admin/contactUs">
						<i class="icon-users"></i>
						<span class="title">اتصل بنا</span>
						</a>
					</li>
						

																															
									
					<!--<li class="{{Request::is('admin/offers*') ? 'active' : ''}}">
						<a href="{!!Url('/')!!}/admin/offers">
						<i class="icon-users"></i>
						<span class="title">العروض</span>
						</a>
					</li> -->
				
				</ul>
				<!-- END SIDEBAR MENU -->
			</div>
		</div>
				<!-- ********************************************* -->

		<!-- END SIDEBAR -->
		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<div class="page-content">
				<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
				<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
								<h4 class="modal-title">Modal title</h4>
							</div>
							<div class="modal-body">
								 Widget settings form goes here
							</div>
							<div class="modal-footer">
								<button type="button" class="btn blue">Save changes</button>
								<button type="button" class="btn default" data-dismiss="modal">Close</button>
							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
				<!-- /.modal -->
				<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
				<!-- BEGIN STYLE CUSTOMIZER -->
				<div class="theme-panel hidden">
					<div class="toggler tooltips" data-container="body" data-placement="left" data-html="true" data-original-title="Click to open advance theme customizer panel">
						<i class="icon-settings"></i>
					</div>
					<div class="toggler-close">
						<i class="icon-close"></i>
					</div>
					<div class="theme-options">
						<div class="theme-option theme-colors clearfix">
							<span>
							THEME COLOR </span>
							<ul>
								<li class="color-default current tooltips" data-style="default" data-container="body" data-original-title="Default">
								</li>
								<li class="color-grey tooltips" data-style="grey" data-container="body" data-original-title="Grey">
								</li>
								<li class="color-blue tooltips" data-style="blue" data-container="body" data-original-title="Blue">
								</li>
								<li class="color-dark tooltips" data-style="dark" data-container="body" data-original-title="Dark">
								</li>
								<li class="color-light tooltips" data-style="light" data-container="body" data-original-title="Light">
								</li>
							</ul>
						</div>
						<div class="theme-option">
							<span>
							Theme Style </span>
							<select class="layout-style-option form-control input-small">
								<option value="square" selected="selected">Square corners</option>
								<option value="rounded">Rounded corners</option>
							</select>
						</div>
						<div class="theme-option">
							<span>
							Layout </span>
							<select class="layout-option form-control input-small">
								<option value="fluid" selected="selected">Fluid</option>
								<option value="boxed">Boxed</option>
							</select>
						</div>
						<div class="theme-option">
							<span>
							Header </span>
							<select class="page-header-option form-control input-small">
								<option value="fixed" selected="selected">Fixed</option>
								<option value="default">Default</option>
							</select>
						</div>
						<div class="theme-option">
							<span>
							Top Dropdown</span>
							<select class="page-header-top-dropdown-style-option form-control input-small">
								<option value="light" selected="selected">Light</option>
								<option value="dark">Dark</option>
							</select>
						</div>
						<div class="theme-option">
							<span>
							Sidebar Mode</span>
							<select class="sidebar-option form-control input-small">
								<option value="fixed">Fixed</option>
								<option value="default" selected="selected">Default</option>
							</select>
						</div>
						<div class="theme-option">
							<span>
							Sidebar Style</span>
							<select class="sidebar-style-option form-control input-small">
								<option value="default" selected="selected">Default</option>
								<option value="compact">Compact</option>
							</select>
						</div>
						<div class="theme-option">
							<span>
							Sidebar Menu </span>
							<select class="sidebar-menu-option form-control input-small">
								<option value="accordion" selected="selected">Accordion</option>
								<option value="hover">Hover</option>
							</select>
						</div>
						<div class="theme-option">
							<span>
							Sidebar Position </span>
							<select class="sidebar-pos-option form-control input-small">
								<option value="left" selected="selected">Left</option>
								<option value="right">Right</option>
							</select>
						</div>
						<div class="theme-option">
							<span>
							Footer </span>
							<select class="page-footer-option form-control input-small">
								<option value="fixed">Fixed</option>
								<option value="default" selected="selected">Default</option>
							</select>
						</div>
					</div>
				</div>
				<!-- END STYLE CUSTOMIZER -->
				<!-- BEGIN PAGE HEADER-->
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div class="row">
					<div class="col-md-12" style="min-height:786px">
	      				@yield('content')
	      				
					</div>
				</div>
				<!-- END PAGE CONTENT-->
			</div>
		</div>
		<!-- END CONTENT -->
		<!-- BEGIN QUICK SIDEBAR -->
		<!--Cooming Soon...-->
		<!-- END QUICK SIDEBAR -->
	</div>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	<div class="page-footer">
		<div class="page-footer-inner">
			تصميم وبرمجة  <a href="http://sawa4.com.eg" target="_balnk">مؤسسة سوافور</a> &copy; 2016.
		</div>
		<div class="scroll-to-top">
			<i class="icon-arrow-up"></i>
		</div>
	</div>
	<!-- END FOOTER -->
</div>
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->

{!! Html::script("back/assets/global/plugins/jquery.min.js") !!}
{!! Html::script("back/assets/global/plugins/jquery-migrate.min.js") !!}
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
{!! Html::script("back/assets/global/plugins/jquery-ui/jquery-ui.min.js") !!}
{!! Html::script("back/assets/global/plugins/bootstrap/js/bootstrap.min.js") !!}
{!! Html::script("back/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js") !!}
{!! Html::script("back/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js") !!}
{!! Html::script("back/assets/global/plugins/jquery.blockui.min.js") !!}
{!! Html::script("back/assets/global/plugins/jquery.cokie.min.js") !!}
{!! Html::script("back/assets/global/plugins/uniform/jquery.uniform.min.js") !!}
{!! Html::script("back/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js") !!}
<!-- END CORE PLUGINS -->
{!! Html::script("ckeditor/ckeditor.js") !!}
{!! Html::script("back/assets/global/plugins/jquery-tags-input/jquery.tagsinput.min.js") !!}
{!! Html::script("back/assets/admin/pages/scripts/components-form-tools.js") !!}
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
{!! Html::script("back/assets/global/plugins/fuelux/js/spinner.min.js") !!}
{!! Html::script("back/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js") !!}
{!! Html::script("back/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js") !!}
{!! Html::script("back/assets/global/plugins/jquery.input-ip-address-control-1.0.min.js") !!}
{!! Html::script("back/assets/global/plugins/bootstrap-pwstrength/pwstrength-bootstrap.min.js") !!}
{!! Html::script("back/assets/global/plugins/jquery-tags-input/jquery.tagsinput.min.js") !!}
{!! Html::script("back/assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js") !!}
{!! Html::script("back/assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js") !!}
{!! Html::script("back/assets/global/plugins/typeahead/handlebars.min.js") !!}
{!! Html::script("back/assets/global/plugins/typeahead/typeahead.bundle.min.js") !!}
{!! Html::script("back/assets/global/plugins/ckeditor/ckeditor.js") !!}

{!! Html::script("back/assets/global/plugins/dropzone/dropzone.js") !!}

{!! Html::script("back/assets/global/scripts/metronic.js") !!}
{!! Html::script("back/assets/admin/layout4/scripts/layout.js") !!}
{!! Html::script("back/assets/admin/layout4/scripts/demo.js") !!}
{!! Html::script("back/assets/admin/pages/scripts/form-dropzone.js") !!}

<script>
      jQuery(document).ready(function() {    
         Metronic.init(); // init metronic core components
		Layout.init(); // init current layout
		Demo.init(); // init demo features
        ComponentsFormTools.init();

      });
	
	

</script>

<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>