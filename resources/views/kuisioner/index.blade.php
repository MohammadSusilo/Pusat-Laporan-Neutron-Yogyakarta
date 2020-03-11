@extends('layout.backend.baseindex')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>HALAMAN LAPORAN</h2>
            </div>
            <ol class="breadcrumb breadcrumb-col-red">
                <li><a href="{{url('padmin')}}"><i class="material-icons">dashboard</i> Dashboard</a></li>
                <li><a href="javascript:void(0);"><i class="material-icons">widgets</i> Fitur</a></li>
                <li class="active"><i class="material-icons">assignment</i> Halaman Laporan</li>
            </ol>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body bg-cyan">
                        <div class="text-right">
                            <img class="img-fluid" style='max-width: 100px' src="{{ asset('qr-code.svg')}}" alt="alternative">
                        </div>
                        <div class="text-left">
                            <h1><span>
                                @if($last_token == null)

                                @else
                                    {{$last_token->isi_token}}
                                @endif
                            </span></h1>
                            <h4>Perhatian</h4>
                            <p>Silahkan berikan token yang tergenerate cabang.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">                           
                            <a href="#" data-target="#modalAdd" data-toggle="modal"><button type="button" class="btn btn-success btn-circle-lg waves-effect waves-circle waves-float"><i class="material-icons">add_circle_outline</i></button></a>
                            <!-- Modal Add -->
                            <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Tambah Laporan</h4>
                                        </div>
                                        <div class="modal-body">
                                        <form action="{{ route('listkuisioner.store') }}" method="post">
                                        {{ csrf_field() }}
                                            <div class="form-group form-float form-group-lg">
                                                <div class="form-line">
                                                    @if(Session::get('id_role') == "ADM")
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <select name="bagian" class="form-control show-tick" data-live-search="true">
                                                                    <option value="">-- Please select BAGIAN --</option>
                                                                    @foreach($getbags as $getbag)
                                                                        <option value="{{$getbag->kode}}">{{$getbag->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="input-group">
                                                        <span class="col-md-6">
                                                            <i class="material-icons">place</i>
                                                            <label for = "student">Judul</label>
                                                        </span>
                                                        <div class="col-md-12">
                                                            <div class="form-line">
                                                                <input name="judul" type="text" class="form-control"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="col-md-6">
                                                            <i class="material-icons">place</i>
                                                            <label for = "student">Deskripsi</label>
                                                        </span>
                                                        <div class="col-md-12">
                                                            <div class="form-line">
                                                                <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="col-md-6">
                                                            <i class="material-icons">place</i>
                                                            <label for = "student">Link</label>
                                                        </span>
                                                        <div class="col-md-12">
                                                            <div class="form-line">
                                                                <input name="linkform" type="text" class="form-control"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                     
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary waves-effect" name="simpan" value="Simpan">SAVE</button>
                                                <button type="reset" class="btn btn-danger waves-effect" name="batal" value="Batal">CANCEL</button>
                                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">CLOSE</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- #Modal Add -->
                        </div>

                            <!-- NOTIFIKASI -->        
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
                                <!-- #Save -->
                                
                                <!-- Import -->
                                @if(\Session::has('import-success'))
                                    <div class="alert bg-green alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <div>{{Session::get('import-success')}}</div>
                                    </div>
                                @endif
                                @if(\Session::has('import-gagal'))
                                    <div class="alert bg-red alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <div>{{Session::get('import-gagal')}}</div>
                                    </div>
                                @endif
                                <!-- #Import -->

                                <!-- Delete All -->
                                @if(\Session::has('deleteall-success'))
                                    <div class="alert bg-green alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <div>{{Session::get('deleteall-success')}}</div>
                                    </div>
                                @endif
                                @if(\Session::has('deleteall-gagal'))
                                    <div class="alert bg-red alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <div>{{Session::get('deleteall-gagal')}}</div>
                                    </div>
                                @endif
                                <!-- #Delete All -->

                                <!-- Edit -->
                                @if(\Session::has('edit-success'))
                                    <div class="alert bg-green alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <div>{{Session::get('edit-success')}}</div>
                                    </div>
                                @endif
                                @if(\Session::has('edit-gagal'))
                                    <div class="alert bg-red alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <div>{{Session::get('edit-gagal')}}</div>
                                    </div>
                                @endif
                                <!-- #Edit -->

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
                            <!-- #NOTIFIKASI -->

                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            @if(Session::get('id_role')=="ADM")
                                                <th>Bagian</th>
                                            @endif
                                            <th>Judul</th>
                                            <th>Description</th>
                                            <th>Link</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                            $no=0;
                                        ?>
                                        @foreach($kuisioners as $kuisioner)
                                        <?php 
                                            $no++;
                                        ?>
                                        <tr class="">
                                            <td><?php echo $no;?></td>
                                            @if(Session::get('id_role') == "ADM")
                                                <td>
                                                    @foreach ($getbags as $getbag)
                                                        @if($getbag->kode == $kuisioner->id_bagian)
                                                            {{str_replace("-", " ", $getbag->name)}}
                                                        @endif
                                                    @endforeach
                                                </td>
                                            @endif
                                            <td>{{$kuisioner->judul}}</td>
                                            <td>{{$kuisioner->desc}}</td>
                                            <td>{{$kuisioner->link}}</td>
                                            <td>
                                                <a href="#" data-target="#modalEdit{{$kuisioner->id}}" data-toggle="modal"><button type="button" class="btn btn-warning btn-circle-lg waves-effect waves-circle waves-float"><i class="material-icons">mode_edit</i></button></a>
                                                <!-- Modal Edit -->
                                                <div class="modal fade" id="modalEdit{{$kuisioner->id}}" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title" id="myModalLabel">Edit Laporan</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('listkuisioner.update', $kuisioner->id) }}" method="post">
                                                                {{ csrf_field() }}
                                                                @method('PUT')
                                                                    <div class="form-group form-float form-group-lg">
                                                                        <div class="form-line">
                                                                            @if(Session::get('id_role') == "ADM")
                                                                                <div class="form-group">
                                                                                    <div class="form-line">
                                                                                        <select name="bagian" class="form-control show-tick" data-live-search="true">
                                                                                            @foreach ($editgetbags as $getbag)
                                                                                                <option 
                                                                                                    value="{{$getbag->kode}}"
                                                                                                    @if ($getbag->kode == $kuisioner->id_bagian)
                                                                                                        selected
                                                                                                    @endif
                                                                                                        >{{$getbag->name}}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            @endif
                                                                            <div class="input-group">
                                                                                <span class="col-md-6">
                                                                                    <i class="material-icons">place</i>
                                                                                    <label for = "student">Judul</label>
                                                                                </span>
                                                                                <div class="col-md-12">
                                                                                    <div class="form-line">
                                                                                        <input name="judul" value="{{$kuisioner->judul}}" type="text" class="form-control"/>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="input-group">
                                                                                <span class="col-md-6">
                                                                                    <i class="material-icons">place</i>
                                                                                    <label for = "student">Deskripsi</label>
                                                                                </span>
                                                                                <div class="col-md-12">
                                                                                    <div class="form-line">
                                                                                        <textarea class="form-control" id="description" name="description" rows="5">{{$kuisioner->desc}}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="input-group">
                                                                                <span class="col-md-6">
                                                                                    <i class="material-icons">place</i>
                                                                                    <label for = "student">Link</label>
                                                                                </span>
                                                                                <div class="col-md-12">
                                                                                    <div class="form-line">
                                                                                        <input name="linkform" value="{{$kuisioner->link}}" type="text" class="form-control"/>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>                     
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary waves-effect" name="simpan" value="Simpan">SAVE CHANGE</button>
                                                                        <button type="reset" class="btn btn-danger waves-effect" name="batal" value="Batal">CANCEL</button>
                                                                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">CLOSE</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- #Modal Edit -->

                                                <a href="#" data-target="#modalHapus{{$kuisioner->id}}" data-toggle="modal"><button type="button" class="btn btn-danger btn-circle-lg waves-effect waves-circle waves-float"><i class="material-icons">delete_forever</i></button></a>
                                                <!-- Modal Delete-->
                                                <div class="modal fade" id="modalHapus{{$kuisioner->id}}" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title" style="text-align:center;">Apakah anda yakin menghapus data ini?</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                            <form action="{{ route('listkuisioner.destroy', $kuisioner->id) }}" method="POST">
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
                                                <!-- #Modal Delete-->
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
            <!-- #END# Exportable Table -->
        </div>
    </section>
@endsection