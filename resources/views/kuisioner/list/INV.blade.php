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
    <link href="{{ asset('frontend/kuisioner/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <!-- Custom CSS -->

    <link href="{{ asset('frontend/kuisioner/dist/css/style.min.css')}}" rel="stylesheet">
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
                            <!-- Dark Logo icon -->
                            <img src="{{ asset('frontend/kuisioner/assets/images/icon.png')}}" alt="homepage" class="light-logo" />
                           
                        </b>
                        <!--End Logo icon -->

                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- Dark Logo icon -->
                            <img src="{{ asset('frontend/kuisioner/assets/images/rsz_text.png')}}" alt="homepage" class="light-logo" />
                            
                        </span>
                        <!--End Logo text -->
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
            
                    <!-- Right side toggle and nav items -->
            
                    <ul class="navbar-nav float-right">
                
                        <!-- User profile and search -->
                
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('frontend/kuisioner/assets/images/users/1.jpg')}}" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <div class="dropdown-divider"></div>
                                <div class="p-l-30 p-10"><a href="{{ url('/DashboardLaporan') }}" class="btn btn-sm btn-secondary btn-rounded">BACK</a></div>
                            </div>
                        </li>
                
                        <!-- User profile and search -->
                
                    </ul>
                </div>
            </nav>
        </header>
        <!-- End Topbar header -->
    
            <!-- Bread crumb and right sidebar toggle -->
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">List Laporan Inventaris</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ url('/DashboardLaporan') }}">Bagian TJ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Inventaris</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Bread crumb and right sidebar toggle -->
    
    
            <!-- Container fluid  -->
            <div class="container-fluid">
        
                <!-- Sales Cards  -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table id="zero_config" class="table">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($getbag as $INV)
                                                    <tr>
                                                        <td>
                                                            <ul class="list-style-none">
                                                                <li class="d-flex no-block card-body">
                                                                    <i class="fa fa-check-circle w-30px m-t-5"></i>
                                                                    <div>
                                                                        <a href="{{$INV->link}}" target="_blank" class="m-b-0 font-medium p-0">{{$INV->judul}}</a>
                                                                        <span class="text-muted">{{$INV->desc}}</span>
                                                                    </div>
                                                                    <div class="ml-auto">
                                                                        <div class="tetx-right">
                                                                            <h5 class="text-muted m-b-0">{{ date('d', strtotime($INV->created_at)) }}</h5>
                                                                            <span class="text-muted font-16">{{ date('F', strtotime($INV->created_at)) }}</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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

    <script src="{{ asset('frontend/kuisioner/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>

</body>

</html>