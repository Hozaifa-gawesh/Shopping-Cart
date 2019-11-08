@extends('admin.layouts.master')


@section('title')
    Edit Brand
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
                                <h1>Edit Brand
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
                                                        <span class="caption-subject font-green-haze bold uppercase">Edit Brand</span>
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
                                                    <form method="post" action="{{ url('admin/brands/'.$brand->id.'/update') }}" enctype="multipart/form-data">

                                                        {{ csrf_field() }}

                                                        <div class="form-body">


                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Title <span class="required">*</span></label>
                                                                            <input type="text" name="title" value="{{ $brand->title }}" class="form-control" placeholder="Enter Title">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Image</label>
                                                                            <span class="pdf pull-right" style="color: red"> Max File size 1MB </span>
                                                                            <label class="contol-label" id="lblSize"></label>
                                                                            <label style="color: #f00" class="contol-label" id="lblSizeRed"></label>
                                                                            <input type="file" id="image" name="image" class="form-control">
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
                                                                            <a href="{{ url('admin/brands') }}" class="btn default">Cancel</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6"> </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <!-- END FORM-->
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
                <a href="{{url('admin/brands')}}"  >
                    <span>Brands</span>
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

@stop

