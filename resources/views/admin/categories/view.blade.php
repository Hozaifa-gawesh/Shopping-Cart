@extends('admin.layouts.master')

@section('title')
    {{ $category->title }}
@stop

@section('css')
    <link href="{{ asset('admin') }}/assets/custom/css/faculty.css" rel="stylesheet" type="text/css" />
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
                                <h1>{{ $category->title }}
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
                                        <div class="portlet light ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-bubble font-dark hide"></i>
                                                    <span class="caption-subject font-hide bold uppercase">Brands</span>
                                                </div>

                                            </div>
                                            <div class="portlet-body">
                                                <div class="row">

                                                    @if(count($brands) > 0)
                                                    @foreach($brands as $brand)

                                                        <div class="col-md-4">
                                                            <div class="blog-post-lg bordered blog-container">
                                                                <div class="blog-img-thumb imgClass">
                                                                    <img src="{{ $brand->image != null ? asset('images/brands/'.$brand->image) : asset('images/img.png') }}">
                                                                </div>

                                                                <div class="blog-post-content">
                                                                    <h2 class="title_item">
                                                                        {{ $brand->title }}
                                                                    </h2>

                                                                    <div class="brand_name">
                                                                        <p>{{ $brand->products_count }}</p>
                                                                    </div>
                                                                </div>

                                                                <div class="mt-stats">
                                                                    <div class="btn-group btn-group btn-group-justified">
                                                                        <a href="{{ url('admin/brands/'.$brand->id.'/edit') }}" class="btn font-green">
                                                                            <i class="fa fa-edit"></i> Edit
                                                                        </a>

                                                                        <a href="{{ url('admin/brands/'.$brand->id.'/delete') }}" class="btn confirm font-red">
                                                                            <i class="icon-trash"></i> Delete
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    @else
                                                        <p class="no_date">There are no data :(</p>
                                                    @endif
                                                </div>

                                                <div class="text-center">
                                                    {!! $brands->render() !!}
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
                <a href="{{url('admin/categories')}}"  >
                    <span>Categories</span>
                    <i class="fa fa-square"></i>
                </a>
            </li>

            <li>
                <a href="{{url('admin/categories/'.$category->id.'/edit')}}"  >
                    <span>Edit Category</span>
                    <i class="fa fa-edit"></i>
                </a>
            </li>

            <li>
                <a href="{{url('admin/brands/create')}}"  >
                    <span>Add Brand</span>
                    <i class="fa fa-plus"></i>
                </a>
            </li>
        </ul>
        <span aria-hidden="true" class="quick-nav-bg"></span>
    </nav>
    <div class="quick-nav-overlay"></div>
@endsection

