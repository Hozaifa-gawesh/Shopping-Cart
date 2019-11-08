@extends('front.layouts.master')

@section('title')
    Search
@stop

@section('content')


    <!-- Start Content Page -->
    <section class="content-page">
        <div class="heading-page">
            <div class="overlay-headingPage">
                <h2>Search </h2>
            </div><!-- /.overlay-headingPage -->
        </div><!-- /.heading-page -->


        <div class="content">
            <div class="container">
                <div class="products">
                    <div class="row">
                        @if(count($products) > 0)
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
                        @else
                            <p class="no_data">Sorry, There are no data :(</p>
                        @endif
                    </div><!-- /.row -->

                    <div class="text-center">
                        {!! $products->render() !!}
                    </div>
                </div><!-- /.products -->
            </div><!-- /.container -->
        </div><!-- /.content -->
    </section>
    <!-- End Content Page -->


@stop