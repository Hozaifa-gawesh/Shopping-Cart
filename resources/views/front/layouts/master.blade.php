@php $setting = \App\Model\Contact::first(); @endphp
<!Doctype Html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>

    <meta name="keywords" content="">
    <meta name="description" content="">

    <meta name="author" content="Hoziafa-Ramadan">

    <!--============ IE FIX==============-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--==============FIRST MOBILE=============-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Include Bootstrap And Font Awesome -->
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/font-awesome.min.css">

    <!-- Include Slider OWL -->
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/owl.theme.css">

    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/responsiveslides.css">

    @yield('css')

    <!-- Include Style And Responsive -->
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/responsive.css">

    <link rel="shortcut icon" href="{{ asset('images/setting/'.$setting->favicon) }}" />

    <!-- Include Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins|Montserrat">
</head>

<body>

<div class="wrapper">

    <!-- Start Header -->
    <div class="header">
        <div class="top-bar">
            <div class="container">
                <div class="social-header">
                    <ul>
                        @if($setting->facebook != null)
                            <li><a href="{{ $setting->facebook }}"><i class="fa fa-facebook"></i></a></li>
                        @endif

                        @if($setting->twitter != null)
                            <li><a href="{{ $setting->twitter }}"><i class="fa fa-twitter"></i></a></li>
                        @endif

                        @if($setting->instagram != null)
                            <li><a href="{{ $setting->instagram }}"><i class="fa fa-instagram"></i></a></li>
                        @endif

                        @if($setting->youtube != null)
                            <li><a href="{{ $setting->youtube }}"><i class="fa fa-youtube"></i></a></li>
                        @endif

                    </ul>
                </div><!-- /.social-header -->

                <div class="lang-account">
                    <ul>
                        @guest
                        <li class="top-link"><a class="link" href="{{ url('login') }}"><i class="fa fa-sign-in"></i> Login </a></li>
                        <li class="top-link"><a class="link" href="{{ url('register') }}"><i class="fa fa-user-plus"></i> Register </a></li>
                        @else
                        <li class="dropdown top-link">
                            <a href="#" class="dropdown-toggle link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                @if(auth()->user()->image != null)
                                    <img class="img_user" src="{{ asset('images/users/'.auth()->user()->image) }}">
                                @else
                                    <i class="fa fa-user"></i>
                                @endif
                                My Account
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('profile') }}"><i class="fa fa-user"></i> Profile</a></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();"
                                    >
                                        <i class="fa fa-sign-out"></i> Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <li class="top-link"><a class="link" href="{{ url('orders') }}"><i class="fa fa-shopping-cart"></i> My Orders </a></li>
                        @endguest
                    </ul>

                    <div class="clear"></div>
                </div><!-- /.lang-account -->

                <div class="clear"></div><!-- /.clear -->
            </div><!-- /.container -->
        </div><!-- /.top-header -->


        <div class="top-header">
            <div class="container">
                <div class="logo">
                    <a href="{{ url('/') }}"><img src="{{ asset('images/setting/'.$setting->logo) }}"></a>
                </div><!-- /.logo -->

                <div class="links-mobile">
                    <i class="fa fa-bars"></i>
                </div><!-- /.links-mobile -->

                <!-- Start Links Menu Mobile -->
                <div class="links-menu-mobile">
                    <h3>MENU <span>close</span></h3>
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('about') }}">About Us</a></li>
                        <li><a href="{{ url('products') }}">Products</a></li>
                        <li><a href="{{ url('contact') }}">Contact Us</a></li>
                    </ul>
                </div>
                <!-- End Links Menu Mobile -->

                <div class="search">
                    <form action="{{ url('search') }}" method="get">
                        <input type="search" name="search" value="{{ isset($search) ? $search : '' }}" placeholder="Search Here...">
                        <span><i class="fa fa-search"></i></span>
                    </form>
                </div><!-- /.search -->

                <div class="clear"></div>

            </div><!-- /.container -->
        </div><!-- /.top-header -->


        <div class="header-bottom">
            <div style="position:relative;" class="container">
                <div class="links-navbar">
                    <div class="categories">
                        <p><span></span> Show By Categories</p>

                        @php
                            // Get latest 7 Categories
                            $categories = \App\Model\Categories::limit(7)->get();
                        @endphp

                        <div class="links-category" style="display: none;">
                            <ul>
                                @foreach($categories as $category)
                                    <li><a href="{{ url('categories/'.$category->slug) }}">{{ $category->title }}</a></li>
                                @endforeach
                                <li><a href="{{ url('categories') }}"><i class="fa fa-plus-circle"></i> Show More</a></li>
                            </ul>
                        </div><!-- /.links-category -->
                    </div><!-- /.categories -->

                    <div class="links">
                        <ul>
                            <li {{ Request::is('/') ? 'class=active' : '' }} {{ Request::is('home') ? 'class=active' : '' }}><a href="{{ url('/') }}">Home</a></li>
                            <li {{ Request::is('about') ? 'class=active' : '' }}><a href="{{ url('about') }}">About Us</a></li>
                            <li {{ Request::is('brands*') ? 'class=active' : '' }}><a href="{{ url('brands') }}">Brands</a></li>
                            <li {{ Request::is('products*') ? 'class=active' : '' }}><a href="{{ url('products') }}">Products</a></li>
                            <li {{ Request::is('contact') ? 'class=active' : '' }}><a href="{{ url('contact') }}">Contact Us</a></li>
                        </ul>
                    </div><!-- /.links -->

                    <div class="clear"></div><!-- /.clear -->
                </div>

                <div class="my_cart">
                    <a href="{{ url('cart') }}">
                        <img src="{{ asset('front/assets/images/icon/shopping-bag.png') }}">
                        <span class="count_shopping">{{ auth()->check() ? \App\Model\Cart::where('user_id', auth()->user()->id)->count() : collect(Session::get('cart'))->count() }}</span>
                    </a>
                </div>
            </div><!-- /.container -->
        </div><!-- /.header-bottom -->
    </div>
    <!-- End Header -->


    @yield('content')


    <!-- Start Footer -->
    <section class="footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4">
                    <div class="about-contact">
                        <h3>About Handmade</h3>

                        <img src="{{ asset('images/setting/'.$setting->logo) }}">

                        <p>
                            Handmade Design is the largest E-commerce platform in the Arab world, featuring more than 2,000 products across categories such as , All about handmade from accessories,
                        </p>
                    </div>
                </div><!-- /.col-md-4 -->


                <div class="col-md-4">
                    <h3>Site Map</h3>
                    <div class="cor-info">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('about') }}">About Us</a></li>
                            <li><a href="{{ url('products') }}">Products</a></li>
                            <li><a href="{{ url('contact') }}">Contact Us</a></li>
                        </ul>
                    </div><!-- /.cor-info -->
                </div><!-- /.col-md-4 -->


                <div class="col-md-4">
                    <h3>Contact Us</h3>
                    <div class="contact">
                        <ul>
                            <li>
                                <i class="fa fa-home"></i>

                                <div class="info-contact">
                                    <p><strong>ADDRESS:</strong> {{ $setting->address }} </p>
                                </div><!-- /.info-contact -->
                                <div class="clear"></div>
                            </li>

                            <li>
                                <i class="fa fa-phone"></i>

                                <div class="info-contact">
                                    <p><strong>HOTLINE:</strong> {{ $setting->phone_1 }} <br>{{ $setting->phone_2 != null ? $setting->phone_2 : '' }}</p>
                                </div><!-- /.info-contact -->
                                <div class="clear"></div>
                            </li>


                            <li>
                                <i class="fa fa-envelope"></i>

                                <div class="info-contact">
                                    <p><strong>EMAIL:</strong> {{ $setting->email_1 }} <br>  {{ $setting->email_2 != null ? $setting->email_2 : '' }} </p>
                                </div><!-- /.info-contact -->
                                <div class="clear"></div>
                            </li>
                        </ul>

                        <div class="clear"></div>
                    </div><!-- /.contact -->


                </div><!-- /.col-md-4 -->






            </div><!-- /.row -->
        </div><!-- /.container -->

        <div class="copyright">
            <div class="container">
                <p>Copyright © <?php echo date('Y'); ?> <a target="_blank" href="http://www.linkedin.com/in/hozaifa-gawesh-6b301510a/">Hozaifa Ramadan.</a> All Rights Reserved</p>

                <div class="social-footer">
                    @if($setting->facebook != null)
                        <a href="{{ $setting->facebook }}"><i class="fa fa-facebook"></i></a>
                    @endif

                    @if($setting->twitter != null)
                        <a href="{{ $setting->twitter }}"><i class="fa fa-twitter"></i></a>
                    @endif

                    @if($setting->youtube != null)
                        <a href="{{ $setting->youtube }}"><i class="fa fa-youtube"></i></a>
                    @endif

                    @if($setting->instagram != null)
                        <a href="{{ $setting->instagram }}"><i class="fa fa-instagram"></i></a>
                    @endif

                </div><!-- /.social-footer -->

                <div class="clear"></div>
            </div><!-- /.container -->
        </div><!-- /.copyright -->
    </section>
    <!-- End Footer -->


    <div class="messages_alert">
        <div class="success_msg">
            <p><span></span><i class="fa fa-check"></i> </p>
            <div class="clear"></div>
        </div>

        <div class="error_msg">
            <p><span></span> <i class="fa fa-close"></i> </p>
            <div class="clear"></div>
        </div>
    </div>

</div>



<script src="{{ asset('front') }}/assets/js/jquery-3.1.1.min.js"></script>
<script src="{{ asset('front') }}/assets/js/bootstrap.min.js"></script>
<script src="{{ asset('front') }}/assets/js/owl.carousel.min.js"></script>
<script src="{{ asset('front') }}/assets/js/responsiveslides.min.js"></script>
@yield('js')

<script>
    $(document).ready(function () {
        $('.added_cart ').click(function () {
            return false;
        });

        $('.store_cart').click(function () {
            var product = $(this);
            var loading = product.children('.loading_cart');
            var added = product.children('.added_cart');

            $.ajax({
                url: '{{ url('cart/add') }}',
                type: 'post',
                dataType: 'json',
                beforeSend: function () {
                    loading.show();
                },
                data: {'product': product.attr('data-id'), _token: '{{csrf_token()}}'},
                success: function (data) {
                    loading.hide();
                    if(data.status === true) {
                        $('.count_shopping').html(data.cart);
                        added.show();

                        $('.success_msg p span').html(data.message);
                        $('.success_msg').slideDown(300);
                        setTimeout(function() {
                            $('.success_msg').slideUp(300);
                        }, 3000)

                    } else {

                        if(data.messages) {
                            $('.error_msg p span').html(data.messages.product);
                        } else {
                            $('.error_msg p span').html(data.message);
                        }
                        $('.error_msg').slideDown(300);
                        setTimeout(function() {
                            $('.error_msg').slideUp(300);
                        }, 3000)
                    }
                }
            });
        });
    });
</script>

<script src="{{ asset('front') }}/assets/js/work.js"></script>
</body>
</html>