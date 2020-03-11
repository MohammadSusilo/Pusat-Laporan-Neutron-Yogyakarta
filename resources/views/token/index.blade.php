@extends('layout.backend.baseindex')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>TOKEN</h2>
            </div>
            <ol class="breadcrumb breadcrumb-col-red">
                <li><a href="{{url('padmin')}}"><i class="material-icons">dashboard</i> Dashboard</a></li>
                <li><a href="javascript:void(0);"><i class="material-icons">widgets</i> Evaluasi & Quiz</a></li>
                <li class="active"><i class="material-icons">security</i> Data Token</li>
            </ol>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body bg-cyan">
                        <h4>Perhatian</h4>
                        <p>Silahkan klik Generate Token untuk mendapatkan token yang akan diberikan ke cabang.</p>
                    </div>
                </div>
            </div>
            <!-- Generate Token -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <!-- Card Header -->
                        <div class="header">                           
                            Generate Token
                        </div>
                        <!-- #Card Header -->

                        <!-- Card Nofication -->
                            <!-- Save -->
                            @if(\Session::has('save-success'))
                                <div class="alert bg-green alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <div>{{Session::get('save-success')}}</div>
                                </div>
                            @endif
                            @if(\Session::has('save-gagal'))
                                <div class="alert bg-red alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <div>{{Session::get('save-gagal')}}</div>
                                </div>
                            @endif
                            @if(\Session::has('savetoken'))
                                <div class="alert bg-red alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <div>{{Session::get('savetoken')}}</div>
                                </div>
                            @endif
                            <!-- #Save -->

                            <!-- delete -->
                            @if(\Session::has('delete-success'))
                                <div class="alert bg-green alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <div>{{Session::get('delete-success')}}</div>
                                </div>
                            @endif
                            @if(\Session::has('delete-gagal'))
                                <div class="alert bg-red alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <div>{{Session::get('delete-gagal')}}</div>
                                </div>
                            @endif
                            <!-- #delete -->
                        <!-- #Card Nofication -->
                        
                        <!-- Card Body -->
                        <div class="body">
                            <div class="card">
                                <div class="body bg-cyan">
                                    <div class="text-right">
                                        <img class="img-fluid" style='max-width: 100px' src="{{ asset('qr-code.svg')}}" alt="alternative">
                                    </div>
                                    <div class="text-left">
                                        <h3><span>
                                            @if($last_token == null)

                                            @else
                                                {{$last_token->isi_token}}
                                            @endif
                                        </span></h3>
                                        <p>Token Tes Terakhir Generate</p>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('token.store') }}" method="post">
                            {{ csrf_field() }}
                                <footer class="text-right">
                                    <button type="submit" class="btn btn-primary" id="import">Generate Token</button>
                                </footer>
                            </form>
                        </div>
                        <!-- #Card Body -->
                    </div>
                </div>
            </div>
            <!-- #Generate Token -->

            <!-- Daftar Token -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <!-- Card Header -->
                        <div class="header">                           
                            Daftar Token Hari Ini
                        </div>
                        <!-- #Card Header -->

                        <!-- Card Body -->
                        <div class="body">
                            <div class="table-responsive">
                                <!-- Card Table -->
                                <table id="table-token" class="table table-bordered table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Pembuat</th>
                                            <th>Token</th>
                                            <th>Waktu Generate</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no=0;
                                        ?>
                                        @foreach($tokens as $token)
                                        <?php 
                                            $no++;
                                        ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td>
                                                @foreach ($users as $user)
                                                    @if($user->id == $token->id_user)
                                                        {{$user->name}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{$token->isi_token}}</td>
                                            <td>{{date('d F Y || H:i', strtotime($token->created_at))}}</td>
                                            <td>
                                                <a href="#" data-target="#modalHapus{{$token->id}}" data-toggle="modal"><button type="button" class="btn btn-danger btn-circle-lg waves-effect waves-circle waves-float"><i class="material-icons">delete_forever</i></button></a>
                                                <!-- Modal DELETE -->
                                                    <div class="modal fade" id="modalHapus{{$token->id}}" tabindex="-1" role="dialog">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title" style="text-align:center;">Apakah anda yakin menghapus data ini?</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                <form action="{{ route('token.destroy', $token->id) }}" method="POST">
                                                                {{ csrf_field() }}
                                                                @method('DELETE')
                                                                        <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                                                                        <button type="submit" class="btn btn-danger waves-effect" name="simpan" value="Delete">DELETE</button>
                                                                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">CLOSE</button>
                                                                    </div>
                                                                </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <!-- #END# Modal DELETE -->
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- #Card Table -->
                            </div>
                        </div>
                        <!-- #Card Body -->
                    </div>
                </div>
            </div>
            <!-- #Daftar Token -->
        </div>
    </section>
@endsection