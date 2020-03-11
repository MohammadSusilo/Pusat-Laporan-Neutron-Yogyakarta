<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('logo_kecil.ico')}}" type="image/x-icon">
    <title>SERVER LOKAL Pusat TJ | Neutron Yogyakarta</title>
    <!-- Custom CSS -->
    <link href="{{ asset('frontend/kuisioner/assets/libs/flot/css/float-chart.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('frontend/kuisioner/dist/css/style.min.css')}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- Main wrapper - style you can find in pages.scss -->
    <div id="main-wrapper">

        <!-- Topbar header - style you can find in pages.scss -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
            
                    <!-- Logo -->
            
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <!-- Logo icon -->
                        <b class="logo-icon p-l-10">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="{{ asset('frontend/kuisioner/assets/images/icon.png')}}" alt="homepage" class="light-logo" />
                           
                        </b>
                        <!--End Logo icon -->
                         <!-- Logo text -->
                        <span class="logo-text">
                             <!-- dark Logo text -->
                             <img src="{{ asset('frontend/kuisioner/assets/images/rsz_text.png')}}" alt="homepage" class="light-logo" />
                            
                        </span>
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="../../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->
                            
                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>
            
                    <!-- End Logo -->
            
            
                    <!-- Toggle which is visible on mobile only -->
            
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
        
                <!-- End Logo -->
        
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            
                    <!-- toggle and nav items -->
            
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- End Topbar header -->
    
            <!-- Bread crumb and right sidebar toggle -->
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Bagian TJ</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Bread crumb and right sidebar toggle -->
    
    
            <!-- Container fluid  -->
            <div class="container-fluid">
                <center><h3 class="page-title">Pusat Laporan <br>Neutron Yogyakarta</h3></center><br>
                <!-- Sales Cards  -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <a href="{{ url('/SK') }}">
                                <div class="box bg-cyan text-center">
                                    <!-- <h1 class="font-light text-white"><i class="fas fa-newspaper"></i></h1>
                                    <h4 class="text-white">Sekretariat</h4> -->
                                    <h5 class="font-light text-white"><i class="fas fa-inventory"></i></h5>
                                    <h4 class="text-white">Sekretariat</h4>
                                    <h5 class="font-light text-white"><i class="fas fa-inventory"></i></h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <a href="{{ url('/KU') }}">
                                <div class="box bg-danger text-center">
                                    <!-- <h1 class="font-light text-white"><i class="fas fa-money-bill-alt"></i></h1>
                                    <h4 class="text-white">Keuangan</h4> -->
                                    <h5 class="font-light text-white"><i class="fas fa-inventory"></i></h5>
                                    <h4 class="text-white">Keuangan</h4>
                                    <h5 class="font-light text-white"><i class="fas fa-inventory"></i></h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <a href="{{ url('/PG') }}">
                                <div class="box bg-info text-center">
                                    <!-- <h1 class="font-light text-white"><i class="far fa-handshake"></i></h1>
                                    <h4 class="text-white">Pengawasan</h4> -->
                                    <h5 class="font-light text-white"><i class="fas fa-inventory"></i></h5>
                                    <h4 class="text-white">Pengawasan</h4>
                                    <h5 class="font-light text-white"><i class="fas fa-inventory"></i></h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <a href="{{ url('/PK') }}">
                                <div class="box bg-warning text-center">
                                    <!-- <h1 class="font-light text-white"><i class="fas fa-users"></i></h1>
                                    <h4 class="text-white">Pengkaderan</h4> -->
                                    <h5 class="font-light text-white"><i class="fas fa-inventory"></i></h5>
                                    <h4 class="text-white">Pengkaderan</h4>
                                    <h5 class="font-light text-white"><i class="fas fa-inventory"></i></h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <a href="{{ url('/PD') }}">
                                <div class="box bg-primary text-center">
                                    <!-- <h1 class="font-light text-white"><i class="fas fa-book"></i></h1>
                                    <h4 class="text-white">Pendidikan & Pemateri</h4> -->
                                    <h5 class="font-light text-white"><i class="fas fa-inventory"></i></h5>
                                    <h4 class="text-white">Pendidikan & Pemateri</h4>
                                    <h5 class="font-light text-white"><i class="fas fa-inventory"></i></h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <a href="{{ url('/DT') }}">
                                <div class="box bg-secondary text-center">
                                    <!-- <h1 class="font-light text-white"><i class="fas fa-database"></i></h1>
                                    <h4 class="text-white">Data</h4> -->
                                    <h5 class="font-light text-white"><i class="fas fa-inventory"></i></h5>
                                    <h4 class="text-white">Data</h4>
                                    <h5 class="font-light text-white"><i class="fas fa-inventory"></i></h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <a href="{{ url('/INV') }}">
                                <div class="box bg-success text-center">
                                    <!-- <h1 class="font-light text-white"><i class="fas fa-warehouse"></i></h1>
                                    <h4 class="text-white">Inventaris</h4> -->
                                    <h5 class="font-light text-white"><i class="fas fa-inventory"></i></h5>
                                    <h4 class="text-white">Inventaris</h4>
                                    <h5 class="font-light text-white"><i class="fas fa-inventory"></i></h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <a href="{{ url('/PS') }}">
                                <div class="box bg-info text-center">
                                    <!-- <h1 class="font-light text-white"><i class="fas fa-user-plus"></i></h1>
                                    <h4 class="text-white">Personalia</h4> -->
                                    <h5 class="font-light text-white"><i class="fas fa-inventory"></i></h5>
                                    <h4 class="text-white">Personalia</h4>
                                    <h5 class="font-light text-white"><i class="fas fa-inventory"></i></h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <a href="{{ url('/ACC_PJK') }}">
                                <div class="box bg-success text-center">
                                    <!-- <h1 class="font-light text-white"><i class="mdi mdi-chart-bar"></i></h1>
                                    <h4 class="text-white">Accounting & Pajak</h4> -->
                                    <h5 class="font-light text-white"><i class="fas fa-inventory"></i></h5>
                                    <h4 class="text-white">Accounting & Pajak</h4>
                                    <h5 class="font-light text-white"><i class="fas fa-inventory"></i></h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <a href="{{ url('/KP_MM') }}">
                                <div class="box bg-warning text-center">
                                    <!-- <h1 class="font-light text-white"><i class="fas fa-desktop"></i></h1>
                                    <h4 class="text-white">Komputer & Multimedia</h4> -->
                                    <h5 class="font-light text-white"><i class="fas fa-inventory"></i></h5>
                                    <h4 class="text-white">Komputer & Multimedia</h4>
                                    <h5 class="font-light text-white"><i class="fas fa-inventory"></i></h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <a href="{{ url('/MK') }}">
                                <div class="box bg-cyan text-center">
                                    <!-- <h1 class="font-light text-white"><i class="fas fa-bullhorn"></i></h1>
                                    <h4 class="text-white">Marketing & Kerjasama</h4> -->
                                    <h5 class="font-light text-white"><i class="fas fa-inventory"></i></h5>
                                    <h4 class="text-white">Marketing & Kerjasama</h4>
                                    <h5 class="font-light text-white"><i class="fas fa-inventory"></i></h5>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Column -->
                    <!-- <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <a href="{{ url('/PM') }}">
                                <div class="box bg-cyan text-center">
                                    <h1 class="font-light text-white"><i class="mdi mdi-pencil"></i></h1>
                                    <h6 class="text-white">Pemateri</h6>
                                </div>
                            </a>
                        </div>
                    </div> -->
                    <!-- Column -->
                    <!-- <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <a href="{{ url('/LO') }}">
                                <div class="box bg-warning text-center">
                                    <h1 class="font-light text-white"><i class="mdi mdi-alert"></i></h1>
                                    <h6 class="text-white">Logistik</h6>
                                </div>
                            </a>
                        </div>
                    </div> -->
                    <!-- Column -->
                </div>       
                <!-- End Sales Cards  -->
        
            </div>
            <!-- End Container fluid  -->
    
    
            <!-- footer -->
            <footer class="footer text-center">
                &copy; <?php echo date('Y');?> <a href="javascript:void(0);">App by Neutron Yogyakarta</a>.
            </footer>
            <!-- End footer -->

    </div>
    <!-- End Wrapper -->

    
    <!-- All Jquery -->
    <script src="{{ asset('frontend/kuisioner/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('frontend/kuisioner/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{ asset('frontend/kuisioner/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('frontend/kuisioner/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{ asset('frontend/kuisioner/assets/extra-libs/sparkline/sparkline.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('frontend/kuisioner/dist/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('frontend/kuisioner/dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('frontend/kuisioner/dist/js/custom.min.js')}}"></script>
    <!--This page JavaScript -->
    <!-- <script src="../../dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="{{ asset('frontend/kuisioner/assets/libs/flot/excanvas.js')}}"></script>
    <script src="{{ asset('frontend/kuisioner/assets/libs/flot/jquery.flot.js')}}"></script>
    <script src="{{ asset('frontend/kuisioner/assets/libs/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{ asset('frontend/kuisioner/assets/libs/flot/jquery.flot.time.js')}}"></script>
    <script src="{{ asset('frontend/kuisioner/assets/libs/flot/jquery.flot.stack.js')}}"></script>
    <script src="{{ asset('frontend/kuisioner/assets/libs/flot/jquery.flot.crosshair.js')}}"></script>
    <script src="{{ asset('frontend/kuisioner/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{ asset('frontend/kuisioner/dist/js/pages/chart/chart-page-init.js')}}"></script>

</body>

</html>