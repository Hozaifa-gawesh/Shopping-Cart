@extends('front.layouts.master')

@section('title')
    {{ $product->title }}
@stop

@section('content')


    <!-- Start Content Page -->
    <section class="content-page">
        <div class="heading-page">
            <div class="overlay-headingPage">
                <h2>{{ str_limit($product->title, 20) }}</h2>
            </div><!-- /.overlay-headingPage -->
        </div><!-- /.heading-page -->


        <div class="content">
            <div class="container">
                <div class="info-product">
                    <div class="row">

                        <div class="col-md-7">
                            <div class="information-product">
                                <h3>Details Product:</h3>
                                <h4><strong>Product Name: </strong> {{ $product->title }}</h4>

                                @if($product->discount !== 0)
                                    <h4><strong>Offer: </strong> -{{ $product->discount }}%<span></span></h4>
                                @endif

                                <h4><strong>Price: </strong>
                                    @if($product->discount === 0)
                                        <span class="color">{{ $product->price }} L.E </span>
                                    @else
                                        <span class="color">{{ $product->price_discount }} L.E </span> -
                                        <span class="dis">{{ $product->price }} L.E</span>
                                    @endif
                                </h4>

                                <h4><strong>Available: </strong> {{ $product->available == '1' ? 'Yes' : 'No' }}</h4>

                                @php $colors = explode(',', $product->colors); @endphp

                                <div class="colors_product">
                                    <h4><strong>Colors: </strong></h4>
                                    @if(count($colors) > 0)
                                    <ul>
                                        @foreach($colors as $color)
                                            <li>{{ $color }}</li>
                                        @endforeach
                                    </ul>
                                    @else
                                        ----
                                    @endif

                                    <div class="clear"></div>
                                </div>
                                <h4><strong>Description: </strong></h4>
                                <p>{!! nl2br($product->description) !!}</p>
                                <h4><strong>Brand : </strong> <a href="{{ url('brands/'.$product->brand_slug) }}">{{ $product->brand }}</a></h4>
                            </div><!-- /.information-product -->
                        </div><!-- /.col-md-7 -->

                        <div class="col-md-4">
                            <div class="img-product">
                                <img src="{{ asset('images/products/'.$product->image) }}">
                            </div><!-- /.img-product -->

                            <div class="cart_box" data-loading="test">
                                <a href="javascript:;" title="Add to cart" data-id="{{ $product->id }}" class="add_to_cart store_cart">
                                    <i class="fa fa-shopping-cart"></i> Add to cart

                                    <div class="loading_cart">
                                        <img src="{{ asset('images/loading.gif') }}">
                                    </div>

                                    @if(Session::has('cart') && array_key_exists($product->id, Session::get('cart')))
                                        <div title="Added Successfully" class="added_cart" style="display: block">
                                            <i class="fa fa-shopping-cart"></i> Added Successfully
                                        </div>
                                    @endif

                                    <div title="Added Successfully" class="added_cart">
                                        <i class="fa fa-shopping-cart"></i> Added Successfully
                                    </div>
                                </a>
                            </div>
                        </div><!-- /.col-md-4 -->

                    </div><!-- /.row -->


                    <div class="row">
                        <div class="col-md-12">
                            <div class="similar-products">
                                <h3 class="heading-similar">Similar Products: </h3>
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
                            </div>
                        </div>
                    </div>
                </div><!-- /.info-product -->
            </div><!-- /.container -->
        </div><!-- /.content -->
    </section>
    <!-- End Content Page -->


@stop
