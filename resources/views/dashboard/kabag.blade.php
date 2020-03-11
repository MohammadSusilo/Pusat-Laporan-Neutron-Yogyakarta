@extends('layout.backend.baseindex')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>HALAMAN KABAG/WAKABAG/KASUBAG               
                                    @foreach ($bagians as $bagian)
                                        @if($bagian->kode == Session::get('id_bagian'))
                                            {{ $bagian->name }}
                                        @endif
                                    @endforeach
                </h2>
            </div>
            <ol class="breadcrumb breadcrumb-col-red">
                <li><a href="{{url('padmin')}}"><i class="material-icons">dashboard</i> Dashboard</a></li>
                <li class="active"><i class="material-icons">widgets</i> Dashboard Kabag TJ</li>
                <li class="active"><i class="material-icons">widgets</i> Dashboard Kabag/Wakabag/Kasubag
                                                                                            @foreach ($bagians as $bagian)
                                                                                                @if($bagian->kode == Session::get('id_bagian'))
                                                                                                    {{ $bagian->name }}
                                                                                                @endif
                                                                                            @endforeach
                </li>
            </ol>
            
             <!-- Widgets -->
             <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">people</i>
                        </div>
                        <div class="content">
                        <div class="text">Users</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">{{$user}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">assignment_turned_in</i>
                        </div>
                        <div class="content">
                        <div class="text">Laporan</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">{{$laporan}}</div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">event_note</i>
                        </div>
                        <div class="content">
                            <div class="text">Schedule</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">121</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <div class="content">
                        <div class="text">Notes</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">2121</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">folder_shared</i>
                        </div>
                        <div class="content">
                            <div class="text">Folder</div>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20">121</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-teal hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">library_books</i>
                        </div>
                        <div class="content">
                            <div class="text">Files</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20">212</div>
                        </div>
                    </div>
                </div> -->
            </div>
            <!-- #END# Widgets -->
        </div>
    </section>
@endsection