@extends('layout.backend.baseindex')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>HALAMAN USERS TJ</h2>
            </div>
            <ol class="breadcrumb breadcrumb-col-red">
                <li><a href="{{url('padmin')}}"><i class="material-icons">dashboard</i> Dashboard</a></li>
                <li><a href="javascript:void(0);"><i class="material-icons">widgets</i> Fitur</a></li>
                <li class="active"><i class="material-icons">today</i> Halaman Users TJ</li>
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
                                            <h4 class="modal-title" id="myModalLabel">Tambah Users</h4>
                                        </div>
                                        <div class="modal-body">
                                        <form action="{{ route('user.store') }}" method="post">
                                        {{ csrf_field() }}
                                            <div class="form-line">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Bagian:</label>
                                                    <select name="bagian" class="form-control show-tick" data-live-search="true">
                                                        <option value="">-- Please Select Bagian --</option>
                                                        @foreach($bagians as $bagian)
                                                            <option value="{{$bagian->kode}}">{{$bagian->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-line">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <label for="recipient-name" class="col-form-label">NIK:</label>
                                                        <input name="nik" type="text" class="form-control" placeholder="NIK"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-line">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <label for="recipient-name" class="col-form-label">Name:</label>
                                                        <input name="name" type="text" class="form-control" placeholder="Name"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-line">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <label for="recipient-name" class="col-form-label">Email:</label>
                                                        <input name="email" type="text" class="form-control" placeholder="Email"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-line">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <label for="recipient-name" class="col-form-label">Username:</label>
                                                        <input name="username" type="text" class="form-control" placeholder="Username"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-line">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <label for="recipient-name" class="col-form-label">Password:</label>
                                                        <input name="password" type="password" class="form-control" placeholder="Password"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-line">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <label for="recipient-name" class="col-form-label">Re-Type Password:</label>
                                                        <input name="repassword" type="password" class="form-control" placeholder="Re-Type Password"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-line">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <label for="recipient-name" class="col-form-label">Permission:</label>
                                                        <input name="permission" type="text" class="form-control" placeholder="Permission"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-line">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <label for="recipient-name" class="col-form-label">HomeDir:</label>
                                                        <input name="homedir" type="text" class="form-control" placeholder="HomeDir"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-line">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <label for="recipient-name" class="col-form-label">Color:</label>
                                                        <input name="color"class="form-control" type="text" id="coloradd" placeholder="Pilih Color" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-line">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Role:</label>
                                                    <select name="role" class="form-control show-tick">
                                                        <option value="">-- Please Select Role --</option>
                                                        @foreach($roles as $role)
                                                            <option value="{{$role->kode}}">{{$role->name}}</option>
                                                        @endforeach
                                                    </select>
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
                                            <th>Bagian</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>HomeDir</th>
                                            <th>Color</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 0;
                                        ?>
                                        @foreach($users as $users)
                                        <?php
                                            $no++;
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td>
                                                @foreach ($bagians as $bagian)
                                                    @if($bagian->kode == $users->id_bagian)
                                                        {{ $bagian->name }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{$users->name}}</td>
                                            <td>{{$users->username}}</td>
                                            <td>{{$users->homedir}}</td>
                                            <td>
                                                <div style="background-color: {{$users->color}}; color: #ffffff; padding: 19px;"></div>
                                            </td>
                                            <td>
                                                @if( $users->status == "0")
                                                    <button class="btn btn-success btn-lg btn-block waves-effect" type="button">AKTIF</button>
                                                @else
                                                    <button class="btn btn-danger btn-lg btn-block waves-effect" type="button">NON AKTIF</button>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="#" data-target="#modalEdit{{$users->id}}" data-toggle="modal"><button type="button" class="btn btn-warning btn-circle-lg waves-effect waves-circle waves-float"><i class="material-icons">mode_edit</i></button></a>
                                                <!-- Modal Edit -->
                                                <div class="modal fade" id="modalEdit{{$users->id}}" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title" id="myModalLabel">Edit Role</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('user.update', $users->id) }}" method="post">
                                                                {{ csrf_field() }}
                                                                @method('PUT')
                                                                    <div class="form-line">
                                                                        <div class="form-group">
                                                                            <label for="recipient-name" class="col-form-label">Bagian:</label>
                                                                            <select name="bagian" class="form-control show-tick" data-live-search="true">
                                                                                @foreach ($bagians as $bagian)
                                                                                    <option 
                                                                                        value="{{$bagian->kode}}"
                                                                                        @if ($bagian->kode == $users->id_bagian)
                                                                                            selected
                                                                                        @endif
                                                                                            >{{$bagian->name}}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-line">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <label for="recipient-name" class="col-form-label">NIK:</label>
                                                                                <input name="nik" value="{{ $users->nik }}" type="text" class="form-control" placeholder="NIK"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-line">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <label for="recipient-name" class="col-form-label">Name:</label>
                                                                                <input name="name" value="{{ $users->name }}" type="text" class="form-control" placeholder="Name"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-line">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <label for="recipient-name" class="col-form-label">Email:</label>
                                                                                <input name="email" value="{{ $users->email }}"type="text" class="form-control" placeholder="Email"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-line">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <label for="recipient-name" class="col-form-label">Username:</label>
                                                                                <input name="username" value="{{ $users->username }}"type="text" class="form-control" placeholder="Username"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-line">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <label for="recipient-name" class="col-form-label">New Password:</label>
                                                                                <input name="password" type="password" class="form-control" placeholder="New Password"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-line">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <label for="recipient-name" class="col-form-label">Re-Type Password:</label>
                                                                                <input name="repassword" type="password" class="form-control" placeholder="Re-Type Password"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-line">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <label for="recipient-name" class="col-form-label">Permission:</label>
                                                                                <input name="permission" value="{{ $users->permission }}" type="text" class="form-control" placeholder="Permission"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-line">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <label for="recipient-name" class="col-form-label">HomeDir:</label>
                                                                                <input name="homedir" value="{{ $users->homedir }}" type="text" class="form-control" placeholder="HomeDir"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-line">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <label for="recipient-name" class="col-form-label">Color:</label>
                                                                                <input name="color" value="{{ $users->color }}" class="form-control" type="text" id="coloredit" placeholder="Pilih Color Khusus Untuk Karyawan" autocomplete="off">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-line">
                                                                        <div class="form-group">
                                                                            <label for="recipient-name" class="col-form-label">Role:</label>
                                                                            <select name="role" class="form-control show-tick">
                                                                                @foreach ($roles as $role)
                                                                                    <option 
                                                                                        value="{{$role->kode}}"
                                                                                        @if ($role->kode == $users->id_role)
                                                                                            selected
                                                                                        @endif
                                                                                            >{{$role->name}}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-line">
                                                                        <div class="form-group">
                                                                            <select name="status" value="{{$users->status}}" class="form-control show-tick">
                                                                                @if( $users->status == "0")
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

                                                <a href="#" data-target="#modalHapus{{$users->id}}" data-toggle="modal"><button type="button" class="btn btn-danger btn-circle-lg waves-effect waves-circle waves-float"><i class="material-icons">delete_forever</i></button></a>
                                                <!-- Modal Delete-->
                                                <div class="modal fade" id="modalHapus{{$users->id}}" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title" style="text-align:center;">Apakah anda yakin menghapus data ini?</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                            <form action="{{ route('user.destroy', $users->id) }}" method="POST">
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

    <script>
        $('#coloradd').colorpicker({});
        $('#coloredit').colorpicker({});
    </script>
@endsection