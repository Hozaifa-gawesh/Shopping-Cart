@extends('admin.layouts.master')

@section('title')
    Messages
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
                                <h1>Messages
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
                                        <form action="{{ url('admin/messages/multi/delete') }}" method="post">
                                            <div class="portlet light ">
                                                {{ csrf_field() }}
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="icon-bubble font-dark hide"></i>
                                                        <span class="caption-subject font-hide bold uppercase">Messages</span>
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
                                                            <th> Username </th>
                                                            <th> Subject </th>
                                                            <th> Email </th>
                                                            <th> Message </th>
                                                            <th style="width: 150px !important;"> Controls </th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        @foreach($messages as $message)
                                                            <tr class="odd gradeX">
                                                                <td>
                                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                        <input type="checkbox" name="messages[]" class="checkboxes" value="{{ $message->id }}" />
                                                                        <span></span>
                                                                    </label>
                                                                </td>

                                                                <td> {{ $message->username }} </td>
                                                                <td> {{ $message->subject }} </td>
                                                                <td> {{ $message->email }} </td>
                                                                <td> {{ str_limit($message->message, 100) }} </td>
                                                                <td style="width: 150px !important;">
                                                                    <a href="{{ url('admin/messages/'.$message->id.'/view') }}" class="btn btn-warning">
                                                                        <i class="fa fa-eye"></i>
                                                                    </a>

                                                                    <a href="{{ url('admin/messages/'.$message->id.'/delete') }}" class="confirm btn btn-danger">
                                                                        <i class="fa fa-trash"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
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


