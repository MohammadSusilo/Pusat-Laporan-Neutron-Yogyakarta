@extends('layout.backend.baseindex')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>CHANGELOGS DEVELOPER</h2>
            </div>
            <ol class="breadcrumb breadcrumb-col-red">
                <li><a href="{{url('padmin')}}"><i class="material-icons">dashboard</i> Dashboard</a></li>
                <li><a href="javascript:void(0);"><i class="material-icons">widgets</i> Fitur</a></li>
                <li class="active"><i class="material-icons">border_color</i> Changelogs Developer</li>
            </ol>

            <!-- Card Developer -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <!-- Card Header -->
                        <div class="header">                           
                            <a href="#" data-target="#modalAdd" data-toggle="modal"><button type="button" class="btn btn-success btn-circle-lg waves-effect waves-circle waves-float"><i class="material-icons">add_circle_outline</i></button></a>
                            <!-- Modal Add-->
                            <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Tambah Changelogs Developer</h4>
                                        </div>
                                        <div class="modal-body">
                                        <form action="{{ route('changelogs.store') }}" method="post">
                                        @csrf
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select name="user" class="form-control show-tick" data-live-search="true" required>
                                                        <option value="">-- Please select Developer --</option>
                                                        @foreach($getdev as $getdev)    
                                                            <option value="{{$getdev->id}}">{{$getdev->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input name="ver" type="text" class="form-control" placeholder="Versi" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input name="tgl" type="date" class="form-control" placeholder="Tanggal Update" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <textarea class="form-control" id="description" name="desc" rows="5"></textarea>
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
                            @if(\Session::has('savenis'))
                                <div class="alert bg-red alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <div>{{Session::get('savenis')}}</div>
                                </div>
                            @endif
                            @if(\Session::has('versi-sama'))
                                <div class="alert bg-red alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <div>{{Session::get('versi-sama')}}</div>
                                </div>
                            @endif
                            @if (count($errors) > 0)
                                <div class="alert bg-red alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
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
                            @if(\Session::has('updatenis'))
                                <div class="alert bg-red alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <div>{{Session::get('updatenis')}}</div>
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
                        <!-- #Card Nofication -->
                        
                        <!-- Card Body -->
                        <div class="body">
                            <!-- Card Table -->
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Pembuat</th>
                                            <th>Deskripsi</th>
                                            <th>Versi</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no=0;
                                        ?>
                                        @foreach($developer as $developer)
                                        <?php 
                                            $no++;
                                        ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td>
                                                @foreach ($user as $sia)
                                                    @if($sia->id == $developer->id_user)
                                                        {{ $sia->name }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{$developer->desc}}</td>
                                            <td>{{$developer->versi}}</td>
                                            <td>{{date('d F Y', strtotime($developer->tgl))}}</td>
                                            <td>
                                                <a href="#" data-target="#modalEdit{{$developer->id}}" data-toggle="modal"><button type="button" class="btn btn-warning btn-circle-lg waves-effect waves-circle waves-float"><i class="material-icons">mode_edit</i></button></a>
                                                <!-- Modal Edit -->
                                                <div class="modal fade" id="modalEdit{{$developer->id}}" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title" id="myModalLabel">Edit Changelogs</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('changelogs.update', $developer->id) }}" method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <select name="user" class="form-control show-tick" data-live-search="true">
                                                                                @foreach ($develop as $getuser)
                                                                                    <option 
                                                                                        value="{{$getuser->id}}"
                                                                                        @if($developer->id_user == $getuser->id)
                                                                                            selected
                                                                                        @endif
                                                                                        >{{ $getuser->name }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input name="versi" value="{{ $developer->versi }}" type="text" class="form-control" placeholder="Versi" required/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <input name="tgl" value="{{ $developer->tgl }}" type="date" class="form-control" placeholder="Tanggal Update" required/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <textarea class="form-control" id="description" name="desc" rows="5">{{ $developer->desc }}</textarea>
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

                                                <a href="#" data-target="#modalHapus{{$developer->id}}" data-toggle="modal"><button type="button" class="btn btn-danger btn-circle-lg waves-effect waves-circle waves-float"><i class="material-icons">delete_forever</i></button></a>
                                                <!-- Modal Delete-->
                                                <div class="modal fade" id="modalHapus{{$developer->id}}" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title" style="text-align:center;">Apakah anda yakin menghapus data ini?</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                            <form action="{{ route('changelogs.destroy', $developer->id) }}" method="POST">
                                                            @csrf
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
                            <!-- #Card Table -->
                        </div>
                        <!-- #Card Body -->
                    </div>
                </div>
            </div>
            <!-- #Card Developer -->
        </div>
    </section>
@endsection