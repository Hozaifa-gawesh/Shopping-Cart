<html>
<head>
    <meta charset="utf-8">
    <title>Shopping Handmade - Contact Form</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
</head>

<body>



<div style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif;">
    <table style="width: 100%;">
        <tr>
            <td></td>
            <td bgcolor="#FFFFFF ">
                <div style="padding: 15px; max-width: 800px;margin: 0 auto;display: block; border-radius: 0px;padding: 0px; border: 1px solid #364760;">
                    <table style="width: 100%;background: #ecf1f3 ;">
                        <tr>
                            <td>
                                <div>
                                    <table width="100%">
                                        <tr>
                                            <td rowspan="2" style="text-align:center;padding:10px;">
                                                <?php $setting = \App\Model\Contact::first(); ?>
                                                    <a href="{{ url('/') }}">
                                                    <img style="display: block; margin: auto; padding-top: 10px; width: 300px"
                                                     src="{{ asset('images/setting/'.$setting->logo)}}"/></a>

                                                <span style="color:#e61873;float:right;font-size: 13px;font-style: italic; font-size: 14px; font-weight:normal;">
							                    "Shopping Handmade"</span></td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                            <td></td>
                        </tr>
                    </table>
                    <table style="padding: 10px;font-size:14px; width:100%;">
                        <tr>
                            <td style="padding:10px;font-size:14px; width:100%;">
                                <p><strong>Name</strong> : {{ $username }}</p>
                                <p><strong>Subject</strong> : {{ $subject }}</p>
                                <p><strong>Email</strong> : {{ $email }}</p>
                                <p><strong>Message</strong> :<br> {!! nl2br($details) !!} </p>

                                <!-- /Callout Panel -->
                                <!-- FOOTER -->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div align="center"
                                     style="font-size:12px; margin-top:20px; padding:5px; width:100%; background:#eee;">
                                    © {{date("Y")}} <a style="color:#e61873; text-decoration: none;" href="{{ url('/') }}"> E-Commerce Handmade | Shopping Cart.</a> development by <a href="https://www.linkedin.com/in/hozaifa-gawesh-6b301510a/" target="_blank"
                                                       style="color:#e61873; text-decoration: none;">Hozaifa Ramadan</a>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>
</div>

</body>
</html>