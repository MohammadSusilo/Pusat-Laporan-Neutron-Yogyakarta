@extends('layout.backend.baseindex')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>HALAMAN BAGIAN TJ</h2>
            </div>
            <ol class="breadcrumb breadcrumb-col-red">
                <li><a href="{{url('padmin')}}"><i class="material-icons">dashboard</i> Dashboard</a></li>
                <li><a href="javascript:void(0);"><i class="material-icons">widgets</i> Fitur</a></li>
                <li class="active"><i class="material-icons">today</i> Halaman Bagian TJ</li>
            </ol>

            <!-- Card Bagian -->
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
                                            <h4 class="modal-title" id="myModalLabel">Tambah Bagian</h4>
                                        </div>
                                        <div class="modal-body">
                                        <form action="{{ route('bagian.store') }}" method="post">
                                        {{ csrf_field() }}
                                            <div class="form-line">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input name="kode" type="text" class="form-control" placeholder="Kode Bagian"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-line">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input name="name" type="text" class="form-control" placeholder="Name"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-line">
                                                <div class="form-group">
                                                    <select name="status" class="form-control show-tick">
                                                        <option value="">-- Please Select Status --</option>
                                                        <option value="0">Aktif</option>
                                                        <option value="1">Non Aktif</option>
                                                    </select>
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
                            <!-- #Modal Add-->
                        </div>
                        <!-- #Card Header -->

                        <!-- Card Body -->
                        <div class="body">
                            <!-- Card Table -->
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>No</th>    
                                            <th>Kode</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 0;
                                        ?>
                                        @foreach($bagian as $bagian)
                                        <?php
                                            $no++;
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td>{{$bagian->kode}}</td>
                                            <td>{{$bagian->name}}</td>
                                            <td>
                                                @if( $bagian->status == "0")
                                                    <button class="btn btn-success btn-lg btn-block waves-effect" type="button">AKTIF</button>
                                                @else
                                                    <button class="btn btn-danger btn-lg btn-block waves-effect" type="button">NON AKTIF</button>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="#" data-target="#modalEdit{{$bagian->id}}" data-toggle="modal"><button type="button" class="btn btn-warning btn-circle-lg waves-effect waves-circle waves-float"><i class="material-icons">mode_edit</i></button></a>
                                                <!-- Modal Edit -->
                                                <div class="modal fade" id="modalEdit{{$bagian->id}}" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title" id="myModalLabel">Edit Bagian</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('bagian.update', $bagian->id) }}" method="post">
                                                                {{ csrf_field() }}
                                                                @method('PUT')
                                                                    <div class="form-line">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input name="kode" value="{{$bagian->kode}}" type="text" class="form-control" placeholder="Kode Bagian"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-line">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input name="name" value="{{$bagian->name}}" type="text" class="form-control" placeholder="Name"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-line">
                                                                        <div class="form-group">
                                                                            <select name="status" value="{{$bagian->status}}" class="form-control show-tick">
                                                                                @if( $bagian->status == "0")
                                                                                    <option value="0" selected>Aktif</option>
                                                                                    <option value="1">Non Aktif</option>
                                                                                @else
                                                                                    <option value="0">Aktif</option>
                                                                                    <option value="1" selected>Non Aktif</option>
                                                                                @endif
                                                                            </select>
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

                                                <a href="#" data-target="#modalHapus{{$bagian->id}}" data-toggle="modal"><button type="button" class="btn btn-danger btn-circle-lg waves-effect waves-circle waves-float"><i class="material-icons">delete_forever</i></button></a>
                                                <!-- Modal Delete-->
                                                <div class="modal fade" id="modalHapus{{$bagian->id}}" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title" style="text-align:center;">Apakah anda yakin menghapus data ini?</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                            <form action="{{ route('bagian.destroy', $bagian->id) }}" method="POST">
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
                            <!-- #Card Table -->
                        </div>
                        <!-- #Card Body -->
                    </div>
                </div>
            </div>
            <!-- #Card Bagian -->
        </div>
    </section>
@endsection