@extends('front.layouts.master')

@section('title')
    Login
@stop


@section('content')

    <!-- Start Content Page -->
    <section class="content-page">
        <div class="heading-page">
            <div class="overlay-headingPage">
                <h2>Login</h2>
            </div><!-- /.overlay-headingPage -->
        </div><!-- /.heading-page -->

        <div class="content">
            <div class="container">
                <div class="contact-page">

                    <div class="info_page">
                        <h2>Login Info</h2>
                    </div>

                    <div class="content_form">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-6">
                                <form method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email">Email <span class="required">*</span></label>
                                        <input type="email" placeholder="Enter Your Email" class="form-control" name="email" value="{{ old('email') }}">

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password">Password <span class="required">*</span></label>
                                        <input type="password" placeholder="Enter Your Password" id="password" name="password" class="form-control">

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>


                                    <a href="#" class="forget_pass">Forget Password?</a>

                                    <button class="btn btn-primary btn-login" type="submit"><i class="fa fa-sign-in"></i> Login</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div><!-- /.contact-page -->
            </div><!-- /.container -->
        </div><!-- /.content -->
    </section>
    <!-- End Content Page -->

@endsection
