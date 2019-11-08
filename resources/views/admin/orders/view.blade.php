@extends('admin.layouts.master')
@section('css')
    <!-- BEGIN PAGE LEVEL STYLES -->

    <link href="{{url('admin')}}/assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('admin')}}/assets/pages/css/profile-2.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
@endsection

@section('title')
    Details Order
@stop


@section('content')
    <div class="page-wrapper-row full-height">
        <div class="page-wrapper-middle">
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <div class="container">
                            <!-- BEGIN PAGE TITLE -->
                            <div class="page-title">
                                <h1>Details Order</h1>
                            </div>
                            <!-- END PAGE TITLE -->

                        </div>
                    </div>
                    <!-- END PAGE HEAD-->
                    <!-- BEGIN PAGE CONTENT BODY -->
                    <div class="page-content">
                        <div class="container">

                            <!-- BEGIN PAGE CONTENT INNER -->
                            <div class="page-content-inner">
                                <div class="profile">
                                    <div class="tabbable-line tabbable-full-width">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab_1_1" style="position: relative">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="order_data">
                                                            <p><strong>FirstName:</strong> {{ $order->first_name }}</p>
                                                            <p><strong>LastName:</strong> {{ $order->last_name }}</p>
                                                            <p><strong>Phone:</strong> {{ $order->phone }}</p>
                                                            <p><strong>Address:</strong> {{ $order->address }}</p>
                                                            <p><strong>Total Price:</strong> {{ $order->total }} EGP</p>
                                                            <p><strong>Order Date:</strong> {{ $order->created_at->format('Y-m-d | h:i A') }}</p>
                                                            {{--<p><strong>Status:</strong> <span style="text-transform: capitalize">{{ $order->status }}</span> </p>--}}
                                                            <p class="@if($order->status =='pending') pending_order @elseif($order->status =='shipping') shipping_order @else arrived_order @endif" style="width: 100px;">
                                                                <strong>Status:</strong> <select {{ $order->cancel == 1 ? 'disabled' : '' }} class="form-control status_order input-sm">
                                                                    <option {{ $order->status == 'pending' ? 'selected' : '' }} value="pending">Pending</option>
                                                                    <option {{ $order->status == 'shipping' ? 'selected' : '' }} value="shipping">Shipping</option>
                                                                    <option {{ $order->status == 'arrived' ? 'selected' : '' }} value="arrived">Arrived</option>
                                                                </select>
                                                                <input type="hidden" value="{{ $order->id }}" name="order">
                                                            </p>
                                                            <p><strong>Cancel:</strong>
                                                                @if($order->cancel == 0)
                                                                    <span class="label label-info">No</span>
                                                                @else
                                                                    <span class="label label-danger">Yes</span>
                                                                @endif
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-8">
                                                        @foreach($order->details as $item)
                                                            <div class="details_order">
                                                                <div class="img_item">
                                                                    <img src="{{ asset('images/products/'.$item->image) }}">
                                                                </div>

                                                                <div class="info_item">
                                                                    <h4>{{ $item->title }}</h4>
                                                                    <h4>Quantity: {{ $item->quantity }}</h4>
                                                                    <h4>Item Price: {{ $item->price_discount }} | Total Price: {{ $item->price }}</h4>
                                                                </div>

                                                                <div class="clear"></div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>

                                                <div class="loading_request">
                                                    <img src="{{ asset('images/loading.gif') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PAGE CONTENT INNER -->
                        </div>
                    </div>
                    <!-- END PAGE CONTENT BODY -->
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END CONTAINER -->
        </div>
    </div>
@endsection

@section('quick')
    <nav class="quick-nav">
        <a class="quick-nav-trigger" href="#0">
            <span aria-hidden="true"></span>
        </a>
        <ul>

            <li>
                <a href="{{url('admin/orders')}}" >
                    <span>Orders</span>
                    <i class="fa fa-square"></i>
                </a>
            </li>

            <li>
                <a class="confirm" href="{{ url('admin/orders/'.$order->id.'/delete') }}" >
                    <span>Delete Order</span>
                    <i class="fa fa-trash"></i>
                </a>
            </li>

        </ul>
        <span aria-hidden="true" class="quick-nav-bg"></span>
    </nav>
    <div class="quick-nav-overlay"></div>
@endsection


@section('js')
    <script>
        $(document).ready(function () {
            $(".status_order").change(function () {
                const status = $(this);
                const loading = $('.loading_request');
                const order = status.parent().find('input').val();

                $.ajax({
                    url: '{{ url('admin/orders/status') }}',
                    type: 'post',
                    dataType: 'json',
                    beforeSend: function () {
                        loading.show();
                    },
                    data: {'status': status.val(), 'order': order, _token: '{{csrf_token()}}'},
                    success: function (data) {
                        loading.hide();
                        if(data.status === true) {
                            alert(data.message);

                            if(status.val() === 'pending') {
                                status.parent().removeClass();
                                status.parent().addClass('pending_order');

                            } else if(status.val() === 'shipping') {
                                status.parent().removeClass();
                                status.parent().addClass('shipping_order');
                            } else {
                                status.parent().removeClass();
                                status.parent().addClass('arrived_order');
                            }
                        } else {

                            if(data.messages) {
                                var keys = Object.keys(data.messages);

                                for(var i=0; i<keys.length; i++) {
                                    alert(data.messages[keys[i]]);
                                }

                            } else {
                                alert(data.message);
                            }
                        }
                    }
                });
            });
        });
    </script>
@stop