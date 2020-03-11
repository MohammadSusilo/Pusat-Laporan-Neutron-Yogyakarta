
	<!DOCTYPE html>
<html>
    <head>
        <title>Agenda Kerja IT HO</title>
        <meta charset='utf-8' />
        <link href="http://58.145.175.213/agenda_kerja/assets/bower_components/themify-icons/themify-icons.css" rel="stylesheet" media="screen">
        <link href="http://58.145.175.213/agenda_kerja/assets/bower_components/css/styles.css" rel="stylesheet" media="screen">
        <link href="http://58.145.175.213/agenda_kerja/assets/css/bootstrap.min.css" rel="stylesheet">
        <link href='http://58.145.175.213/agenda_kerja/assets/css/fullcalendar.css' rel='stylesheet' />
        <link href="http://58.145.175.213/agenda_kerja/assets/css/bootstrapValidator.min.css" rel="stylesheet" />        
        <link href="http://58.145.175.213/agenda_kerja/assets/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
        <link href="http://58.145.175.213/agenda_kerja/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <!-- Custom css  -->
        <link href="http://58.145.175.213/agenda_kerja/assets/css/custom_css.css" rel="stylesheet" />
        <link href="http://58.145.175.213/agenda_kerja/assets/sing/css/apps.min.css" rel="stylesheet" />

        <script src='http://58.145.175.213/agenda_kerja/assets/js/moment.min.js'></script>
        <script src="http://58.145.175.213/agenda_kerja/assets/js/jquery.min.js"></script>
        <script src="http://58.145.175.213/agenda_kerja/assets/js/bootstrap.min.js"></script>
        <script src="http://58.145.175.213/agenda_kerja/assets/js/bootstrapValidator.min.js"></script>
        <script src="http://58.145.175.213/agenda_kerja/assets/js/fullcalendar.min.js"></script>
        <script src='http://58.145.175.213/agenda_kerja/assets/js/bootstrap-colorpicker.min.js'></script>
        <link rel="shortcut icon" href="http://58.145.175.213/agenda_kerja//assets/img/tittle.png"/>
        <style type="text/css">
            ::-webkit-scrollbar {
                width: 5px;
                background: #e7e7e7;
            }
            ::-webkit-scrollbar-thumb {
                background: #8e8e93;
                -webkit-border-radius:10px;
                border-radius: 5px;
            }
            .judul{
                padding-left: 10px;
                padding-right: 10px;
                font-size:20px;
                font-weight: bold;
                color: green;
            }
        </style>
        <script type="text/javascript">
            $(function(){
                var currentDate;
                var currentEvent;
                $('#color').colorpicker();
                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev, next, today',
                        center: 'title',
                         right: 'month, basicWeek, basicDay'
                    },
                    eventLimit: true,
                    events: 'getEvents',
                    selectable: true,
                    selectHelper: true,
                    editable: true, 

                    select: function(start, end) {
                        $('#start').val(moment(start).format('YYYY-MM-DD'));
                        $('#end').val(moment(end).format('YYYY-MM-DD'));
                        modal({
                            buttons: {
                                add: {
                                    id: 'add-event',
                                    css: 'btn-success',
                                    label: 'Add'
                                }
                            },
                            title: 'Add Event'
                        });
                    }, 

                    eventDrop: function(event, delta, revertFunc,start,end) {
                        start = event.start.format('YYYY-MM-DD');
                        if(event.end){
                            end = event.end.format('YYYY-MM-DD');
                        }else{
                            end = start;
                        }      
                           $.post('dragUpdateEvent',{                            
                            id:event.id,
                            start : start,
                            end :end
                        }, function(result){
                            $('.alert').addClass('alert-success').text('Event updated successfuly');
                            hide_notify();
                        });
                      },

                    eventResize: function(event,dayDelta,minuteDelta,revertFunc) {        
                        start = event.start.format('YYYY-MM-DD');
                        if(event.end){
                            end = event.end.format('YYYY-MM-DD');
                        }else{
                            end = start;
                        }          
                        $.post('dragUpdateEvent',{                            
                            id:event.id,
                            start : start,
                            end :end
                        }, function(result){
                            $('.alert').addClass('alert-success').text('Event updated successfuly');
                            hide_notify();
                        });
                    },

                    eventMouseover: function(calEvent, jsEvent, view){
                        var personil=calEvent.personil;
                        if (personil==''){
                            var prsnl='';
                        } else {
                            var prsnl='@'+personil;
                        }
                        var tooltip = '<div class="event-tooltip">' + calEvent.description + ' ' + prsnl + '</div>';
                        $("body").append(tooltip);
                        $(this).mouseover(function(e) {
                            $(this).css('z-index', 10000);
                            $('.event-tooltip').fadeIn('500');
                            $('.event-tooltip').fadeTo('10', 1.9);
                        }).mousemove(function(e) {
                            $('.event-tooltip').css('top', e.pageY + 10);
                            $('.event-tooltip').css('left', e.pageX + 20);
                        });
                    },

                    eventMouseout: function(calEvent, jsEvent) {
                        $(this).css('z-index', 8);
                        $('.event-tooltip').remove();
                    },

                    eventClick: function(calEvent, jsEvent, view) {
                        currentEvent = calEvent;
                        modal({
                            buttons: {
                                delete: {
                                    id: 'delete-event',
                                    css: 'btn-danger',
                                    label: 'Delete'
                                },
                                update: {
                                    id: 'update-event',
                                    css: 'btn-success',
                                    label: 'Update'
                                }
                            },
                            title: 'Edit Event "' + calEvent.title + '"',
                            event: calEvent
                        });
                    }

                });

                function modal(data) {
                    var aaaa=data.event ? data.event.jenis_job : '';
                    var bbbb=data.event ? data.event.detail_jenis_job : '';
                    if(aaaa==""){
                        
                    } else {
                        $.ajax({
                            type:'POST',
                            url: "ambildetail",
                            data: "id="+aaaa,
                            success: function(msg){
                                $("#detail_kategori").html(msg);
                                $("#detail_kategori").select2("val", data.event ? data.event.detail_jenis_job : '');
                            }
                        });
                    }
                    $('#personil_baru').select2('val', '');
                    $('.modal-title').html(data.title);
                    $('.modal-footer button:not(".btn-default")').remove();
                    $('#title').val(data.event ? data.event.title_ory : '');
                    $('#jam').val(data.event ? data.event.jam : '');
                    $('#jam_selesai').val(data.event ? data.event.jam_selesai : '');
                    $('#tempat').val(data.event ? data.event.tempat : '');
                    $('#personil').val(data.event ? data.event.personil : ''); 
                    $('#personil_baru').val(data.event ? data.event.personil_baru : '');        
                    $('#description').val(data.event ? data.event.description : '');
                    $('#tindakan_solusi').val(data.event ? data.event.tindakan_solusi : '');
                    $("#kategori").select2("val", data.event ? data.event.jenis_job : '');
                    $("#detail_kategori").select2("val", data.event ? data.event.detail_jenis_job : '');
                    $('#color').val(data.event ? data.event.color : '#3a87ad');
                    $.each(data.buttons, function(index, button){
                        $('.modal-footer').prepend('<button type="button" id="' + button.id  + '" class="btn ' + button.css + '">' + button.label + '</button>')
                    })
                    $('.modal').modal('show');
                }

                $('.modal').on('click', '#add-event',  function(e){
                    if(validator(['description'])) {
                        $.post('addEvent', {
                            title: $('#title').val(),
                            jam: $('#jam').val(),
                            jam_selesai: $('#jam_selesai').val(),
                            tempat: $('#tempat').val(),
                            personil_baru: $('#personil_baru').val(),
                            description: $('#description').val(),
                            tindakan_solusi: $('#tindakan_solusi').val(),
                            jenis_job: $('#kategori').val(),
                            detail_jenis_job: $('#detail_kategori').val(),
                            color: $('#color').val(),
                            start: $('#start').val(),
                            end: $('#end').val()
                        }, function(result){
                            $('.alert').addClass('alert-success').text('Event added successfuly');
                            $('.modal').modal('hide');
                            $('#calendar').fullCalendar("refetchEvents");
                            hide_notify();
                        });
                    }
                });

                $('.modal').on('click', '#update-event',  function(e){
                    if(validator(['description'])) {
                        $.post('updateEvent', {
                            id: currentEvent._id,
                            title: $('#title').val(),
                            jam: $('#jam').val(),
                            jam_selesai: $('#jam_selesai').val(),
                            tempat: $('#tempat').val(),
                            personil: $('#personil').val(),
                            personil_baru: $('#personil_baru').val(),
                            description: $('#description').val(),
                            tindakan_solusi: $('#tindakan_solusi').val(),
                            jenis_job: $('#kategori').val(),
                            detail_jenis_job: $('#detail_kategori').val(),
                            color: $('#color').val()
                        }, function(result){
                            $('.alert').addClass('alert-success').text('Event updated successfuly');
                            $('.modal').modal('hide');
                            $('#calendar').fullCalendar("refetchEvents");
                            hide_notify();
                            
                        });
                    }
                });

                $('.modal').on('click', '#delete-event',  function(e){
                    $.get('deleteEvent?id=' + currentEvent._id, function(result){
                        $('.alert').addClass('alert-success').text('Event deleted successfully !');
                        $('.modal').modal('hide');
                        $('#calendar').fullCalendar("refetchEvents");
                        hide_notify();
                    });
                });

                function hide_notify()
                {
                    setTimeout(function() {
                                $('.alert').removeClass('alert-success').text('');
                            }, 2000);
                }

                function validator(elements) {
                    var errors = 0;
                    $.each(elements, function(index, element){
                        if($.trim($('#' + element).val()) == '') errors++;
                    });
                    if(errors) {
                        $('.error').html('Silahkan isi Minimal Deskripsi');
                        return false;
                    }
                    return true;
                }
            });
        </script>
    </head>
    <body>
        <div id="app">
        <header>
            <div class="navbar navbar-default" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <a class="pull-left menu-toggler hidden-md hidden-lg mobile-button" id="menu-toggler" data-toggle="collapse" href=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <i class="ti-align-justify"></i> </a>
                        <p class="judul">Susilo</p>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active">
                                <a href="http://58.145.175.213/agenda_kerja/index.php/Calendar/index"> Home </a>
                            </li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" href="#" class="dropdown-toggle"> Rutinitas </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="http://58.145.175.213/agenda_kerja/index.php/Catatan/catatan_maintenance_sistem"> Rutinitas Maintenance Sistem </a>
                                    </li>
                                    <li>
                                        <a href="http://58.145.175.213/agenda_kerja/index.php/Catatan/catatan__maintenance_infrastruktur"> Rutinitas Maintenance Infrastruktur </a>
                                    </li>
                                    <li>
                                        <a href="http://58.145.175.213/agenda_kerja/index.php/Blangko_pengecekan/data_pengecekan"> Blangko Pengecekan </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" href="#" class="dropdown-toggle"> Rencana Kerja </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="http://58.145.175.213/agenda_kerja/index.php/Catatan/catatan_rencana_develope_sistem"> Rencana Develope Sistem </a>
                                    </li>
                                    <li>
                                        <a href="http://58.145.175.213/agenda_kerja/index.php/Catatan/catatan_rencana_infrastruktur"> Rencana Infrastruktur </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="http://58.145.175.213/agenda_kerja/index.php/Catatan/Catatan"> Catatan </a>
                            </li>
                            <li>
                                <a href="http://58.145.175.213/agenda_kerja/index.php/Catatan/Catatan_piket"> Catatan Piket Lebaran </a>
                            </li>
                            <li>
                                <a href="http://58.145.175.213/agenda_kerja/index.php/Welcome/logout"> Keluar </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <div class="app-content">
            <div class="main-content">
                <section class="container-fluid container-fullw bg-white padding-bottom-0 overflow-hidden">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div id='calendar'></div>
                            </div>
                        </div>
                        <div class="alert"></div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="error"></div>
                    <form class="form-horizontal" id="crud-form">
                        <input type="hidden" id="start">
                        <input type="hidden" id="end">
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="title">Judul</label>
                            <div class="col-md-10">
                                <input id="title" name="title" type="text" class="form-control input-md" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="title">Jam</label>
                            <div class="col-md-4">
                                <input id="jam" name="jam" type="time" class="form-control input-md" />
                            </div>
                             <label class="col-md-2 control-label" for="title">Tempat</label>
                            <div class="col-md-4">
                                <input id="tempat" name="tempat" type="text" class="form-control input-md" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="title">Personil</label>
                            <div class="col-md-10">
                                <input id="personil" name="personil" type="text" class="form-control input-md" readonly/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="title">Personil baru</label>
                            <div class="col-md-10">
                                <select multiple data-placeholder="Pilih Personil" tabindex="-1" class="select2 form-control" id="personil_baru" name="karyawan[]">
                                                                        <option value="Eko" >Eko</option>
                                                                        <option value="Tim KP" >Tim KP</option>
                                                                        <option value="Tejo" >Tejo</option>
                                                                        <option value="Jono" >Jono</option>
                                                                        <option value="Yusnia" >Yusnia</option>
                                                                        <option value="Siti" >Siti</option>
                                                                        <option value="Elis" >Elis</option>
                                                                        <option value="Lilik" >Lilik</option>
                                                                        <option value="Supri" >Supri</option>
                                                                        <option value="Wintang" >Wintang</option>
                                                                        <option value="Jafar" >Jafar</option>
                                                                        <option value="Reni" >Reni</option>
                                                                        <option value="Susilo" >Susilo</option>
                                                                        <option value="Nisa" >Nisa</option>
                                                                  
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="title">Kategori</label>
                            <div class="col-md-4">
                               <select id="kategori" data-placeholder="Pilih Kategori" class="select2 form-control" tabindex="-1" name="kategori">
                                    <option value=""></option>
                                                                        <option value="1" >IBS</option>
                                                                        <option value="2" >SIS</option>
                                                                        <option value="3" >Network</option>
                                                                        <option value="4" >Install Software</option>
                                                                        <option value="6" >CBT Neutron</option>
                                                                        <option value="7" >Koordinasi</option>
                                                                        <option value="8" >Development</option>
                                                                        <option value="9" >S E R V E R</option>
                                                                        <option value="10" >SIAGEN</option>
                                                                        <option value="11" >Penangkal Petir</option>
                                                                        <option value="12" >AC Server</option>
                                                                        <option value="13" >Troubleshooting</option>
                                                                  
                                </select>
                            </div>
                            <label class="col-md-2 control-label" for="title">Detail</label>
                            <div class="col-md-4">
                                <select id="detail_kategori" data-placeholder="Pilih Kategori" class="select2 form-control" tabindex="-1" name="detail_kategori">
                                    <option value=""></option>                   
                                </select>
                            </div>
                        </div>                            
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="description">Deskripsi</label>
                            <div class="col-md-10">
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="description">Tindakan Solusi</label>
                            <div class="col-md-10">
                                <textarea class="form-control" id="tindakan_solusi" name="tindakan_solusi" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="title">Jam Selesai</label>
                            <div class="col-md-4">
                                <input id="jam_selesai" name="jam_selesai" type="time" class="form-control input-md" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="color"></label>
                            <div class="col-md-10">
                                <input id="color" name="color" type="hidden" class="form-control input-md" readonly="readonly" />
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $("#kategori").change(function(){
                $("#detail_kategori").select2("val", "");
                var kategori = $("#kategori").val();
                if(kategori){
                $.ajax({
                    type:'POST',
                    url: "http://58.145.175.213/agenda_kerja/index.php/Calendar/ambildetail",
                    data: "id="+kategori,
                    success: function(msg){
                        $("#detail_kategori").html(msg);;
                    }
                });
                }else{
                    $("#detail_kategori").html('<option></option>');
                }
            });
    </script>
    <script src="http://58.145.175.213/agenda_kerja/assets/sing/vendor/widgster/widgster.js"></script>
    <script src="http://58.145.175.213/agenda_kerja/assets/sing/vendor/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="http://58.145.175.213/agenda_kerja/assets/sing/vendor/jquery-autosize/jquery.autosize.min.js"></script>
    <script src="http://58.145.175.213/agenda_kerja/assets/sing/vendor/bootstrap3-wysihtml5/wysihtml5-0.3.0.min.js"></script>
    <script src="http://58.145.175.213/agenda_kerja/assets/sing/vendor/bootstrap3-wysihtml5/bootstrap3-wysihtml5.js"></script>
    <script src="http://58.145.175.213/agenda_kerja/assets/sing/vendor/select2/select2.min.js"></script>
    <script src="http://58.145.175.213/agenda_kerja/assets/sing/js/form-elements.js"></script>
    </body>
</html>



