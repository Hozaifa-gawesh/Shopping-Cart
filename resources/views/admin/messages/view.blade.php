@extends('admin.layouts.master')
@section('css')
    <!-- BEGIN PAGE LEVEL STYLES -->

    <link href="{{url('admin')}}/assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('admin')}}/assets/pages/css/profile-2.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
@endsection

@section('title')
    Details Message
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
                                <h1>Details Message</h1>
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
                                                    <div class="col-md-12">
                                                        <div class="col-md-4">
                                                            <div class="details_msg">
                                                                <p><strong>Username:</strong> {{ $message->username }}</p>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="details_msg">
                                                                <p><strong>Subject:</strong> {{ $message->subject }}</p>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="details_msg">
                                                                <p><strong>Email:</strong> {{ $message->email }}</p>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="details_msg">
                                                                <p><strong>Message:</strong></p>
                                                                <p>  {!! nl2br($message->message) !!}</p>
                                                            </div>
                                                        </div>
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
                <a href="{{url('admin/messages')}}" >
                    <span>Messages</span>
                    <i class="fa fa-square"></i>
                </a>
            </li>

        </ul>
        <span aria-hidden="true" class="quick-nav-bg"></span>
    </nav>
    <div class="quick-nav-overlay"></div>
@endsection

