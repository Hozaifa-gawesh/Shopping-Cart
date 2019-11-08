@php $setting = \App\Model\Contact::first(); @endphp
<!DOCTYPE html>
<html>

<head>
    <title> @yield('title') </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END  MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ asset('admin') }}/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ asset('admin') }}/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->

    <!-- BEGIN THEME {{ asset('admin') }}/assets/global STYLES -->
    <link href="{{ asset('admin') }}/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{ asset('admin') }}/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME {{ asset('admin') }}/assets/global STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->

    <link href="{{ asset('admin') }}/assets/layouts/layout3/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{ asset('admin') }}/assets/layouts/layout3/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/layouts/layout3/css/custom.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />

    <link href="{{ asset('admin') }}/assets/css/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" />

    <!-- END THEME LAYOUT STYLES -->
    @yield('css')
    <!-- BEGIN CSS STYLING -->
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/global/custom.css">
    <link href="{{ asset('admin') }}/assets/css/style.css" rel="stylesheet">

    <!-- BEGIN CSS STYLING -->

    <link rel="shortcut icon" href="{{ asset('images/setting/'.$setting->favicon) }}" />

</head>

<body>


<div class="page-wrapper">
    <div class="page-wrapper-row">
        <div class="page-wrapper-top">
            <!-- BEGIN HEADER -->
            <div class="page-header">
                <!-- BEGIN HEADER TOP -->
                <div class="page-header-top">
                    <div class="container">
                        <!-- BEGIN LOGO -->
                        <div class="page-logo">
                            <a href="{{ url('admin/home') }}">
                                E-Commerce | Shopping Cart
                            </a>
                        </div>
                        <!-- END LOGO -->
                        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                        <a href="javascript:;" class="menu-toggler"></a>
                        <!-- END RESPONSIVE MENU TOGGLER -->
                        <!-- BEGIN TOP NAVIGATION MENU -->
                        <div class="top-menu">
                            <ul class="nav navbar-nav pull-right">


                                <!-- BEGIN USER LOGIN DROPDOWN -->
                                <li class="dropdown dropdown-user dropdown-dark">
                                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                        <img alt="" class="img-circle" src="{{asset('admin/assets/img/user.png')}}">
                                        <span class="username username-hide-mobile">
                                            {{ auth()->guard('admin')->user()->username }}
                                        </span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-default">
                                        <li>
                                            <a href="{{ url('admin/profile') }}">
                                                <i class="icon-user"></i> My Profile </a>
                                        </li>

                                        <li class="divider"> </li>

                                        <li>
                                            <a href="{{url('admin/logout')}}">
                                                <i class="icon-key"></i> Log Out </a>
                                        </li>
                                    </ul>
                                </li>
                                <!-- END USER LOGIN DROPDOWN -->

                            </ul>
                        </div>
                        <!-- END TOP NAVIGATION MENU -->
                    </div>
                </div>
                <!-- END HEADER TOP -->

                <!-- BEGIN HEADER MENU -->
                <div class="page-header-menu">
                    <div class="container">
                        <!-- BEGIN HEADER SEARCH BOX -->

                        <div class="hor-menu  ">
                            <ul class="nav navbar-nav">
                                <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown {{ Request::is('admin/home') ? 'active' : '' }}">
                                    <a href="{{url('admin/home')}}"> Home
                                        <span class="arrow"></span>
                                    </a>
                                </li>

                                <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown {{ Request::is('admin/admins*') ? 'active' : '' }}">
                                    <a href="{{url('admin/admins')}}">
                                        <span>Admins</span>
                                    </a>
                                </li>

                                <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown {{ Request::is('admin/users*') ? 'active' : '' }}">
                                    <a href="{{url('admin/users')}}">
                                        <span>Users</span>
                                    </a>
                                </li>

                                <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown {{ Request::is('admin/about*') ? 'active' : '' }}">
                                    <a href="{{url('admin/about')}}">
                                        <span>About</span>
                                    </a>
                                </li>

                                <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown {{ Request::is('admin/categories*') ? 'active' : '' }}">
                                    <a href="{{url('admin/categories')}}">
                                        <span>Categories</span>
                                    </a>
                                </li>

                                <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown {{ Request::is('admin/brands*') ? 'active' : '' }}">
                                    <a href="{{url('admin/brands')}}">
                                        <span>Brands</span>
                                    </a>
                                </li>

                                <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown {{ Request::is('admin/products*') ? 'active' : '' }}">
                                    <a href="{{url('admin/products')}}">
                                        <span>Products</span>
                                    </a>
                                </li>

                                <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown {{ Request::is('admin/orders*') ? 'active' : '' }}">
                                    <a href="{{url('admin/orders')}}">
                                        <span>Orders</span>
                                    </a>
                                </li>

                                <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown {{ Request::is('admin/messages*') ? 'active' : '' }}">
                                    <a href="{{url('admin/messages')}}">
                                        <span>Messages</span>
                                    </a>
                                </li>

                                <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown {{ Request::is('admin/setting') ? 'active' : '' }}">
                                    <a href="{{url('admin/setting')}}">
                                        <span>Setting</span>
                                    </a>
                                </li>


                            </ul>
                        </div>
                        <!-- END MEGA MENU -->
                    </div>
                </div>
                <!-- END HEADER MENU -->
            </div>
            <!-- END HEADER -->
        </div>
    </div>

     @yield('content')

    <div class="page-wrapper-row">
        <div class="page-wrapper-bottom">
            <!-- BEGIN FOOTER -->
            <!-- BEGIN PRE-FOOTER -->

            <!-- END PRE-FOOTER -->
            <!-- BEGIN INNER FOOTER -->
            <div class="page-footer">
                <div class="container"> <?php echo date('Y') ?> &copy; E-Commerce Handmade | Shopping Cart. development by
                    <a target="_blank" href="http://www.linkedin.com/in/hozaifa-gawesh-6b301510a/">Hozaifa Ramadan</a>.
                </div>

            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
            <!-- END INNER FOOTER -->
            <!-- END FOOTER -->
        </div>
    </div>

</div>

<!-- BEGIN QUICK NAV -->
@yield('quick')


<!--[if lt IE 9]>
<script src="{{ asset('admin') }}/assets/global/plugins/respond.min.js"></script>
<script src="{{ asset('admin') }}/assets/global/plugins/excanvas.min.js"></script>
<script src="{{ asset('admin') }}/assets/global/plugins/ie8.fix.min.js"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
{{--<script src="{{ asset('admin') }}/assets/js/jquery.min.js" type="text/javascript"></script>--}}
<script src="{{ asset('admin') }}/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="{{ asset('admin') }}/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{ asset('admin') }}/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="{{ asset('admin') }}/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="{{ asset('admin') }}/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{{ asset('admin') }}/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset('admin') }}/assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="{{ asset('admin') }}/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="{{ asset('admin') }}/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset('admin') }}/assets/global/plugins/moment.min.js" type="text/javascript"></script>
<script src="{{ asset('admin') }}/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
<script src="{{ asset('admin') }}/assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
<script src="{{ asset('admin') }}/assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
<script src="{{ asset('admin') }}/assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
<script src="{{ asset('admin') }}/assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
<script src="{{ asset('admin') }}/assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="{{ asset('admin') }}/assets/global/plugins/horizontal-timeline/horozontal-timeline.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="{{ asset('admin') }}/assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- BEGIN PAGE LEVEL SCRIPTS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('admin') }}/assets/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->

@yield('js')

<script src="{{ asset('admin') }}/assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{ asset('admin') }}/assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
<script src="{{ asset('admin') }}/assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
<script src="{{ asset('admin') }}/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<script src="{{ asset('admin') }}/assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset('admin') }}/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script src="{{ asset('admin') }}/assets/pages/scripts/components-bootstrap-select.min.js" type="text/javascript"></script>

<script src="{{ asset('admin') }}/assets/js/bootstrap-tagsinput.js" type="text/javascript"></script>

<script src="{{ asset('admin') }}/assets/js/work.js"></script>
<!-- END CHART DESIGN -->



</body>

</html>
