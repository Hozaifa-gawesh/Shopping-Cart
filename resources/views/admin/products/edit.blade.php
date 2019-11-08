@extends('admin.layouts.master')


@section('title')
    Edit Product
@stop

@section('content')
    <div class="page-wrapper-row full-height services">
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
                                <h1>Edit Product
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
                                    <div class="col-lg-12 col-xs-12 col-sm-12">
                                        <div class="tab-pane" id="tab_2">

                                            <div class="portlet light ">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="icon-equalizer font-green-haze"></i>
                                                        <span class="caption-subject font-green-haze bold uppercase">Edit Product</span>
                                                    </div>

                                                </div>
                                                <div class="portlet-body form">

                                                    <div>
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

                                                    <!-- BEGIN FORM-->
                                                    <form method="post" action="{{ url('admin/products/'.$product->id.'/update') }}" enctype="multipart/form-data">

                                                        {{ csrf_field() }}

                                                        <div class="form-body">


                                                            <div class="row">
                                                                <div class="col-md-12">

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Category <span class="required">*</span></label>
                                                                            <select name="category_id" id="category" class="form-control">
                                                                                <option disabled selected value="">Choose Category</option>

                                                                                @foreach($categories as $category)
                                                                                    <option {{ $product->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Brand <span class="required">*</span></label>
                                                                            <select name="brand_id" id="brand" class="form-control">
                                                                                <option disabled selected value="">Choose Brand</option>

                                                                                @foreach($brands as $brand)
                                                                                    <option {{ $brand->id == $product->brand_id ? 'selected' : '' }} value="{{ $brand->id }}">{{ $brand->title }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="content_for">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label>Title <span class="required">*</span></label>
                                                                                <input type="text" name="title" value="{{ $product->title }}" class="form-control" placeholder="Enter Title">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label>Image <span class="required">*</span></label>
                                                                                <span class="pdf pull-right" style="color: red"> Max File size 1MB </span>
                                                                                <label class="contol-label" id="lblSize"></label>
                                                                                <label style="color: #f00" class="contol-label" id="lblSizeRed"></label>
                                                                                <input type="file" id="image" name="image" class="form-control">
                                                                            </div>
                                                                        </div>

                                                                        {{--<div class="col-md-6">--}}
                                                                        {{--<div class="form-group">--}}
                                                                        {{--<label style="display: block">Size <span class="required">*</span></label>--}}
                                                                        {{--<input type="text" data-role="tagsinput" id="size" name="size" value="{{ old('size') }}" class="form-control" placeholder="Enter Size">--}}
                                                                        {{--</div>--}}
                                                                        {{--</div>--}}

                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label style="display: block">Colors <span class="required">*</span></label>
                                                                                <input type="text" data-role="tagsinput" id="colors" name="colors" value="{{ $product->colors }}" class="form-control" placeholder="Enter Colors">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label>Available <span class="required">*</span></label>
                                                                                <select name="available" class="form-control">
                                                                                    <option disabled selected value="">Choose Available</option>
                                                                                    <option selected {{ $product->available == '1' ? 'selected' : '' }} value="1">Yes</option>
                                                                                    <option {{ $product->available == '0' ? 'selected' : '' }} value="0">No</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label style="display: block">Price <span class="required">*</span></label>
                                                                                <input type="number" id="price" name="price" value="{{ $product->price }}" class="form-control" placeholder="Enter Price">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label style="display: block">Discount <span class="required">*</span></label>
                                                                                <div class="input-group">
                                                                                    <span class="input-group-addon">
                                                                                        <span>%</span>
                                                                                    </span>
                                                                                    <input type="number" id="discount" name="discount" value="{{ $product->discount }}" class="form-control" placeholder="Enter Discount">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label style="display: block">Price after discount <span class="required">*</span></label>
                                                                                <input type="number" id="price_discount" readonly name="price_discount" value="{{ $product->price_discount }}" class="form-control" placeholder="Enter Price Discount">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label style="display: block">Description <span class="required">*</span></label>
                                                                                <textarea name="description" id="description" style="height: 200px" class="form-control" placeholder="Enter Description">{{ $product->description }}</textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/row-->

                                                        </div>
                                                        <div class="form-actions">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="row">
                                                                        <div class="col-md-offset-3 col-md-9">
                                                                            <button type="submit" id="submit" class="btn green">Submit</button>
                                                                            <a href="{{ url('admin/products') }}" class="btn default">Cancel</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6"> </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <!-- END FORM-->

                                                    <div class="loading_request" id="loading_request">
                                                        <img src="{{ asset('images/loading.gif') }}">
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
                <!-- BEGIN QUICK SIDEBAR -->

                <!-- END QUICK SIDEBAR -->
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

        </ul>
        <span aria-hidden="true" class="quick-nav-bg"></span>
    </nav>
    <div class="quick-nav-overlay"></div>
@endsection



@section('js')

    <script>
        $("#image").change(function ()
        {
            var iSize = ($("#image")[0].files[0].size / 1024);
            if (iSize / 1024 > 1)
            {
                if (((iSize / 1024) / 1024) > 1)
                {
                    iSize = (Math.round(((iSize / 1024) / 1024) * 100) / 100);
                    $("#lblSizeRed").html( iSize + "Gb | Please select a file size less than 1 MB");

                    if(iSize > 1) {
                        $("#lblSizeRed").css('display', 'inline');
                        $("#lblSize").css('display', 'none');
                        $("#submit").attr('disabled','disabled');
                        $("#submit").css('cursor','no-drop');
                    }
                }
                else
                {
                    iSize = (Math.round((iSize / 1024) * 100) / 100);

                    console.log('Size: ' + iSize);

                    $("#lblSizeRed").html( iSize + "Mb | Please select a file size less than 1 MB");
                    if(iSize > 1) {
                        $("#lblSizeRed").css('display', 'inline');
                        $("#lblSize").css('display', 'none');
                        $("#submit").attr('disabled','disabled');
                        $("#submit").css('cursor','no-drop');

                    } else {
                        $("#lblSize").html( iSize  + "Mb");
                        $("#lblSizeRed").css('display', 'none');
                        $("#lblSize").css('display', 'inline');
                    }
                }
            }
            else
            {
                iSize = (Math.round(iSize * 100) / 100);
                $("#lblSize").html( iSize  + "KB");
                $("#lblSizeRed").css('display', 'none');
                $("#lblSize").css('display', 'inline');
                $("#submit").removeAttr('disabled');
                $("#submit").css('cursor','pointer');
            }
        });
    </script>

    <script>
        $(document).ready(function () {
            var price = $('#price');
            var discount = $('#discount');
            var price_discount = $('#price_discount');

            price.change(function () {
                var total = price.val() - (price.val() * discount.val()) / 100;
                price_discount.val(total)
            });

            discount.change(function () {
                var total = price.val() - (price.val() * discount.val()) / 100;
                price_discount.val(total)
            });


            $('input[name=size]').tagsinput();
            $('input[name=colors]').tagsinput();
            $('.bootstrap-tagsinput input').keydown(function( event ) {
                if ( event.which == 13 ) {
                    $(this).blur();
                    $(this).focus();
                    return false;
                }
            })
        });
    </script>


    <script src="https://cdn.ckeditor.com/4.10.1/full/ckeditor.js"></script>
    <script>
    $(function () {
    CKEDITOR.replace('description');
    });
    </script>
@stop

