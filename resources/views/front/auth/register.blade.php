@extends('front.layouts.master')

@section('title')
    Register
@stop


@section('content')

    <!-- Start Content Page -->
    <section class="content-page">
        <div class="heading-page">
            <div class="overlay-headingPage">
                <h2>Register</h2>
            </div><!-- /.overlay-headingPage -->
        </div><!-- /.heading-page -->

        <div class="content">
            <div class="container">
                <div class="contact-page">

                    <div class="info_page">
                        <h2>Register Info</h2>
                    </div>

                    <div class="content_form">
                        <div class="row">
                            <div class="col-md-offset-1 col-md-10">

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


                                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                            <label for="username">Username <span class="required">*</span></label>
                                            <input type="text" placeholder="Enter Your Username" class="form-control" name="username" value="{{ old('username') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email">Email <span class="required">*</span></label>
                                            <input type="email" placeholder="Enter Your Email" class="form-control" name="email" value="{{ old('email') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password">Password <span class="required">*</span></label>
                                            <input type="password" placeholder="Enter Your Password" id="password" name="password" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password-confirm">Confirm Password <span class="required">*</span></label>
                                            <input type="password" placeholder="Enter Your Confirm Password " id="password-confirm" name="password_confirmation" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                            <label for="phone">Phone <span class="required">*</span></label>
                                            <input type="text" placeholder="Enter Your Phone" class="form-control" name="phone" value="{{ old('phone') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                            <label for="gender">Gender</label>
                                            <select class="form-control" name="gender" id="gender">
                                                <option selected disabled value="">Choose Gender</option>
                                                <option {{ old('gender') == 'male' ? 'selected' : '' }} selected value="male">Male</option>
                                                <option {{ old('gender') == 'female' ? 'selected' : '' }} value="female">Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                            <label for="image">Image</label>
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                                            <label for="birthday">Birthday </label>
                                            <input type="date" placeholder="Enter Your Birthday" class="form-control" name="birthday" value="{{ old('birthday') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <button class="btn btn-primary btn-block btn-login" type="submit"><i class="fa fa-user-plus"></i> Register</button>
                                    </div>
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
