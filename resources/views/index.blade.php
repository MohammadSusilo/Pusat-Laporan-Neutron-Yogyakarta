<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>SERVER LOKAL Pusat TJ | Neutron Yogyakarta</title>
    
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('logo_kecil.ico')}}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link rel="stylesheet" href="{{ asset('security/plugins/bootstrap/css/bootstrap.css')}}">

    <!-- Waves Effect Css -->
    <link rel="stylesheet" href="{{ asset('security/plugins/node-waves/waves.css')}}">

    <!-- Animation Css -->
    <link rel="stylesheet" href="{{ asset('security/plugins/animate-css/animate.css')}}">

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('security/css/style.css')}}">

    <!-- Awesome Fonts -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <center><img src="{{ asset('security/logo_kecil.png')}}" width="100"> </center>    
            <a href="javascript:void(0);">PUSAT <b>LAPORAN</b></a>
            <small>Neutron Yogyakarta</small>
        </div>
        <div class="card">
            <div class="body">
                <!-- Card Notifikasi -->
                    @if(\Session::has('nosession'))
                        <div class="alert bg-pink alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <div>{{Session::get('nosession')}}</div>
                        </div>
                    @endif
                    @if(\Session::has('username-kosong'))
                        <div class="alert bg-pink alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <div>{{Session::get('username-kosong')}}</div>
                        </div>
                    @endif
                    @if(\Session::has('password-kosong'))
                        <div class="alert bg-pink alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <div>{{Session::get('password-kosong')}}</div>
                        </div>
                    @endif
                    @if(\Session::has('username-gagal'))
                        <div class="alert bg-pink alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <div>{{Session::get('username-gagal')}}</div>
                        </div>
                    @endif
                    @if(\Session::has('login-gagal'))
                        <div class="alert bg-pink alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <div>{{Session::get('login-gagal')}}</div>
                        </div>
                    @endif
                <!-- Card Notifikasi -->
                <form method="POST" action="{{ route('auth.store') }}">
                @csrf
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input id="username" placeholder="Username" type="text" class="form-control" name="username" autocomplete="off" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input id="password-field" placeholder="password" type="password" class="form-control" name="password" required>
                        </div>
                        <span class="input-group-addon">
                            <span style="float:right" toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                        </div>
                        <div class="col-xs-12">
                            <button class="btn btn-block bg-red waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                </form>
                <div class="legal">
                    <center>
                    <div class="copyright">
                        &copy; <?php echo date('Y');?> <a href="javascript:void(0);">App by Neutron Yogyakarta</a>.
                    </div>
                    </center>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="{{ asset('security/plugins/jquery/jquery.min.js')}}"></script> <!-- Custom scripts -->

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('security/plugins/bootstrap/js/bootstrap.js')}}"></script> <!-- Custom scripts -->

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('security/plugins/node-waves/waves.js')}}"></script> <!-- Custom scripts -->

    <!-- Validation Plugin Js -->
    <script src="{{ asset('security/plugins/jquery-validation/jquery.validate.js')}}"></script> <!-- Custom scripts -->

    <!-- Custom Js -->
    <script src="{{ asset('security/js/admin.js')}}"></script> <!-- Custom scripts -->
    <script src="{{ asset('security/js/sign-in.js')}}"></script> <!-- Custom scripts -->

    <script>
        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
                if (input.attr("type") == "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
        });
        
        $(".toggle-password2").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
                if (input.attr("type") == "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
        });
    </script>
</body>

</html>
