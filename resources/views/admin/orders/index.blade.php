@extends('admin.layouts.master')

@section('title')
    Orders
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
                                <h1>Orders
                                </h1>
                            </div>
                            <!-- END PAGE TITLE -->
                            <!-- BEGIN PAGE TOOLBAR -->
                            <div class="page-toolbar">
                                <!-- BEGIN THEME PANEL -->

                                <!-- END THEME PANEL -->
                            </div>
                            <!-- END PAGE TOOLBAR -->
                        </div>
                    </div>
                    <!-- END PAGE HEAD-->
                    <!-- BEGIN PAGE CONTENT BODY -->
                    <div class="page-content">
                        <div class="container">
                            <!-- BEGIN PAGE BREADCRUMBS -->

                            <!-- END PAGE BREADCRUMBS -->
                            <!-- BEGIN PAGE CONTENT INNER -->
                            <div class="page-content-inner">
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

                                    <div class="col-lg-12 col-xs-12 col-sm-12">
                                        <form action="{{ url('admin/orders/multi/delete') }}" method="post">
                                            <div class="portlet light ">
                                                {{ csrf_field() }}
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="icon-bubble font-dark hide"></i>
                                                        <span class="caption-subject font-hide bold uppercase">Orders</span>
                                                    </div>
                                                    <div class="pull-right">
                                                        <button class="btn btn-danger confirm"><i class="fa fa-trash"></i> Delete Selected</button>
                                                    </div>
                                                </div>

                                                <div class="portlet-body">
                                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_2">
                                                        <thead>
                                                        <tr>
                                                            <th class="table-checkbox">
                                                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                    <input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes" />
                                                                    <span></span>
                                                                </label>
                                                            </th>
                                                            <th> Date </th>
                                                            <th> Username </th>
                                                            <th> Order Price </th>
                                                            <th> Status </th>
                                                            <th> Cancel </th>
                                                            <th style="width: 150px !important;"> Controls </th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        @foreach($orders as $order)
                                                            <tr class="odd gradeX">
                                                                <td>
                                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                        <input type="checkbox" name="orders[]" class="checkboxes" value="{{ $order->id }}" />
                                                                        <span></span>
                                                                    </label>
                                                                </td>

                                                                <td> {{ $order->created_at->format('Y-m-d | h:i A') }} </td>
                                                                <td>
                                                                    <a href="{{ url('admin/users/'.$order->user_id.'/view') }}" class="btn btn-success">
                                                                        <i class="fa fa-eye"></i> {{ $order->username }}
                                                                    </a>
                                                                </td>

                                                                <td> {{ $order->total }} EGP</td>

                                                                <td class="@if($order->status =='pending') pending_order @elseif($order->status =='shipping') shipping_order @else arrived_order @endif" style="width: 100px;">
                                                                    <select {{ $order->cancel == 1 ? 'disabled' : '' }} class="form-control status_order input-sm">
                                                                        <option {{ $order->status == 'pending' ? 'selected' : '' }} value="pending">Pending</option>
                                                                        <option {{ $order->status == 'shipping' ? 'selected' : '' }} value="shipping">Shipping</option>
                                                                        <option {{ $order->status == 'arrived' ? 'selected' : '' }} value="arrived">Arrived</option>
                                                                    </select>

                                                                    <input type="hidden" value="{{ $order->id }}" name="order">
                                                                </td>

                                                                <td>
                                                                    @if($order->cancel == 0)
                                                                        <span class="label label-info">No</span>
                                                                    @else
                                                                        <span class="label label-danger">Yes</span>
                                                                    @endif
                                                                </td>
                                                                <td style="width: 150px !important;">
                                                                    <a href="{{ url('admin/orders/'.$order->id.'/view') }}" class="btn btn-warning">
                                                                        <i class="fa fa-eye"></i>
                                                                    </a>

                                                                    <a href="{{ url('admin/orders/'.$order->id.'/delete') }}" class="confirm btn btn-danger">
                                                                        <i class="fa fa-trash"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>

                                                    <div class="loading_request">
                                                        <img src="{{ asset('images/loading.gif') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

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
                <a href="{{url('admin/home')}}" >
                    <span>Home</span>
                    <i class="fa fa-square"></i>
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


