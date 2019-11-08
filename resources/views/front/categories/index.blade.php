@extends('front.layouts.master')

@section('title')
    Categories
@stop

@section('content')


    <!-- Start Content Page -->
    <section class="content-page">
        <div class="heading-page">
            <div class="overlay-headingPage">
                <h2>Categories</h2>
            </div><!-- /.overlay-headingPage -->
        </div><!-- /.heading-page -->


        <div class="content">
            <div class="container">
                <div class="products">
                    <div class="row">
                        @if(count($categories) > 0)
                        @foreach($categories as $category)
                            <div class="col-md-4">
                                <div class="category">
                                    <div class="image-category">
                                        <img src="{{ asset('images/categories/'.$category->image) }}">

                                        <div class="overlay-category">
                                            <a href="{{ url('categories/'.$category->slug) }}" title="{{ $category->title }}">
                                                <div class="icon-category"><i class="fa fa-link"></i></div>
                                            </a>
                                        </div><!-- /.overlay-product -->
                                    </div>

                                    <div class="info-category">
                                        <h3><a href="{{ url('categories/'.$category->slug) }}">{{ $category->title }}</a></h3>
                                    </div>
                                </div>
                        </div>
                        @endforeach
                        @else
                            <p class="no_data">Sorry, There are no data :(</p>
                        @endif
                    </div><!-- /.row -->

                    <div class="text-center">
                        {!! $categories->render() !!}
                    </div>
                </div><!-- /.products -->
            </div><!-- /.container -->
        </div><!-- /.content -->
    </section>
    <!-- End Content Page -->


@stop