@extends('admin.layouts.master')
@section('css')
    <!-- BEGIN PAGE LEVEL STYLES -->

    <link href="{{url('admin')}}/assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('admin')}}/assets/pages/css/profile-2.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
@endsection

@section('title')
    View Profile
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
                                <h1>User Profile</h1>
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
                                                                    @if($user->image != null)
                                                                        <img style="width: 120px; height: 120px;" class="img-responsive" src="{{asset('images/users/'.$user->image)}}">
                                                                    @else
                                                                        <img style="width: 120px" class="img-responsive" src="{{asset('admin')}}/assets/img/user.png">
                                                                    @endif
                                                                </div>
                                                                
                                                                <!-- END SIDEBAR USERPIC -->
                                                                <!-- SIDEBAR USER TITLE -->
                                                                <div class="profile-usertitle">
                                                                    <div class="profile-usertitle-name"> {{ $user->username }} </div>
                                                                    <div class="profile-usertitle-job"> {{ $user->email }} </div>
                                                                </div>
                                                                <!-- END SIDEBAR USER TITLE -->
                                                            </div>
                                                            <!-- END PORTLET MAIN -->
                                                        </div>
                                                        <!-- END BEGIN PROFILE SIDEBAR -->
                                                    </div>


                                                    <div class="col-md-8">
                                                        <div class="row">
                                                            <div class="col-md-8 profile-info">
                                                                <h1 class="font-green sbold uppercase">{{ $user->username }}</h1>
                                                                <p> Email: {{ $user->email }} </p>
                                                                <p> Phone: {{ $user->phone }} </p>
                                                                <p> Gender: {{ $user->gender }} </p>
                                                                <p> Birthday: {{ $user->birthday }} </p>

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
                <a href="{{url('admin/users')}}"  >
                    <span>Users</span>
                    <i class="fa fa-square"></i>
                </a>
            </li>

        </ul>
        <span aria-hidden="true" class="quick-nav-bg"></span>
    </nav>
    <div class="quick-nav-overlay"></div>
@endsection

