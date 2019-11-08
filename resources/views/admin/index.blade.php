@extends('admin.layouts.master')

@section('title')
    E-Commerce | Shopping Cart
@endsection


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
                                <h1>E-Commerce
                                    <small>| Shopping Cart</small>
                                </h1>
                            </div>
                            <!-- END PAGE TITLE -->
                            <!-- BEGIN PAGE TOOLBAR -->
                            <div class="page-toolbar">
                                <!-- BEGIN THEME PANEL -->
                                <div class="btn-group btn-theme-panel">
                                </div>
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

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <div class="dashboard-stat2 ">
                                            <div class="display">
                                                <div class="number">
                                                    <h3 class="font-green-sharp">
                                                        <span data-counter="counterup" data-value="{{ $users }}">{{ $users }}</span>
                                                        <small class="font-green-sharp"></small>
                                                    </h3>
                                                    <small>Users</small>
                                                </div>
                                                <div class="icon">
                                                    <i class="icon-users"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <div class="dashboard-stat2 ">
                                            <div class="display">
                                                <div class="number">
                                                    <h3 class="font-red-haze">
                                                        <span data-counter="counterup" data-value="{{ $ordersCount }}">{{ $ordersCount }}</span>
                                                    </h3>
                                                    <small>Orders</small>
                                                </div>
                                                <div class="icon">
                                                    <i class="icon-basket-loaded"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <div class="dashboard-stat2 ">
                                            <div class="display">
                                                <div class="number">
                                                    <h3 class="font-blue-sharp">
                                                        <span data-counter="counterup" data-value="{{ $products }}">{{ $products }}</span>
                                                    </h3>
                                                    <small>Products</small>
                                                </div>
                                                <div class="icon">
                                                    <i class="icon-layers"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <div class="dashboard-stat2 ">
                                            <div class="display">
                                                <div class="number">
                                                    <h3 class="font-purple-soft">
                                                        <span data-counter="counterup" data-value="{{ $messagesCount }}">{{ $messagesCount }}</span>
                                                    </h3>
                                                    <small>Messages</small>
                                                </div>
                                                <div class="icon">
                                                    <i class="icon-paper-plane"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                        <div class="portlet light ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-bubble font-dark hide"></i>
                                                    <span class="caption-subject font-hide bold uppercase">Orders</span>
                                                </div>
                                            </div>

                                            <div class="portlet-body">
                                                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_2">
                                                    <thead>
                                                    <tr>
                                                        <th> Date </th>
                                                        <th> Order Price </th>
                                                        <th> Status </th>
                                                        <th> Cancel </th>
                                                        <th> Control </th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    @foreach($orders as $order)
                                                        <tr class="odd gradeX">
                                                            <td style="width: 100px;"> {{ $order->created_at->format('Y-m-d') }} </td>

                                                            <td> {{ $order->total }} EGP</td>

                                                            <td>
                                                                @if($order->status == 'pending')
                                                                    <span class="label label-warning">Pending</span>
                                                                @elseif($order->status == 'shipping')
                                                                    <span class="label label-info">Shipping</span>
                                                                @else
                                                                    <span class="label label-success">Arrived</span>
                                                                @endif
                                                            </td>

                                                            <td>
                                                                @if($order->cancel == 0)
                                                                    <span class="label label-info">No</span>
                                                                @else
                                                                    <span class="label label-danger">Yes</span>
                                                                @endif
                                                            </td>

                                                            <td>
                                                                <a href="{{ url('admin/orders/'.$order->id.'/view') }}" class="btn btn-warning">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                        <div class="portlet light ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-bubble font-dark hide"></i>
                                                    <span class="caption-subject font-hide bold uppercase">Messages</span>
                                                </div>
                                            </div>

                                            <div class="portlet-body">
                                                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_2">
                                                    <thead>
                                                    <tr>
                                                        <th> Username </th>
                                                        <th> Subject </th>
                                                        <th> Control </th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    @foreach($messages as $message)
                                                        <tr class="odd gradeX">
                                                            <td style="width: 150px"> {{ $message->username }} </td>
                                                            <td> {{ $message->subject }} EGP</td>

                                                            <td>
                                                                <a href="{{ url('admin/messages/'.$message->id.'/view') }}" class="btn btn-warning">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
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
                <!-- BEGIN QUICK SIDEBAR -->

                <!-- END QUICK SIDEBAR -->
            </div>
            <!-- END CONTAINER -->
        </div>
    </div>

@stop

