@extends('front.layouts.master')

@section('title')
    About Us
@stop


@section('content')
    <!-- Start Content Page -->
    <section class="content-page">
        <div class="heading-page">
            <div class="overlay-headingPage">
                <h2>About Us</h2>
            </div><!-- /.overlay-headingPage -->
        </div><!-- /.heading-page -->


        <div class="content">
            <div class="container">
                <div class="about">
                    <div class="col-md-7">
                        {!! $about->content !!}
                    </div>

                    <div class="col-md-5">
                        <div class="about-img">
                            <img src="{{ asset('images/about/'.$about->image) }}">
                        </div>
                    </div>
                </div><!-- /.about -->
            </div><!-- /.container -->
        </div><!-- /.content -->
    </section>
    <!-- End Content Page -->
@stop