<!DOCTYPE html>

<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>E-Commerce | Shopping Cart</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="Hozaifa-Ramadan" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin')}}/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin')}}/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin')}}/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin')}}/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{asset('admin')}}/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="{{asset('admin')}}/assets/pages/css/login-5.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
    <!-- END HEAD -->

    <body style="overflow: hidden" class=" login">
        <!-- BEGIN : LOGIN PAGE 5-1 -->
        <div class="user-login-5">
            <div class="row bs-reset">
                <div class="col-md-6 bs-reset mt-login-5-bsfix">
                    <div class="login-bg">
                        <img style="width: 100%" src="http://localhost/ecommerce/public/admin/assets/pages/img/login/bg1.jpg">
                     </div>
                </div>
                <div class="col-md-6 login-container bs-reset mt-login-5-bsfix">
                    <div class="login-content">
                        <h1>E-Commerce Login</h1>
                        <p>
                            E-Commerce | Shopping Cart
                        </p>
                        <form method="POST" action="{{ url('admin/login') }}" class="login-form" >
                            @if(Session::has('danger'))
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{Session::get('danger')}}
                                </div>
                            @endif

                           {{csrf_field()}}
                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button>
                                <span>Enter E-mail and Password </span>
                            </div>

                            <div class="row">
                                <div class="col-xs-6">
                                   <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input class="form-control form-control-solid placeholder-no-fix form-group" placeholder="Email" id="email" type="email" name="email" value="{{ old('email') }}" required/>
                                       @if ($errors->has('email'))
                                           <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                       @endif
                                   </div>

                                   </div>

                                <div class="col-xs-6">
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <input class="form-control form-control-solid placeholder-no-fix form-group" autocomplete="off" placeholder="Password" id="password" type="password" name="password" required/>
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                 <strong>{{ $errors->first('password') }}</strong>
                                             </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="rem-password">
                                        <label class="rememberme mt-checkbox mt-checkbox-outline">
                                            <input type="checkbox" name="remember" value="1" /> Remember me
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-8 text-right">
                                    <input type="submit" class="btn green" value="Sign In">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="login-footer">
                        <div class="row bs-reset">
                            <div class="col-xs-5 bs-reset">
                                <ul class="login-social">
                                    <li>
                                        <a href="javascript:;">
                                            <i class="icon-social-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="icon-social-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="icon-social-dribbble"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xs-7 bs-reset">
                                <div class="login-copyright text-right">
                                    <p>Copyright &copy; E-Commerce <?php echo date('Y') ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END : LOGIN PAGE 5-1 -->



        <!-- BEGIN CORE PLUGINS -->
        <script src="{{asset('admin')}}/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="{{asset('admin')}}/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="{{asset('admin')}}/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    </body>

</html>
