@extends('front.layouts.master')

@section('title')
    My Orders
@stop

@section('content')
    <!-- Start Content Page -->
    <section class="content-page">
        <div class="heading-page">
            <div class="overlay-headingPage">
                <h2>My Orders</h2>
            </div><!-- /.overlay-headingPage -->
        </div><!-- /.heading-page -->

        <!-- MSG Alert -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if(Session::has('success'))
                        <div class="alert alert-success" style="margin-top: 50px;">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{Session::get('success')}}
                        </div>
                    @endif

                    @if(count($errors) > 0)
                        <div class="alert alert-danger" style="margin-top: 50px;">
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
            </div>
        </div>


        <div class="content">
            <div class="container">
                <div class="my_order">
                    <div class="line-vertical"></div>

                    <div class="content_my_order">
                        @if(count($orders) > 0)
                            @foreach($orders as $order)
                                <div class="sec_order">
                                    <div class="order_date">
                                        <div class="line_left"></div>
                                        <p class="date_or">{{ $order->created_at->format('Y-m-d | h:i A') }}</p>
                                        <div class="line_right"></div>

                                        <div class="info_or">
                                            <h4>Information:</h4>
                                            <p>First Name: {{ $order->first_name }}</p>
                                            <p>Last Name: {{ $order->last_name }}</p>
                                            <p>Phone: {{ $order->phone }}</p>
                                            <p>Address: {{ $order->address }}</p>
                                            <p>Total Price: {{ $order->total }} EGP</p>

                                            @if($order->status == 'pending')
                                                <span title="Order Status: Pending" class="status_order pending_order"><i class="fa fa-clock-o"></i></span>
                                                <form action="{{ url('orders/order/cancel') }}" method="post">
                                                    {!! csrf_field() !!}
                                                    <input type="hidden" name="order" value="{{ $order->id }}">
                                                    <button title="Cancel Order" class="confirm_cancel" type="submit"><i class="fa fa-close"></i> </button>
                                                </form>
                                            @elseif($order->status == 'shipping')
                                                <span title="Order Status: Shipping" class="status_order shipping_order"><i class="fa fa-truck"></i></span>
                                                <form action="{{ url('orders/order/cancel') }}" method="post">
                                                    {!! csrf_field() !!}
                                                    <input type="hidden" name="order" value="{{ $order->id }}">
                                                    <button title="Cancel Order" class="confirm_cancel" type="submit"><i class="fa fa-close"></i> </button>
                                                </form>
                                            @else
                                                <span title="Order Status: Arrived" class="status_order arrived_order"><i class="fa fa-check"></i></span>
                                            @endif

                                        </div>
                                    </div>

                                    @foreach($order->details as $details)
                                        <div class="order_details">
                                            <div class="img_pro">
                                                <img src="{{ asset('images/products/'.$details->image) }}">
                                            </div>

                                            <div class="info_pro">
                                                <h4>{{ $details->title }} </h4>
                                                <h4>Quantity: {{ $details->quantity }}</h4>
                                                <h4>
                                                    <strong>Item Price:</strong> {{ $details->price_discount }} |
                                                    <strong>Total Price: </strong> {{ $details->price }}
                                                </h4>
                                            </div>

                                            <div class="clear"></div>
                                        </div>
                                    @endforeach

                                    <div class="clear"></div>
                                </div>
                            @endforeach
                        @else
                            <p class="no_data">Sorry, There are no data :(</p>
                        @endif
                    </div>
                </div><!-- /.my-order -->
            </div><!-- /.container -->
        </div><!-- /.content -->
    </section>
    <!-- End Content Page -->
@stop
