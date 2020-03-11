@extends('layout.backend.baseindex')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Changelogs -->
            <div class="block-header">
                <h2>CHANGELOGS DEVELOPER</h2>
            </div>
            @foreach($developer as $developer)
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Versi : {{$developer->versi}}
                                <small>Tanggal : {{date('d F Y', strtotime($developer->tgl))}}</small>
                                <small>
                                    Tim Developer : 
                                    @foreach ($user as $sia)
                                        @if($sia->id == $developer->id_user)
                                            {{ $sia->name }}
                                        @endif
                                    @endforeach
                                </small>
                            </h2>
                        </div>
                        <div class="body">
                            <h3>Detail :</h3>
                            <p>{{$developer->desc}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
@endsection