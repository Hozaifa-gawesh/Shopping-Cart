@extends('front.layouts.master')

@section('title')
    {{ $category->title }}
@stop

@section('content')


    <!-- Start Content Page -->
    <section class="content-page">
        <div class="heading-page">
            <div class="overlay-headingPage">
                <h2>{{ $category->title }}</h2>
            </div><!-- /.overlay-headingPage -->
        </div><!-- /.heading-page -->


        <div class="content">
            <div class="container">
                <div class="products">
                    <div class="row">
                        @if(count($brands) > 0)
                        @foreach($brands as $brand)
                            <div class="col-md-4">
                                <div class="category">
                                    <div class="image-category">
                                        <img src="{{ asset('images/brands/'.$brand->image) }}">

                                        <div class="overlay-category">
                                            <a href="{{ url('brands/'.$brand->slug) }}" title="{{ $brand->title }}">
                                                <div class="icon-category"><i class="fa fa-link"></i></div>
                                            </a>
                                        </div><!-- /.overlay-product -->
                                    </div>

                                    <div class="info-category">
                                        <h3><a class="brand_name" href="{{ url('brands/'.$brand->slug) }}">{{ $brand->title }}</a></h3>
                                        <p class="count_brands" title="Count of products">{{ $brand->products_count }}</p>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                        </div>
                        @endforeach
                        @else
                            <p class="no_data">Sorry, There are no data :(</p>
                        @endif
                    </div><!-- /.row -->

                    <div class="text-center">
                        {!! $brands->render() !!}
                    </div>
                </div><!-- /.products -->
            </div><!-- /.container -->
        </div><!-- /.content -->
    </section>
    <!-- End Content Page -->


@stop