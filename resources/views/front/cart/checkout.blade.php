@extends('front.layouts.master')

@section('title')
    Checkout
@stop


@section('content')

    <!-- Start Content Page -->
    <section class="content-page">
        <div class="heading-page">
            <div class="overlay-headingPage">
                <h2>Checkout</h2>
            </div><!-- /.overlay-headingPage -->
        </div><!-- /.heading-page -->

        <div class="content">
            <div class="container">
                <div class="contact-page">

                    <div style="margin-bottom: 40px;" class="info_page">
                        <h2>Confirm Order</h2>
                    </div>

                    <div class="content_form">
                        <div class="row">
                            <div class="col-md-offset-1 col-md-10">

                                <div class="cart">
                                    <div class="table-scrollable">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th> Name </th>
                                                <th> Description </th>
                                                <th> Price </th>
                                                <th> Quantity </th>
                                                <th> Total </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($products as $product)
                                                <tr>
                                                    <td style="width: 120px;">
                                                        <img src="{{ asset('images/products/'.$product->image) }}">
                                                    </td>

                                                    <td style="width: 150px;">
                                                        <h3>{{ $product->title }}</h3>
                                                    </td>

                                                    <td style="width: 300px;">
                                                        <p>{!! str_limit($product->description, 100) !!}</p>
                                                    </td>

                                                    <td style="width: 150px;">
                                                        <p>{{ $product->price_discount }}</p>
                                                        <span class="space-left">x</span>
                                                    </td>


                                                    <td style="width: 100px;">
                                                        <p class="tot_price">{{ $product->quantity }}</p>
                                                    </td>

                                                    <td style="width: 150px;"><p class="tot_price">{{ $product->price }}</p> EGP </td>

                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-md-3 pull-right">
                                        <div class="total_price">
                                            <span>Total:</span>
                                            <p><strong class="fin_price">{{ $total }}</strong> <span>EGP</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="clear"></div>

                                <div style="margin-top: 40px;" class="personal_data_checkOut">

                                    <div style="margin-bottom: 40px;" class="info_page">
                                        <h2>Personal Data</h2>
                                    </div>

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

                                    <form method="POST" action="{{ url('checkout/confirm') }}">
                                        {{ csrf_field() }}

                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                                <label for="username">First Name <span class="required">*</span></label>
                                                <input type="text" placeholder="Enter Your First Name" class="form-control" name="first_name" value="{{ auth()->user()->username }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                                <label for="last_name">Last Name <span class="required">*</span></label>
                                                <input type="text" placeholder="Enter Your Last Name" class="form-control" name="last_name" value="{{ old('last_name') }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label for="email">Email <span class="required">*</span></label>
                                                <input type="email" placeholder="Enter Your Email" class="form-control" name="email" value="{{ auth()->user()->email }}">
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                                <label for="phone">Phone <span class="required">*</span></label>
                                                <input type="text" placeholder="Enter Your Phone" class="form-control" name="phone" value="{{ auth()->user()->phone }}">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                                <label for="address">Detailed Address <span class="required">*</span></label>
                                                <textarea style="height: 150px;" placeholder="Enter Detailed Address" class="form-control" name="address" >{{ old('address') }}</textarea>
                                            </div>
                                        </div>


                                        <div class="col-md-2">
                                            <button class="btn btn-primary " type="submit"><i class="fa fa-check"></i> Confirm Order</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div><!-- /.contact-page -->
            </div><!-- /.container -->
        </div><!-- /.content -->
    </section>
    <!-- End Content Page -->

@endsection
