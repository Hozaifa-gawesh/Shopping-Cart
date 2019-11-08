@extends('front.layouts.master')

@section('title')
    Contact
@stop


@section('content')
    <!-- Start Content Page -->
    <section class="content-page">
        <div class="heading-page">
            <div class="overlay-headingPage">
                <h2>Contact Us</h2>
            </div><!-- /.overlay-headingPage -->
        </div><!-- /.heading-page -->


        <div class="content">
            <div class="container">
                <div class="contact-page">
                    <div class="row">

                        <div class="col-md-4">
                            <div class="information">
                                <div class="icon-information">
                                    <i class="fa fa-home"></i>
                                </div><!-- /.icon-information -->

                                <div class="details-info">
                                    <p>{{ $contact->address }} </p>
                                </div><!-- /.details-info -->
                            </div><!-- /.home -->
                        </div><!-- /.col-md-4 -->


                        <div class="col-md-4">
                            <div class="information">
                                <div class="icon-information">
                                    <i class="fa fa-phone"></i>
                                </div><!-- /.icon-information -->

                                <div class="details-info">
                                    <p>{{ $contact->phone_1 }}{{ $contact->phone_2 != null ? ' - ' . $contact->phone_2 : '' }} </p>
                                </div><!-- /.details-info -->
                            </div><!-- /.home -->
                        </div><!-- /.col-md-4 -->


                        <div class="col-md-4">
                            <div class="information">
                                <div class="icon-information">
                                    <i class="fa fa-envelope"></i>
                                </div><!-- /.icon-information -->

                                <div class="details-info">
                                    <p>{{ $contact->email_1 }} </p>
                                </div><!-- /.details-info -->
                            </div><!-- /.home -->
                        </div><!-- /.col-md-4 -->

                    </div><!-- /.row -->



                    <div class="form">
                        <h3>Send Message:</h3>
                        <div class="row">

                            <div class="col-md-12">
                                @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{Session::get('success')}}
                                    </div>
                                @endif

                                @if(count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>

                            <form action="{{ url('contact/message') }}" method="post">

                                {{ csrf_field() }}

                                <div class="col-md-4">
                                    <label for="username">Username <span class="required">*</span> </label>
                                    <input type="text" name="username" value="{{ old('username') }}" id="username" placeholder="Username">
                                </div><!-- /.col-md-4 -->

                                <div class="col-md-4">
                                    <label for="subject">Subject <span class="required">*</span> </label>
                                    <input type="text" name="subject" value="{{ old('subject') }}" id="subject" placeholder="Subject">
                                </div><!-- /.col-md-4 -->

                                <div class="col-md-4">
                                    <label for="email">Email <span class="required">*</span> </label>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Email">
                                </div><!-- /.col-md-4 -->

                                <div class="col-md-12">
                                    <label for="message">Message <span class="required">*</span> </label>
                                    <textarea id="message" name="message" placeholder="Message">{{ old('message') }}</textarea>
                                    <input type="submit" value="Send Message">
                                </div><!-- /.col-md-12 -->
                            </form>
                        </div><!-- /.row -->
                    </div><!-- /.form -->


                </div><!-- /.contact-page -->
            </div><!-- /.container -->
        </div><!-- /.content -->
    </section>
    <!-- End Content Page -->
@stop