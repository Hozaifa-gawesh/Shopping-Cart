@extends('admin.layouts.master')


@section('title')
    Setting
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
                                <h1>Setting
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
                                                        <span class="caption-subject font-green-haze bold uppercase">Setting</span>
                                                        <span class="caption-helper"> info...</span>
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
                                                    <form role="form" method="post" action="{{ url('admin/setting/update') }}" enctype="multipart/form-data">

                                                        {{ csrf_field() }}

                                                        <div class="form-body">

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group ">
                                                                            <label>Email 1 <span class="required">*</span> </label>
                                                                            <input type="email" name="email_1" value="{{ $setting->email_1 }}" class="form-control" placeholder="Enter Email 1">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group ">
                                                                            <label>Email 2</label>
                                                                            <input type="email" name="email_2" value="{{ $setting->email_2 }}" class="form-control" placeholder="Enter Email 2">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group ">
                                                                            <label>Phone 1 <span class="required">*</span> </label>
                                                                            <input type="text" name="phone_1" value="{{ $setting->phone_1 }}" class="form-control" placeholder="Enter Phone 1">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group ">
                                                                            <label>Phone 2</label>
                                                                            <input type="text" name="phone_2" value="{{ $setting->phone_2 }}" class="form-control" placeholder="Enter Phone 2">
                                                                        </div>
                                                                    </div>



                                                                    <div class="col-md-6">
                                                                        <div class="form-group ">
                                                                            <label>Logo</label>
                                                                            <div>
                                                                                <img style="height:60px; margin-bottom: 10px;" src="{{ asset('images/setting/'.$setting->logo) }}">
                                                                            </div>
                                                                            <input type="file" name="logo" class="form-control">
                                                                        </div>
                                                                    </div>


                                                                    <div class="col-md-6">
                                                                        <div class="form-group ">
                                                                            <label>Favicon</label>
                                                                            <div>
                                                                                <img style="height:60px; margin-bottom: 10px;" src="{{ asset('images/setting/'.$setting->favicon) }}">
                                                                            </div>
                                                                            <input type="file" name="favicon" class="form-control">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group ">
                                                                            <label>Facebook</label>
                                                                            <input type="url" name="facebook" value="{{ $setting->facebook }}" class="form-control" placeholder="Enter Facebook">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group ">
                                                                            <label>Twitter</label>
                                                                            <input type="url" name="twitter" value="{{ $setting->twitter }}" class="form-control" placeholder="Enter Twitter">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group ">
                                                                            <label>Youtube</label>
                                                                            <input type="url" name="youtube" value="{{ $setting->youtube }}" class="form-control" placeholder="Enter Youtube">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group ">
                                                                            <label>Instagram</label>
                                                                            <input type="url" name="instagram" value="{{ $setting->instagram }}" class="form-control" placeholder="Enter Instagram">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <div class="form-group ">
                                                                            <label>Maps Link</label>
                                                                            <input name="maps" value="{{ $setting->maps }}" placeholder="Enter Google Maps Link: EX(https://goo.gl/maps/KEF5tTFdfAXH83Er7)" class="form-control">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <div class="form-group ">
                                                                            <label>Address <span class="required">*</span> </label>
                                                                            <textarea name="address" placeholder="Enter Address" class="form-control">{{ $setting->address }}</textarea>
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
                                                                            <button type="submit" class="btn green">Submit</button>
                                                                            <a href="{{ url('admin/home') }}" class="btn default">Cancel</a>
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
                <a href="{{url('admin/home')}}"  >
                    <span>Home</span>
                    <i class="fa fa-square"></i>
                </a>
            </li>

        </ul>
        <span aria-hidden="true" class="quick-nav-bg"></span>
    </nav>
    <div class="quick-nav-overlay"></div>
@endsection


