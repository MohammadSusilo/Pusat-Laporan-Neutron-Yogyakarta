@extends('layout.backend.baseindex')
@section('content')
    <section class="content">
    <?php
        $start = microtime(true);
    ?>
        <div class="container-fluid">
            <div class="block-header">
                <h2>HALAMAN JADWAL KARYAWAN TJ</h2>
            </div>
            <ol class="breadcrumb breadcrumb-col-red">
                <li><a href="{{url('padmin')}}"><i class="material-icons">dashboard</i> Dashboard</a></li>
                <li><a href="javascript:void(0);"><i class="material-icons">widgets</i> Fitur</a></li>
                <li class="active"><i class="material-icons">today</i> Halaman Jadwal Karyawan TJ</li>
            </ol>

            <!-- Card Jadwal -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <!-- Card Body -->
                        <div class="body">
                            <a href="#" data-target="#modalImport" data-toggle="modal"><button type="button" class="btn bg-blue-grey btn-circle-lg waves-effect waves-circle waves-float"><i class="material-icons">publish</i></button></a>
                            <!-- Modal Import-->
                            <div class="modal fade" id="modalImport" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Import Jadwal(BELUM)</h4>
                                        </div>
                                        <div class="modal-body">
                                        <form action="{{ url('jadwalImport') }}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                            <div class="form-group form-float form-group-lg">
                                                <div class="form-line">
                                                    <label>Pilih file excel</label>
                                                        <div class="form-group">
                                                            <input type="file" name="file" required="required">
                                                        </div>
                                                </div>
                                            </div>                     
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary waves-effect" name="simpan" value="Simpan">UPLOAD</button>
                                                <button type="reset" class="btn btn-danger waves-effect" name="batal" value="Batal">CANCEL</button>
                                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">CLOSE</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- #Modal Import -->

                            <a href="#" data-target="#modalHapusall" data-toggle="modal"><button type="button" class="btn btn-danger btn-circle-lg waves-effect waves-circle waves-float"><i class="material-icons">delete</i></button></a>
                            <!-- Modal Delete All -->
                            <div class="modal fade" id="modalHapusall" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" style="text-align:center;">Apakah anda yakin menghapus semua data ini?</h4>
                                        </div>
                                        <div class="modal-body">
                                        <form action="{{ url('jadwalDeleteAll') }}" method="post">
                                        @csrf
                                            <input type="hidden" name="id_role" value="{{Session::get('id_role')}}">
                                            <input type="hidden" name="id_cbg" value="{{Session::get('id_cbg')}}">

                                                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                                                <button type="submit" class="btn btn-danger waves-effect" name="simpan" value="Delete">DELETE</button>
                                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">CLOSE</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- #Modal Delete All -->
                        </div>
                        <!-- #Card Body -->
                    </div>
                </div>
            </div>
            <!-- #Card Jadwal -->

            <!-- Card Jadwal -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <!-- Card Body -->
                        <div class="body">
                            <div id='calendar'></div>
                        </div>
                        <!-- #Card Body -->
                    </div>
                </div>
            </div>
            <!-- #Card Jadwal -->
            
        </div>
        <?php
            $finish = microtime(true);
            print 'Page generated in : '. round(($finish - $start) * 1000, 2) .' <small>-ms</small>';
        ?>
    </section>

    <div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Schedule</h4>
                </div>

                <div class="modal-body">
                    <form id="antosubmit" role="form">
                        @csrf
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <div class="form-group form-float form-group-lg">
                            <div class="form-line">
                                @if(Session::get('id_role') == "ADM")
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="recipient-name" class="col-form-label">Color:</label>
                                            <input name="color" class="form-control" type="text" id="coloradd" placeholder="Pilih Color Khusus Untuk Karyawan" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select id="bagian" name="bagian" class="form-control show-tick" data-live-search="true" required autocomplete="off">
                                                <option value="">-- Please select Bagian --</option>
                                                @foreach($bagians as $bagian)    
                                                    <option value="{{$bagian->kode}}">{{$bagian->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endif
                                <div class="input-group">
                                    <span class="col-md-6">
                                        <i class="material-icons">create</i>
                                        <label for = "student">Judul</label>
                                    </span>
                                    <div class="col-md-12">
                                        <div class="form-line">
                                            <input type="text" class="input-control" id="title" name="title">
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group">
                                    <span class="col-md-2">
                                        <i class="material-icons">access_time</i>
                                        <label for = "student">Jam Mulai</label>
                                    </span>
                                    
                                    <div class="col-md-7">
                                        <div class="form-line">
                                            <input id="jam" name="jam" type="time" class="form-control input-md"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <span class="col-md-2">
                                        <i class="material-icons">access_time</i>
                                        <label for = "student">Jam Selesai</label>
                                    </span>
                                    
                                    <div class="col-md-7">
                                        <div class="form-line">
                                            <input id="jam_selesai" name="jam_selesai" type="time" class="form-control input-md"/>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="input-group">
                                    <span class="col-md-6">
                                        <i class="material-icons">place</i>
                                        <label for = "student">Tempat</label>
                                    </span>
                                    <div class="col-md-12">
                                        <div class="form-line">
                                            <input id="tempat" name="tempat" type="text" class="form-control input-md"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <span class="col-md-6">
                                        <i class="material-icons">event_note</i>
                                        <label for = "student">Rencana Kerja</label>
                                    </span>
                                    <div class="col-md-12">
                                        <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <span class="col-md-6">
                                        <i class="material-icons">event_available</i>
                                        <label for = "student">Realisasi/Tindak Lanjut</label>
                                    </span>
                                    <div class="col-md-12">
                                        <textarea class="form-control" id="tindakan_solusi" name="tindakan_solusi" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <span class="col-md-6">
                                        <i class="material-icons">people</i>
                                        <label for = "student">Personil</label>
                                    </span>
                                    <div class="col-md-12">
                                        <select multiple data-placeholder="Pilih Personil" tabindex="-1" class="select2 form-control" id="karyawan" name="karyawan[]">    
                                            @foreach ($bagians as $allpersonil)
                                                @if ($allpersonil->kode == Session::get('id_bagian'))
                                                    <option value="{{$allpersonil->kode}}">{{$allpersonil->name}}</option>
                                                @endif
                                            @endforeach

                                            @foreach ($personils as $personil)
                                                <option value="{{ $personil->nik }}">{{ $personil->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary waves-effect antosubmit">SAVE</button>
                            <button type="reset" class="btn btn-danger waves-effect">CANCEL</button>
                            <button type="button" class="btn btn-secondary waves-effect antoclose" data-dismiss="modal">CLOSE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Schedule</h4>
                </div>

                <div class="modal-body">
                    <form role="form">
                    @csrf
                        <div class="form-group form-float form-group-lg">
                            <div class="form-line">

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-circle-lg waves-effect waves-circle waves-float pull-left antodelete" title="Delete Event"><i class="material-icons">delete_forever</i></button>
                            <button type="submit" class="btn btn-primary waves-effect">SAVE CHANGE</button>
                            <button type="reset" class="btn btn-danger waves-effect">CANCEL</button>
                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="CalenderModalShow" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Show Schedule</h4>
                </div>

                <div class="modal-body">
                    <form role="form">
                        <div class="form-group form-float form-group-lg">
                            <div class="form-line">

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        (function() {
                
                var SITEURL = "{{url('/')}}";
                // $.ajaxSetup({
                //     headers: {
                //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //     }
                // });
        
                var calendar = $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                        // right: 'month, basicWeek, basicDay'
                    },
                    defaultView: 'month',
                    eventLimit: true,
                    selectable: true,
                    selectHelper: true,

                    editable: true, 
                    displayEventTime: true,
                    timeFormat: 'HH:mm',
                    minTime: '06:00:00',
                    selectable: true,
                    selectHelper: true,
                    // events: SITEURL + "jadwal",
                    events: "{{ url('/jadwal') }}",

                    eventRender: function (event, element, view) {
                        element.bind('dblclick', function() {
                            $('#id2').val(event.id);
                            $('#title2').val(event.color);
                            // $('#title2').val(event.title);
                            $('#CalenderModalEdit #colorku').val(event.color);
                            // $("#color2").select("val", event.color);
                            $('#bid2').val(event.mapel);
                            $('#kls2').val(event.id_kls);
                            $('#cbg2').val(event.id_cbg);
                            $('#ruang2').val(event.ruang);
                            $('#CalenderModalEdit').modal('show');
                        });
                        // if (event.allDay === 'true') {
                        //     event.allDay = true;
                        // } else {
                        //     event.allDay = false;
                        // }
                    },

                    select: function(start, end) {
                        $('#CalenderModalNew').modal('show');

                        started = start;
                        ended = end;

                        $(".antosubmit").on("click", function() {
                            var color = $("#color").val();
                            var bagian = $("#bagian").val();
                            var title = $("#title").val();
                            var jam = $("#jam").val();
                            var jam_selesai = $("#jam_selesai").val();
                            var tempat = $("#tempat").val();
                            var description = $("#description").val();
                            var tindakan_solusi = $("#tindakan_solusi").val();
                            var karyawan = $("#karyawan").val();

                            if (description) {
                                $.ajax({
                                    // url: "{{ url('/jadwal/create') }}",
                                    url: "{{ route('jadwal.store') }}",
                                    method: "POST",
                                    data: { "_token": $('#token').val(),
                                            color: color,
                                            bagian: bagian,
                                            title: title,
                                            jam: jam,
                                            jam_selesai: jam_selesai, 
                                            tempat: tempat,
                                            description: description,
                                            tindakan_solusi: tindakan_solusi,
                                            karyawan: karyawan,
                                            start: started.format("YYYY-MM-DD HH:mm:ss"), 
                                            end: ended.format("YYYY-MM-DD HH:mm:ss") },

                                    success: function(response){
                                        calendar.fullCalendar('renderEvent', {
                                            color: color,
                                            bagian: bagian,
                                            title: title,
                                            jam: jam,
                                            jam_selesai: jam_selesai, 
                                            tempat: tempat,
                                            description: description,
                                            tindakan_solusi: tindakan_solusi,
                                            karyawan: karyawan,
                                            start: started.format("YYYY-MM-DD HH:mm"),
                                            end: ended.format("YYYY-MM-DD HH:mm"),
                                            editable: true
                                        }, true);
                                        noty({type: 'success', layout: 'bottomRight', text: response.message, timeout: 3000});
                                    },
                                    error: function(e){
                                        alert('Error processing your request: '+e.responseText);
                                    }
                                });

                            }

                            $("#color").val('');
                            $("#bagian").val('');
                            $("#title").val('');
                            $("#jam").val('');
                            $("#jam_selesai").val('');
                            $("#tempat").val('');
                            $("#description").val('');
                            $("#tindakan_solusi").val('');
                            $("#karyawan").val('');

                            calendar.fullCalendar('unselect');

                            $('#CalenderModalNew').modal('hide');

                            return false;
                        });
                    },
                    
                    eventDrop: function(calEvent, delta, revertFunc) {
                    },

                    eventClick: function(calEvent, jsEvent, view) {
                        $('#CalenderModalShow').modal('show');
                    }
        
                });
        })();
    
        function displayMessage(message) {
            $(".response").html("<div class='success'>"+message+"</div>");
            setInterval(function() { $(".success").fadeOut(); }, 1000);
        }


        $('#coloradd').colorpicker({});
    </script>
@endsection
