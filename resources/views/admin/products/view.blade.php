@extends('admin.layouts.master')
@section('css')
    <!-- BEGIN PAGE LEVEL STYLES -->

    <link href="{{url('admin')}}/assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('admin')}}/assets/pages/css/profile-2.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
@endsection

@section('title')
    {{ $product->title }}
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
                                <h1>{{ $product->title }}</h1>
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
                                            <div class="tab-pane active" id="tab_1_1">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <!-- BEGIN PROFILE SIDEBAR -->
                                                        <div class="profile-sidebar">
                                                            <!-- PORTLET MAIN -->
                                                            <div class="portlet light profile-sidebar-portlet ">
                                                                <!-- SIDEBAR USERPIC -->
                                                                <div class="profile-userpic">
                                                                    <img src="{{$product->image != null ? asset('images/products/' . $product->image) : asset('images/img.png') }}" class="img-responsive" alt=""> </div>
                                                                <!-- END SIDEBAR USERPIC -->
                                                            </div>
                                                            <!-- END PORTLET MAIN -->
                                                        </div>
                                                        <!-- END BEGIN PROFILE SIDEBAR -->
                                                    </div>


                                                    <div class="col-md-8">
                                                        <div class="row">
                                                            <div class="profile-info">
                                                                <h1 class="font-green sbold uppercase">{{ $product->title }}</h1>
                                                                <p class="color_p"> <strong> Colors:</strong>
                                                                    @php
                                                                        $colors = explode(',', $product->colors);
                                                                    @endphp

                                                                    @foreach($colors as $color)
                                                                        <span>{{ $color }}</span>
                                                                    @endforeach
                                                                </p>
                                                                <p> <strong> Price:</strong>  {{ $product->price }} </p>
                                                                <p> <strong> Discount:</strong>  {{ $product->discount }}%</p>
                                                                <p> <strong> Total Price:</strong>  {{ $product->price_discount }} </p>
                                                                <p> <strong> Available:</strong>  {{ $product->available == 1 ? 'Yes' : 'No' }} </p>
                                                                <p class="view_link"> <strong> Brand:</strong>
                                                                    <a href="{{ url('admin/brands/'.$product->brand_id.'/view') }}">
                                                                        <i class="fa fa-eye"></i> {{ $product->brand }}
                                                                    </a>
                                                                </p>
                                                                <p class="view_link"> <strong> Category:</strong>
                                                                    <a href="{{ url('admin/categories/'.$product->category_id.'/view') }}">
                                                                        <i class="fa fa-eye"></i> {{ $product->category }}
                                                                    </a>
                                                                </p>
                                                                <p> <strong> Description:</strong>  {!! $product->description !!} </p>


                                                            </div>
                                                            <!--end col-md-8-->
                                                        </div>
                                                        <!--end row-->
                                                    </div>
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
                <a href="{{url('admin/products')}}"  >
                    <span>Products</span>
                    <i class="fa fa-square"></i>
                </a>
            </li>

            <li>
                <a href="{{url('admin/products/'.$product->id.'/edit')}}"  >
                    <span>Edit</span>
                    <i class="fa fa-edit"></i>
                </a>
            </li>

            <li>
                <a href="{{url('admin/products/'.$product->id.'/create')}}"  >
                    <span>Add Product</span>
                    <i class="fa fa-plus"></i>
                </a>
            </li>

        </ul>
        <span aria-hidden="true" class="quick-nav-bg"></span>
    </nav>
    <div class="quick-nav-overlay"></div>
@endsection
