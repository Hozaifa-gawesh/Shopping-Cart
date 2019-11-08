@extends('front.layouts.master')

@section('title')
    E-Commerce | Shopping Cart
@stop

@section('content')

    <!-- Start Slider -->
    <section class="slider">
        <div class="callbacks_container">
            <ul class="rslides" id="slider">
                <li>
                    <a href="#">
                        <img src="{{ asset('front') }}/assets/images/slider/1.jpg">
                    </a>
                </li>

                <li>
                    <a href="#">
                        <img src="{{ asset('front') }}/assets/images/slider/2.jpg">
                    </a>
                </li>

                <li>
                    <a href="#">
                        <img src="{{ asset('front') }}/assets/images/slider/3.jpg">
                    </a>
                </li>

                <li>
                    <a href="#">
                        <img src="{{ asset('front') }}/assets/images/slider/4.jpg">
                    </a>
                </li>

                <li>
                    <a href="#">
                        <img src="{{ asset('front') }}/assets/images/slider/5.jpg">
                    </a>
                </li>

            </ul>

            <div class="clear"></div>
        </div>
    </section>
    <!-- End Slider -->

    <div class="clear"></div>

    <!-- Start Section How We are -->
    <section class="how-we-are">
        <div class="container">
            <div class="heading-section">
                <h2>Who We Are</h2>
                <div class="border-heading"></div>
            </div><!-- /.heading-section -->

            <p>
                Handmade Design is the largest E-commerce platform in the Arab world, featuring more than 2,000 products across categories such as , All about handmade from accessories, watches, perfumery, etc. Handmade Design attracts over 24 thousand visits per month and is fast growing as more consumers shop online in the Arab world.
            </p>
        </div><!-- /.container -->

        <div class="features">
            <div class="overlay-features">
                <div class="container">
                    <div class="row">

                        <div class="col-md-4">
                            <div class="feature">
                                <div class="icon-feature">
                                    <img src="{{ asset('front') }}/assets/images/icon/quality.png">
                                </div><!-- /.icon-feature -->

                                <div class="info-feature">
                                    <h3>quality</h3>
                                    <p>
                                        We offer products of excellent quality, high quality, and wide variety to promote a better life for everyone and everywhere.
                                    </p>
                                </div><!-- /.info-feature -->
                            </div><!-- /.feature -->
                        </div><!-- /.col-md-4 -->


                        <div class="col-md-4">
                            <div class="feature">
                                <div class="icon-feature">
                                    <img src="{{ asset('front') }}/assets/images/icon/guarantee.png">
                                </div><!-- /.icon-feature -->

                                <div class="info-feature">
                                    <h3>guarantee</h3>
                                    <p>
                                        We provide comfort and confidence to the customer as they are provided by the shops so we always strive to offer the best products.
                                    </p>
                                </div><!-- /.info-feature -->
                            </div><!-- /.feature -->
                        </div><!-- /.col-md-4 -->


                        <div class="col-md-4">
                            <div class="feature">
                                <div class="icon-feature">
                                    <img src="{{ asset('front') }}/assets/images/icon/coin.png">
                                </div><!-- /.icon-feature -->

                                <div class="info-feature">
                                    <h3>Price</h3>
                                    <p>
                                        We offer lowest and best price and best services to meet customer requirements and customer satisfaction.
                                    </p>
                                </div><!-- /.info-feature -->
                            </div><!-- /.feature -->
                        </div><!-- /.col-md-4 -->

                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.overlay-features -->
        </div><!-- /.features -->
    </section>
    <!-- End Section How We are -->


    <!-- Start Latest Products -->
    <section class="latest-products">
        <div class="container">
            <div class="heading-section" style="margin-bottom: 30px">
                <h2>Latest Products</h2>
                <div class="border-heading"></div>
            </div><!-- /.heading-section -->

            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-4 col-sm-6">
                        <div class="product">
                            @if($product->discount !== 0)
                                <div class="offer"><span>-{{ $product->discount }}%</span></div>
                            @endif

                            <div class="image-product">
                                <img src="{{ asset('images/products/'.$product->image) }}">

                                <div class="overlay-product">
                                    <a href="{{ url('products/'.$product->slug) }}" title="{{ $product->title }}"><div class="icon-product"><i class="fa fa-link"></i></div></a>
                                </div><!-- /.overlay-product -->
                            </div><!-- /.image-product -->

                            <div class="info-product">
                                <h3>{{ $product->title }}</h3>
                                <h5><a href="{{ url('brands/'.$product->brand_slug) }}" class="view_brand" title="View Brand">{{ $product->brand }}</a></h5>
                                @if($product->discount === 0)
                                    <p>
                                        <span class="color">{{ $product->price }} L.E</span>
                                    </p>
                                @else
                                    <p>
                                        <span class="color">{{ $product->price_discount }} L.E</span>
                                        <span class="dis">{{ $product->price }} L.E</span>
                                    </p>
                                @endif

                                <div class="controls_product">
                                    <a href="{{ url('products/'.$product->slug) }}" title="View Details" class="view_details">
                                        <span class="text_link"><i class="fa fa-eye"></i> View Details</span>
                                    </a>

                                    <a href="javascript:;" title="Add to cart" data-id="{{ $product->id }}" class="add_cart store_cart">
                                        <span class="text_link"><i class="fa fa-shopping-cart"></i> Add to cart</span>

                                        <div class="loading_cart">
                                            <img src="{{ asset('images/loading.gif') }}">
                                        </div>

                                        @if(Session::has('cart') && array_key_exists($product->id, Session::get('cart')))
                                            <div title="Added Successfully" class="added_cart cart_view" style="display: block">
                                                <i class="fa fa-shopping-cart"></i> Added
                                            </div>
                                        @endif

                                        <div title="Added Successfully" class="added_cart cart_view">
                                            <i class="fa fa-shopping-cart"></i> Added
                                        </div>
                                    </a>
                                </div>
                            </div><!-- /.info-product -->
                        </div><!-- /.product -->
                    </div><!-- /.col-md-4 -->
                @endforeach
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
    <!-- End Latest Products -->

@stop